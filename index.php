<?php

    // include "contenido.php";
    include "funciones.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="<?=$css?>">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Plaster&display=swap" rel="stylesheet">
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.4.0/mapbox-gl.css' rel='stylesheet' />
        <title>NOMADE</title>
    </head>
    <body>
        <header>
            <a href="index.php"><h1>NOMADE</h1></a>
            <!-- flecha retorno (desaprece) -->
            <img src="<?=$carpeta?>/arrow.png" class="retorno" id="retorno" alt="">
            <nav class="encabezado">
            <!-- íconos de menú cabecera -->
                <div class="fotoUsuario"><img src="<?=$foto?>" id="fotoDeUsuario" alt=""></div>
                <div class="favoritos"><img src="<?=$carpeta?>/heart.png" alt=""></div>
                <div class="plus"><img src="<?=$carpeta?>/plus.png" alt=""></div>
                <div class="info"><img src="<?=$carpeta?>/info.png" alt=""></div>
            </nav>
        </header>
        <!-- contenedor del mapa -->
        <section class="mapa">
        </section>
        <!-- formulario de búsqueda -->
        <form action="" id="formBuscar" method="POST">
            <input class="buscar" type="text" name="buscar" id="buscar" placeholder="Dónde vas?">
            <nav class="filtros">
                <input name="personas" type="text" id="cantidadDePersonas"> <img src="<?=$carpeta?>/persona.png" alt=""> | <input type="text" name="superficie" id="cantidadDeM2"> m<sup>2</sup> | MAX <input type="text" name="precio" id="quePrecio"> <img src="<?=$carpeta?>/peso.png" >
                <label for="enviarBusqueda"><img src="<?=$carpeta?>/buscar.png" class="lupa" alt=""></label>
                <input type="submit" id="enviarBusqueda" style="display:none;">
            </nav>
        </form>

        <footer>
          <p>
            "Sinónimo de destierro antes de volverse un atractivo mundial,
            <b>Ushuaia (Tierra del Fuego)</b>
            nos recuerda en cada uno de sus rincones que estamos en el fin del Mundo"
            <br><br>
            <em>Le Monde Diplomatique</em>
          </p>
        </footer>
        <!-- caja que contiene los deptos -->
        <section class="seccionPrincipalArticulos">
            <div class="pestana"></div>

        <?php
            foreach ($deptos as $depto) {
        ?>
            <!-- El esqueleto en el que se inserta $depto -->
            <article class="articulosPrincipales" style="background-image:url('img_deptos/<?=$depto["foto"]?>');">
                <img class ="favorito" src="img/heart.png" alt="">
                <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                <img class="flecha flechaDer" src="img/arrow.png" alt="">
                <p class="infoPrevia">
                    <?=$depto["nombre"]?>
                </p>
                <p class="infoCompleta">
                   <?=$depto["superficie"]?> m<sup>2</sup> | <?=$depto["camas"]?> camas | <strong><?=$depto["precio"]?> ARS/día</strong>
                </p>
            </article>

        <?php
            }//acá cierra el php foreach
        ?>
        <!-- Paneles menú lateral derecho -->
        </section>

        <section class="panel panelFavoritos">
            <h2>MIS FAVORITOS</h2>
            <article class="articulosFavoritos favOpac" id="dept1"></article>
            <article class="articulosFavoritos favOpac" id="dept2"></article>
            <article class="articulosFavoritos favOpac" id="dept3"></article>
            <article class="articulosFavoritos favOpac" id="dept4"></article>
            <article class="articulosFavoritos favOpac" id="dept5"></article>
            <article class="articulosFavoritos favOpac" id="dept1"></article>
            <article class="articulosFavoritos favOpac" id="dept2"></article>
            <article class="articulosFavoritos favOpac" id="dept3"></article>
            <article class="articulosFavoritos favOpac" id="dept4"></article>
            <article class="articulosFavoritos favOpac" id="dept5"></article>
            <article class="articulosFavoritos favOpac" id="dept1"></article>
            <!-- revisa si existen deptos propios, si los hay los muestra -->
            <?php if(isset($misDeptos) && sizeof($misDeptos) > 0) { ?><h2>MIS PROPIEDADES</h2><?php };?>
            <?php if ($misDeptos){
                foreach($misDeptos as $miDepto) { ?>
                <article class="articulosFavoritos favOpac" style="background-image:url('img_deptos/<?=$miDepto["foto"]?>');">
                    <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                    <img class="flecha flechaDer" src="img/arrow.png" alt="">
                    <p class="infoFavoritos">
                        <?=$miDepto["nombre"]?>
                    </p>
                </article>
            <?php };
          };?>
        </section>

        <section class="panel panelLogin" id="panelLogin">

        <?php
            if(!isset($_COOKIE["usuario"]) && !isset($usuarioValido)) {
        ?>
          <!-- si no hay cookie de conexión -->
         <h2>SIGN IN</h2>
         <img class="social" src="<?=$carpeta?>/loginFacebook.png" alt="Facebook">
         <img class="social" src="<?=$carpeta?>/loginTwitter.png" alt="Twitter">
         <img class="social" src="<?=$carpeta?>/loginLinkedin.png" alt="LinkedIn">

            <form class="formRegistro" action="" method="post">
                <input name="email" type="email" placeholder= "E-mail" value=<?=isset($_POST["email"])?>>
                <input name="usuarioNuevo" type="text" placeholder= "Usuario" value=<?=isset($_POST["usuarioNuevo"])?>>
                <input name="contrasenaNueva" type="password" placeholder="Contraseña" value=<?=isset($_POST["contrasenaNueva"])?>>
                <input name="contrasenaNueva2" type="password" placeholder="Confirmar contraseña" value=<?=isset($_POST["contrasenaNueva2"])?>>
                <span class="alertaContrasena"><?=isset($alertContrasena)?></span>
                <input type="submit" name="registrarse" value="Registrarse" class="aceptar">
            </form>

            <h5>¿Ya tenes una cuenta NOMADE?</h5>
            <h2>LOGIN</h2>
            <form class="formLogin" action="" method="POST">
                <input name="usuario" type="text" placeholder= "Usuario" value=<?=isset($_POST["usuario"])?>>
                <input name="contrasena" type="password" placeholder="Contraseña">
                <span class="alertaContrasena"><?=isset($alertConexion)?></span>
                <input name="login" type="submit" value="Ingresar" class="aceptar botonLogin">
            </form>
            <p class="olvide">Olvidé mi contraseña</p>
            <form action="mail.php" method="POST" class="formLogin">
                <input name="mailOlvide" type="email" placeholder="Ingresa tu e-mail" class="emailOlvide">
            </form>

        <?php
            } else if($_COOKIE["usuario"]) {
        ?>
        <!-- si HAY cookie de conexión -->
        <h2><?=$_COOKIE["usuario"]?></h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="foto" class="file formLogin">Elegir una foto de perfil</label>
            <input type="file" id="foto" class="file" name="fotoDePerfil">
            <label for="subir"><img src="<?=$carpeta?>/upload.png" alt=""></label>
            <input type="submit" id="subir" class="subir" value="Subir" class="aceptar">
        </form>
        <p class="formLogin">Moneda
            <select name="moneda">
                <option value="ARS">ARS</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
            </select>
        </p>
        <p class="formLogin">Idioma
            <select name="idioma">
                <option value="espanol">Español (Argentina)</option>
                <option value="frances">Français (France)</option>
                <option value="ingles">English (US)</option>
            </select>
        </p>
        <p class="formLogin">País de residencia
            <select name="residencia">
                <option value="residenciaArgentina">Argentina</option>
                <option value="residenciaBolivia">Bolivia</option>
                <option value="residenciaBrasil">Brasil</option>
                <option value="residenciaChile">Chile</option>
                <option value="residenciaParaguay">Paraguay</option>
                <option value="residenciaUruguay">Uruguay</option>
            </select>
        </p>
        <p class="formLogin">Método de pago
            <select name="metodoDePago">
                <option value="americanExpress">American Express</option>
                <option value="masterCard">Master Card</option>
                <option value="visa">Visa</option>
            </select>
        </p>
        <!-- tema claro-oscuro -->
        <form action="" class="formLogin" id="formTheme" method="POST">
            <label for="theme" class="formLogin">Estilo visual</label>
            <select name="theme" id="theme" onchange='this.form.submit()'>
                <option <?=$selectedThemeClaro?> value="claro">Claro</option>
                <option <?=$selectedThemeOscuro?> value="oscuro">Oscuro</option>
            </select>
        </form>

        <p class="aceptar activarMapa">Activar mapa</p>
        <!-- destruccion cookie usuario -->
        <form action="" class="formLogin" method="POST">
            <input type="submit" name="desconectarse" value="Desconectarse" class="aceptar">
        </form>

        <?php
            };
        ?>

        </section>

        <section class="panel panelInfo" id="panelInfo">
           <h2 class="aceptar preguntasFrecuentesH2">PREGUNTAS FRECUENTES</h2>
           <ul class="preguntasFrecuentes" type="bullet">
             <li class="pregunta">¿Cómo creo una cuenta?<p class="respuesta">Hace clic en el icono <img src="<?=$carpeta?>/user.png" style="height:10px" alt=""> y llena el formulario de registro.</p></li>
             <li class="pregunta">¿Cómo restablezco mi contraseña?<p class="respuesta">En el formulario de ingreso, hace clic en "Olvidé mi contraseña" y siga los pasos indicados</p></li>
             <li class="pregunta">¿Por qué debo pagar por NOMADE?<p class="respuesta">Efectuar una transacción por Nomade le brinda al inquilino la seguridad de que tu pago no se finalizará hasta que este confirme que el propietario cumplió con todos los requisitos.</p></li>
             <li class="pregunta">¿Qué comprenden las tarifas?<p class="respuesta">Las tarifas corresponden, por un lado a la comisión de Nomade, y por otro lado a los gastos que el propietario debe enfrentar para preparar el hogar y recibirlo de la mejor manera.</p></li>
             <li class="pregunta">¿Cuál es la politica de cancelación?<p class="respuesta">Cada dueño es libre de optar por las políticas de cancelación que desee, mientras respete el plazo mínimo de 24 horas para cancelar sin costos.</p></li>
           </ul>
           <h2 class="aceptar escribirComentarioH2">ESCRIBIR COMENTARIO</h2>
           <form class="formInfo escribirComentario" action="" method="POST">
            <h5>
                <?php
                // Si el usuario está conectado abre un formulario, si no, pide conexión.
                if(isset($_COOKIE["usuario"])) {
                    echo $_COOKIE["usuario"];
                }else {
                ?>
                <span class="conectarse">Conectarse</span>
                <?php
                }
                ?>
            </h5>
            <?php
                if(!isset($_COOKIE["usuario"])) {
            ?>
            <style>
                #areaComentario {
                    display:none;
                }
                #aceptarComentario {
                    display:none;
                }
            </style>
            <?php
                };
            ?>
            <textarea name="comentario" rows="5" placeholder="Escribí acá tu comentario" id="areaComentario"></textarea>
            <input type="submit" value="Enviar" class="aceptar" id="aceptarComentario">
           </form>
           <h2 class="aceptar forumH2">COMENTARIOS DE USUARIOS</h2>
           <?php
                foreach($comentarios as $comentario) {
            ?>

                <article class="forum">
                    <h5 class="autorComentario"><?=$comentario["autor"]?></h5>
                    <p class="fechaComentario"><?=$comentario["fecha"]?></p>
                    <p class="comentario"><?=$comentario["comentario"]?></p>
                </article>

            <?php
                };
           ?>
        </section>

        <section class="agregarDepto">
            <section class="formularioAgregar">
                <img src="<?=$carpeta?>/cruz.png" class="cerrar" alt="">
                <h1>AGREGAR PROPIEDAD</h1>
                <form action="index.php" method="POST">
                    <input type="text" name="nombre" placeholder="Escribí un título">
                    <select name="foto">
                        <option value="" selected disabled hidden>Seleccioná una foto</option>
                        <option value="dept1.jpg">Foto 1</option>
                        <option value="dept2.jpg">Foto 2</option>
                        <option value="dept3.jpg">Foto 3</option>
                        <option value="dept4.jpg">Foto 4</option>
                        <option value="dept5.jpg">Foto 5</option>
                        <option value="dept6.jpg">Foto 6</option>
                        <option value="dept7.jpg">Foto 7</option>
                        <option value="dept8.jpg">Foto 8</option>
                        <option value="dept9.jpg">Foto 9</option>
                        <option value="dept10.jpg">Foto 10</option>
                        <option value="dept11.jpg">Foto 11</option>
                    </select>
                    <input type="text" name="superficie" placeholder="Cuántos m2?">
                    <input type="text" name="camas" placeholder="Cuántas camas?">
                    <input type="text" name="precio" placeholder="Cuánto por mes?">
                    <input type="submit" value="Agregar" class="aceptar">
                </form>
            </section>
        </section>

    </body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="animations.js"></script>
