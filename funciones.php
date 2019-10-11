<?php

    $carpeta = "img";
    $css = "style_modo_claro.css";
    $selectedThemeClaro = "selected";
    $selectedThemeOscuro = "";

    $deptos = json_decode(file_get_contents("deptos.json"),true);
    $comentarios = json_decode(file_get_contents("comentarios.json"),true);
//Crear una cookie para "theme"
    if(isset($_POST["theme"])) {
        $theme = $_POST["theme"];
        $_COOKIE["theme"] = $theme;
        setcookie("theme",$theme,time()+60*60*24*30);
    };
//verificar si existe la cookie theme, y si esta definida como oscuro o claro.
    if(isset($_COOKIE["theme"])) {
        if($_COOKIE["theme"]=="claro") {
            $carpeta = "img";
            $css = "style_modo_claro.css";
            $selectedThemeClaro = "selected";
            $selectedThemeOscuro = "";
            ?>
            <script>$style = "mapbox://styles/julabrego/ck16ub24v3jd71cmxyiya7w1t";</script>
            <?php
        } else if ($_COOKIE["theme"]=="oscuro") {
            $carpeta = "img_modo_oscuro";
            $css = "style_modo_oscuro.css";
            $selectedThemeClaro = "";
            $selectedThemeOscuro = "selected";
            ?>
            <script>$style = "mapbox://styles/julabrego/ck16vetx60bp31cp4g97hmsq6";</script>
            <?php
        };
    };
//si la variable registrarse está definida..
    if(isset($_POST["registrarse"])) {
// verifica si todos los campos estan llenos..
        if(!isset($_POST["usuarioNuevo"]) || !isset($_POST["contrasenaNueva"]) || !isset($_POST["contrasenaNueva2"]) || !isset($_POST["email"])) {
            ?>
                <style>

                    #panelLogin {
                        right:0%;
                    }
                    #retorno {
                        left: 73%;
                    }

                </style>
            <?php
            $alertContrasena = "Todos los campos son obligatorios.";
        } else {
          //si las 2 contrasenas coinciden, tienen mas de 8 letras, y el email es valido...
            if($_POST["contrasenaNueva"] == $_POST["contrasenaNueva2"] && strlen($_POST["contrasenaNueva"]) >= 8 && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          //verifica en base de datos si el nombre de ususario está disponible:
                $usuario = $_POST["usuarioNuevo"];
                $usuarioEnBaseDeDatos = json_decode(file_get_contents("usuarios/".$usuario.".json"),true);
                if($usuarioEnBaseDeDatos) {
                    ?>
                        <style>

                            #panelLogin {
                                right:0%;
                            }
                            #retorno {
                                left: 73%;
                            }

                        </style>
                    <?php
                    $alertContrasena = "El usuario ya existe.";
                } else {
                  //Inyectar los valores de $_POST en la base de datos.
                    $datosUsuario = [
                        "usuario" => $_POST["usuarioNuevo"],
                        "email" => $_POST["email"],
                        "contrasena" => $_POST["contrasenaNueva"],
                    ];//creo la ruta del usuario en json
                    $usuarioValido = $_POST["usuarioNuevo"];
                    $json = json_encode($datosUsuario);
                    file_put_contents("usuarios/".$usuarioValido.".json",$json);
                };
            } else {//si las contrasenas no coinciden, o tienen menos de 8 letras ... borrar lo escrito en contrasena
                    $_POST["contrasenaNueva"] = "";
                    $_POST["contrasenaNueva2"] = "";
                    ?>
                        <style>

                            #panelLogin {
                                right:0%;
                            }
                            #retorno {
                                left: 73%;
                            }

                        </style>
                    <?php
                    $alertContrasena = "La contraseña debe tener al menos 8 carácteres y ser la misma en la confirmación.";
            };
        };
    };
//para logearse verifica que los dos campos esten llenos:
    if(isset($_POST["login"])) {
        if(!isset($_POST["usuario"]) || !isset($_POST["contrasena"])) {
            ?>
                <style>

                    #panelLogin {
                        right:0%;
                    }
                    #retorno {
                        left: 73%;
                    }

                </style>
            <?php
            $alertConexion = "Los dos campos son obligatorios.";
        } else {
          //si se ingresó un usuario, crea una variable en la cual extrae los datos del mismo, (si este existe)
            $usuario = $_POST["usuario"];
            $usuarioEnBaseDeDatos = json_decode(file_get_contents("usuarios/".$usuario.".json"),true);
          //si se encontro el usuario, se compara la contrasena ingresada, con la contrasena del usuario en base de datos, si son iguales se crea una cookie
            if($_POST["contrasena"] == $usuarioEnBaseDeDatos["contrasena"]) {
                $_COOKIE['usuario'] = $usuario;
                setcookie("usuario",$usuario,time()+60*60*24*30);
          //si no, borra los campos usuario y contrasena
            } else {
                $_POST["contrasena"] = "";
                ?>
                    <style>

                        #panelLogin {
                            right:0%;
                        }
                        #retorno {
                            left: 73%;
                        }

                    </style>
                <?php
                $alertConexion = "El usuario o la contraseña son incorrectos.";
            };
        };
