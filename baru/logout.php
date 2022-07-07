<?php
session_start();
session_destroy();
header("Location: login/loginpage.php");
?>