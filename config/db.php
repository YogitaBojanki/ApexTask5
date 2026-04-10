<?php
$conn = new mysqli("localhost", "root", "", "job_portal","3308");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>