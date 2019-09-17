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
            clic = clic + 1000;
            $(".panelFavoritos").css("z-index",clic);
            $(".retorno").stop().delay(300).animate({left:"72%"},200);
        });
        $(".usuario").click(function(){
            $(".panelLogin").animate({right: '0'},500);
            clic = clic + 1000;
            $(".panelLogin").css("z-index",clic);
            $(".retorno").stop().delay(300).animate({left:"72%"},200);
        });
        $(".info").click(function(){
            $(".panelInfo").animate({right: '0'},500);
            clic = clic + 1000;
            $(".panelInfo").css("z-index",clic);
            $(".retorno").stop().delay(300).animate({left:"72%"},200);
        });
        $(".retorno").click(function(){
            $(".retorno").animate({left:"100%"});
            $(".panelFavoritos").animate({right: '-500'},500);
            $(".panelLogin").animate({right: '-500'},500);
            $(".panelInfo").animate({right: '-500'},500);
        });
        var i = 1;
        $(".flechaIzq").click(function(e){
            e.stopPropagation();
            $(this).parent().css("background-image","url(img/dept"+i+".jpg)");
            i--;
            if (i<1) i = 5;
            return i;
        });
        $(".flechaDer").click(function(e){
            e.stopPropagation();
            $(this).parent().css("background-image","url(img/dept"+i+".jpg)");
            i++;
            if (i>5) i = 1;
            return i;
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