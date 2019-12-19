var clic = 0;
var show_resultados = false;

if(language == "es") {
    var personnes = "persona(s)" ;
    var jour = "día";
    var erreur_filtre = "Estás siendo demasiado exigente...";
    var erreur_filtre2 = "No hay resultados que filtrar...";
    var publie = "Aún no publicaste propiedades";
    var favoris = "Aún no agregaste favoritos";
    var reserver = "RESERVAR";
    var a_partir_du = "a partir del";
    var pour = "por";

    var dimanche = "Dom";
    var lundi = "Lun";
    var mardi = "Mar";
    var mercredi = "Mie";
    var jeudi = "Jue";
    var vendredi = "Vie";
    var samedi = "Sáb";

    var janvier = "Enero";
    var fevrier = "Febrero";
    var mars = "Marzo";
    var avril = "Abril";
    var mai = "Mayo";
    var juin = "Junio";
    var juillet = "Julio";
    var aout = "Agosto";
    var septembre = "Septiembre";
    var octobre = "Octubre";
    var novembre = "Noviembre";
    var decembre = "Diciembre";

    var mail_vide = "Ingresa un mail";
    var pseudo_vide = "Ingresa un nombre";
    var mdp_vide = "Ingresa una contraseña";
    var conf_mdp_vide = "Confirma la contraseña";
    var mail_meme = "Este mail ya está registrado";
    var pseudo_meme = "Este nombre ya es usado";
    var mail_incorrect = "Este mail no está registrado";
    var mdp_incorrect = "La contraseña es incorrecta";

} else if (language == "fr") {
    var personnes = "personne(s)" ;
    var jour = "jour";
    var erreur_filtre = "Il semblerait que vous êtes beaucoup trop exigeant...";
    var erreur_filtre2 = "Il n'y a pas de résultats à filtrer...";
    var publie = "Vous n'avez pas encore publié de propriétés";
    var favoris = "Vous n'avez pas encore ajouté de favoris";
    var reserver = "RÉSERVER";
    var a_partir_du = "à partir du";
    var pour = "pour";

    var dimanche = "Dim";
    var lundi = "Lun";
    var mardi = "Mar";
    var mercredi = "Mer";
    var jeudi = "Jeu";
    var vendredi = "Ven";
    var samedi = "Sam";

    var janvier = "Janvier";
    var fevrier = "Février";
    var mars = "Mars";
    var avril = "Avril";
    var mai = "Mai";
    var juin = "Juin";
    var juillet = "Juillet";
    var aout = "Août";
    var septembre = "Septembre";
    var octobre = "Octobre";
    var novembre = "Novembre";
    var decembre = "Décembre";

    var mail_vide = "Entrez un mail";
    var pseudo_vide = "Entrez un nom";
    var mdp_vide = "Entrez un mot-de-passe";
    var conf_mdp_vide = "Confirmez le mot-de-passe";
    var mail_meme = "Cette adresse mail est déjà enregistrée";
    var pseudo_meme = "Ce nom est dékà pris";
    var mail_incorrect = "Cette adresse mail n'est pas enregistrée";
    var mdp_incorrect = "Le mot-de-passe est incorrect";

} else if (language == "en") {
    var personnes = "people" ;
    var jour = "day";
    var erreur_filtre = "You are being overly stringent...";
    var erreur_filtre2 = "There are no results to filter...";
    var publie = "You have not published any property yet";
    var favoris = "You have not added any favorites yet";
    var reserver = "BOOK";
    var a_partir_du = "starting the";
    var pour = "for";

    var dimanche = "Sun";
    var lundi = "Mon";
    var mardi = "Tue";
    var mercredi = "Wed";
    var jeudi = "Thu";
    var vendredi = "Fri";
    var samedi = "Sat";

    var janvier = "January";
    var fevrier = "February";
    var mars = "March";
    var avril = "April";
    var mai = "May";
    var juin = "June";
    var juillet = "July";
    var aout = "August";
    var septembre = "September";
    var octobre = "October";
    var novembre = "November";
    var decembre = "December";

    var mail_vide = "Enter an e-mail adress";
    var pseudo_vide = "Enter a name";
    var mdp_vide = "Enter a password";
    var conf_mdp_vide = "Confirm the password";
    var mail_meme = "This mail adress is already registered";
    var pseudo_meme = "This name is already taken";
    var mail_incorrect = "This mail adress has not been registered yet";
    var mdp_incorrect = "The password is incorrect";
}

