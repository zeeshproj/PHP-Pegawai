<?php
include 'db_connection.php';

// Ambil data dari form
$id = $_POST['id'];
$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan = $_POST['tunjangan'];

// Query untuk update data jabatan
$sql = "UPDATE jabatan SET nama_jabatan = ?, gaji_pokok = ?, tunjangan = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siii", $nama_jabatan, $gaji_pokok, $tunjangan, $id);

if ($stmt->execute()) {
    // Redirect ke halaman daftar jabatan atau halaman lain setelah sukses edit
    header("Location: daftar_pegawai.php?message=Jabatan berhasil diperbarui");
    exit;
} else {
    echo "Gagal memperbarui jabatan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
