<?php

    include "contenido.php";
    include "funciones.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
         <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Plaster&display=swap" rel="stylesheet">
        <title>NOMADE</title>
    </head>
    <body>
        <header>
            <a href="index.php"><h1>NOMADE</h1></a>
            <img src="img/arrow.png" class="retorno" alt="">
            <nav class="encabezado">
                <div class="plus"><img src="img/plus.png" alt=""></div>
                <div class="usuario"><img src="img/user.png" alt=""></div>
                <div class="favoritos"><img src="img/heart.png" alt=""></div>
                <div class="info"><img src="img/info.png" alt=""></div>
            </nav>
        </header>
        <section class="mapa">
        </section>
        <form action="" id="formBuscar" method="POST">
            <input class="buscar" type="text" name="buscar" id="buscar" placeholder="Dónde vas?">
            <nav class="filtros">2<img src="img/persona.png" alt=""> | 40m<sup>2</sup> | +2.000<img src="img/peso.png" ></nav>
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

        <section class="panelFavoritos">
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
        <section class="panelLogin">
         <h2 align="center">REGISTRARSE:</h2>
         <img class="social" src="img/loginFacebook.png" alt="Facebook">
         <img class="social" src="img/loginGoogle.png" alt="Google">
             <form class="formLogin" action="html5-formularios.html" method="get">
             <label form="email"></label>
             <input name="email" type="email" placeholder= "Dirección de correo electrónico">
             <br>
             <label form="nombre"></label>
             <input name="nombre" type="text" placeholder= "Nombre">
             <br>
             <label form="apellido"></label>
             <input name="apellido" type="text" placeholder= "Apellido">
             <br>
             <label form="contraseña"></label>
             <input name="contraseña" type="password" placeholder="Elige una contraseña">
             <br><br>
             <button type="submit">REGÍSTRATE</button>
             </form>
          </div>
          <br><br><br>
          <div>
          <h5 align="center">¿Ya tienes una cuenta NOMADE?</h5>
          <h2 align="center">LOGIN</h2>
             <form class="formLogin" action="html5-formularios.html" method="get">
             <label form="email"></label>
             <input name="email" type="email" placeholder= "Dirección de correo electrónico">
             <br>
             <label form="contraseña"></label>
             <input name="contraseña" type="password" placeholder="Contraseña">
             <br><br>
             <button type="submit">INICIA SESIÓN</button>
             </form>
             <form class="formRecordar" action="html5-formularios.html" method="get">
             <label form="recordar">     Recordarme</label>
             <input name="recordar" type="checkbox">
             <br><br>
             </form>
          </div>
        </section>
        <section class="panelInfo">
           <div class="preguntasFrecuentes">
           <br><br>
           <h2 align="center">Preguntas Frecuentes:</h2>
           <h3>Búsqueda por palabra clave:</h3>
           <span class="icon"><i class="fa fa-search"></i></span>
           <input type="search" id="search" placeholder="Buscar..." />

           <ul type="bullet">
             <li>¿Cómo creo una cuenta?</li>
             <li>¿Cómo restablezco mi contraseña?</li>
             <li>¿Por qué debo pagar por NOMADE?</li>
             <li>¿Qué comprenden las tarifas?</li>
             <li>¿Cuál es la politica de cancelación?</li>
           </ul>
           <br>
           <h3>¿No encuentras una solucion?</h3>
           <h4> Escribinos: </h4>
           <form class="formInfo" action="html5-formularios.html" method="get">
           <label form="email"></label>
           <input name="email" type="email" placeholder= "Dirección de correo electrónico">
           <br>
           <label form="nombre"></label>
           <input name="nombre" type="text" placeholder= "Nombre">
           <br>
           <label form="apellido"></label>
           <input name="apellido" type="text" placeholder= "Apellido">
           <br>
           <label form="comentarios"></label>
           <textarea name="comentarios" rows="5">Escribe aquí....</textarea>
           <br><br>
           <button type="submit">ENVIAR</button>
           </form>
         </div>
        </section>
        <section class="agregarDepto">
            <section class="formularioAgregar">
                <img src="img/cruz.png" class="cerrar" alt="">
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
                    <input type="submit" value="Agregar" class="agregar">
                </form>
            </section>
        </section>

    </body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="animations.js"></script>
