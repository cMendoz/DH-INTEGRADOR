  <!-- si no hay cookie de conexión -->
  <?php  $email = $usuarioNuevo = $contrasenaNueva = $contrasenaNueva2 = $usuario = $respuesta['alertConexion'] = $respuesta['alertContrasena'] = ''; ?>
 <h2>SIGN IN</h2>
 <img class="social" src="<?=$carpeta?>/loginFacebook.png" alt="Facebook">
 <img class="social" src="<?=$carpeta?>/loginTwitter.png" alt="Twitter">
 <img class="social" src="<?=$carpeta?>/loginLinkedin.png" alt="LinkedIn">

    <form class="formRegistro" action="" method="post">
        <input name="email" type="email" placeholder= "E-mail" value="<?=$email?>" required>
        <input name="usuarioNuevo" type="text" placeholder= "Usuario" value="<?=$usuarioNuevo?>" required>
        <input name="contrasenaNueva" type="password" placeholder="Contraseña" value="<?=$contrasenaNueva?>" required>
        <input name="contrasenaNueva2" type="password" placeholder="Confirmar contraseña" value="<?=$contrasenaNueva2?>" required>
        <p>
        <input class="check-recordarme" type="checkbox" id="recordarme" name="recordarme">
        <label for="recordarme">Recordarme</label>
        </p>
        <?=$respuesta['alertContrasena']?>
        <input type="submit" name="registrarse" value="Registrarse" class="aceptar">
    </form>

    <h5>¿Ya tenes una cuenta NOMADE?</h5>
    <h2>LOGIN</h2>
    <form class="formLogin" action="" method="POST">
        <input name="usuario" type="text" placeholder= "Usuario" value="<?=$usuario?>" required>
        <input name="contrasena" type="password" placeholder="Contraseña" required>
        <p>
        <input class="check-recordarme" type="checkbox" id="recordarme" name="recordarme">
        <label for="recordarme">Recordarme</label>
        </p>
        <?=$respuesta['alertConexion']?>
        <input name="login" type="submit" value="Ingresar" class="aceptar botonLogin">
    </form>
    <p class="olvide">Olvidé mi contraseña</p>
    <form action="mail.php" method="POST" class="formLogin">
        <input name="mailOlvide" type="email" placeholder="Ingresa tu e-mail" class="emailOlvide">
    </form>
</section>
