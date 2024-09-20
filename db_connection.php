<?php

$servername = "localhost";
$username = "ken";
$password = "Kenzie0708";
$database = "crud_latihan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
