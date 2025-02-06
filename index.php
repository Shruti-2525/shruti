<?php
// index.php - Main page of the student portal
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        .menu {
            margin-top: 50px;
        }
        .menu button {
            display: block;
            width: 200px;
            margin: 10px auto;
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .menu button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Student Portal</h1>
    <div class="menu">
        <button onclick="location.href='enrollments.php'">Course Enrollments</button>
        <button onclick="location.href='attendance.php'">Attendance</button>
        <button onclick="location.href='schedule.php'">Class Schedule</button>
    </div>
</body>
</html>
