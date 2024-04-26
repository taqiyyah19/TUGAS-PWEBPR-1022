<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body style="background-color: white;">
<div class="container">
    <?php
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    class kontak{
        static function insert(){
            require_once 'database.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                $Nama=input($_POST["Nama"]);
                $Nim=input($_POST["Nim"]);
                $ProgramStudi=input($_POST["ProgramStudi"]);
                $TahunAngkatan=input($_POST["TahunAngkatan"]);
                $Alamat=input($_POST["Alamat"]);

                
                $sql="insert into tbmahasiswa (Nama, Nim, Program_Studi, Tahun_Angkatan, Alamat) values
                ('$Nama', '$Nim','$ProgramStudi','$TahunAngkatan','$Alamat')";

                $hasil=mysqli_query($conn,$sql);
        

                if ($hasil) {
                    header("Location:dashboard.php");
                }
                else {
                    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        
                }
        
            }
            
        }
    }

    kontak::insert()
    ?>
    <div class="mt-5 bg-[#FAAB36] px-3 py-3 rounded-xl border-black border-l-2 border-t-2 border-b-8 border-r-8">
        <h2 class="font-medium text-4xl">Input Data</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group mt-3">
                <label>Nama :</label>
                <input type="text" name="Nama" class="w-full border-4 rounded-lg" placeholder="Nama" required />

            </div>
            <div class="form-group">
                <label>Nim :</label>
                <input type="text" name="Nim" class="w-full border-4 rounded-lg" placeholder="Nim" required/>
            </div>
            <div class="form-group">
                <label>Program Studi :</label>
                <input type="text" name="ProgramStudi" class="w-full border-4 rounded-lg" placeholder="Program Studi" required/>
            </div>   
            <div class="form-group">
                <label>Tahun Angkatan:</label>
                <input type="text" name="TahunAngkatan" class="w-full border-4 rounded-lg" placeholder="Tahun Angkatan" required/>
            </div>   
            <div class="form-group">
                <label>Alamat :</label>
                <input type="text" name="Alamat" class="w-full border-4 rounded-lg" placeholder="Alamat" required/>
            </div>   
            

            <button type="save" name="submit" class="w-full h-7 px-3 py-2 bg-slate-600 rounded-xl border-black border-l-2 border-t-2 border-b-8 border-r-8 font-bold">save</button>
        </form>
    </div>
</div>
</body>
</html>