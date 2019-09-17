<?php

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

    agregarDepto($_POST["nombre"],$_POST["foto"],$_POST["superficie"],$_POST["camas"],$_POST["precio"]);

?>