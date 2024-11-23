<?php
session_start();
session_destroy();
header("Location:../HomePage/HomePage.php");
?>