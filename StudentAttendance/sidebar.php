<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="sidebar.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

<div>
<aside class="sidebar collapsed" id="sidebar">
    <button id="sidebarToggle">☰</button>
        <!-- <img src="logo.png" alt="Logo"> -->
    <span>ATTENDANCE</span>
    <ul class="menu">
    <li><div><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> <span class="text"> Dashboard</span></a></div></li>
    <li><div><a href="students.php"><i class="fas fa-user-graduate"></i> <span class="text">Manage Students</span></a></div></li>
    <li><div><a href="add_students.php"><i class="fas fa-user-plus"></i> <span class="text"> Add Student</span></a></div></li>
    <li><div><a href="delete_student.php"><i class="fas fa-user-minus"></i> <span class="text">Delete Student</span></a></div></li>
    <!-- <li><div><a href="view_student.php"><i class="fas fa-eye"></i><span class="text">  View Student</span></a></div></li> -->
    <li><div><a href="register.html"><i class="fas fa-user-edit"></i> <span class="text"> Register</span></a></div></li>
    <li><div><a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span class="text"> Logout</span></a></div></li>
</ul>
    <!-- <div class="profile">
        <img src="user.png" alt="User">
        <span>Attendance</span>
         <p>attendancesystem@gmail.com</p> 
    </div> -->
</aside>
</div> 
<script>
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.getElementById('toggleBtn');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
</script>
<script>
    document.getElementById("sidebarToggle").addEventListener("click", function() {
        document.querySelector(".sidebar").classList.toggle("collapsed");
       // document.querySelector(".main-content").classList.toggle("expanded");
    });
</script>
</body>
</html>
