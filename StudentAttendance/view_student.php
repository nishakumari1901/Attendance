<?php
include_once 'db.php';
include 'sidebar.php';
$result = mysqli_query($conn, "SELECT * FROM attendance ORDER BY class, roll_no");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <link rel="stylesheet" href="updateStud.css">
</head>
<body>
<h2>Student List</h2>
<tableborder="1">
    <tr><th>Roll No</th><th>Name</th><th>Class</th></tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['class'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>