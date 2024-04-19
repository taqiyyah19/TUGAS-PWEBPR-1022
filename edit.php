<?php
include 'model.php';

$Nama = $_POST['Nama']; 
$Nim = $_POST['Nim']; 
$ProgramStudi = $_POST['ProgramStudi'];
$TahunAngkatan = $_POST['TahunAngkatan'];
$Alamat = $_POST['Alamat'];

$dbmahasiswa = new tbmahasiswa();

// Insert data ke database
$result = $crud->updatedbmahasiswa($Nama, $Nim, $ProgramStudi, $TahunAngkatan, $Alamat );

// Cek apakah berhasil diinsert atau tidak
if ($result) {
    echo "Data berhasil diubah.";
    // Redirect to dashboard
    echo "<script>window.location.href = 'index.php';</script>";
} else {
    echo "Gagal menambahkan data.";
}
?>