//se verifica si hay una cookie usurario (si está conectado)
} else if(isset($usuarioValido)) {
        $usuario = $_POST["usuarioNuevo"];
        $_COOKIE['usuario'] = $usuario;
        setcookie("usuario",$usuario,time()+60*60*24*30);
    }
//desconectarse (borrar cookies)
    if(isset($_POST["desconectarse"])) {
        $_COOKIE["usuario"] = NULL;
        setcookie("usuario",NULL,-1);
    };
//obtener, cambiar nombre y guardar foto de perfil
    if(isset($_FILES["fotoDePerfil"]) && $_FILES["fotoDePerfil"]["error"] == 0) {
        $ext = pathinfo($_FILES["fotoDePerfil"]["name"],PATHINFO_EXTENSION);
        $name = uniqid().".".$ext;
        move_uploaded_file($_FILES["fotoDePerfil"]["tmp_name"],dirname(__FILE__)."/foto_de_perfil/".$name);
//asignar la foto a un usuario (el que está conectado).. extrae el usuario de json y lo modifica
        $usuarioValido = $_COOKIE['usuario'];
        $usuario = json_decode(file_get_contents("usuarios/".$usuarioValido.".json"),true);
        $usuario["foto"] = $name;
// vuelve a "guardar" el usuario json
        $json = json_encode($usuario);
        file_put_contents("usuarios/".$usuarioValido.".json",$json);
    };
// foto de usuario por defecto
    $foto = $carpeta."/user.png";
//foto de usuario, si está conectado.. la extrae de json (si existe)
    //$usuarioConectado = $_COOKIE['usuario'];
    if(isset($_COOKIE['usuario']) && $usuarioConectado = $_COOKIE['usuario']){$caracteristicasUsuario = json_decode(file_get_contents("usuarios/".$usuarioConectado.".json"),true);
    };
    if(isset($caracteristicasUsuario["foto"])){
        $foto = "foto_de_perfil/".$caracteristicasUsuario["foto"];
        if(!file_exists($foto)) {
            $foto = $carpeta."/user.png";
        } else {
            ?>
            <style>
                nav.encabezado div.fotoUsuario:hover {
                    opacity: 1;
                }
            </style>
            <?php
        };
    };

    function agregarDepto($nombre="",$foto="",$superficie="",$camas="",$precio="") {

        global $deptos;
        if(isset($_COOKIE["usuario"])) {
            $propietario = $_COOKIE["usuario"];
        }

        $deptos[] = [
            "nombre" => $nombre,
            "foto" => $foto,
            "superficie" => $superficie,
            "camas" => $camas,
            "precio" => $precio,
            "propietario" => $propietario,
            "favoritoDe" =>  [],
            "ID"  => uniqid(),
        ];

        $json = json_encode($deptos);
        file_put_contents("deptos.json",$json);
    };

    if(isset($_COOKIE["usuario"])) {
        $propietario = strtolower($_COOKIE["usuario"]);
        foreach($deptos as $depto) {
            if(strtolower($depto["propietario"]) == $propietario) {
                $misDeptos[] = $depto;
            }
        };
    };

    if(isset($_POST["comentario"])) {
        $comentario = $_POST["comentario"];
        $autor = strtolower($_COOKIE["usuario"]);
        $fecha = date("h:i - d F Y");
        $comentarios[] = [
            "autor" => $autor,
            "comentario" => $comentario,
            "fecha" => $fecha,
        ];
        $json = json_encode($comentarios);
        file_put_contents("comentarios.json",$json);
        ?>
            <style>
                #panelInfo {
                    right:0%;
                }
                #retorno {
                    left: 73%;
                }

            </style>
        <?php
    };

    if(isset($_POST["nombre"]) && isset($_POST["foto"]) && isset($_POST["superficie"]) && isset($_POST["camas"]) && isset($_POST["precio"])) {
        $nombreDepto = $_POST["nombre"];
        $fotoDepto = $_POST["foto"];
        $superficieDepto = $_POST["superficie"];
        $camasDepto = $_POST["camas"];
        $precioDepto = $_POST["precio"];

        agregarDepto($nombreDepto, $fotoDepto, $superficieDepto, $camasDepto, $precioDepto);
    };

?>
