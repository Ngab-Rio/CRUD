<?php

include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama  = $_POST["nama"];
    $email = $_POST["email"];
    $pass  = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Prepare and execute the statement
    $stmt = $conn->prepare("INSERT INTO users (nama, email, pass) VALUES (:nama, :email, :pass)");

    if ($stmt) {
        // Bind parameters
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Pendaftaran berhasil disimpan.";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Error: " . $conn->errorInfo()[2];
    }

    // Close the connection
    $conn = null;
}
?>
