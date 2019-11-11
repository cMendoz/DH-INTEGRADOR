<?php

require_once "clases/BBDD.php";

$dsn = 'mysql:host=localhost;dbname=nomade';
$nombre_usuario = 'root';
$contraseña = '';
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$bbdd = new PDO($dsn, $nombre_usuario, $contraseña, $opciones);
