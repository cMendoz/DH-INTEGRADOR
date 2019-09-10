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
            <nav class="encabezado">

                <div class="usuario"><img src="img/user.png" alt=""></div>
                <div class="favoritos"><img src="img/heart.png" alt=""></div>
                <div class="info"><img src="img/info.png" alt=""></div>
            </nav>
        </header>
        <section class="mapa">
            <!-- <img src="img/map.png" alt=""> -->
        </section>
        <form action="#" method="POST">
            <input class="buscar" type="text" name="buscar" placeholder="Dónde vas?">
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
            <div class="pestana"><?php echo $_POST["buscar"]." :" ?></div>
            <article class="articulosPrincipales" id="dept1">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept2">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept3">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept4">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
            <article class="articulosPrincipales" id="dept5">
                <p class="infoPrevia">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br><br>
                </p>
                <p class="infoCompleta">
                    70m2 | 4 camas | <strong>2000ARS/día</strong>
                </p>
            </article>
        </section>
        <section class="panelFavoritos">
            <div class="etiquetasVerticales"><b>F<BR>A<BR>V<BR>O<BR>R<BR>I<BR>T<BR>O<BR>S</b></div>
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
          <div class="etiquetasVerticales"><b>L<BR>O<BR>G<BR>I<BR>N</b></div>
          <br><br>
          <div>
         <h2 align="center">REGISTRARSE:</h2>
         <img src="img/loginFacebook.png" alt="Facebook">
         <img src="img/loginGoogle.png" alt="Google">
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
           <div class="etiquetasVerticales"><b>I<BR>N<BR>F<BR>O</b></div>
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
<script type="text/javascript">
        $(function(){
            $('.articulosPrincipales').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(this).animate({height: '500px'});
                        $(".infoPrevia", this).animate({opacity: '0'});
                        $(".infoCompleta", this).animate({opacity: '1'});
                        break;

                    case 2:
                        $(this).animate({height: '200px'});
                        $(".infoPrevia", this).animate({opacity: '1'});
                        $(".infoCompleta", this).animate({opacity: '0'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration)
            })
        });
        $(function(){
            $('.favoritos').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(".panelFavoritos").animate({right: '0'});
                        break;

                    case 2:
                    $(".panelFavoritos").animate({right: '-1000px'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration)
            })
        });
        $(function(){
            $('.usuario').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(".panelLogin").animate({right: '0'});
                        break;

                    case 2:
                    $(".panelLogin").animate({right: '-1000px'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration)
            })
        });
        $(function(){
            $('.info').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(".panelInfo").animate({right: '0'});
                        break;

                    case 2:
                    $(".panelInfo").animate({right: '-1000px'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration)
            })
        });
</script>

<?php
    if(isset($_POST['buscar'])){
?>
<style type="text/css">
        nav.encabezado {
            animation-name: none;
        }
        section.mapa {
            animation-name: none;
        }
        form input.buscar {
            animation-direction: reverse;
            width: 0px;
            background: none;
        }
        .seccionPrincipalArticulos {
                display: block;
        }
        footer{
          animation-name: trans-x2;
          animation-duration: 2s;
          left: 60%;
        }
</style>
<?php
}
?>
