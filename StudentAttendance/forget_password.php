<?php
session_start();
// DB connection
$host = "localhost";
$dbname = "attendance_system";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$step = 1;
$message = "";

// Step 1: Verify username and email
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
    $stmt->execute([$username, $email]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['reset_user_id'] = $user['id'];
        $step = 2;
    } else {
        $message = "<p style='color:red;'>Invalid username or email.</p>";
    }
}

// Step 2: Reset password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    if (isset($_SESSION['reset_user_id'])) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$new_password, $_SESSION['reset_user_id']]);
        unset($_SESSION['reset_user_id']);
        $message = "<p style='color:green;'>Password reset successful. You can now <a href='index.html'>login</a>.</p>";
        $step = 1;
    } else {
        $message = "<p style='color:red;'>Session expired. Please verify again.</p>";
        $step = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(28, 211, 211);
            margin: 10;
            padding left: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 25px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        h2 {
            align-self: start;
            color: blue;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:rgb(3, 28, 71);
        }

        p {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <h2>Forgot Password</h2>
    <?php echo $message; ?>

    <?php if ($step === 1): ?>
    <form method="POST">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit" name="verify_user">Verify</button>
    </form>

    <?php elseif ($step === 2): ?>
    <form method="POST">
        <label>New Password: <input type="password" name="new_password" required></label><br>
        <button type="submit" name="reset_password">Reset Password</button>
    </form>
    <?php endif; ?>
</body>
</html>
