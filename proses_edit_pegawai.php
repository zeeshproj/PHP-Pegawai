<?php
include 'db_connection.php';

$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_tlp = $_POST['no_tlp'];
$jabatan_id = $_POST['jabatan_id'];

$sql = "UPDATE pegawai SET 
            nik = '$nik', 
            nama = '$nama', 
            alamat = '$alamat', 
            jenis_kelamin = '$jenis_kelamin', 
            no_tlp = '$no_tlp', 
            jabatan_id = $jabatan_id 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Data pegawai berhasil diperbarui!";
    header("Location: daftar_pegawai.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
