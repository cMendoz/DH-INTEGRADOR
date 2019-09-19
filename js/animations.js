        var clic = 0;
        $(function(){
            $('.articulosPrincipales').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(this).animate({height: '500px'});
                        $(".infoPrevia", this).animate({opacity: '0'});
                        $(".infoCompleta", this).animate({opacity: '1'});
                        $("img", this).animate({opacity: "1" });
                        break;

                    case 2:
                        $(this).animate({height: '200px'});
                        $(".infoPrevia", this).animate({opacity: '1'});
                        $(".infoCompleta", this).animate({opacity: '0'});
                        $("img", this).animate({opacity: "0" });
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration)
            })
        });
        $("#btn_favoritos").click(function(){
            window.location.replace("favoritos.html");
            $("#panelFavoritos").animate({right: '0'},500);
            clic = clic + 1000;
            $("#panelFavoritos").css("z-index",clic);
            $("#btn_retorno").stop().delay(300).animate({left:"72%"},200);
        });
        $("#btn_usuario").click(function(){
            window.location.replace("login-registro.html");
            $("#panelLogin").animate({right: '0'},500);
            clic = clic + 1000;
            $("#panelLogin").css("z-index",clic);
            $("#btn_retorno").stop().delay(300).animate({left:"72%"},200);
        });
        $("#btn_info").click(function(){
            window.location.replace("preguntas-frecuentes.html");
            $("#panelInfo").animate({right: '0'},500);
            clic = clic + 1000;
            $("#panelInfo").css("z-index",clic);
            $("#btn_retorno").stop().delay(300).animate({left:"72%"},200);
        });
        $("#btn_retorno").click(function(){
            window.location.replace("home.html");
            $("#btn_retorno").animate({left:"100%"});
            $("#panelFavoritos").animate({right: '-500'},500);
            $("#panelLogin").animate({right: '-500'},500);
            $("#panelInfo").animate({right: '-500'},500);
            $("#panelLogin").animate({right: '-500'},500);
        });

        var i = 1;
        $(".flechaIzq").click(function(e){
            e.stopPropagation();
            i--;
            if (i<1) i = 5;
            $(this).parent().css("background-image","url(img/dept"+i+".jpg)");
            return i;
        });
        $(".flechaDer").click(function(e){
            e.stopPropagation();
            i++;
            if (i>5) i = 1;
            $(this).parent().css("background-image","url(img/dept"+i+".jpg)");
            return i;
        });

        function cuadrado (){
            var width = $('.articulosFavoritos').outerWidth();
            $('.articulosFavoritos').css('height', width);
        }

        $(document).ready(function(){ cuadrado(); });

        $(window).resize(function(){ cuadrado(); });

        $('#formBuscar').submit(function(event){
            //event.preventDefault();
            $('.pestana').text($('#buscar').val());
            $('.seccionPrincipalArticulos').show();
            $(".filtros").css("display","inline-block");
            $(".filtros").show();
            $(".buscar").animate({width:"0px"},1000);
            $(".buscar").css("background","none");
            $("footer").animate({left:"60%"},1000);
        });
