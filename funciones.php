<?php
/*
function iniciar_sesion($usuario){
  $rutaUsuario = "usuarios/".$usuario.".json";

  if(file_exists($rutaUsuario)){
    $usuarioEnBaseDeDatos = json_decode(file_get_contents($rutaUsuario),true);
    $_SESSION['usuario_logeado'] = [
        'usuario' => $usuarioEnBaseDeDatos['usuario'],
        'email' => $usuarioEnBaseDeDatos['email'],
        'foto' => $usuarioEnBaseDeDatos['foto'],
      ];

    // Leo propiedades del usuario
    $propietario = strtolower($_SESSION["usuario_logeado"]["usuario"]);

    $rutaDeptos = 'deptos.json';
    global $misDeptos;
    $misDeptos = [];
    if(file_exists($rutaDeptos)){
      $deptos = json_decode(file_get_contents($rutaDeptos),true);
      foreach($deptos as $depto) {
        if(strtolower($depto["propietario"]) == $propietario) {
          $misDeptos[] = $depto;
        }
      }
    }
  }else{
    unset($_SESSION['usuario_logeado']);
    session_destroy();
  }
}

if (isset($_SESSION['usuario_logeado'])){
  if (isset($_SESSION['usuario_logeado']['usuario'])){
    iniciar_sesion($_SESSION['usuario_logeado']['usuario']);
  }
}
*/
// Conexión a la base de datos
$deptos = json_decode(file_get_contents("deptos.json"),true);
$comentarios = json_decode(file_get_contents("comentarios.json"),true);

// Declaro carpetas y estilos para modo claro (default)
$carpeta = "img";
$foto = $carpeta."/user.png";
$css = "style_modo_claro.css";
$selectedThemeClaro = "selected";
$selectedThemeOscuro = "";

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$usuarioNuevo = isset($_POST['usuarioNuevo']) ? $_POST['usuarioNuevo'] : '';
$contrasenaNueva = '';
$contrasenaNueva2 = '';
//$usuario = '';
$alertConexion = '';
$alertContrasena = '';

$append_head = '';
$append_body = '';

$respuesta = [
  'error' => 0,
  'alertContrasena' => '',
  'alertConexion' => '',
];

/* LLamado a funciones de usuario */
$usuarioLogeado = new Usuario;

// Recordar usuario
if (isset($_COOKIE['usuario'])){
  $respuesta = $usuarioLogeado->iniciarSesion($_COOKIE['usuario']);
}

// Si se eligió un theme se almacena en una cookie
if(isset($_POST["theme"])) {
  $themeCambio = $theme = $_POST["theme"];
  setcookie("theme",$_POST["theme"],time()+60*60*24*30);
}

if (isset($_COOKIE['theme']) && !isset($_POST['theme'])){
  $themeCambio = $_COOKIE["theme"];
}

//verificar si existe la cookie theme, y si esta definida como oscuro o claro.
if(isset($themeCambio)) {

  if($themeCambio=="claro") {
    $carpeta = "img";
    $css = "style_modo_claro.css";
    $selectedThemeClaro = "selected";
    $selectedThemeOscuro = "";
  } else if ($themeCambio=="oscuro") {
    $carpeta = "img/img_modo_oscuro";
    $css = "style_modo_oscuro.css";
    $selectedThemeClaro = "";
    $selectedThemeOscuro = "selected";
  }
}

if(isset($_POST["registrarse"])) {
  $respuesta = $usuarioLogeado->crearCuenta();

  if ($respuesta['error'] == 0){
    $append_body .= '<div id="cartel-frente">
            Gracias por registrarte, '.$usuarioLogeado->getNombre().'
          </div>';
  }elseif($respuesta['error'] == 1){
    $append_head .='<style>

      #panelLogin {
        right:0%;
      }
      #retorno {
        left: 73%;
      }

    </style>';
  }
}

if(isset($_POST["login"])) {
  $respuesta = $usuarioLogeado->login();

  if ($respuesta['error'] == 0){
    $append_body .= '<div id="cartel-frente">
            Bienvenido, '.$usuarioLogeado->getNombre().'
          </div>';
  }elseif($respuesta['error'] == 1){
    $append_head .='<style>

      #panelLogin {
        right:0%;
      }
      #retorno {
        left: 73%;
      }

    </style>';
  }

}

if(isset($_POST["desconectarse"])) {
  $respuesta = $usuarioLogeado->cerrarSesion();
}

