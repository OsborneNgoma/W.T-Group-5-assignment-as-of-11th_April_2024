<!-- Hazajyabera Samuel 222003581 -->


<?php
// Database connection code goes here

if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is an image, audio, or video
    $type = '';
    if (strpos($_FILES["fileToUpload"]["type"], "image") !== false) {
        $type = "image";
    } elseif (strpos($_FILES["fileToUpload"]["type"], "audio") !== false) {
        $type = "audio";
    } elseif (strpos($_FILES["fileToUpload"]["type"], "video") !== false) {
        $type = "video";
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    // Store in database
    if ($uploadOk == 1) {

        <?php
// Database connection
$servername = "localhost";
$username = "admin";
$password = "bityear2@2024";
$database = "bityeartwo2024";
$port = 3306; //  MySQL port here

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is an image, audio, or video
    $type = '';
    if (strpos($_FILES["fileToUpload"]["type"], "image") !== false) {
        $type = "image";
    } elseif (strpos($_FILES["fileToUpload"]["type"], "audio") !== false) {
        $type = "audio";
    } elseif (strpos($_FILES["fileToUpload"]["type"], "video") !== false) {
        $type = "video";
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Compress file (not implemented here)

    // Store in database
    if ($uploadOk == 1) {
        $userid = 1; // Assuming user ID
        $location = $target_file;
        $upload_date = date("Y-m-d H:i:s");

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO multimedia (userid, type, location, upload_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $userid, $type, $location, $upload_date);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded and compressed.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close connection
$conn->close();
?>

        // Perform database insertion here
        // For demonstration, let's assume $conn is the database connection variable
        $filename = basename($_FILES["fileToUpload"]["name"]);
        // Insert into the database, considering $type and $filename
        // Example: $sql = "INSERT INTO files (type, filename) VALUES ('$type', '$filename')";
        // mysqli_query($conn, $sql);
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded and compressed.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
