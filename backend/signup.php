<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($fullname) || empty($password)) {
        header("Location: http://localhost/edutech/signup.html?error=All fields are required.");
        exit;
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'user_auth_brc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        $conn->close();
        header("Location: http://localhost/edutech/backend/user-already-reg.html");
        // echo "User already registered with this email";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $email, $fullname, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: http://localhost/edutech/login.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
