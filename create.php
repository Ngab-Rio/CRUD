<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!empty($nama) && !empty($email) && !empty($password)) {
        $stmt = $conn->prepare("INSERT INTO users (nama, email, pass) VALUES (:nama, :email, :pass)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
    }
}

header('Location: admin.php');
