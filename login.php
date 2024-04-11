<!-- Habiyaremye Laurier 222003068 -->

<?php
// Database connection parameters
$servername = "localhost";
$username = "admin";
$password = "bityear2@2024";
$database = "bityeartwo2024";
$port = 3306; // MySQL port 

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// form data
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT  firstname FROM user WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    // User found, redirect to user home page
    session_start();
    $_SESSION['email'] = $email; 
    header("Location: Flashcards.html"); 
    exit();
} else {
    // User not found, display error message
    echo "<script>alert('Wrong Email or Password, Please Verify Credentials');</script>";
    echo "<script>window.location.href = 'login.html';</script>";
}

// Close database connection
$stmt->close();
$conn->close();
?>