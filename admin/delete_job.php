<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("Access Denied");
}

$id = $_GET['id'];

$conn->query("DELETE FROM jobs WHERE id='$id'");

header("Location: admin_dashboard.php");
?>