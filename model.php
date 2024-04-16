<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $tahun_angkatan = $_POST['tahun_angkatan'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO nama_tabel (nama, nim, prodi, tahun_angkatan, alamat) VALUES ('$nama', '$nim', '$prodi', '$tahun_angkatan', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    <h2>Insert Data</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim"><br>
        <label for="prodi">Program Studi:</label><br>
        <input type="text" id="prodi" name="prodi"><br>
        <label for="tahun_angkatan">Tahun Angkatan:</label><br>
        <input type="text" id="tahun_angkatan" name="tahun_angkatan"><br>
        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
