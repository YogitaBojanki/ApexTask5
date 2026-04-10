<?php
include("../config/db.php");

$nameErr = $emailErr = $passErr = "";
$success = "";

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // VALIDATIONS
    if(empty($name)){
        $nameErr = "Name is required";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format";
    }

    if(strlen($password) < 6){
        $passErr = "Password must be at least 6 characters";
    }

    // CHECK EXISTING EMAIL
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0){
        $emailErr = "Email already exists";
    }

    // INSERT
    if(empty($nameErr) && empty($emailErr) && empty($passErr)){
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $sql = "INSERT INTO users(name,email,password,role) 
        VALUES('$name','$email','$hashed','$role')";

        if($conn->query($sql)){
            $success = "Registered successfully!";
        }
    }
}
?>

<link rel="stylesheet" href="../assets/auth.css">

<div class="card">
<h2>Register</h2>

<form method="POST">

<input name="name" placeholder="Full Name">
<div class="error"><?php echo $nameErr; ?></div>

<input name="email" placeholder="Email">
<div class="error"><?php echo $emailErr; ?></div>

<div style="position:relative;">
    <input type="password" name="password" id="password" placeholder="Password">
    <span onclick="togglePassword()" 
          style="position:absolute; right:10px; top:12px; cursor:pointer;">
        👁️
    </span>
</div>

<div class="error"><?php echo $passErr; ?></div>

<select name="role">
    <option value="user">User</option>
    <option value="admin">Admin</option>
</select><br>

<br><button name="register">Register</button>

<div class="success"><?php echo $success; ?></div>

<p style="text-align:center;">
Already have account? <a href="login.php">Login</a>
</p>

</form>
</div>
<script>
function togglePassword() {
    var pass = document.getElementById("password");
    pass.type = (pass.type === "password") ? "text" : "password";
}
</script>