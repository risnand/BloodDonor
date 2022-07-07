<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login/loginpage.php");
}
$level = $_SESSION['level'];
?>

<?php
include("../config.php");

$result2 = mysqli_query($mysqli, "SELECT * FROM proses
        inner join antrian on(proses.id_antrian = antrian.id_antrian)
        inner join pendonor on(antrian.id_pendonor = pendonor.id_pendonor)
        inner join dokter on(proses.id_dokter = dokter.id_dokter)
        where antrian.status = 'proses';
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

                <?php
                if ($level == 'dokter') {
                } else {
                    echo "<li><a href='petugaspage.php'>antrian pendonoran</a></li>";
                }
                ?>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header><br><br><br><br>

    <section class="daftar-riwayat">
        <table class="table table-bordered">
            <thead>
                <tr class="tabel-header">
                    <th colspan="6" class="nama-tabel">Daftar Kegiatan</th>
                </tr>
                <tr class="kolom">
                    <th>Nama</th>
                    <th>Tanggal Donor</th>
                    <th>Status</th>
                    <th>dokter</th>
                    <?php
                    if($level == 'dokter'){
                        echo "<th>status donor</th>";
                        echo "<th>action</th>";
                    }
                    ?>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                while ($tabel = mysqli_fetch_array($result2)) {
                    echo "<tr>";
                    echo "<td>" . $tabel['nama'] . "</td>";
                    echo "<td>" . $tabel['tanggal_donor'] . "</td>";
                    echo "<td>" . $tabel['status'] . "</td>";
                    echo "<td>" . $tabel['nama_dokter'] . "</td>";
                    if ($level == 'dokter') {
                        echo "<td>" . $tabel['status_donor'] . "</td>";
                        echo "<td><a href='cekproses.php?id=$tabel[id_proses] &id_darah=$tabel[id_stok]'>Done</a></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

</body>

</html>