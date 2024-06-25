<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.html");
    exit();
}

// Access user data from the session
$username = $_SESSION['username'];
$studentId = $_SESSION['id'];
if(array_key_exists('logout', $_POST)) { 
    logout(); 
}
function logout() { 
    session_unset();
    session_destroy();
    header("Location: http://localhost/edutech/login.html");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Class Portal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #343a40;
            margin-bottom: 30px;
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            padding: 10px 0;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #007BFF;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 20px;
            position: relative;
            background-color: inherit;
            width: 50%;
            animation: slideIn 1s ease-in-out;
        }

        .timeline-item::after {
            content: ' ';
            position: absolute;
            width: 25px;
            height: 25px;
            right: -17px;
            background-color: white;
            border: 4px solid #007BFF;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
            transition: background-color 0.3s, transform 0.3s;
        }

        .timeline-item-content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .timeline-item-content h3 {
            margin-top: 0;
            color: #007BFF;
        }

        .timeline-item-content p {
            margin: 0;
        }

        .join-button {
            padding: 8px 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .join-button:hover {
            background-color: #0056b3;
        }

        .timeline-item.left {
            left: 0;
        }

        .timeline-item.right {
            left: 50%;
        }

        .timeline-item.left::after {
            left: auto;
            right: -17px;
        }

        .timeline-item.left .timeline-item-content {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .timeline-item.right .timeline-item-content {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
        }

        .timeline-item:hover::after {
            background-color: #0056b3;
            transform: scale(1.2);
        }

        @keyframes slideIn {
            from { transform: translateX(-100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Class Portal</h1>

        <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>

        <h2>Upcoming Classes</h2>
        <div class="timeline" id="class-timeline">
            <!-- Classes will be dynamically inserted here -->
        </div>
        <form method="post"> <input type="submit" name="logout" class="logout" value="logout" /> </form> 
    </div>

    <script>
        
        async function loadClasses() {
            const response = await fetch(`backend/fetch_classes.php`);
            const classes = await response.json();
            const timeline = document.getElementById('class-timeline');
            timeline.innerHTML = '';

            classes.forEach((classData, index) => {
                const item = document.createElement('div');
                item.className = `timeline-item ${index % 2 === 0 ? 'left' : 'right'}`;
                item.innerHTML = `
                    <div class="timeline-item-content">
                        <h3>${classData.subject}</h3>
                        <h4>Class by : ${classData.teacher}</h4>
                        <p><strong>Date:</strong> ${classData.date}</p>
                        <p><strong>Time:</strong> ${classData.time}</p>
                        <a href="${classData.link}" target="_blank" class="join-button">Join Class</a>
                    </div>
                `;
                timeline.appendChild(item);
            });
        }

        // Load classes on page load
        loadClasses();
    </script>
</body>
</html>
