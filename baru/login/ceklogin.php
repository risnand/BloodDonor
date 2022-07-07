<?php
include_once("../../config.php");

session_start();

$nama = $_POST['nama'];
$password = $_POST['password'];
$data1 = mysqli_query($mysqli, "SELECT * FROM pendonor WHERE nama='$nama' and pass='$password' ");
$cek1 = mysqli_num_rows($data1);
$data2 = mysqli_query($mysqli, "SELECT * FROM petugas WHERE nama_petugas='$nama' and id_petugas='$password' ");
$cek2 = mysqli_num_rows($data2);
$data3 = mysqli_query($mysqli, "SELECT * FROM dokter WHERE nama_dokter='$nama' and id_dokter='$password' ");
$cek3 = mysqli_num_rows($data3);

if ($cek1 > 0) {
    $cek1 = mysqli_fetch_array($data1);
    $_SESSION['id'] = $cek1['id_pendonor'];
    $_SESSION['level'] = 'pendonor';
    echo "berhasil";
    echo "<script>window.location.href='../antrian.php'</script>";
} elseif ($cek2 > 0) {
    echo "berhasil";
    $cek2 = mysqli_fetch_array($data2);
    $_SESSION['id'] = $cek2['id_petugas'];
    $_SESSION['level'] = 'petugas';
    echo "<script>window.location.href='../petugaspage.php'</script>";
} elseif ($cek3 > 0) {
    echo "berhasil";
    $cek3 = mysqli_fetch_array($data3);
    $_SESSION['id'] = $cek3['id_dokter'];
    $_SESSION['level'] = 'dokter';
    echo "<script>window.location.href='../proses.php'</script>";
} else {
    echo "<script>window.location.href='loginpage.php'</script>";
}
