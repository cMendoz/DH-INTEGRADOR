<h2>Nombre de usuario</h2>
<form name="actualizar_perfil" action="" method="POST" enctype="multipart/form-data">
    {{-- if FOTO != ''
    <div class="foto-perfil">
      <img src="img/foto_de_perfil/$_SESSION['usuario_logeado']['foto']?>" alt="Foto de perfil">

      <label for="foto" class="file formLogin">Cambiar foto de perfil</label>
    </div>

ELSE --}}
    <label for="foto" class="file formLogin">Elegir una foto de perfil</label>

    <input type="file" id="foto" class="file" name="fotoDePerfil">

    <p class="formLogin">Moneda
        <select name="moneda">
            <option value="ARS">ARS</option>
            <option value="EUR">EUR</option>
            <option value="USD">USD</option>
        </select>
    </p>
    <p class="formLogin">Idioma
        <select name="idioma">
            <option value="es">Español (Argentina)</option>
            <option value="fr">Français (France)</option>
            <option value="en">English (US)</option>
        </select>
    </p>
    <p class="formLogin">País de residencia
        <select name="residencia">
            <option value="residenciaArgentina">Argentina</option>
            <option value="residenciaBolivia">Bolivia</option>
            <option value="residenciaBrasil">Brasil</option>
            <option value="residenciaChile">Chile</option>
            <option value="residenciaParaguay">Paraguay</option>
            <option value="residenciaUruguay">Uruguay</option>
        </select>
    </p>
    <p class="formLogin">Método de pago
        <select name="metodoDePago">
            <option value="americanExpress">American Express</option>
            <option value="masterCard">Master Card</option>
            <option value="visa">Visa</option>
        </select>
    </p>
    <!-- tema claro-oscuro -->
    <label for="theme" class="formLogin">Estilo visual</label>
    <select name="theme" id="theme" onchange='this.form.submit()'>
        <option value="claro">Claro</option>
        <option value="oscuro">Oscuro</option>
    </select>

    <input type="submit" name="actualizar" value="Modificar perfil" class="aceptar">

</form>
<!-- Cerrar sesión -->
<form action="{{ route('logout') }}" class="formLogin" method="POST">
    @csrf
    <input type="submit" name="desconectarse" value="Desconectarse" class="aceptar">
</form>
