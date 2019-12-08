         var clic = 0;
         var show_resultados = false;

        $(".activarMapa").click(function(){
            $(".mapa").css("background", "none");
            $(".mapa").load("mapa.php");
        });

        $(function(){
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
              if (show_resultados){
                event.preventDefault();
                $('.seccionPrincipalArticulos').animate({top:"800px", opacity:"0"}, 1000, function(){$('.seccionPrincipalArticulos').hide()});
                $(".filtros").fadeOut(1000);
                $(".buscar").animate({width:"270px"},1000);
                $("footer").animate({left:"2%"},1000);

                show_resultados = false;
              }
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
        var i = 1;
        $(".flechaIzq").click(function(e){
            e.stopPropagation();
            i--;
            if (i<1) i = 11;
            $(this).parent().css("background-image","url(img_deptos/dept"+i+".jpg)");
            return i;
        });
        $(".flechaDer").click(function(e){
            e.stopPropagation();
            i++;
            if (i>11) i = 1;
            $(this).parent().css("background-image","url(img_deptos/dept"+i+".jpg)");
            return i;
        });
/*
        $('#formBuscar').submit(function(event){

            event.preventDefault();

            var busqueda = $('#buscar').val();
            $.post( "/busqueda", { buscar: busqueda })
            .done(function( data ) {
              mostrarResultadosBusqueda(busqueda);
            });

        });
*/
        function mostrarResultadosBusqueda(busqueda){
          if (!show_resultados){

            if ($('#buscar').val() == '')
              $('#buscar').val(busqueda);

            $('#pestana-busqueda').text(busqueda);
            $('.seccionPrincipalArticulos').show();
            $('.seccionPrincipalArticulos').animate({top:"150px", opacity:"1"}, 1500);
            $(".filtros").fadeIn(1000);
            $(".buscar").animate({width:"0px"},1000);
            $(".buscar").css("background","none");
            $("footer").animate({left:"60%"},1000);
            $busqueda = $('#buscar').val();

            show_resultados = true;
          }
        }

        $('#buscar').click(function(){
          if (show_resultados){
            event.preventDefault();
            $('.seccionPrincipalArticulos').animate({top:"800px", opacity:"0"}, 1000, function(){$('.seccionPrincipalArticulos').hide()});
            $(".filtros").fadeOut(1000);
            $(".buscar").animate({width:"270px"},1000);
            $("footer").animate({left:"2%"},1000);

            show_resultados = false;
          }
        });

        function cuadrado (){
            var width = $('.articulosFavoritos').outerWidth();
            $('.articulosFavoritos').css('height', width);
        }

        $(document).ready(function(){ cuadrado(); });

        $(window).resize(function(){ cuadrado(); });

        $(".pregunta").click(function(){
          if($(".respuesta",this).css("display") == 'none'){
            $(".respuesta",this).css("display","block");
            $(".respuesta",this).animate({opacity:"1"});
          }else{
            $(".respuesta",this).animate({opacity:"0"});
            $(".respuesta",this).css("display","none");
          }
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
                        $(".flecha", this).css("display", "inline-block");
                        $("p", this).css("display", "block");
                        $(this).removeClass('favOpac');
                        break;

                    case 2:
                        $(this).animate({width: "30%", height: width});
                        $(".flecha", this).css("display", "none");
                        $("p", this).css("display", "none");
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

        $(document).ready(function(){
          setTimeout(function(){
            $('#cartel-frente').fadeOut(1000);
          }, 5000);
        });
