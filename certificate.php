<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = 'localhost';
    $username = "adolphtr";
    $password = "Nikido886@";
    $database = "adolphtr_adolpht";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Data validation and sanitization
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $middle_name = mysqli_real_escape_string($conn, $_POST["middle_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $state = mysqli_real_escape_string($conn, $_POST["state"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $date_of_issuance = mysqli_real_escape_string($conn, $_POST["date_of_issuance"]);
    $phone_number1 = mysqli_real_escape_string($conn, $_POST["phone_number1"]);
    $phone_number2 = mysqli_real_escape_string($conn, $_POST["phone_number2"]);
    $skill_learnt = mysqli_real_escape_string($conn, $_POST["skill_learnt"]);

    // Handle image upload
    $image_path = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename(str_replace(' ', '_', $_FILES["image"]["name"]));

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Error uploading image.";
            exit(); // Exit the script if image upload fails
        }
    }

    // Check for duplicate entry
    $check_sql = "SELECT * FROM certificate_registration WHERE first_name = ? AND last_name = ? AND date_of_issuance = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("sss", $first_name, $last_name, $date_of_issuance);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo '<div style="font-size: 25px; color: #382968;">';
        echo "Student with the same information already exists.";
        echo '</div>';
        echo '<script>setTimeout(function() { window.location = "min.php"; }, 2000);</script>';
    } else {
        // Insert new record
        $last_insert_id = mt_rand(10000, 99999);
        $sql = "INSERT INTO certificate_registration (first_name, middle_name, last_name, email, address, city, state, country, date_of_issuance, phone_number1, phone_number2, skill_learnt, hash_field, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssssssssssssss", $first_name, $middle_name, $last_name, $email, $address, $city, $state, $country, $date_of_issuance, $phone_number1, $phone_number2, $skill_learnt, $last_insert_id, $image_path);

            if ($stmt->execute()) {
                echo '<div style="font-size: 25px; color: #382968;">';
                echo "Certificate successfully registered. Registration Number: " . htmlspecialchars($last_insert_id, ENT_QUOTES, 'UTF-8');
                echo '<br>Redirecting..........';
                echo '</div>';
                echo '<script>setTimeout(function() { window.location = "min.php"; }, 6000);</script>';
            } else {
                echo "Error inserting data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $check_stmt->close();
    $conn->close();
} else {
    echo "Form was not submitted.";
}
?>
