<?php
$serverName="localhost";
$databaseName="site";
$userName="root";
$password="";

$dsn="mysql:host=$serverName;dbname=$databaseName;charset=utf8";

try{
    $conn=new PDO($dsn,$userName,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Conneect to database Failed!!!";
}
?>