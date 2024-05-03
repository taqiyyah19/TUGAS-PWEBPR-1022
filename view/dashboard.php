<?php
    require_once 'contact.php';
    $arr = contact::select();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"/>
    <style>
        /* Custom styles can go here if needed */
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 content">
            <h1>Data Mahasisawa</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="create.php" class="btn btn-primary" id="btnAddData">Add Data</a>
                <a href="login.html" class="btn btn-danger">Logout</a>
            </div>
            <!-- Add data form -->
            <div class="add-form" style="display: none;">
                <h2>Add Data</h2>
                <form id="addDataForm">
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label">Nim</label>
                        <input type="number" class="form-control" id="Nim" name="Nim" placeholder="Nim" required>
                    </div>
                    <div class="mb-3">
                        <label for="Program Studi" class="form-label">Program Studi</label>
                        <input type="text" class="form-control" id="Program Studi" name="Program Studi" placeholder="Program Studi" required>
                    </div>
                    <div class="mb-3">
                        <label for="Tahun Angkatan" class="form-label">Tahun Angkatan</label>
                        <input type="number" class="form-control" id="Tahun Angkatan" name="Tahun Angkatan" placeholder="Tahun Angkatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="Alamat" name="Alamat" rows="3" placeholder="Alamat" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <!-- End add data form -->
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Program Studi</th>
                        <th>Tahun Angkatan</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i = 0; $i < count($arr['Nim']); $i++){
                    ?>
                        <tr>
                            <td class="border border-black p-2"><?= $arr['Nama'][$i] ?></td>
                            <td class="border border-black p-2 text-center"><?= $arr['Nim'][$i] ?></td>
                            <td class="border border-black p-2 text-center"><?= $arr['Program_Studi'][$i] ?></td>
                            <td class="border border-black p-2 text-center"><?= $arr['Tahun_Angkatan'][$i] ?></td>
                            <td class="border border-black p-2 text-center"><?= $arr['Alamat'][$i] ?></td>
                            <td class="border border-black p-2 ">
                                <div class="flex justify-center">
                                    <button class="transition active:scale-110 hover:bg-slate-500 shadow-lg rounded-xl w-20 bg-slate-200 m-2 px-1 py-2 text-xs">Edit</button>
                                    <button class="transition active:scale-110 hover:bg-slate-500 shadow-lg rounded-xl w-20 bg-slate-200 m-2 px-1 py-2 text-xs">Delete</button>
                                </div>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <script>
    document.getElementById("btnAddData").addEventListener("click", function () {
        // When add data button is clicked, show add data form
        document.querySelector(".add-form").style.display = "block";
    });

    document.getElementById("addDataForm").addEventListener("submit", function (event) {
        // Prevent default form submission
        event.preventDefault();

        // Get values from each input
        var Nama = document.getElementById("Nama").value;
        var Nim = document.getElementById("Nim").value;
        var ProgramStudi = document.getElementById("Program Studi").value;
        var TahunAngkatan = document.getElementById("Tahun Angkatan").value;
        var Alamat = document.getElementById("Alamat").value;

        // Create a new row for the table
        var row = document.createElement("tr");

        // Fill columns in the new row
        row.innerHTML = "<td>" + Nama + "</td><td>" + Nim + "</td><td>" + ProgramStudi + "</td><td>" + TahunAngkatan + "</td><td>" + Alamat + "</td>";

        // Add the new row to the table
        document.querySelector("#dataTable tbody").appendChild(row);

        // Clear values from each input
        document.getElementById("Nama").value = "";
        document.getElementById("Nim").value = "";
        document.getElementById("Program Studi").value = "";
        document.getElementById("Tahun Angkatan").value = "";
        document.getElementById("Alamat").value = "";

        // Hide the form after data is added
        document.querySelector(".add-form").style.display = "none";
    });
</script> -->

</body>
</html>
