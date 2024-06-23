<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}

// Access user data from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Class</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        #app {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .teacher-portal, .student-portal {
            margin: 20px 0;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label, input, button {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div id="app">
        <h1>My Class</h1>
        <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>
        <div class="teacher-portal">
            <h2>Schedule a Class</h2>
            <form id="schedule-form">
                <label for="class-title">Class Title:</label>
                <input type="text" id="class-title" name="classTitle" required>
                <label for="class-time">Class Time:</label>
                <input type="datetime-local" id="class-time" name="classTime" required>
                <label for="meet-link">Google Meet Link:</label>
                <input type="url" id="meet-link" name="meetLink" required>
                <button type="submit">Schedule</button>
            </form>
        </div>
        <div class="student-portal">
            <h2>Upcoming Classes</h2>
            <ul id="class-list"></ul>
        </div>
    </div>
    <script>
        document.getElementById('schedule-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        // console.log(htmlspecialchars($username););
        const title = document.getElementById('class-title').value;
        const time = document.getElementById('class-time').value;
        const meetLink = document.getElementById('meet-link').value;

        const response = await fetch('backend/schedule.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ title, time, meetLink, username: '<?php echo $username; ?>' }),
        });

        if (response.ok) {
            alert('Class scheduled successfully!');
            loadClasses();
        } else {
            alert('Error scheduling class');
        }
    });

    async function loadClasses() {
        const response = await fetch('backend/classes.php');
        const classes = await response.json();
        const classList = document.getElementById('class-list');
        classList.innerHTML = '';
        classes.forEach(c => {
            const li = document.createElement('li');
            li.innerHTML = `${c.title} by ${c.username} - ${new Date(c.time).toLocaleString()} - <a href="${c.meetLink}" target="_blank">Join</a>`;
            classList.appendChild(li);
        });
    }

    loadClasses();

    </script>
</body>
</html>
