<?php
session_start();
include_once 'db.php';
include 'sidebar.php';

$class = $_GET['class'] ?? $_POST['class'] ?? '';
$subject = $_GET['subject'] ?? $_POST['subject'] ?? '';
$date = date('Y-m-d');
$year = date('Y');
$month = date('m');
$day = date('d');

// Get distinct class dates for this class & subject in current month
$class_dates_result = mysqli_query($conn, "
    SELECT DISTINCT DATE(date) AS class_date 
    FROM attendance_records 
    WHERE class = '$class' AND subject = '$subject' 
    AND MONTH(date) = '$month' AND YEAR(date) = '$year' 
    AND DAY(date) <= '$day'
");

$class_dates = [];
if ($class_dates_result && mysqli_num_rows($class_dates_result) > 0) {
    while ($row = mysqli_fetch_assoc($class_dates_result)) {
        $day_num = (int)date('j', strtotime($row['class_date']));
        $class_dates[] = $day_num;
    }
}
$month = date('m');
$year = date('Y');

if (empty($class)) {
    die("Class not specified.");
}

// Get class ID
$escaped_class = mysqli_real_escape_string($conn, $class);
$class_query = mysqli_query($conn, "SELECT id FROM classes WHERE class_name = '$escaped_class'");
if ($class_query && mysqli_num_rows($class_query) > 0) {
    $class_id = mysqli_fetch_assoc($class_query)['id'];
} else {
    die("Invalid class selected");
}

$class_table_map = [
    "1st Year" => "students_1st_year",
    "2nd Year" => "students_2nd_year",
    "3rd Year" => "students_3rd_year"
];

if (!isset($class_table_map[$class])) {
    die("No student table found for selected class.");
}

$student_table = $class_table_map[$class];

// Get all students
$students_query = mysqli_query($conn, "SELECT roll_no, student_name FROM $student_table");
if (!$students_query) {
    die("Failed to fetch students");
}

// Fetch attendance records for this class, subject, and month
$attendance_records = [];
$attendance_result = mysqli_query($conn, "
    SELECT roll_no, DAY(date) as day, status 
    FROM attendance_records 
    WHERE class = '$class' AND subject = '$subject' 
    AND MONTH(date) = $month AND YEAR(date) = $year
");
$total_class_days_result = mysqli_query($conn, "
    SELECT DISTINCT DATE(date) as class_date 
    FROM attendance_records 
    WHERE class = '$class' AND subject = '$subject' 
    AND MONTH(date) = $month AND YEAR(date) = $year
");

$total_classes = mysqli_num_rows($total_class_days_result);

while ($row = mysqli_fetch_assoc($attendance_result)) {
    $attendance_records[$row['roll_no']][$row['day']] = $row['status'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="mark_attendance.css">
</head>
<body>
<div class="main-content">
    <h2>Mark Attendance for <?php echo "$class - $subject on $date"; ?></h2>
    <form action="save_attendance.php" method="POST">
        <input type="hidden" name="class" value="<?php echo $class; ?>">
        <input type="hidden" name="subject" value="<?php echo $subject; ?>">
        <input type="hidden" name="date" value="<?php echo $date; ?>">
        <div class="btn">
            <button type="submit">Save Attendance</button>
        </div>
        <table border="4" align="center">
            <caption>Daily Attendance - <?php echo date('F Y'); ?></caption>
            <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <?php for ($i = 1; $i <= 31; $i++) echo "<th>$i</th>"; ?>
                <th>Total Class</th>
                <th>Total Present</th>
                <th>Total Absent</th>
                <th>Percentage</th>
            </tr>

            <?php while ($student = mysqli_fetch_assoc($students_query)) {
                $roll_no = $student['roll_no'];
                $student_name = $student['student_name'];
                $total_present = 0;
            ?>
                <tr>
                    <td><?php echo $roll_no; ?></td>
                    <td><?php echo $student_name; ?></td>

                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $is_checked = isset($attendance_records[$roll_no][$i]) && $attendance_records[$roll_no][$i] === 'Present';
                        if ($is_checked) $total_present++;

                        echo "<td><input type='checkbox' name='attendance[$roll_no][$i]' value='Present' " . ($is_checked ? "checked" : "") . "></td>";
                    }
                    $total_absent = $total_classes - $total_present;
                    $percentage = $total_classes > 0 ? round(($total_present / $total_classes) * 100, 2) . "%" : "0%";
                    ?>
                    <td><?php echo $total_classes; ?></td>
                    <td><?php echo $total_present; ?></td>
                    <td><?php echo $total_absent; ?></td>
                    <td><?php echo $percentage; ?></td>
                </tr>
            <?php } ?>
        </table>
    </form>
</div>
</body>
</html>