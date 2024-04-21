<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection (replace these with your database credentials)
         $servername = 'localhost';
    $username = "adolphtr";
    $password = "Nikido886@";
    $database = "adolphtr_adolpht";
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the post title from the form
    $postTitle = $_POST["title"];

    // SQL query to delete the post based on the post title
    $sql = "DELETE FROM posts WHERE post_title = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("s", $postTitle);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<div style="font-size: 25px; color: #382968;">';
        echo "Post deleted successfully.";
            echo '<br>Redirecting..........';
            echo '</div>';
            echo '<script>setTimeout(function() { window.location = "min.php"; }, 4000);</script>';
    } else {
        echo '<div style="font-size: 25px; color: #382968;">';
        echo "Error deleting post: " . $stmt->error;
            echo '<br>Redirecting..........';
            echo '</div>';
            echo '<script>setTimeout(function() { window.location = "min.php"; }, 4000);</script>';
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
