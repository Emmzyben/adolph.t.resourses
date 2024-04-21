<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "description" field is set
    if (isset($_POST["description"])) {
        // Sanitize and store the description from the form
        $description = $_POST["description"];

        // Database connection parameters
    $servername = 'localhost';
    $username = "adolphtr";
    $password = "Nikido886@";
    $database = "adolphtr_adolpht";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL DELETE query
        $sql = "DELETE FROM image_gallery WHERE image_description = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $description);

        if ($stmt->execute()) {
            echo '<div style="font-size: 25px; color: #382968;">';
            echo "Picture deleted successfully";
            echo '<br>Redirecting..........';
            echo '</div>';
            echo '<script>setTimeout(function() { window.location = "min.php"; }, 4000);</script>';
        } else {
            // Error occurred while deleting the picture
            echo "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // Description field not set in the form
       
        echo '<div style="font-size: 25px; color: #382968;">';
        echo "Description not provided in the form.";
        echo '<br>Redirecting..........';
        echo '</div>';
        echo '<script>setTimeout(function() { window.location = "min.php"; }, 6000);</script>';
    }
}
?>
