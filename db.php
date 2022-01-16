<?php
    $serwer="178.32.219.12";
    $nazwa_bazy="1220123_jG4c93";
    $login="1220123_jG4c93";
    $pass="sQU9TI4Lccp08o";
    $conn = new PDO("mysql:host=$serwer;dbname=$nazwa_bazy", "$login", "$pass");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("SET NAMES 'utf8'");
    $conn->exec("SET CHARACTER SET utf8");
    $conn->exec("SET SESSION collation_connection = 'utf8_unicode_ci'");
?>




