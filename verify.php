<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $certificateNumber = $_POST["number"];

    // Establish a database connection (you need to replace these with your actual database credentials)
    $servername = 'localhost';
    $username = "adolphtr";
    $password = "Nikido886@";
    $database = "adolphtr_adolpht";
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query with placeholders to prevent SQL injection
    $sql = "SELECT * FROM certificate_registration 
    WHERE hash_field = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $certificateNumber);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
  // Bind result variables
$stmt->bind_result($registration_id, $first_name,$middle_name, $last_name, $date_of_issuance, $address, $city, $state, $country, $phone_number1, $phone_number2, $email, $skill_learnt, $image_path,$hash_field);


    // Check if any rows were found
    if ($stmt->fetch()) {
        echo "<div style='background-color: #382968;
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            color: white;
            border-radius: 10px;'>
            <h1>Congratulations!</h1>
            <h2>Your certificate is valid!</h2>
            <p>Here is a summary of your Certificate details:</p>";

        echo "<div style='border: 1px solid white; padding: 10px; margin: 10px;'>";
        if (!empty($image_path)) {
            echo "<img src='" . $image_path . "' alt='Certificate Image' style='width:200px;height:200px;'><br>";
        }
        echo "<p><strong>Registration ID:</strong> " . $registration_id . "</p>";
        echo "<p><strong>First Name:</strong> " . $first_name . "</p>";
          echo "<p><strong>Middle Name:</strong> " . $middle_name . "</p>";
        echo "<p><strong>Last Name:</strong> " . $last_name . "</p>";
        echo "<p><strong>Date of Issuance:</strong> " . $date_of_issuance . "</p>";
        echo "<p><strong>Other Details:</strong><br>" . 
            "Address: " . $address . "<br>" . 
            "City: " . $city . "<br>" . 
            "State: " . $state . "<br>" . 
            "Country: " . $country . "<br>" . 
            "Phone Number 1: " . $phone_number1 . "<br>" . 
            "Phone Number 2: " . $phone_number2 . "<br>" . 
            "Email: " . $hash_field. "<br>" .
             "Skill Learnt: " .$email  . "<br>" .
             "Unique certificate number: " .  $skill_learnt."</p>"; 
        echo "</div>";

        // Add the Print button
        echo "<button onclick='window.print()'>Print</button><br>";

        echo "<a style='text-decoration: underline;color: aqua;' href='certificate-verification.html'>Click to go back</a>";
        echo "</div>";
    } else {
        echo '<div style="font-size :25px; color:#382968;">';
        echo "No matching certificates found.";
        echo '<br>Redirecting.....';
        echo '<script>setTimeout(function() { window.location = "certificate-verification.html"; }, 1500);</script>';
        echo '</div>';
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
