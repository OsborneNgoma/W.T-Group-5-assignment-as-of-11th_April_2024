<!-- Ngoma Osborne 222004457 -->

<?php
// Database connection parameters
$servername = "localhost";
$username = "admin";
$password = "bityear2@2024";
$database = "bityeartwo2024";
$port = 3306; //  MySQL port here

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];
$creationdate = $_POST['creationdate'];
$activation_code = $_POST['activation_code'];

// Insert data into database 
$sql = "INSERT INTO user (firstname, lastname, username, email, telephone, password, creationdate, activation_code)

        VALUES ('$firstname', '$lastname', '$username', '$email', '$telephone', '$password', '$creationdate', '$activation_code')";

if ($conn->query($sql) === TRUE) {
    // Display  success message
    echo "<script>alert('Hello $username, your registration was successfully submitted');</script>";
    // Redirect to login page after registration
    echo "<script>window.location.href = 'login.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>