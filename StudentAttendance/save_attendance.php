<?php
session_start();
include_once 'db.php';
include 'sidebar.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $attendance = $_POST['attendance'] ?? [];

    foreach ($attendance as $roll_no => $days) {
        foreach ($days as $day => $status) {
            $attendance_status = ($status === 'Present') ? 'Present' : 'Absent';

            // Insert or update attendance for each student
            $query = "INSERT INTO attendance_records (roll_no, class, subject, date, status) 
                      VALUES ('$roll_no', '$class', '$subject', '$date', '$attendance_status')
                      ON DUPLICATE KEY UPDATE status='$attendance_status'";
            mysqli_query($conn, $query);
        }
    }

    // Redirect back to attendance page
    header("Location: mark_attendance.php?class=$class&subject=$subject&success=1");
    exit();
} else {
    die("Invalid request!");
}
?>