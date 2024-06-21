<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "Both fields are required.";
        exit;
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'user_auth_brc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password ,role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password,$role);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Start session and store user data
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            echo "Login successful!";
            // Redirect to a protected page, e.g., dashboard.php
            if($role=='s'){
                header("Location: http://localhost/edutech/student.html");
            }
            else{
                header("Location:  http://localhost/edutech/Card.html");
            }
            // exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
