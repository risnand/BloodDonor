<?php
include_once("../config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_dokter = $_POST['nama-dokter'];
    $tanggaldonor = $_POST['tanggal-donor'];
    
    $result = mysqli_query($mysqli, "INSERT into proses values('',$id,'$id_dokter','$tanggaldonor','')");
    $result2 = mysqli_query($mysqli, "UPDATE antrian SET status = 'proses' WHERE id_antrian=$id");
    echo "<script>window.location.href='petugaspage.php'</script>";
}

?>

<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="generate.php">
        <table border="0" align="center">
            <tr>
                <td>Dokter</td>
                <td><select class="form-control" name="nama-dokter" id="nama-dokter">
                        <option value="1">Bambang</option>
                        <option value="2">Sutrisno</option>
                        <option value="3">Wahyudi</option>
                        <option value="4">Sulis</option>
                        <option value="5">Sandi</option>
                        <option value="6">Kasim</option>
                        <option value="7">Ananta</option>
                        <option value="8">Prabu</option>
                        <option value="9">Dian</option>
                        <option value="10">Triyo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal-donor" class="form-control"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>