$(document).ready(function() {
    countrySelect();
});

const dateIn = datepicker("#dateIn", { 
    id: 1, 
    alwaysShow: true, 
    customDays: [dimanche, lundi, mardi, mercredi, jeudi, vendredi, samedi], 
    customMonths: [janvier, fevrier, mars, avril, mai, juin, juillet, aout, septembre, octobre, novembre, decembre],
    disableYearOverlay: true
});
const dateOut = datepicker("#dateOut", { 
    id: 1, 
    alwaysShow: true, 
    customDays: [dimanche, lundi, mardi, mercredi, jeudi, vendredi, samedi], 
    customMonths: [janvier, fevrier, mars, avril, mai, juin, juillet, aout, septembre, octobre, novembre, decembre],
    disableYearOverlay: true
});

$(".activarMapa").click(function(){
    $(".mapa").css("background", "none");
    $(".mapa").load("/map");
});

$(document).ready(function(){
    $('.articulosPrincipales').click(function(){
        var iteration=$(this).data('iteration')||1
        switch ( iteration) {
            case 1:
                $(this).animate({height: '500px'});
                $(".infoPrevia", this).animate({opacity: '0'});
                $(".infoCompleta", this).animate({opacity: '1'});
                $(".favorito", this).css("opacity", "1");
                $(".flecha", this).css("display", "inline-block");
                break;

            case 2:
                $(this).animate({height: '200px'});
                $(".infoPrevia", this).animate({opacity: '1'});
                $(".infoCompleta", this).animate({opacity: '0'});
                $(".favorito", this).css("opacity", "0");
                $(".flecha", this).css("display", "none");
                break;
        }
        iteration++;
        if (iteration>2) iteration=1
        $(this).data('iteration',iteration)
    })
});

$(function(){
    $(".pestana").click(function(){
        var iteration=$(this).data("iteration")||1;
        switch(iteration) {
            case 1:
                $(".articulosPrincipales").animate({height:"0px"});
                $(".infoPrevia").animate({opacity: '1'});
                $(".infoCompleta").animate({opacity: '0'});
                $(".favorito").css("opacity", "0");
                $(".flecha").css("display", "none");
                break;

            case 2:
                $('.articulosPrincipales').animate({height:"200px"});
                break;
        }
        iteration++;
        if(iteration>2) iteration=1
        $(this).data("iteration",iteration)
    })
});
$(".plus").click(function(){
    $("#agregarDepto").animate({opacity: '1'},500);
    $("#agregarDepto").css("z-index", "100000");
});
$(".cerrar").click(function(){
    $("#agregarDepto").animate({opacity: '0'},500);
    $("#agregarDepto").css("z-index", "-10");
    $("#bookPropForm").animate({opacity: '0'},500);
    $("#bookPropForm").css("z-index", "-10");
});
$(".favoritos").click(function(){
    $(".panelFavoritos").animate({right: '0'},500);
    clic = clic + 100;
    $(".panelFavoritos").css("z-index",clic);
    $(".retorno").stop().delay(300).animate({left:"73%"},200);
});
$(".fotoUsuario").click(function(){
    $(".panelLogin").animate({right: '0'},500);
    clic = clic + 100;
    $(".panelLogin").css("z-index",clic);
    $(".retorno").stop().delay(300).animate({left:"73%"},200);
});
$(".info").click(function(){
    $(".panelInfo").animate({right: '0'},500);
    clic = clic + 100;
    $(".panelInfo").css("z-index",clic);
    $(".retorno").stop().delay(300).animate({left:"73%"},200);
});
$(".retorno").click(function(){
    if($(window).width()<700) {
        $(".retorno").animate({left:"100%"});
        $(".panelFavoritos").animate({right: '-100%'},500);
        $(".panelLogin").animate({right: '-100%'},500);
        $(".panelInfo").animate({right: '-100%'},500);
    } else {
        $(".retorno").animate({left:"100%"});
        $(".panelFavoritos").animate({right: '-30%'},500);
        $(".panelLogin").animate({right: '-30%'},500);
        $(".panelInfo").animate({right: '-30%'},500);
    }
});


