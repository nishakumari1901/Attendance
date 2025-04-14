<?php
include_once 'sidebar.php';
include 'db.php';
$message = '';

// Fetch class options from the database
$class_query = "SELECT class_name FROM classes";
$class_result = mysqli_query($conn, $class_query);

// Mapping class_name to corresponding table
$class_table_map = [
    "1st Year" => "students_1st_year",
    "2nd Year" => "students_2nd_year",
    "3rd Year" => "students_3rd_year"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST['roll_no'] ?? null;
    $student_name = $_POST['student_name'] ?? null;
    $class_name = $_POST['class_name'] ?? null;

    if ($roll_no && $student_name && $class_name && isset($class_table_map[$class_name])) {
        $table_name = $class_table_map[$class_name];
        $sql = "INSERT INTO $table_name (roll_no, student_name) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $roll_no, $student_name);

        if ($stmt->execute()) {
            $message = "Student added successfully to $class_name!";
        } else {
            $message = "Error: " . $stmt->error;
        }
    } else {
        $message = "Please fill all fields!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #a4a8dd;
                margin-left: 400px;
                margin-right: 400px;
                padding: 10px;
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
                margin-bottom: 25px;
                color: #333;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                margin-bottom: 5px;
                font-weight: 600;
                color: #555;
            }

            input[type="text"],
            select {
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            button {
                padding: 12px;
                background-color: #3498db;
                color: white;
                border: none;
                border-radius: 5px;
                font-weight: bold;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #2980b9;
            }
    </style>
</head>
<body>
    <h2>Add Student</h2>
    <div>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <form method="POST" action="">
        <label>Roll No:</label>
        <input type="number" name="roll_no" required><br><br>

        <label>Student Name:</label>
        <input type="text" name="student_name" required><br><br>

        <label>Class:</label>
        <select name="class_name" required>
            <option value="">Select Class</option>
            <?php while ($row = mysqli_fetch_assoc($class_result)) { ?>
                <option value="<?php echo $row['class_name']; ?>"><?php echo $row['class_name']; ?></option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="Add Student">
    </form>
    </div>
</body>
</html>