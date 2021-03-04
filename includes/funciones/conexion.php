<?php 
    $username = "postgres"; 
    $password = "postgres"; 
    $host = "localhost"; 
    $port= "5432";
    $dbname = "emergencias"; 

    try 
    { 
        $conn = new PDO("pgsql:host={$host};port={$port};dbname={$dbname};", $username,$password); 
        //echo '<h1><b>Conexion establecida!</b></h1>';
    } 
    catch(PDOException $ex) 
    { 
        die("Error al conectarse a la base de datos: " . $ex->getMessage()); 
    } 
     
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
?>