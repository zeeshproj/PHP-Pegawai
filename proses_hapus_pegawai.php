<?php
include 'db_connection.php';

$id = $_POST['id'];

$sql = "DELETE FROM pegawai WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Pegawai berhasil dihapus!";
    header("Location: daftar_pegawai.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
