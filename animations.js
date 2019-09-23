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

        $(function(){
            $(".pestana").click(function(){
                var iteration=$(this).data("iteration")||1;
                switch(iteration) {
                    case 1:
                        $('.articulosPrincipales').animate({height:"0px"});
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
            $(".agregarDepto").animate({opacity: '1'},500);
            $(".agregarDepto").css("z-index", "100000");
        });
        $(".cerrar").click(function(){
            $(".agregarDepto").animate({opacity: '0'},500);
            $(".agregarDepto").css("z-index", "-10");
        });
        $(".favoritos").click(function(){
            $(".panelFavoritos").animate({right: '0'},500);
            clic = clic + 100;
            $(".panelFavoritos").css("z-index",clic);
            $(".retorno").stop().delay(300).animate({left:"73%"},200);
        });
        $(".usuario").click(function(){
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