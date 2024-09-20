<?php
$host = 'localhost';  
$db = 'pejabat';  
$user = 'ken';  
$pass = 'Kenzie0708';  


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];


if (empty($username) || empty($password)) {
    die("Username dan password tidak boleh kosong.");
}


$hashed_password = password_hash($password, PASSWORD_BCRYPT);


$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Registrasi berhasil!";
} else {
    echo "Error: " . $stmt->error;
}



$stmt->close();
$conn->close();
?>
