<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

// ✅ ALWAYS define query FIRST
$query = "SELECT * FROM jobs";

// Search logic
if(isset($_GET['search']) && !empty($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM jobs WHERE title LIKE '%$search%'";
}

// ✅ Execute query
$result = $conn->query($query);
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="navbar">
    <h3>Job Portal</h3>
    <a href="../auth/logout.php">Logout</a>
</div>

<div class="container">

<h2>Available Jobs</h2>

<form method="GET">
    <input name="search" placeholder="Search jobs...">
</form>

<?php
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<div class='card job-card'>";
        echo "<h3>".$row['title']."</h3>";
        echo "<p><b>".$row['company']."</b></p>";
        echo "<p>".$row['location']."</p>";
        echo "<p style='color:gray;'>".$row['description']."</p>";
        echo "<a class='btn' href='apply_job.php?id=".$row['id']."'>Apply Now</a>";
        echo "</div>";
    }
} else {
    echo "<div class='card'><p style='color:red;'>No jobs found</p></div>";
}
?>

</div>