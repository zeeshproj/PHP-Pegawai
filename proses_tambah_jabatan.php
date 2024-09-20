<?php
include 'db_connection.php';


$nama_jabatan = $_POST['nama_jabatan'];
$gaji_pokok = $_POST['gaji_pokok'];
$tunjangan = $_POST['tunjangan'];


$sql = "INSERT INTO jabatan (nama_jabatan, gaji_pokok, tunjangan) VALUES ('$nama_jabatan', '$gaji_pokok', '$tunjangan')";

if ($conn->query($sql) === TRUE) {
    echo "Jabatan berhasil ditambahkan!";
    header("Location: daftar_pegawai.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