$(function(){
    $("#rememberMe").click(function(){
        var iteration=$(this).data("iteration")||1;
        switch(iteration) {
            case 1:
                $(this).append(' <span>&#10003;</span>');
                break;

            case 2:
                $(this).children('span').remove();
                break;
        }
        iteration++;
        if(iteration>2) iteration=1
        $(this).data("iteration",iteration)
    })
});

var searchedProperties = {};

function searchAgain() {
    var alreadySearched = 1;
    $(".filtros").hide();
    $(".buscar").animate({width:"500px"},500);
    $(".buscar").focus();
    return alreadySearched;
};

$('#formBuscar').submit(function search(event){
    event.preventDefault();
    if($(".buscar").val() == "") {return;}
    $('.seccionPrincipalArticulos').show();
    $('.seccionPrincipalArticulos').children('h2').remove();
    $(".filtros").css("display","inline-block");
    $(".filtros").show();
    $(".buscar").animate({width:"50px"},500);
    $("footer").animate({left:"60%"},1000);
    $busqueda = $('#buscar').val().toLowerCase(); 
    var sameLocationProperties = [];
    
    properties.forEach(function(property){
        if(property.location == $busqueda) {
            $('.seccionPrincipalArticulos').prepend('<div id="'+property.id+'" class="articleContainer" style="margin: 0; padding: 0; border: noneM background-color: rgba(125,125,125,0.8);"><article id="'+property.id+'" data-picture="'+property.main_picture+'" class="articulosPrincipales '+multiplier*property.price+'price '+property.area+'area '+property.beds+'beds '+property.location.split(' ').join('_')+'" style="background-image: url(\'/storage/'+property.main_picture+'\'); height: 200px; border:none;"><img id="favorito" class="favorito" src="/img/light_mode/heart2.png" alt="" style="opacity: 0"><img id="flechaIzq" class="flecha flechaIzq" src="/img/light_mode/arrow2.png" alt="" style="display: none"><img id="flechaDer" class="flecha flechaDer" src="/img/light_mode/arrow2.png" alt="" style="display: none"><p class="infoPrevia" style="opacity: 1">'+property.title+'</p><p class="infoCompleta" style="opacity: 0">'+property.area+' m<sup>2</sup> | '+property.beds+' '+personnes+' | <strong>'+Math.round(multiplier*property.price)+' '+symbol+'/'+jour+'</strong><span id="bookButton">'+reserver+'</span></p></article></div>')
            sameLocationProperties.push(property);
        }
    });
    searchedProperties[$busqueda] = sameLocationProperties;
    $('.seccionPrincipalArticulos').prepend('<div class="pestana" id="'+$busqueda+'">'+$('#buscar').val()+'<span class="closeTab"> &#215;</span></div>');

    $(".buscar").removeAttr('placeholder');
    $(".buscar").val("");
    $(".buscar").blur()
});

var typingTimer; 

