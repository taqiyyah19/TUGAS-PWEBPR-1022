<?php
class tbmahasiswa 
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dbmahasiswa";
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    // Fungsi untuk menampilkan semua kontak
    public function selecttbmahasiswa() {
        $sql = "SELECT * FROM dbmahasiswa";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function gettbmahasiswasByNim($Nim) {
        $sql = "SELECT * FROM dbmahasiswa WHERE Nim = ".$Nim;
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function inserttbmahasiswa($Nama, $ProgramStudi, $TahunAngkatan, $Alamat) {
        $sql = "INSERT INTO dbmahasiswa (Nama, ProgramStudi, TahunAngkatan, Alamat) VALUES ('".$Nama."', '".$ProgramStudi."', '".$TahunAngkatan."', '".$Alamat."')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    public function updatetbmahasiswa($Nama, $ProgramStudi, $TahunAngkatan, $Alamat) {
        $sql = "UPDATE dbmahasiswa SET ProgramStudi = '".$ProgramStudi."', TahunAngkatan = '".$TahunAngkatan."', Alamat = '".$Alamat."' WHERE Nama = '".$Nama."'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
}
?>