if(isset($_FILES["fotoDePerfil"]) && $_FILES["fotoDePerfil"]["error"] == 0) {
  $respuesta = $usuarioLogeado->editarPerfil();
}

if(isset($caracteristicasUsuario["foto"])){
  $respuesta = $usuarioLogeado->editarPerfil();
}

/*
 * Registrar cuenta
 */
/*
//si la variable registrarse está definida..
if(isset($_POST["registrarse"])) {
  // Valido
  // verifica si todos los campos estan llenos..
  if (isset($_POST["email"])){$email = $_POST["email"];}
  if (isset($_POST["usuarioNuevo"])){$usuarioNuevo = $_POST["usuarioNuevo"];}
  if (isset($_POST["contrasenaNueva"])){$contrasenaNueva = $_POST["contrasenaNueva"];}
  if (isset($_POST["contrasenaNueva2"])){$contrasenaNueva2 = $_POST["contrasenaNueva2"];}

  // Si alguno de los campos no se envió
  if($email == "" || $usuarioNuevo == "" || $contrasenaNueva == "" || $contrasenaNueva2 == "") {

    $alertContrasena = '<span class="alertaContrasena">Todos los campos son obligatorios.</span>';

    // Fuerzo al formulario login a que sea visible desde el principio
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

  } elseif ($_POST["contrasenaNueva"] != $_POST["contrasenaNueva2"] || strlen($_POST["contrasenaNueva"]) < 8 ) {
    //si las contrasenas no coinciden, o tienen menos de 8 letras ... borrar lo escrito en contrasena
    $contrasenaNueva = "";
    $contrasenaNueva2 = "";

    $alertContrasena = '<span class="alertaContrasena">La contraseña debe tener al menos 8 carácteres y ser la misma en la confirmación.</span>';

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
  } elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    //verifica en base de datos si el nombre de ususario está disponible:
    $usuario = $_POST["usuarioNuevo"];
    $rutaUsuario = "usuarios/".$usuario.".json";

    // Si el usuario ya fue registrado previamente en la base de datos
    if(file_exists($rutaUsuario)) {
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
      $alertContrasena = '<span class="alertaContrasena">El usuario ya está registrado. Por favor, iniciá sesión.</span>';
    } else {
      // Si todo lo anterior fue chequeado y el usuario no existe en la base de datos
      // Cifro la contraseñarray
      $contrasenaNueva = password_hash($_POST['contrasenaNueva'], PASSWORD_DEFAULT);
      //Inyectar los valores de $_POST en la base de datos.
      $datosUsuario = [
        "usuario" => $_POST["usuarioNuevo"],
        "email" => $_POST["email"],
        "contrasena" => $contrasenaNueva,
        "foto" => "",
        "moneda" => "ARS",
        "idioma" => "es",
        "pais" => "Argentina",
        "metododepago" => "american",
        "theme" => "claro",
      ];//creo el json del usuario

      $usuarioValido = $_POST["usuarioNuevo"];
      $json = json_encode($datosUsuario);
      file_put_contents("usuarios/".$usuarioValido.".json",$json);

      iniciar_sesion($usuarioValido);

      // recordarme
      if (isset($_POST['recordarme'])){
        setcookie("usuario",$usuarioValido,time()+60*60*24*30);
      }

      ?>
      <div id="cartel-frente">
        Bienvenido, <?=$usuarioValido?>
      </div>
      <?php
    }
  }
}
/* End registro de usuario */


/*
 * Login
 */
/*
if(isset($_POST["login"])) {
  //para logearse verifica que los dos campos esten llenos:
  if(!isset($_POST["usuario"]) || !isset($_POST["contrasena"])) {
    if (isset($_POST["usuario"])){$usuario = $_POST["usuario"];}

    $alertConexion = '<span class="alertaContrasena">Los dos campos son obligatorios.</span>';
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
  } else {
    // Si se cuenta con estos datos verifico que el usuario esté registrado en la base de datos
    $usuario = $_POST["usuario"];
    $rutaUsuario = "usuarios/".$usuario.".json";

    // Si el usuario está registrado en la base de datos
    if (file_exists($rutaUsuario)){
      $usuarioEnBaseDeDatos = json_decode(file_get_contents("usuarios/".$usuario.".json"),true);

      // Valido la contraseña
      // Si la contraseña es correcta inicio sesión
      if(password_verify($_POST['contrasena'], $usuarioEnBaseDeDatos["contrasena"])) {
        $usuarioValido = $usuario;

        iniciar_sesion($usuarioValido);

        // recordarme
        if (isset($_POST['recordarme'])){
          setcookie("usuario",$usuarioValido,time()+60*60*24*30);
        }

        ?>
        <div id="cartel-frente">
          Bienvenido de nuevo, <?=$usuarioValido?>
        </div>
        <?php

        // si la contraseña no es correcta
      } else {
        $contrasena = "";
        $alertConexion = '<span class="alertaContrasena">La contraseña es incorrecta.</span>';
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

      }
    // Si el usuario no está registrado en la base de datos
    }else{
      $usuario = $contrasena = "";

      $alertConexion = '<span class="alertaContrasena">No se encontró tu usuario. ¡Registrá una cuenta nueva!</span>';
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
    }
  }
  //se verifica si hay una cookie usurario (si está conectado)
}

/*
 * Cerrar sesión
 */