function filter() {
    var beds = $("#cantidadDePersonas").val() || "N";
    var area = $("#cantidadDeM2").val() || 0;
    var price = $("#quePrecio").val() || 999999999;

    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, 500);

    function doneTyping () {
        $('.seccionPrincipalArticulos').empty();

        var e = 0;
        var k = 0;

        $.each(searchedProperties, function(loc, sameLocationProperties) {
            var i = 0;
            k++;
            sameLocationProperties.forEach(function(filteredProperty) {
                if(filteredProperty.area >= area && filteredProperty.price <= price && (beds == "N" || beds == filteredProperty.beds)) {
                    $('.seccionPrincipalArticulos').prepend('<div id="'+filteredProperty.id+'" class="articleContainer" style="margin: 0; padding: 0; border: none; background-color: rgba(125,125,125,0.8);"><article id="'+filteredProperty.id+'" data-picture="'+filteredProperty.main_picture+'" class="articulosPrincipales '+multiplier*filteredProperty.price+'price '+filteredProperty.area+'area '+filteredProperty.beds+'beds '+filteredProperty.location.split(' ').join('_')+'" style="background-image: url(\'/storage/'+filteredProperty.main_picture+'\'); height: 200px; border: none;"><img id="favorito" class="favorito" src="/img/light_mode/heart2.png" alt="" style="opacity: 0"><img id="flechaIzq" class="flecha flechaIzq" src="/img/light_mode/arrow2.png" alt="" style="display: none"><img id="flechaDer" class="flecha flechaDer" src="/img/light_mode/arrow2.png" alt="" style="display: none"><p class="infoPrevia" style="opacity: 1">'+filteredProperty.title+'</p><p class="infoCompleta" style="opacity: 0">'+filteredProperty.area+' m<sup>2</sup> | '+filteredProperty.beds+' '+personnes+' | <strong>'+Math.round(multiplier*filteredProperty.price)+' '+symbol+'/'+jour+'</strong><span id="bookButton">'+reserver+'</span></p></article></div>')
                    i++;
                    e++;
                }
            });

            var location = sameLocationProperties[0].location;

            if(i>0) {
                $('.seccionPrincipalArticulos').prepend('<div class="pestana" id="'+location+'">'+location+'<span id="'+location+'" class="closeTab"> &#215;</span></div>');
            }
        });

        if(e==0 && k>0) {
            $('.seccionPrincipalArticulos').prepend("<h2 style='margin-left: 20px;'>"+erreur_filtre+"</h2>");
        } else if(e==0 && k==0) {
            $('.seccionPrincipalArticulos').prepend("<h2 style='margin-left: 20px;'>"+erreur_filtre2+"</h2>");
        } else {
            $('.seccionPrincipalArticulos').children('h2').remove();
        }
    }
}

$(document).on("click", ".pestana", function(event) {
    var className = $(this).attr('id').split(' ').join('_');
    var iteration=$(this).data("iteration")||1;
    var target = $(event.target);

    if(target.attr("class") == "closeTab") {
        $(".articulosPrincipales."+className).animate({height:"0px"});
        $(".articulosPrincipales."+className).css("margin-bottom", "0");
        $(".infoPrevia."+className).animate({opacity: '1'});
        $(".infoCompleta."+className).animate({opacity: '0'});
        $(".favorito."+className).css("opacity", "0");
        $(".flecha."+className).css("display", "none");
        target.parent().delay(300).fadeOut('fast');

        delete searchedProperties[className];
        
        return;
    }
        switch(iteration) {
            case 1:
                $(".articulosPrincipales."+className).animate({height:"0px"});
                $(".articulosPrincipales."+className).css("margin-bottom", "0");
                $(".infoPrevia."+className).animate({opacity: '1'});
                $(".infoCompleta."+className).animate({opacity: '0'});
                $(".favorito."+className).css("opacity", "0");
                $(".flecha."+className).css("display", "none");
                break;

            case 2:
                $(".articulosPrincipales."+className).animate({height:"200px"});
                $(".articulosPrincipales."+className).css("margin-bottom", "3px");
                break;
        }
        iteration++;
        if(iteration>2) iteration=1
        $(this).data("iteration",iteration)
});

var favoritesAmount = 0;
var pictureIndex = 0;

