<?php
session_start();
include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match! Please try again.'); window.location.href='register.html';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the user already exists
    $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkUser) > 0) {
        echo "<script>alert('User already exists! Please login.'); window.location.href='index.html';</script>";
        exit();
    }

    // Insert new user into the database
    $query = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registration successful! You can now login.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Registration failed! Try again.'); window.location.href='register.html';</script>";
    }
}
?>