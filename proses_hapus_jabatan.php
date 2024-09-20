<?php
include 'db_connection.php';


$id = $_POST['id'];

$sql = "DELETE FROM jabatan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: daftar_pegawai.php?message=Jabatan berhasil dihapus");
    exit;
} else {
    echo "Gagal menghapus jabatan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
