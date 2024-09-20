<?php
session_start();
include 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
        if ($password == $user['password']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: daftar_pegawai.php"); 
        exit;
    } else {
         header("Location: login.php?message=Username%20atau%20password%20salah!");
        
        exit;
    }
} else {
    header("Location: login.php?message=Username%20tidak%20ditemukan!");
    exit;
}

$stmt->close();
$conn->close();
?>


