<?php
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
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
        <a href="antrian.php" class="logo">antrian donor</a>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
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
                    <th>Lokasi</th>
                    <th>Petugas</th>
                    <th>gol darah</th>
                    <th>Tanggal Antri</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($tabel = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $tabel['nama'] . "</td>";
                    echo "<td>" . $tabel['nama_rs'] . "</td>";
                    echo "<td>" . $tabel['nama_petugas'] . "</td>";
                    echo "<td>" . $tabel['gol_darah'] . "</td>";
                    echo "<td>" . $tabel['tanggal_antri'] . "</td>";
                    echo "<td>" . $tabel['status'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <div class="container">
        <form action="cekantrian.php" method="post" class="formulir">
            <h1 class="judul-formulir">Pilih RS, Petugas, Dan Gol Darah Anda</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama-rs">Nama RS</label>
                    <select class="form-control" name="nama-rs" id="nama-rs">
                        <option value="1">Malang RS Karsa</option>
                        <option value="2">Batu RS Baptis</option>
                        <option value="3">Surabaya RS Bhayangkara</option>
                        <option value="4">Malang RS Brimedika</option>
                        <option value="5">Surabaya RS Royal</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama-Petugas">Nama Petugas</label>
                    <select class="form-control" name="nama-Petugas" id="nama-Petugas">
                        <option value="1">Bagus</option>
                        <option value="2">Sri</option>
                        <option value="3">Rini</option>
                        <option value="4">Dono</option>
                        <option value="5">Setya</option>
                        <option value="6">Dana</option>
                        <option value="7">Salsa</option>
                        <option value="8">Surya</option>
                        <option value="9">Tyas</option>
                        <option value="10">Nanang</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="gol-darah">Gol Darah</label>
                    <select class="form-control" name="gol-darah" id="gol-darah">
                        <option value="1">A+</option>
                        <option value="2">B+</option>
                        <option value="3">O+</option>
                        <option value="4">AB+</option>
                        <option value="5">A-</option>
                        <option value="6">B-</option>
                        <option value="7">O-</option>
                        <option value="8">AB-</option>
                    </select>
                </div>
            </div>

            <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
            <button class="btn btn-primary" type="submit" value="submit" name="kirim">Kirim</button>
        </form>
    </div>

</body>

</html>