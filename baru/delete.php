<?php
include '../config.php';
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM antrian WHERE id_antrian=$id");

echo "<script>window.location.href='petugaspage.php'</script>";
	
?>