$(document).on("click",".articulosPrincipales", function (event) {

    var target = $(event.target);
    var iteration2=$(this).children(".favorito").data('iteration')||1;
    var thisID = $(this).attr('id');
    var pictures = [];
    pictures.push($(this).attr('data-picture'));

    propertyPictures.forEach(function(picture) {
        if(picture.property_id == thisID) {
            pictures.push(picture.img);
        }
    });


    if(target.attr("id") == "bookButton") {
        $("#bookPropForm").animate({opacity: '1'},500);
        $("#bookPropForm").css("z-index", "100000");
        $("#bookPropForm form").append("<input name='id' value='"+thisID+"' style='display:none'></input>");

        properties.forEach(function(property) {
            if(property.id == thisID) {
                booked_property = property;
            }
        });

        return booked_property;
    }

    if(target.attr("id") == "favorito") {
        var iteration2=$(this).children(".favorito").data("iteration")||1;
        switch(iteration2) {
            case 1:
                $(this).children(".favorito").attr("src", "/img/light_mode/heart3.png");
                $(".favoritos").children("span").css("opacity", "1");
                $(".favoritos").children("span").animate({fontSize: "16px"});
                $("#addFavorites").show();
                $background = $(this).css('background-image');

                $("#addFavorites").prepend("<input id='"+thisID+"' type='text' name='id[]' value='"+thisID+"' style='display:none'></input>");
                $("#myFavorites").prepend("<article id='"+thisID+"' style='background: white; opacity: 0.5;' class='articulosFavoritos favOpac'><img class='flecha flechaIzq' src='/img/light_mode/arrow2.png' alt=''><img class='flecha flechaDer' src='/img/light_mode/arrow2.png' alt=''><p class='infoFavoritos'>"+""+"</p></article>");
                favoritesAmount++;
                break;

            case 2:
                $(this).children(".favorito").attr("src", "/img/light_mode/heart2.png");

                $("#addFavorites").children("input#"+thisID).remove();
                $("#myFavorites").children("article#"+thisID).remove();
                
                favoritesAmount = favoritesAmount - 1;
                if(favoritesAmount == 0){
                    $("#addFavorites").hide();
                    $(".favoritos").children("span").css("opacity", "0");
                }
                break;
        }
        iteration2++;
        if(iteration2>2) iteration2=1
        $(this).children(".favorito").data("iteration",iteration2)
        
        return;
    }

    if(target.attr("id") == "flechaIzq") {
        pictureIndex--;
        if(pictureIndex < 0) {pictureIndex = pictures.length - 1;}

        $(this).fadeTo(100, 0.75, function(){
            $(this).css("background-image","url(/storage/"+pictures[pictureIndex]+")");
        }).fadeTo(100, 1);

        return;
    }
    if(target.attr("id") == "flechaDer") {
        pictureIndex++;
        if(pictureIndex > pictures.length - 1) {pictureIndex = 0;}

        $(this).fadeTo(100, 0.75, function(){
            $(this).css("background-image","url(/storage/"+pictures[pictureIndex]+")");
        }).fadeTo(100, 1);

        return;
    }

    var iteration=$(this).data('iteration')||1
        switch ( iteration) {
            case 1:
                $(this).animate({height: '500px'});
                $(".infoPrevia", this).animate({opacity: '0'});
                $(".infoCompleta", this).animate({opacity: '1'});
                $(".favorito", this).css("opacity", "1");
                $(".flecha", this).css("display", "inline-block");
                break;

            case 2:
                $(this).animate({height: '200px'});
                $(".infoPrevia", this).animate({opacity: '1'});
                $(".infoCompleta", this).animate({opacity: '0'});
                $(".favorito", this).css("opacity", "0");
                $(".flecha", this).css("display", "none");
                break;
        }
        iteration++;
        if (iteration>2) iteration=1
        $(this).data('iteration',iteration)
});

var myPropertiesIndex = 0;
var myFavoritesIndex = 0;

properties.forEach(function(property) {
    if(property.owner == userID) {
        $("#myProperties").prepend('<article class="articulosFavoritos favOpac" style="background-image:url(\'/storage/'+property.main_picture+'\');"><img class="flecha flechaIzq" src="/img/light_mode/arrow2.png" alt=""><img class="flecha flechaDer" src="/img/light_mode/arrow2.png" alt=""><p class="infoFavoritos">'+property.title+'</p></article>');
        myPropertiesIndex++;
    }
    myFavorites.forEach(function(myFavorite) {
        if(myFavorite.property_id == property.id) {
            $("#myFavorites").prepend('<article class="articulosFavoritos favOpac" style="background-image:url(\'/storage/'+property.main_picture+'\');"><img class="flecha flechaIzq" src="/img/light_mode/arrow2.png" alt=""><img class="flecha flechaDer" src="/img/light_mode/arrow2.png" alt=""><p class="infoFavoritos">'+property.title+' <br><strong>'+Math.round(multiplier*property.price)+' '+symbol+'/'+jour+'</strong></p></article>');
            myFavoritesIndex++;
        }
    });
    myBookings.forEach(function(myBooking) {
        if(myBooking.property_id == property.id) {
            var days = Math.round((myBooking.date_out-myBooking.date_in)/60/60/24);
            var date = new Date(myBooking.date_in*1000).toLocaleDateString();
            $("#myBookings").prepend('<article class="articulosFavoritos favOpac" style="background-image:url(\'/storage/'+property.main_picture+'\');"><img class="flecha flechaIzq" src="/img/light_mode/arrow2.png" alt=""><img class="flecha flechaDer" src="/img/light_mode/arrow2.png" alt=""><p class="infoFavoritos">'+property.title+' <br><strong>'+Math.round(multiplier*myBooking.price)+' '+symbol+'</strong><br>'+pour+' '+days+' '+jour+'s <i style="color: grey;">'+a_partir_du+' '+date+'</i></p></article>');
            myFavoritesIndex++;
        }
    })
    
});
if (myPropertiesIndex == 0) {$("#myProperties").prepend(publie)}
if (myFavoritesIndex == 0) {$("#myFavorites").prepend(favoris)}

