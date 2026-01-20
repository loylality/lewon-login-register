<?php
session_start();
$conn = mysqli_connect("localhost","root","","login_system");
if(!$conn){ die("DB connection failed"); }

// ---------------- Register ----------------
if(isset($_POST['type']) && $_POST['type'] == "register"){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if($pass !== $cpass){
        echo "Password not matched"; exit;
    }

    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        echo "Email already registered"; exit;
    }

    mysqli_query($conn,"INSERT INTO users(name,username,email,password)
        VALUES('$name','$username','$email','$hash')");

    echo "registered"; exit;
}

// ---------------- Login ----------------
if(isset($_POST['type']) && $_POST['type'] == "login"){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $res = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
        if(password_verify($pass, $row['password'])){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            echo "success"; exit;
        } else { echo "Wrong password"; exit; }
    } else { echo "User not found"; exit; }
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Modern Login Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
           <form id="registerForm">
             <h1>Registration</h1>
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="cpassword" placeholder="Confirm Password" required>

    <input type="hidden" name="type" value="register">

    <button type="submit">Submit</button>
</form>




        </div>
        <div class="form-container sign-in">
            <form id="loginForm">
                <h1>Login</h1>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <input type="hidden" name="type" value="login">

    <button type="submit">Submit</button>
                </form>


        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Log in</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>