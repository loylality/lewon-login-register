<?php
session_start();

$conn = new mysqli("localhost", "root", "", "login_system");
if ($conn->connect_error) {
    die("DB Error");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        echo "Login successful";
    } else {
        echo "Wrong password";
    }
} else {
    echo "User not found";
}
