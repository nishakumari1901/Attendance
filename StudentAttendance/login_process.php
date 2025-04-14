<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
error_log("Redirecting to index.html");
session_start();
include_once 'db.php'; // Ensure this file correctly connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        //die("Username or Password is missing! Check form input names.");
        header("Location:index.html");
        exit();
    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if($stmt===false){
        header("Location:error.html");
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    //check if user exists
        if ($result->num_rows === 0) {
            header("Location:register.html");
            exit();
        }
        $user = $result->fetch_assoc();
        // ✅ Ensure the password in DB is hashed before verifying
        if (password_verify($password, $user['password'])) {
            header("Location:index.html");
            exit();
        }
            // Start session for the teacher
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            
            // ✅ Redirect to dashboard
            header("Location:dashboard.php");
            exit();
}
?>