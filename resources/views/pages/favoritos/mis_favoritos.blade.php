<?php
$misFavoritos = [];
$misDeptos = [] ;
?>
<h2>MIS FAVORITOS</h2>
@forelse($misFavoritos as $miFavorito)

  <article class="articulosFavoritos favOpac" id="dept1"></article>

@empty

  <h3>Tu lista de favoritos está vacía</h3>

@endforelse

<h2>MIS PROPIEDADES</h2>

@forelse($misDeptos as $miDepto)

  <article class="articulosFavoritos favOpac" style='background-image:url("img/img_deptos/{{ $miDepto["foto"] }}"'>
    @if (count($misDeptos) > 1){
      <img class="flecha flechaIzq" src="img/arrow-right.png" alt="">
      <img class="flecha flechaDer" src="img/arrow-right.png" alt="">
    @endif
      <p class="infoFavoritos">
          {{ $miDepto["nombre"] }}
      </p>
  </article>

@empty

  <h3>Aún no publicaste ninguna propiedad</h3>

@endforelse
