<?php   

use App\Property;
use App\Favorite;
use App\Photo;
use App\User;

    // VAR_DUMP CUSTOMIZADO

function vardump ($data) {
    echo '<pre style="display: inline-block; background: black; padding-left: 20px; margin-top: 0px; font-size: 15px; color: yellow; z-indez: 99999; font-weight: bolder;">'; var_dump($data); echo '</pre>';
}

    // ChEQUEO USUARIO

$userID = 0;

if(Auth::check()) {
    $userID = Auth::user()->id;
}

    // SELECTOR DE TEMA

    // POR DEFECTO
    $carpeta = "/img/light_mode";
    $css = "/css/light_mode.css";
    $selectedThemeClaro = "selected";
    $selectedThemeOscuro = "";

    // CAMBIO DE TEMA
    if(isset($_POST["theme"])) {
        $theme = $_POST["theme"];
        $_COOKIE["theme"] = $theme;
        setcookie("theme",$theme,time()+60*60*24*30);
    };

    if(isset($_COOKIE["theme"])) {
        if($_COOKIE["theme"] == "oscuro") {
            $selectedThemeClaro = "";
            $selectedThemeOscuro = "selected";
            $carpeta = "/img/dark_mode";
            $css = "/css/dark_mode.css";
        } else if ($_COOKIE["theme"] == "claro") {
            $selectedThemeClaro = "selected";
            $selectedThemeOscuro = "";
            $carpeta = "/img/light_mode";
            $css = "/css/light_mode.css";
        }
    }

    // CAMBIO DE IDIOMA

    $language = "es";
    $selectedEs = "selected";
    $selectedFr = "";
    $selectedEn = "";

    if(Auth::check()) {
        $language = Auth::user()->language;    
    };

    include(app_path().'/php/translate.php');

    // CHEQUEO DEL PAIS

    $country = "argentina";

    if(Auth::check()) {
        $country = Auth::user()->country;    
    };

    // CHEQUEO DE LA MONEDA

    $currency = "ARS";
    $selectedARS = "selected";
    $selectedEUR = "";
    $selectedUSD = "";

    if(Auth::check()) {
        $currency = Auth::user()->currency;
    }

    if($currency == "ARS") {$selectedARS = "selected"; $multiplier = 1; $symbol = 'AR$';}
    if($currency == "EUR") {$selectedEUR = "selected"; $multiplier = 0.015; $symbol = '€';}
    if($currency == "USD") {$selectedUSD = "selected"; $multiplier = 0.017; $symbol = 'U$';}

    // CHEQUEO DEL AVATAR

    if(!Auth::check() || Auth::user()->avatar == 'user.jpg') {
        $avatar = $carpeta.'/user.png';
    } else {
        $avatar = '/storage/'.Auth::user()->avatar;
    }

    // PROPIEDADES, FAVORITOS, FOTOS

    $users = User::all()->toArray();
    $properties = Property::all()->toArray();
    $myFavorites = Favorite::where('user_id', '=', $userID)->where('favorite', '=', 1)->get('property_id')->toArray();
    $myBookings = Favorite::where('user_id', '=', $userID)->where('booked', '=', 1)->get()->toArray();
    $pictures = Photo::all()->toArray();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href=<?=$css?>>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Plaster&display=swap" rel="stylesheet">
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
        <link rel="stylesheet" href="/calendar/dist/datepicker.min.css">
        <title>NOMADE</title>
    </head>
    <body>

        <!-- ERRORES -->

        @if (count($errors) > 0)
            <div class="alert alert-danger" style="margin-top: 300px; margin-left: 20px; color: yellow;">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <!-- ---------------------------------------- ENCABEZADO -------------------------------------------- -->

        <header>
            <a href="/"><h1>NOMADE</h1></a>

            <!-- FLECHA RETORNO -->

            <img src="<?=$carpeta?>/arrow.png" class="retorno" id="retorno" alt="">
            <nav class="encabezado">
                <div class="fotoUsuario"><img src="<?=$avatar?>" id="fotoDeUsuario" alt=""></div>
                <div class="favoritos"><img src="<?=$carpeta?>/heart.png" alt=""><br><span style="opacity: 0; font-size: 30px; position: relative; top: -12px; text-align: center; width: 30px; display: inline-block;">&#9679</span></div>
                <div class="info"><img src="<?=$carpeta?>/info.png" alt=""></div>
                @if(Auth::check())<div class="plus"><img src="<?=$carpeta?>/plus.png" alt=""></div>@endif
            </nav>
        </header>

        <!-- CONTENEDOR DEL MAPA -->

        <section class="mapa">
        </section>

        <!-- ---------------------------------------- BUSQUEDA -------------------------------------------- -->

        <form action="/search" id="formBuscar" method="POST">
        @csrf
            <input class="buscar" type="text" name="buscar" id="buscar" autocomplete="off" placeholder="<?=$question?>">
            <nav class="filtros">
                <label for="enviarBusqueda"><img src="<?=$carpeta?>/buscar.png" id="lupa" alt=""></label>
                <input oninput = "filter()" autocomplete="off"  name="personas" type="text" id="cantidadDePersonas"> <img src="<?=$carpeta?>/persona.png" alt=""> | MIN <input oninput = "filter()" autocomplete="off"  type="text" name="superficie" id="cantidadDeM2"> m<sup>2</sup> | MAX <input oninput = "filter()" autocomplete="off"  type="text" name="precio" id="quePrecio"> <?=$symbol?>
                <input type="submit" style="display:none;">
                <input onclick = "searchAgain()" type="" id="enviarBusqueda" style="display:none;">
            </nav>
        </form>

        <footer>
          <?=$presse?>
        </footer>

        <!-- ------------------------------ RESULTADOS (SE GENERAN EN JS) ---------------------------------- -->

        <section class="seccionPrincipalArticulos">
                      
        </section>

        <!-- ------------- MIS RESEVRAS, MIS FAVORITOS Y MIS PROPIEDADES (SE GENERAN EN JS) ---------------- -->

        <section class="panel panelFavoritos">
            <h2><?=$reserves?></h2>
            <div id="myBookings"></div>
            <h2><?=$favoris?></h2>
            <form action="/addFavorites" method="POST" style="display:none;" id="addFavorites">
            @csrf
                <input type="submit" value="Guardar nuevo(s) favorito(s)" class="aceptar">
            </form>
            <div id="myFavorites"></div>
            <h2><?=$proprietes?></h2>
            <div id="myProperties"></div>
        </section>

        <!-- ---------------------------------- LOGIN Y CONFUGURACIÓN -------------------------------------- -->

        <section class="panel panelLogin" id="panelLogin">

            @if (!Auth::check())

            <!-- SIGN IN -->

            <h2><?=$enregistrer?></h2>
            <img class="social" src="<?=$carpeta?>/loginFacebook.png" alt="Facebook">
            <img class="social" src="<?=$carpeta?>/loginTwitter.png" alt="Twitter">
            <img class="social" src="<?=$carpeta?>/loginLinkedin.png" alt="LinkedIn">

            <form class="formRegistro" action="{{ route('register') }}" method="post">
            @csrf
                <input id="register_mail" name="email" type="email" placeholder= "E-mail" autocomplete="off"  value="{{ old('email') }}">
                <input id="register_name" name="name" type="text" placeholder= "<?=$utilisateur?>" autocomplete="off"  value="{{ old('name') }}">
                <input id="register_pass" name="password" type="password" placeholder="<?=$mdp?>" autocomplete="off"  value="">
                <input id="register_conf_pass" name="password_confirmation" type="password" placeholder="<?=$confirmerMdp?>" autocomplete="off"  value="">
                <span class="alertaContrasena"></span>
                <input type="submit" name="registrarse" value="<?=$registrer?>" class="aceptar">
            </form>

            <!-- LOGIN -->
            
            <h5><?=$dejaRegistre?></h5>
            <h2><?=$connexion?></h2>
            <form class="formLogin" action="{{ route('login') }}" method="POST">
            @csrf
                <input id="login_mail" name="email" type="email" placeholder= "E-mail" autocomplete="off"  value="{{ old('email') }}">
                <input id="login_pass" name="password" type="password" autocomplete="off"  placeholder="<?=$mdp?>">
                <span class="alertaContrasena"></span>
                <label for="remember" class="checkbox" id="rememberMe">
                <?=$rappeler?>
                </label>
                <input type="checkbox" class="checkbox subir" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                <input name="login" type="submit" value="<?=$connecter?>" class="aceptar botonLogin">
            </form>
            <p class="olvide"><?=$oubli?></p>
            <form action="mail.php" method="POST" class="formLogin">
                <input name="mailOlvide" type="email" placeholder="E-mail" class="emailOlvide">
            </form>

            @elseif (Auth::check())

            
            <h2>{{Auth::user()->name}}</h2>

            <!-- FOTO -->

            <form action="/uploadAvatar" method="POST" enctype="multipart/form-data">
            @csrf
                <label for="foto" class="file formLogin"><?=$choisirPhoto?></label>
                <input type="file" id="foto" class="file" name="avatar">
                <label for="subir" class="file formLogin" id="sendAvatar"><?=$envoyer?></label>
                <input type="submit" id="subir" class="subir" value="Subir" class="aceptar">
            </form>

            <!-- MONEDA -->

            <form action="/changeCurrency" class="formLogin" id="formCurrency" method="POST">
            @csrf
            <label for="currency" class="formLogin"><?=$devise?></label>
                <select name="currency" id="currency" onchange='this.form.submit()'>
                    <option <?=$selectedARS?> value="ARS">ARS</option>
                    <option <?=$selectedEUR?> value="EUR">EUR</option>
                    <option <?=$selectedUSD?> value="USD">USD</option>
                </select>
            </form>

            <!-- IDIOMA -->

            <form action="/changeLanguage" class="formLogin" id="formLanguage" method="POST">
            @csrf
                <label for="language" class="formLogin"><?=$langue?></label>
                <select name="language" id="language" onchange='this.form.submit()'>
                    <option <?=$selectedEs?> value="es">Español (Argentina)</option>
                    <option <?=$selectedFr?> value="fr">Français (France)</option>
                    <option <?=$selectedEn?> value="en">English (US)</option>
                </select>
            </form>

            <!-- PAIS -->

            <form action="/changeCountry" class="formLogin" id="formCountry" method="POST">
            @csrf
                <label for="country" class="formLogin"><?=$pays?></label>
                <div id="country"></div>
            </form>

            <!-- TEMA -->

            <form action="/" class="formLogin" id="formTheme" method="POST">
            @csrf
                <label for="theme" class="formLogin"><?=$styleVisuel?></label>
                <select name="theme" id="theme" onchange='this.form.submit()'>
                    <option <?=$selectedThemeClaro?> value="claro"><?=$clair?></option>
                    <option <?=$selectedThemeOscuro?> value="oscuro"><?=$fonce?></option>
                </select>
            </form>

            <p class="aceptar activarMapa" style="display: none;">Activar mapa</p>

            <!-- LOGOUT -->

            <form action="{{ route('logout') }}" class="formLogin" method="POST">
            @csrf
                <input type="submit" name="desconectarse" value="<?=$deconexion?>" class="aceptar">
            </form>
        
            @endif

        </section>

        <!-- ---------------------------------------- INFO -------------------------------------------- -->

        <section class="panel panelInfo" id="panelInfo">
           <h2 class="aceptar preguntasFrecuentesH2"><?=$questionsFrequentes?></h2>
           <ul class="preguntasFrecuentes" type="bullet">
             <li class="pregunta"><?=$question1?><p class="respuesta"><?=$reponse1?></p></li> 
             <li class="pregunta"><?=$question2?><p class="respuesta"><?=$reponse2?></p></li> 
             <li class="pregunta"><?=$question3?><p class="respuesta"><?=$reponse3?></p></li>
             <li class="pregunta"><?=$question4?><p class="respuesta"><?=$reponse4?></p></li> 
             <li class="pregunta"><?=$question5?><p class="respuesta"><?=$reponse5?></p></li> 
           </ul>
           <h2 class="aceptar escribirComentarioH2"><?=$ecrireCommentaire?></h2>
           <form class="formInfo escribirComentario" action="" method="POST">
            
           @if(!Auth::check())
           <h5>
                <span class="conectarse"><?=$connexion?></span>
            </h5>
            @endif

            <textarea name="comentario" rows="5" placeholder="<?=$ecrireCommentaire2?>" id="areaComentario"></textarea>
            <input type="submit" value="<?=$envoyer?>" class="aceptar" id="aceptarComentario">
           </form>
           <h2 class="aceptar forumH2"><?=$commentaires?></h2>
        </section>

        <!-- ---------------------------------- AGREGAR PROPIEDAD -------------------------------------- -->

        <section class="agregarDepto" id="agregarDepto">
            <section class="formularioAgregar">
                <img src="<?=$carpeta?>/cruz.png" class="cerrar" alt="">
                <h1>AGREGAR PROPIEDAD</h1>
                <form action="/addProperty" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="text" name="title" placeholder="Escribí un título">

                    <select name="location">
                        <option value="" selected disabled hidden>Elegí la ubicación</option>
                        <option value="buenos aires">Buenos Aires</option>
                        <option value="tokio">Tokio</option>
                        <option value="paris">Paris</option>
                        <option value="rio de janeiro">Rio de Janeiro</option>
                        <option value="barcelona">Barcelona</option>
                        <option value="sucre">Sucre</option>
                        <option value="berlin">Berlin</option>
                    </select>

                    <!-- <label for="foto2" class="file formLogin"></label>
                    <input type="file" id="foto2" class="file" name="main_picture"> -->
                    
                    <label for="foto2" class="file formLogin"><?=$choisirPhoto2?></label>
                    <input type="file" id="foto2" class="file" name="pictures[]" multiple="multiple">
                    
                    <input type="text" name="area" placeholder="Cuántos m2?">
                    <input type="text" name="beds" placeholder="Cuántas camas?">
                    <input type="text" name="price" placeholder="Cuánto por mes?">
                    <input type="submit" value="Agregar" class="aceptar">
                </form>
            </section>
        </section>


        <!------------------------------------RESERVAR PROPIEDAD--------------------------------------->

        <section class="agregarDepto" id="bookPropForm">
            <section class="formularioAgregar">
                <img src="<?=$carpeta?>/cruz.png" class="cerrar" alt="">
                <h1 style="margin-left: 10px;"><?=$reserverProp?></h1>
                <form action="/bookProperty" method="POST">
                @csrf 
                    <label for="dateIn" class="file formLogin" style="display: inline-block; border: none; width: 298px; margin-bottom: 0; text-indent: 10px;"><?=$depuis?></label>
                    <label for="dateOut" class="file formLogin" style="display: inline-block; border: none; width: 298px; margin-bottom: 0; text-indent: 10px;"><?=$jusqua?></label>
                    <input style="display: inline-block; color:transparent; height: 0px;" type="text" name="dateIn" id="dateIn" readonly>
                    <input style="display: inline-block; color:transparent; height: 0px;" type="text" name="dateOut" id="dateOut" readonly>
                    <p id='firstDate' style='margin-left: 10px; margin-top: 230px; margin-bottom: 10px; opacity: 0; font-size: 20px; font-weight: bolder'>PRECIO</p>
                    <input type="submit" value="<?=$reserver?>" class="aceptar" style="margin-left: 10px;">
                </form>
            </section>
        </section>
        <script src="/calendar/dist/datepicker.min.js"></script> 
    </body>
</html>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script>
    var users = <?php echo json_encode($users) ?>;
    var properties = <?php echo json_encode($properties) ?>;
    var myFavorites = <?php echo json_encode($myFavorites) ?>;
    var myBookings = <?php echo json_encode($myBookings) ?>;
    var propertyPictures = <?php echo json_encode($pictures) ?>;
    var country = "<?php echo $country; ?>";
    var language = "<?php echo $language ?>";
    var multiplier = <?php echo $multiplier ?>;
    var symbol = "<?php echo $symbol ?>";
    var userID = <?php echo $userID ?>;
    console.log("Usuarios:");
    console.log(users);
    console.log("Propiedades:");
    console.log(properties);
    console.log("Favoritos:");
    console.log(myFavorites);
    console.log("Reservas:");
    console.log(myBookings);
    console.log("Fotos de propiedades:");
    console.log(propertyPictures);
    console.log("País:");
    console.log(country);
    console.log("Idioma:");
    console.log(language);
    console.log("Multiplicador de precio:");
    console.log(multiplier);
    console.log("Moneda:");
    console.log(symbol);
    console.log("ID de usuario:");
    console.log(userID);
</script>

<script src="/js/app.js"></script>
