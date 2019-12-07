@extends('layouts.base')

@section('contenido')

  {{--
<section>
  <!-- caja que contiene los deptos -->
  <section class="seccionPrincipalArticulos">
      <div class="pestana">
        <span id="pestana-busqueda"></span>
        <div class="btn-cerrar flechaIzq" onclick="cerrar-panel('seccionPrincipalArticulos');">
          <img src="img/arrow-left.png" >
        </div>
      </div>

    @forelse ($deptos as $depto)

      <article class="articulosPrincipales" style="background-image:url('img/img_deptos/{{$depto["foto"]}}');">
        <img class ="favorito" src="img/heart.png" alt="">

          <p class="infoPrevia">
              $depto["nombre"]?>
          </p>
          <p class="infoCompleta">
             $depto["superficie"]?> m<sup>2</sup> |$depto["camas"]?> camas | <strong>$depto["precio"]?> ARS/día</strong>
          </p>
      </article>

    @empty

    @endforelse
  </section>

</section>
--}}

<section class="panel panelLogin" id="panelLogin">
  {{-- if !loged --}}
    @include('pages.usuario.registro_login')
  {{-- else
    @include ('usuario.perfil')
  {{-- endif --}}
</section>

<section class="panel panelFavoritos" id="panelFavoritos">
  @include('pages.favoritos.mis_favoritos')
</section>

<section class="panel panelInfo" id="panelInfo">
  @include('pages.faq.faq')
</section>


@endsection
