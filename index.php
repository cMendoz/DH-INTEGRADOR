<?php

    include "contenido.php";
    include "funciones.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=$css?>">
         <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Plaster&display=swap" rel="stylesheet">
        <title>NOMADE</title>
    </head>
    <body>
        <header>
            <a href="index.php"><h1>NOMADE</h1></a>
            <img src="<?=$carpeta?>/arrow.png" class="retorno" alt="">
            <nav class="encabezado">
                <div class="usuario"><img src="<?=$foto?>" id="fotoDeUsuario" alt=""></div>
                <div class="favoritos"><img src="<?=$carpeta?>/heart.png" alt=""></div>
                <div class="plus"><img src="<?=$carpeta?>/plus.png" alt=""></div>
                <div class="info"><img src="<?=$carpeta?>/info.png" alt=""></div>
            </nav>
        </header>

        <section class="mapa">
        </section>

        <form action="" id="formBuscar" method="POST">
            <input class="buscar" type="text" name="buscar" id="buscar" placeholder="Dónde vas?">
            <nav class="filtros">2<img src="<?=$carpeta?>/persona.png" alt=""> | 40m<sup>2</sup> | +2.000<img src="<?=$carpeta?>/peso.png" ></nav>
        </form>

        <footer>
          <p>
            "No existen torres hechas por el hombre que tengan la sorprendente
            majestuosidad del macizo <b>Torres del Paine - Chile"</b>
            <br><br>
            <em>National Geografic - The world's most beautiful places.</em>
          </p>
        </footer>

        <section class="seccionPrincipalArticulos">
            <div class="pestana"></div>

        <?php
            foreach ($deptos as $depto) {
        ?>

            <article class="articulosPrincipales" style="background-image:url('img/<?=$depto["foto"]?>');">
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
            }
        ?>

        </section>

        <section class="panel panelFavoritos">
            <article class="articulosFavoritos" id="dept1"></article>
            <article class="articulosFavoritos" id="dept2"></article>
            <article class="articulosFavoritos" id="dept3"></article>
            <article class="articulosFavoritos" id="dept4"></article>
            <article class="articulosFavoritos" id="dept5"></article>
            <article class="articulosFavoritos" id="dept1"></article>
            <article class="articulosFavoritos" id="dept2"></article>
            <article class="articulosFavoritos" id="dept3"></article>
            <article class="articulosFavoritos" id="dept4"></article>
            <article class="articulosFavoritos" id="dept5"></article>
            <article class="articulosFavoritos" id="dept1"></article>
            <article class="articulosFavoritos" id="dept2"></article>
            <article class="articulosFavoritos" id="dept3"></article>
            <article class="articulosFavoritos" id="dept4"></article>
            <article class="articulosFavoritos" id="dept5"></article>
            <article class="articulosFavoritos" id="dept1"></article>
            <article class="articulosFavoritos" id="dept2"></article>
            <article class="articulosFavoritos" id="dept3"></article>
            <article class="articulosFavoritos" id="dept4"></article>
            <article class="articulosFavoritos" id="dept5"></article>
        </section>

        <section class="panel panelLogin">

        <?php
            if(!$_COOKIE["usuario"] && !$usuarioValido) {
        ?>

         <h2>SIGN IN</h2>
         <img class="social" src="<?=$carpeta?>/loginFacebook.png" alt="Facebook">
         <img class="social" src="<?=$carpeta?>/loginTwitter.png" alt="Twitter">
         <img class="social" src="<?=$carpeta?>/loginLinkedin.png" alt="LinkedIn">

            <form class="formRegistro" action="" method="post">
                <input name="email" type="email" placeholder= "E-mail" value=<?=$_POST["email"]?>>
                <input name="usuarioNuevo" type="text" placeholder= "Usuario" value=<?=$_POST["usuarioNuevo"]?>>
                <input name="contrasenaNueva" type="password" placeholder="Contraseña" value=<?=$_POST["contrasenaNueva"]?>>
                <input name="contrasenaNueva2" type="password" placeholder="Confirmar contraseña" value=<?=$_POST["contrasenaNueva2"]?>>
                <span class="alertaContrasena"><?=$alertContrasena?></span>
                <input type="submit" name="registrarse" value="Registrarse" class="aceptar">
            </form>
            
            <h5>¿Ya tenes una cuenta NOMADE?</h5>
            <h2>LOGIN</h2>
            <form class="formLogin" action="" method="POST">
                <input name="usuario" type="text" placeholder= "Usuario">
                <input name="contrasena" type="password" placeholder="Contraseña">
                <span class="alertaContrasena"><?=$alertConexion?></span>
                <input type="submit" value="Ingresar" class="aceptar botonLogin">
            </form>
            <p class="olvide">Olvidé mi contraseña</p>
            <form action="" method="POST" class="formLogin">
                <input type="email" placeholder="Ingresa tu e-mail" class="emailOlvide">
            </form>

        <?php
            } elseif($_COOKIE["usuario"] || $usuarioValido) {
        ?>

        <h2><?=$_COOKIE["usuario"]?></h2>

        <form action="" method="POST" enctype="multipart/form-data">
        <label for="foto" class="file formLogin">Cargar una foto de perfil</label>
            <input type="file" id="foto" class="file" name="fotoDePerfil">
            <input type="submit" value="Subir" class="aceptar">
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
        <p class="formLogin">Destino preferido
            <select name="destino">
                <option value="budapest">Budapest (Hungría)</option>
                <option value="moscu">Moscú (Rusia)</option>
                <option value="sanFrancisco">San Francisco (Estados Unidos)</option>
                <option value="tokyo">Tokyo (Japón)</option>
                <option value="ushuaia">Ushuaia (Argentina)</option>
            </select>
        </p>
        <p class="formLogin">Método de pago
            <select name="metodoDePago">
                <option value="americanExpress">American Express</option>
                <option value="masterCard">Master Card</option>
                <option value="visa">Visa</option>
            </select>
        </p>

        <form action="" class="formLogin" id="formTheme" method="POST">
            <label for="theme" class="formLogin">Estilo visual</label>
            <select name="theme" id="theme" onchange='this.form.submit()'>
                <option <?=$selectedThemeClaro?> value="claro">Claro</option>
                <option <?=$selectedThemeOscuro?> value="oscuro">Oscuro</option>
            </select>
        </form>

        <form action="" class="formLogin" method="POST">
            <input type="submit" name="desconectarse" value="Desconectarse" class="aceptar">
        </form>

        <?php
            };
        ?>

        </section>

        <section class="panel panelInfo">
           <h2>PREGUNTAS FRECUENTES</h2>
           <form action="" class="formInfo">
                <input type="search" placeholder="Buscar por palabra clave"/>
           </form>
           <ul type="bullet">
             <li class="pregunta">¿Cómo creo una cuenta?<p class="respuesta">Haga clic en el icono <img src="img/user.png" style="height:10px" alt=""> y llene el formulario de registro.</p></li> 
             <li class="pregunta">¿Cómo restablezco mi contraseña?<p class="respuesta">En el formulario de ingreso, haga clic en "Olvidé mi contraseña" y siga los pasos indicados</p></li> 
             <li class="pregunta">¿Por qué debo pagar por NOMADE?<p class="respuesta">Efectuar una transacción por Nomade le brinda al inquilino la seguridad de que su pago no se finalizará hasta que este confirme que el propietario cumplió con todos los requisitos.</p></li>
             <li class="pregunta">¿Qué comprenden las tarifas?<p class="respuesta">Las tarifas corresponden, por un lado a la comisión de Nomade, y por otro lado a los gastos que el propietario debe enfrentar para preparar el hogar y recibirlo de la mejor manera.</p></li> 
             <li class="pregunta">¿Cuál es la politica de cancelación?<p class="respuesta">Cada dueño es libre de optar por las políticas de cancelación que desee, mientras respete el plazo mínimo de 24 horas para cancelar sin costos.</p></li> 
           </ul>
           <h5>¿No encontras una solución?</h5>
           <h2>ESCRIBIR COMENTARIO</h2>
           <form class="formInfo" action="" method="post">
            <h5>
                <?php

                if($_COOKIE["usuario"]) {
                    echo $_COOKIE["usuario"];
                }else { 
                ?>
                <span class="conectarse">Conectarse</span>
                <?php 
                }
                ?>
            </h5>
            <?php
                if(!$_COOKIE["usuario"]) {
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
            <textarea name="comentarios" rows="5" placeholder="Escribí acá tu comentario" id="areaComentario"></textarea>
            <input type="submit" value="Enviar" class="aceptar" id="aceptarComentario">
           </form>
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
