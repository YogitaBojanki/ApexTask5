<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("Access Denied");
}

// Fetch jobs
$result = $conn->query("SELECT * FROM jobs");
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="navbar">
    <h3>Admin Panel</h3>
    <div>
        <a href="add_job.php">➕ Add Job</a>
        <a href="view_applications.php">📄 Applications</a>
        <a href="../auth/logout.php">Logout</a>
    </div>
</div>

<div class="container">

<h2>All Jobs</h2>

<?php
if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
        <div class="card job-card">
            <h3><?php echo $row['title']; ?></h3>
            <p><b><?php echo $row['company']; ?></b> - <?php echo $row['location']; ?></p>

            <div style="margin-top:10px;">
                <a class="btn" href="edit_job.php?id=<?php echo $row['id']; ?>">✏️ Edit</a>

                <a class="btn" style="background:red;"
                   href="delete_job.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this job?')">
                   🗑️ Delete
                </a>
            </div>
        </div>
<?php
    }
} else {
    echo "<div class='card'><p>No jobs available</p></div>";
}
?>

</div>
