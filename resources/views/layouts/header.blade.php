<a href="index.php">
    <h1>NOMADE</h1>
</a>
<!-- flecha retorno (desaprece) -->
<img src="<?=$carpeta?>/arrow-right.png" class="retorno" id="retorno" alt="">

<nav class="encabezado">
    <!-- íconos de menú cabecera -->
    <div class="fotoUsuario"><img src="<?=$foto?>" id="fotoDeUsuario" alt=""></div>
    <div class="favoritos"><img src="<?=$carpeta?>/heart.png" alt=""></div>
    <?php
if (isset($_SESSION['usuario_logeado'])){
?>
    <div class="plus"><img src="<?=$carpeta?>/plus.png" alt=""></div>
    <?php
}
?>
    <div class="info"><img src="<?=$carpeta?>/info.png" alt=""></div>
</nav>

<!-- formulario de búsqueda -->
<form action="{{route('busqueda')}}" id="formBuscar" method="POST">
  @csrf
    <input class="buscar" type="text" name="buscar" id="buscar" placeholder="¿A dónde vas?" required>

    <nav class="filtros" style="display:none">
        <input name="personas" type="text" id="cantidadDePersonas"> <img src="<?=$carpeta?>/persona.png" alt=""> | <input type="text" name="superficie" id="cantidadDeM2"> m<sup>2</sup> | MAX <input type="text" name="precio" id="quePrecio"> <img src="<?=$carpeta?>/peso.png" >
        <label for="enviarBusqueda"><img src="<?=$carpeta?>/buscar.png" class="lupa" alt=""></label>
        <input type="submit" id="enviarBusqueda" style="display:none;">
    </nav>
</form>
