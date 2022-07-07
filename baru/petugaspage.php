<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login/loginpage.php");
}
?>

<?php
include("../config.php");

$result = mysqli_query($mysqli, "SELECT * FROM antrian 
        inner join pendonor on(antrian.id_pendonor = pendonor.id_pendonor)
        inner join lokasi on(antrian.id_lokasi = lokasi.id_lokasi)
        inner join petugas on(antrian.id_petugas = petugas.id_petugas)
        inner join stok on(antrian.id_stok = stok.id_stok)
        ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Donor Darah</title>
</head>

<body>
    <header>
        <a href="petugaspage.php" class="logo">Petugas Donor</a>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="proses.php">Proses Pendonoran</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header><br><br><br><br>

    <section class="daftar-riwayat">
        <table class="table table-bordered">
            <thead>
                <tr class="tabel-header">
                    <th colspan="7" class="nama-tabel">Daftar Pendonor</th>
                </tr>
                <tr class="kolom">
                    <th>Nama</th>
                    <th>gol darah</th>
                    <th>Petugas</th>
                    <th>Lokasi</th>
                    <th>Tanggal Antri</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($tabel = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $tabel['nama'] . "</td>";
                    echo "<td>" . $tabel['gol_darah'] . "</td>";
                    echo "<td>" . $tabel['nama_petugas'] . "</td>";
                    echo "<td>" . $tabel['nama_rs'] . "</td>";
                    echo "<td>" . $tabel['tanggal_antri'] . "</td>";
                    echo "<td>" . $tabel['status'] . "</td>";

                    if ($tabel['status'] == 'proses') {
                    } elseif ($tabel['status'] == 'cek') {
                        echo "<td><a href='generate.php?id=$tabel[id_antrian]'>GENERATE</a></td>";
                    } else {
                        echo "<td>
                    <a href='cekpendonor.php?id=$tabel[id_antrian]'>CEK</a> &nbsp;&nbsp;
                    <a href='delete.php?id=$tabel[id_antrian]'>TOLAK</a>
                    </td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

</body>

</html>