<?php
include("../config.php");

$result = mysqli_query($mysqli, "SELECT * FROM proses
        inner join antrian on(proses.id_antrian = antrian.id_antrian)
        inner join pendonor on(antrian.id_pendonor = pendonor.id_pendonor)
        inner join dokter on(proses.id_dokter = dokter.id_dokter)
        inner join stok on(antrian.id_stok = stok.id_stok)
        where proses.status_donor = 'Done';
        ");
$result2 = mysqli_query($mysqli, "SELECT * FROM lokasi");
$result3 = mysqli_query($mysqli, "SELECT gol_darah, jumlah FROM stok");
$totalpendonor = mysqli_query($mysqli, "SELECT sum(jumlah) as totaldarah FROM stok")->fetch_array();
$pendonoraktif = mysqli_query($mysqli, "SELECT count(id_pendonor) as pendonoraktif FROM pendonor")->fetch_array();

foreach ($result3 as $data) {
    $gol_darah[] = $data['gol_darah'];
    $jumlah[] = $data['jumlah'];
}
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
        <a href="index.html" class="logo">Donor Darah</a>
        <p>Total Darah yang Tersedia : <?php echo $totalpendonor['totaldarah'] ?></p>
        <p>Jumlah pendonor saat ini : <?php echo $pendonoraktif['pendonoraktif'] ?></p>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login/loginpage.php">Daftar Donor</a></li>
            </ul>
        </nav>
    </header><br><br><br><br><br>

    <aside class="home">
        <canvas id="myChart" style="width:100%;max-width:700px;"></canvas>

        <script>
            // === include 'setup' then 'config' above ===
            const labels = <?php echo json_encode($gol_darah) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Stok Darah',
                    data: <?php echo json_encode($jumlah) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>

    </aside>

    <section class="daftar-kegiatan">
        <table class="table table-bordered">
            <thead>
                <tr class="tabel-header">
                    <th colspan="2" class="nama-tabel">Daftar Kegiatan</th>
                </tr>
                <tr class="kolom">
                    <th>Nama RS</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($tabel2 = mysqli_fetch_array($result2)) {
                    echo "<tr>";
                    echo "<td>" . $tabel2['nama_rs'] . "</td>";
                    echo "<td>" . $tabel2['tanggal_diadakan'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section class="daftar-riwayat">
        <div class="col-xs-8 col-xs-offset-2 well table table-bordered">
            <table class="table table-scroll table-striped">
                <thead>
                    <tr class="tabel-header">
                        <th colspan="4" class="nama-tabel">Riwayat</th>
                    </tr>
                    <tr class="kolom">
                        <th>Nama</th>
                        <th>gol darah</th>
                        <th>tanggal donor</th>
                        <th>dokter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($tabel = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $tabel['nama'] . "</td>";
                        echo "<td>" . $tabel['gol_darah'] . "</td>";
                        echo "<td>" . $tabel['tanggal_donor'] . "</td>";
                        echo "<td>" . $tabel['nama_dokter'] . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <style type="text/css">
        .well {
            background: none;
            height: 320px;
        }

        .table-scroll tbody {
            position: absolute;
            overflow-y: scroll;
            height: 250px;
        }

        .table-scroll tr {
            width: 100%;
            table-layout: fixed;
            display: inline-table;
        }

        .table-scroll thead>tr>th {
            border: none;
        }
    </style>
</body>

</html>