/*
if(isset($_POST["desconectarse"])) {
  unset($_SESSION['usuario_logeado']);
  session_destroy();
  setcookie("usuario",NULL,-1);
}

/*
 * Editar perfil
 */
/*
//obtener, cambiar nombre y guardar foto de perfil
if(isset($_FILES["fotoDePerfil"]) && $_FILES["fotoDePerfil"]["error"] == 0) {
  if(isset($_SESSION['usuario_logeado'])){
    $ext = pathinfo($_FILES["fotoDePerfil"]["name"],PATHINFO_EXTENSION);
    $name = uniqid().".".$ext;
    move_uploaded_file($_FILES["fotoDePerfil"]["tmp_name"], dirname(__FILE__)."/img/foto_de_perfil/".$name);
    //asignar la foto a un usuario (el que está conectado).. extrae el usuario de json y lo modifica
    $usuarioValido = $_SESSION['usuario_logeado']['usuario'];
    $usuario = json_decode(file_get_contents("usuarios/".$usuarioValido.".json"),true);
    $usuario["foto"] = $name;
    // vuelve a "guardar" el usuario json
    $json = json_encode($usuario);
    file_put_contents("usuarios/".$usuarioValido.".json",$json);

    iniciar_sesion($_SESSION['usuario_logeado']['usuario']);
  }
}

// foto de usuario por defecto
$foto = $carpeta."/user.png";
//foto de usuario, si está conectado.. la extrae de json (si existe)
//$usuarioConectado = $_COOKIE['usuario'];
if(isset($_COOKIE['usuario']) && $usuarioConectado = $_COOKIE['usuario']){
  $rutaUsuario = "usuarios/".$usuario.".json";

  if(file_exists($rutaUsuario)){
    $caracteristicasUsuario = json_decode(file_get_contents("usuarios/".$usuarioConectado.".json"),true);
  }else{
    setcookie("usuario", null, time()-1);
    $usuarioConectado = null;
  }
}

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
  }
}
*/
/*
 * Agregar departamento
 */
function agregarDepto($nombre="",$foto="",$superficie="",$camas="",$precio="") {

  global $deptos;
  if(isset($_SESSION["usuario_logeado"]["usuario"])) {
    $propietario = $_SESSION["usuario_logeado"]["usuario"];
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

/*
 * Publicación de comentario
 */
if(isset($_POST["comentario"])) {
  if(isset($_SESSION['usuario_logeado'])){
    $comentario = $_POST["comentario"];
    $autor = strtolower($_SESSION["usuario_logeado"]["usuario"]);
    $fecha = date("h:i - d F Y");
    $comentarios[] = [
      "autor" => $autor,
      "comentario" => $comentario,
      "fecha" => $fecha,
    ];
    $json = json_encode($comentarios);
    file_put_contents("comentarios.json",$json);

    // Leo los registros actualizados de la BD
    iniciar_sesion($_SESSION["usuario_logeado"]["usuario"]);
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
  }
}

/*
 * Agregar nueva propiedad
 */
if(isset($_POST["nombre"]) && isset($_POST["foto"]) && isset($_POST["superficie"]) && isset($_POST["camas"]) && isset($_POST["precio"])) {
  if(isset($_SESSION['usuario_logeado'])){
    $nombreDepto = $_POST["nombre"];
    $fotoDepto = $_POST["foto"];
    $superficieDepto = $_POST["superficie"];
    $camasDepto = $_POST["camas"];
    $precioDepto = $_POST["precio"];

    agregarDepto($nombreDepto, $fotoDepto, $superficieDepto, $camasDepto, $precioDepto);

    iniciar_sesion($_SESSION['usuario_logeado']['usuario']);
  }
}

?>
