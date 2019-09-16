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
            <article class="articulosPrincipales" id="dept1">
                <img class ="favorito" src="img/heart.png" alt="">
                <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                <img class="flecha flechaDer" src="img/arrow.png" alt="">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept2">
                <img class ="favorito" src="img/heart.png" alt="">
                <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                <img class="flecha flechaDer" src="img/arrow.png" alt="">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept3">
                <img class ="favorito" src="img/heart.png" alt="">
                <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                <img class="flecha flechaDer" src="img/arrow.png" alt="">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept4">
                <img class ="favorito" src="img/heart.png" alt="">
                <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                <img class="flecha flechaDer" src="img/arrow.png" alt="">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept5">
                <img class ="favorito" src="img/heart.png" alt="">
                <img class="flecha flechaIzq" src="img/arrow.png" alt="">
                <img class="flecha flechaDer" src="img/arrow.png" alt="">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
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

    </body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="animations.js"></script>
