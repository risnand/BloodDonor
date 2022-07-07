<!DOCTYPE html>
<?php
include("../../config.php");
$result = mysqli_query($mysqli, "SELECT * FROM pendonor"); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Donor Darah</title>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="ceklogin.php" method="post">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login pendaftaran</h2>
                                    <p class="text-white-50 mb-5">Masukkan nama lengkap dan password kamu!</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="nama" class="form-control form-control-lg" />
                                        <label class="form-label" for="nama">Nama</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0">Belum daftar Donor? <a href="registerpage.php" class="text-white-50 fw-bold">Daftar disini</a>
                                </p><br>
                                <a href="../index.php" class="text-white-50 fw-bold">Kembali ke home</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>