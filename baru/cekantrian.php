<?php
include_once("../config.php");

session_start();
$namars = $_POST['nama-rs'];
$namapetugas = $_POST['nama-Petugas'];
$goldarah = $_POST['gol-darah'];
$tanggalantri = date("Y-m-d h:i:s a");
$id_pendonor = $_POST['id'];
$hasil = mysqli_query($mysqli, "INSERT INTO antrian(id_antrian,id_pendonor,id_lokasi,id_petugas,id_stok,tanggal_antri,status) VALUES('', '$id_pendonor', '$namars', '$namapetugas', '$goldarah', '$tanggalantri', 'Waiting')");
echo "<script>window.location.href='antrian.php'</script>";
?>