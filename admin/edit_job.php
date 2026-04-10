<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("Access Denied");
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM jobs WHERE id='$id'");
$job = $result->fetch_assoc();

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $desc = $_POST['desc'];

    $conn->query("UPDATE jobs SET 
        title='$title',
        company='$company',
        location='$location',
        description='$desc'
        WHERE id='$id'
    ");

    header("Location: admin_dashboard.php");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="container">
<div class="card">

<h2>Edit Job</h2>

<form method="POST">
    <input name="title" value="<?php echo $job['title']; ?>" required>
    <input name="company" value="<?php echo $job['company']; ?>" required>
    <input name="location" value="<?php echo $job['location']; ?>" required>
    <textarea name="desc"><?php echo $job['description']; ?></textarea>

    <button class="btn" name="update">Update Job</button>
</form>

</div>
</div>