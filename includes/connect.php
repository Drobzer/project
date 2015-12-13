<?php

//$link = mysqli_connect('localhost', 'root', '172737', 'enigma');

try{
    $db = new PDO('mysql:host=localhost;dbname=enigma', 'root', '172737');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}

?>