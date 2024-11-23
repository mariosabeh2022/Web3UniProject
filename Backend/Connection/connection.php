<?php
$dsn = "mysql:host=localhost;dbname=UniversityDataBase";
$user = "root";
$pass = "";
try{
    $PDO = new PDO($dsn,$user,$pass);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    echo "failed to connect to db". $e->getMessage();
}
?>