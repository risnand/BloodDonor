<?php
include_once("../config.php");

$id = $_GET['id'];
$id_darah = $_GET['id_darah'];
$result1 = mysqli_query($mysqli, "UPDATE stok SET jumlah = jumlah+1 WHERE id_stok=$id_darah");
$result2 = mysqli_query($mysqli, "UPDATE proses SET status_donor = 'done' WHERE id_proses=$id");
echo "<script>window.location.href='proses.php'</script>";
?>