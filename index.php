<?php
// Simple PHP header for content-type, but it won't serve dynamic content
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .login-container, .dashboard-container, .enroll-container, .attendance-container, .schedule-container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        .button:hover {
            background-color: #45a049;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        h1, h2 {
            color: #333;
        }

        input[type="email"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .error-message {
            color: red;
            display: none;
        }
    </style>
</head>
<body>

<!-- Login Page -->
<div class="login-container" id="loginPage">
    <h1>Student Login</h1>
    <form id="loginForm">
        <input type="email" id="loginEmail" placeholder="Enter email" required>
        <input type="password" id="loginPassword" placeholder="Enter password" required>
        <button type="submit" class="button">Login</button>
    </form>
    <p class="error-message" id="loginError">Invalid email or password.</p>
</div>

<!-- Dashboard Page -->
<div class="dashboard-container" id="dashboardPage" style="display:none;">
    <h1>Welcome, John Doe</h1>
    <h2>Your Enrolled Courses:</h2>
    <ul id="courseList"></ul>
    <div class="button-container">
        <button class="button" onclick="showEnrollPage()">Enroll in New Course</button>
        <button class="button" onclick="showAttendancePage()">View Attendance</button>
        <button class="button" onclick="showSchedulePage()">View Schedule</button>
    </div>
</div>

<!-- Course Enrollment Page -->
<div class="enroll-container" id="enrollPage" style="display:none;">
    <h1>Enroll in a Course</h1>
    <select id="courseSelect">
        <option value="1">Math 101</option>
        <option value="2">History 202</option>
        <option value="3">Computer Science 303</option>
    </select>
    <button class="button" onclick="enrollInCourse()">Enroll</button>
    <button class="button" onclick="showDashboardPage()">Back to Dashboard</button>
</div>

<!-- Attendance Page -->
<div class="attendance-container" id="attendancePage" style="display:none;">
    <h1>Your Attendance</h1>
    <table>
        <thead>
            <tr>
                <th>Course</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Math 101</td>
                <td>2025-02-05</td>
                <td>Present</td>
            </tr>
            <tr>
                <td>History 202</td>
                <td>2025-02-05</td>
                <td>Absent</td>
            </tr>
        </tbody>
    </table>
    <button class="button" onclick="showDashboardPage()">Back to Dashboard</button>
</div>

<!-- Schedule Page -->
<div class="schedule-container" id="schedulePage" style="display:none;">
    <h1>Your Schedule</h1>
    <table>
        <thead>
            <tr>
                <th>Course</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Math 101</td>
                <td>2025-02-06 10:00 AM</td>
                <td>2025-02-06 12:00 PM</td>
                <td>Room 101</td>
            </tr>
            <tr>
                <td>History 202</td>
                <td>2025-02-06 02:00 PM</td>
                <td>2025-02-06 04:00 PM</td>
                <td>Room 202</td>
            </tr>
        </tbody>
    </table>
    <button class="button" onclick="showDashboardPage()">Back to Dashboard</button>
</div>

<script>
    // Simulate logged-in state
    let isLoggedIn = false;

    // Sample course data
    let enrolledCourses = [];

    // Simulate login
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let email = document.getElementById('loginEmail').value;
        let password = document.getElementById('loginPassword').value;
        
        // Check login credentials (hardcoded)
        if (email === 'student@example.com' && password === 'password123') {
            isLoggedIn = true;
            enrolledCourses = ['Math 101', 'History 202']; // sample enrolled courses
            showDashboardPage();
        } else {
            document.getElementById('loginError').style.display = 'block';
        }
    });

    // Show Dashboard page
    function showDashboardPage() {
        document.getElementById('loginPage').style.display = 'none';
        document.getElementById('dashboardPage').style.display = 'block';
        
        let courseList = document.getElementById('courseList');
        courseList.innerHTML = ''; // Clear existing list
        enrolledCourses.forEach(course => {
            let li = document.createElement('li');
            li.textContent = course;
            courseList.appendChild(li);
        });
    }

    // Show Enroll page
    function showEnrollPage() {
        document.getElementById('dashboardPage').style.display = 'none';
        document.getElementById('enrollPage').style.display = 'block';
    }

    // Enroll in a course
    function enrollInCourse() {
        let selectedCourse = document.getElementById('courseSelect').value;
        let courseName = '';
        
        switch (selectedCourse) {
            case '1':
                courseName = 'Math 101';
                break;
            case '2':
                courseName = 'History 202';
                break;
            case '3':
                courseName = 'Computer Science 303';
                break;
        }

        enrolledCourses.push(courseName);
        showDashboardPage();
    }

    // Show Attendance page
    function showAttendancePage() {
        document.getElementById('dashboardPage').style.display = 'none';
        document.getElementById('attendancePage').style.display = 'block';
    }

    // Show Schedule page
    function showSchedulePage() {
        document.getElementById('dashboardPage').style.display = 'none';
        document.getElementById('schedulePage').style.display = 'block';
    }
</script>

</body>
</html>
