        var clic = 0;
        $(function(){
            $('#articulosPrincipales').click(function(){
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
            $("#btn_retorno").animate({left:"100%"});
            $("#panelFavoritos").animate({right: '-500'},500);
            $("#panelLogin").animate({right: '-500'},500);
            $("#panelInfo").animate({right: '-500'},500);
        });
/*
        $(function(){
            $('.favoritos').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(".panelFavoritos").animate({right: '0'});
                        clic = clic + 1000;
                        $(".panelFavoritos").css("z-index",clic);
                        break;

                    case 2:
                    $(".panelFavoritos").animate({right: '-1000px'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration);
                return clic;
            })
        });
        $(function(){
            $('.usuario').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(".panelLogin").animate({right: '0'});
                        clic = clic + 1000;
                        $(".panelLogin").css("z-index",clic);
                        break;

                    case 2:
                    $(".panelLogin").animate({right: '-1000px'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration);
                return clic;
            })
        });
        $(function(){
            $('.info').click(function(){
                var iteration=$(this).data('iteration')||1
                switch ( iteration) {
                    case 1:
                        $(".panelInfo").animate({right: '0'});
                        clic = clic + 1000;
                        $(".panelInfo").css("z-index",clic);
                        break;

                    case 2:
                    $(".panelInfo").animate({right: '-1000px'});
                        break;
                }
                iteration++;
                if (iteration>2) iteration=1
                $(this).data('iteration',iteration);
                return clic;
            })
        });
*/
        $('#formBuscar').submit(function(event){
            event.preventDefault();
            $('.pestana').text($('#buscar').val());
            $('.seccionPrincipalArticulos').show();
            $(".filtros").css("display","inline-block");
            $(".filtros").show();
            $(".buscar").animate({width:"0px"},1000);
            $(".buscar").css("background","none");
            $("footer").animate({left:"60%"},1000);
        });