function cuadrado (){
    var width = $('.articulosFavoritos').outerWidth();
    $('.articulosFavoritos').css('height', width);
}

$(document).ready(function(){ cuadrado(); });

$(window).resize(function(){ cuadrado(); });

$(".pregunta").click(function(){
    $(".respuesta",this).css("display","block");
    $(".respuesta",this).animate({opacity:"1"});
});
$(".olvide").click(function(){
    $(".olvide").css("display","none");
    $(".olvide").animate({opacity:"0"});
    $(".emailOlvide").css("display","block");
    $(".emailOlvide").animate({opacity:"1"});
});
$(".conectarse").click(function(){
    $(".panelLogin").animate({right: '0'},500);
    clic = clic + 100;
    $(".panelLogin").css("z-index",clic);
});

$("#theme").change(function(){
    $("formTheme").submit();
});

var width = $('.articulosFavoritos').outerWidth();
$(function(){
    $('.articulosFavoritos').click(function(){
        var iteration=$(this).data('iteration')||1
        switch ( iteration) {
            case 1:
                $(this).animate({width: "96%", height: 3*width});

                $(this).animate({
                    borderTopLeftRadius: 0, 
                    borderTopRightRadius: 0, 
                    borderBottomLeftRadius: 0, 
                    borderBottomRightRadius: 0}, { duration: 500, queue: false });
                
                $(".flecha", this).css("display", "inline-block");
                $("p", this).css("display", "block");
                $("p", this).animate({opacity: 1});
                $(this).removeClass('favOpac');
                break;

            case 2:
                $(this).animate({width: "30%", height: width});

                $(this).animate({
                    borderTopLeftRadius: '50%', 
                    borderTopRightRadius: '50%', 
                    borderBottomLeftRadius: '50%', 
                    borderBottomRightRadius: '50%'}, { duration: 500, queue: false });
                
                $(".flecha", this).css("display", "none");
                $("p", this).css("display", "none");
                $("p", this).delay(500).animate({opacity: 0});
                $(this).addClass('favOpac');
                break;
        }
        iteration++;
        if (iteration>2) iteration=1
        $(this).data('iteration',iteration)
    })
});
        
$(function(){
    $(".preguntasFrecuentesH2").click(function(){
        var iteration=$(this).data('iteration')||1
        switch ( iteration) {
            case 1:
                $(".preguntasFrecuentes").css("display","none");
                break;

            case 2:
                $(".preguntasFrecuentes").css("display","block");
                break;
        }
        iteration++;
        if (iteration>2) iteration=1
        $(this).data('iteration',iteration)
    })
});
$(function(){
    $(".escribirComentarioH2").click(function(){
        var iteration=$(this).data('iteration')||1
        switch ( iteration) {
            case 1:
                $(".escribirComentario").css("display","none");
                break;

            case 2:
                $(".escribirComentario").css("display","block");
                break;
        }
        iteration++;
        if (iteration>2) iteration=1
        $(this).data('iteration',iteration)
    })
});
$(function(){
    $(".forumH2").click(function(){
        var iteration=$(this).data('iteration')||1
        switch ( iteration) {
            case 1:
                $(".forum").css("display","none");
                break;

            case 2:
                $(".forum").css("display","block");
                break;
        }
        iteration++;
        if (iteration>2) iteration=1
        $(this).data('iteration',iteration)
    })
});

