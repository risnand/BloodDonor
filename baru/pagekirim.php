<?php
include("../config.php");

$result = mysqli_query($mysqli, "SELECT * FROM pendonor");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Donor Darah</title>
</head>

<body>
    <header>
        <a href="index.html" class="logo">Donor Darah</a>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="daftarDonor.php">Daftar Donor</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <form action="#" method="post" class="formulir">
            <h1 class="judul-formulir">Daftar Donor</h1>
            <div class="form-row">
                <div class="form-group col-md-0">
                    <label for="nama-lengkap">Nama Lengkap</label>
                    <input type="name" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                </div>
                <div class="form-group col-md-0">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jl.">
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <label for="tempat-lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat-lahir" placeholder="Kota">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tanggal-lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal-lahir" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="gol-darah">Gol Darah</label>
                        <select class="form-control" name="gol-darah" id="gol-darah">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB-">AB-</option>
                            <option value="B-">B-</option>
                            <option value="A-">A-</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jenis-kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis-kelamin" id="jenis-kelamin">
                            <option value="laki">laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-0">
                    <label for="nomor-telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor-telepon" name="nomor-telepon" placeholder="Masukkan nomor">
                </div>
                <button class="btn btn-primary" type="submit" value="submit" name="kirim">Kirim</button>
            </div>
        </form>
    </div>

</body>

</html>