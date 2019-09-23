<?php
    $carpeta = "img";
    $css = "style.css";
    $selectedThemeClaro = "selected";
    $selectedThemeOscuro = "";

    if($_POST["theme"]) {
        $theme = $_POST["theme"];
        $_COOKIE["theme"] = $theme;
        setcookie("theme",$theme,time()+60*60*24*30);
    };
        
    if($_COOKIE["theme"]=="claro") {
        $carpeta = "img";
        $css = "style.css";
        $selectedThemeClaro = "selected";
        $selectedThemeOscuro = "";
    } else if ($_COOKIE["theme"]=="oscuro") {
        $carpeta = "img_modo_oscuro";
        $css = "style_modo_oscuro.css";
        $selectedThemeClaro = "";
        $selectedThemeOscuro = "selected";
        };

    if($_POST["registrarse"]) {
        
        if($_POST["contrasenaNueva"] == $_POST["contrasenaNueva2"] && strlen($_POST["contrasenaNueva"]) >= 8 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //Inyectar los valores de $_POST en la base de datos.
            $datosUsuario = [
                "usuario" => $_POST["usuarioNuevo"],
                "email" => $_POST["email"],
                "contrasena" => $_POST["contrasenaNueva"],
            ];
            $usuarioValido = $_POST["usuarioNuevo"];
            $json = json_encode($datosUsuario);
            file_put_contents("usuarios/".$usuarioValido.".json",$json);
        } else {
            if($_POST["contraseniaNueva"] != $_POST["contrasenaNueva2"] || strlen($_POST["contrasenaNueva"]) < 8) {
                $_POST["contrasenaNueva"] = "";
                $_POST["contrasenaNueva2"] = "";
                ?>
                <style>

                    .panelLogin {
                        right:0%!important;
                    } 
                
                </style>
                <?php
                $alertContrasena = "La contraseña debe tener al menos 8 carácteres y ser la misma en la confirmación.";
            } if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                unset($_POST["email"]);
            }
        };

    };

    if($_POST["usuario"]) {
        $usuario = $_POST["usuario"];
        $usuarioEnBaseDeDatos = json_decode(file_get_contents("usuarios/".$usuario.".json"),true);

        if($_POST["contrasena"] == $usuarioEnBaseDeDatos["contrasena"]) {
            $_COOKIE['usuario'] = $usuario;
            setcookie("usuario",$usuario,time()+60*60*24*30);
        } else {
            $_POST["usuario"] = "";
            $_POST["contrasena"] = "";
            ?>
                <style>

                    .panelLogin {
                        right:0%!important;
                    } 
                
                </style>
            <?php
            $alertConexion = "El usuario o la contraseña son incorrectos.";
        }
    } else if($_POST["usuarioNuevo"]) {
        $usuario = $_POST["usuarioNuevo"];
        $_COOKIE['usuario'] = $usuario;
        setcookie("usuario",$usuario,time()+60*60*24*30);
    }

    if($_POST["desconectarse"]) {
        $_COOKIE["usuario"] = NULL;
        setcookie("usuario",NULL,-1);
    };

    if($_FILES["fotoDePerfil"] && $_FILES["fotoDePerfil"]["error"] == 0) {
        $ext = pathinfo($_FILES["fotoDePerfil"]["name"],PATHINFO_EXTENSION);
        $name = uniqid().".".$ext;
        move_uploaded_file($_FILES["fotoDePerfil"]["tmp_name"],dirname(__FILE__)."/foto_de_perfil/".$name);

        $usuarioValido = $_COOKIE['usuario'];
        $usuario = json_decode(file_get_contents("usuarios/".$usuarioValido.".json"),true);
        $usuario["foto"] = $name;
        
        $json = json_encode($usuario);
        file_put_contents("usuarios/".$usuarioValido.".json",$json);
    };

    $foto = $carpeta."/user.png";
    $usuarioConectado = $_COOKIE['usuario'];
    $caracteristicasUsuario = json_decode(file_get_contents("usuarios/".$usuarioConectado.".json"),true);
    if($caracteristicasUsuario["foto"]){
        $foto = "foto_de_perfil/".$caracteristicasUsuario["foto"];
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