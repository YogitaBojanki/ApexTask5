<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("Access Denied");
}

// JOIN users + jobs + applications
$sql = "SELECT applications.id, users.name, users.email, jobs.title, applications.applied_at
        FROM applications
        JOIN users ON applications.user_id = users.id
        JOIN jobs ON applications.job_id = jobs.id
        ORDER BY applications.applied_at DESC";

$result = $conn->query($sql);
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="navbar">
    <h3>Applied Candidates</h3>
    <a href="admin_dashboard.php">Back</a>
</div>

<div class="container">

<h2>Applications</h2>

<?php
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
    <div class="card job-card">
        <h3><?php echo $row['title']; ?></h3>
        <p><b>Candidate:</b> <?php echo $row['name']; ?></p>
        <p><b>Email:</b> <?php echo $row['email']; ?></p>
        <p><b>Applied On:</b> <?php echo $row['applied_at']; ?></p>
    </div>
<?php
    }
} else {
    echo "<div class='card'><p>No applications yet</p></div>";
}
?>

</div>