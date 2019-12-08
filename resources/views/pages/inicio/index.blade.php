<?php
  $css = "style_modo_claro.css";
  $carpeta = "img";
  $foto = $carpeta."/user.png";
  if(!isset($departamentos))
    $departamentos = [];
 ?>

@extends('layouts.base')

@section('contenido')

<!-- caja que contiene los deptos -->
<section class="seccionPrincipalArticulos">
    <div class="pestana">
      <span id="pestana-busqueda"></span>
      <div class="btn-cerrar flechaIzq" onclick="cerrar-panel('seccionPrincipalArticulos');">
        <img src="img/arrow-left.png" >
      </div>
    </div>

  @forelse ($departamentos as $departamento)

    <article class="articulosPrincipales" style="background-image:url('/img/img_deptos/{{ $departamento['foto'] }}'">
      <img class ="favorito" src="img/heart.png" alt="">

        <p class="infoPrevia">
            {{ $departamento['nombre'] }}
        </p>
        <p class="infoCompleta">
           {{ $departamento['superficie'] }} m<sup>2</sup> |{{ $departamento['camas'] }} camas | <strong>{{ $departamento['precio'] }} ARS/día</strong>
        </p>
    </article>

  @empty

  @endforelse
</section>

<section class="panel panelLogin" id="panelLogin">
  @guest

    @include('pages.usuario.registro_login')

  @endguest

  @auth

    @include ('pages.usuario.ver_perfil')

  @endauth
</section>

<section class="panel panelFavoritos" id="panelFavoritos">
  @include('pages.favoritos.mis_favoritos')
</section>

<section class="panel panelInfo" id="panelInfo">
  @include('pages.faq.faq')
</section>


@endsection