$(document).on("click",".qs-squares", function () {
    var date1 = Date.parse(dateIn.dateSelected)/1000/60/60/24;
    var date2 = Date.parse(dateOut.dateSelected)/1000/60/60/24;
    var range = date2 - date1;
    if(!isNaN(range)) {
        $('#firstDate').css('opacity', 1);
        $('#firstDate').html(Math.round(booked_property.price*multiplier*range)+' '+symbol);
        $("#bookPropForm form").append("<input name='price' value='"+booked_property.price*range+"' style='display:none'></input>");
    }
});

$(document).on("submit",".formRegistro", function (event) {
    var usermail = $('#register_mail').val().toLowerCase();
    var username = $('#register_name').val().toLowerCase();

    if(usermail == "") {
        event.preventDefault();
        $('body').append('<style>#register_mail::placeholder{color:gold;opacity:1;}</style>');
        $('#register_mail').attr('placeholder', mail_vide);
    }
    if(username == "") {
        event.preventDefault();
        $('body').append('<style>#register_name::placeholder{color:gold;opacity:1;}</style>');
        $('#register_name').attr('placeholder', pseudo_vide);
    }
    if($('#register_pass').val() == "") {
        event.preventDefault();
        $('body').append('<style>#register_pass::placeholder{color:gold;opacity:1;}</style>');
        $('#register_pass').attr('placeholder', mdp_vide);
    }
    if($('#register_conf_pass').val() == "") {
        event.preventDefault();
        $('body').append('<style>#register_conf_pass::placeholder{color:gold;opacity:1;}</style>');
        $('#register_conf_pass').attr('placeholder', conf_mdp_vide);
    }

    users.forEach(function(user) {
        if(usermail == user.email) {
            event.preventDefault();
            $('#register_mail').val('');
            $('body').append('<style>#register_mail::placeholder{color:gold;opacity:1;}</style>');
            $('#register_mail').attr('placeholder', mail_meme);
        }
        if(username == user.name) {
            event.preventDefault();
            $('#register_name').val('');
            $('body').append('<style>#register_name::placeholder{color:gold;opacity:1;}</style>');
            $('#register_name').attr('placeholder', pseudo_meme);
        }
    });
});

$(document).on("submit",".formLogin", function (event) {
    var mail_accepted = 0;
    var login_check = 0;
    var usermail = $('#login_mail').val().toLowerCase();

    if(usermail == "") {
        event.preventDefault();
        $('body').append('<style>#login_mail::placeholder{color:gold;opacity:1;}</style>');
        $('#login_mail').attr('placeholder', mail_vide);
    }
    if($('#login_pass').val() == "") {
        event.preventDefault();
        $('body').append('<style>#login_pass::placeholder{color:gold;opacity:1;}</style>');
        $('#login_pass').attr('placeholder', mdp_vide);
    }
    if(usermail != "" && $('#login_pass').val() != "") {
        users.forEach(function(user) {
            if(usermail == user.email) {
                mail_accepted++;
            }
        });

        if(mail_accepted == 1) {
            $(this).submit();
        } else {
            event.preventDefault();
                $('body').append('<style>#login_mail::placeholder{color:gold;opacity:1;}</style>');
                $('#login_mail').attr('placeholder', mail_incorrect);
                $('#login_mail').val('');
                $('#login_pass').val('');
        }
    }
});

function countrySelect() {
    fetch("https://restcountries.eu/rest/v2/all")
    .then(function(response){
      return response.json();
    })
    .then(function(data){
      //console.log(data);
      var completarHtml = '<select name="country" onchange="this.form.submit()">';

      for (var i = 0; i < data.length; i++){
            if(data[i].name.toLowerCase() == country) {
                completarHtml += '<option selected value="' + data[i].name + '">';
            } else {
            completarHtml += '<option value="' + data[i].name + '">';
            }
        
        completarHtml += data[i].name;
        completarHtml += '</option>';
      }

      completarHtml += '</select>';

      elDiv = document.querySelector('#country');

      elDiv.innerHTML = completarHtml;

    })
    .catch(function(error){
      console.log('Ocurrió un error: ' + error);
    });
}
    
