<?php

    define('HOST', 'localhost');
    define('DB_NAME', 'gestionstockdb');
    define('USER', 'root');
    define('PASS', 'pilou2003');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo $e;
    }
?>