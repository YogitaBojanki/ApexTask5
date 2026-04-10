<link rel="stylesheet" href="../assets/style.css">

<?php
session_start();
include("../config/db.php");

// Check login
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Check job id exists
if(!isset($_GET['id'])){
    die("Invalid Job");
}

$job_id = $_GET['id'];

// ✅ Prevent duplicate applications
$check = $conn->query("SELECT * FROM applications 
                       WHERE user_id='$user_id' AND job_id='$job_id'");

if($check->num_rows > 0){
    $message = "You already applied for this job!";
} else {

    $sql = "INSERT INTO applications(user_id, job_id) 
            VALUES('$user_id', '$job_id')";

    if($conn->query($sql)){
        $message = "Application submitted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="container">
<div class="card">

<h2><?php echo $message; ?></h2>

<a class="btn" href="dashboard.php">Back to Jobs</a>

</div>
</div>