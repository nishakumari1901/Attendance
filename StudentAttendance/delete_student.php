<?php
// Database connection
include 'sidebar.php';
$conn = new mysqli("localhost", "root", "", "attendance_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_id = intval($_POST['class_id']);
    $roll_no = trim($_POST['roll_no']);
    $name = trim($_POST['name']);

    // Get class name
    $stmt = $conn->prepare("SELECT class_name FROM classes WHERE id = ?");
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $stmt->bind_result($class_name);
    $stmt->fetch();
    $stmt->close();

    // Determine the correct table based on class name
    $table = "";
    if (stripos($class_name, "1st") !== false) {
        $table = "students_1st_year";
    } elseif (stripos($class_name, "2nd") !== false) {
        $table = "students_2nd_year";
    } elseif (stripos($class_name, "3rd") !== false) {
        $table = "students_3rd_year";
    }

    if ($table !== "") {
        $stmt = $conn->prepare("DELETE FROM $table WHERE roll_no = ? AND student_name = ?");
        $stmt->bind_param("ss", $roll_no, $name);
        if ($stmt->execute()) {
            $message = "Student deleted successfully.";
        } else {
            $message = "Failed to delete student.";
        }
        $stmt->close();
    } else {
        $message = "Invalid class selected.";
    }
}

// Fetch all classes
$result = $conn->query("SELECT * FROM classes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <style>
        /* delete_student.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 80px auto;
    padding: 30px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 25px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
select {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 12px;
    background-color: #e74c3c;
    color: white;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #c0392b;
}
    </style>
</head>
<body>
<div class="container">
    <h1>Delete Student</h1>

    <?php if (!empty($message)) echo "<p class='success'>$message</p>"; ?>

    <form method="post">
        <label for="class_id">Class:</label>
        <select name="class_id" required>
            <option value="">--Select Class--</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['class_name']) ?></option>
            <?php endwhile; ?>
        </select>

        <label for="roll_no">Roll No:</label>
        <input type="text" name="roll_no" required>

        <label for="name">Student Name:</label>
        <input type="text" name="name" required>

        <button type="submit">Delete Student</button>
    </form>
</div>
</body>
</html>