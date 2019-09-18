<?php

    if($_POST["usuario"] && $_POST["contrasena"]=="1234") {
        $usuario = $_POST["usuario"];
        setcookie("usuario",$usuario,"/");
        $_COOKIE['usuario'] = $usuario;
    };

    if(isset($_POST["desconectarse"])) {
        unset($_COOKIE['usuario']);
    };

    function agregarDepto($nombre="",$foto="",$superficie="",$camas="",$precio="") {
        global $deptos;
        $deptos[] = [
            "nombre" => $nombre,
            "foto" => $foto,
            "superficie" => $superficie,
            "camas" => $camas,
            "precio" => $precio,
        ];
    };

    if($_POST["nombre"] && $_POST["foto"] && $_POST["superficie"] && $_POST["camas"] && $_POST["precio"]) {
        $nombreDepto = $_POST["nombre"];
        $fotoDepto = $_POST["foto"];
        $superficieDepto = $_POST["superficie"];
        $camasDepto = $_POST["camas"];
        $precioDepto = $_POST["precio"];

        agregarDepto($nombreDepto, $fotoDepto, $superficieDepto, $camasDepto, $precioDepto);
    };

?>