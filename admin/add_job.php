<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("Access Denied");
}

$success = "";

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO jobs(title, company, location, description)
            VALUES('$title', '$company', '$location', '$desc')";

    if($conn->query($sql)){
        $success = "Job added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="../assets/style.css">

<div class="navbar">
    <h3>Add Job</h3>
    <a href="admin_dashboard.php">Back</a>
</div>

<div class="container">

<div class="card">
<h2>Add New Job</h2>

<?php if($success){ ?>
    <p style="color:green;"><?php echo $success; ?></p>
<?php } ?>

<form method="POST">
    <input name="title" placeholder="Job Title" required>
    <input name="company" placeholder="Company Name" required>
    <input name="location" placeholder="Location" required>
    <textarea name="desc" placeholder="Job Description"></textarea>

    <button class="btn" name="add">Add Job</button>
</form>

</div>
</div>