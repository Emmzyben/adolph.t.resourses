<?php
// Database connection parameters
    $servername = 'localhost';
    $username = "adolphtr";
    $password = "Nikido886@";
    $database = "adolphtr_adolpht";
// Create a connection to the database
$mysqli = new mysqli($servername, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo  'Please upload a valid image';
}

// Validate image type and size
$allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxImageSize = 5 * 1024 * 1024; // 5 MB

if (
    !in_array($_FILES['file']['type'], $allowedImageTypes) ||
    $_FILES['file']['size'] > $maxImageSize
) {
    echo  'Please upload a valid image (JPEG, PNG, GIF) within 5 MB.';
}

// Move the uploaded image to a designated upload directory
$uploadDir = 'uploads/';
$uploadedFilePath = $uploadDir . $_FILES['file']['name'];

if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFilePath)) {
    echo 'Failed to move uploaded image to the directory.';
}

$imagePath = $uploadedFilePath;
        $description = $_POST["description"];
        
        $insertSql = "INSERT INTO image_gallery (image_path, image_description) VALUES (?, ?)";
        $stmt = $mysqli->prepare($insertSql);
        $stmt->bind_param("ss", $imagePath, $description);

        if ($stmt->execute()) {
            echo '<div style="font-size :25px;color:#382968;">';
               echo "Image uploaded successfully!";
            echo '<script>setTimeout(function() { window.location = "min.php"; }, 2000);</script>';
        
            echo '<br>Redirecting..........';
            echo '</div>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
  


// Close the database connection
$mysqli->close();
?>
