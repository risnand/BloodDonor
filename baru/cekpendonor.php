<?php
include_once("../config.php");

$id = $_GET['id'];
$result2 = mysqli_query($mysqli, "UPDATE antrian SET status = 'cek' WHERE id_antrian=$id");
echo "<script>window.location.href='petugaspage.php'</script>";
?>