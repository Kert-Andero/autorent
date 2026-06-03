<?php
$db_server = 'localhost';
$db_andmebaas = 'car_rent';
$db_kasutaja = 'root';
$db_salasona = '';

$yhendus = new mysqli($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);

if ($yhendus->connect_error) {
    die('Andmebaasi ühendus ebaõnnestus: ' . $yhendus->connect_error);
}

?>