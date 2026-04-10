<?php
session_start();
include("../config/db.php");

$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $error = "All fields are required";
    } else {
        $result = $conn->query("SELECT * FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();

        if($user && password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){
                header("Location: ../admin/admin_dashboard.php");
            } else {
                header("Location: ../user/dashboard.php");
            }
        } else {
            $error = "Invalid email or password";
        }
    }
}
?>

<link rel="stylesheet" href="../assets/auth.css">

<div class="card">
<h2>Login</h2>

<form method="POST">

<input name="email" placeholder="Email">

<div style="position:relative;">
    <input type="password" name="password" id="loginpassword" placeholder="Password">
    <span onclick="togglePassword()" 
          style="position:absolute; right:10px; top:12px; cursor:pointer;">
        👁️
    </span>
</div>

<div class="error"><?php echo $error; ?></div>

<button name="login">Login</button>

<p style="text-align:center;">
Don't have account? <a href="register.php">Register</a>
</p>

</form>
</div>
<script>
function togglePassword() {
    var pass = document.getElementById("loginpassword");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>