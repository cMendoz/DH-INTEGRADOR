<!-- si no hay cookie de conexión -->
<?php  $email = $usuarioNuevo = $contrasenaNueva = $contrasenaNueva2 = $usuario = $respuesta['alertConexion'] = $respuesta['alertContrasena'] = ''; ?>

@if(count($errors->all())>=1)
  <style>
    #panelLogin {
      right:0%;
    }
    #retorno {
      left: 73%;
    }
  </style>
@endif

<h2>SIGN IN</h2>
<img class="social" src="<?=$carpeta?>/loginFacebook.png" alt="Facebook">
<img class="social" src="<?=$carpeta?>/loginTwitter.png" alt="Twitter">
<img class="social" src="<?=$carpeta?>/loginLinkedin.png" alt="LinkedIn">
  <form class="formRegistro" action="{{ route('register') }}" method="post">
      @csrf
      <input type="hidden" name="form_registro" value="true">
      <input id="email" name="email" value="{{ old('form_registro') ? old('email') : '' }}" type="text" placeholder= "E-mail" required>
      @if(old('form_registro') == true)
        @error('email')
          <span style="color:red">{!! $message !!}</span><br>
        @enderror
      @endif
      <input id="name" name="name" value="{{ old('name') }}" type="text" placeholder= "Usuario" required>
      @if(old('form_registro') == true)
        @error('name')
          <span style="color:red">{!! $message !!}</span><br>
        @enderror
      @endif
      <input id="password" name="password" type="password" placeholder="Contraseña" required>
      <input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirmar contraseña" required>
      @if(old('form_registro') == true)
        @error('password')
          <span style="color:red">{!! $message !!}</span><br>
        @enderror
      @endif
      <input id="foto" name="foto" type="hidden" value="">
      <p>
      <input class="check-recordarme" type="checkbox"  id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
      <label for="remember">Recordarme</label>
      </p>
      <input type="submit" name="registrarse" value="Registrarse" class="aceptar">
  </form>

  <h5>¿Ya tenes una cuenta NOMADE?</h5>
  <h2>LOGIN</h2>
  <form class="formLogin" name="form_login" action="{{ route('login') }}" method="POST">
      @csrf
      <input type="hidden" name="form_login" value="true">
      <input name="email" type="text" placeholder= "E-mail" value="{{ old('form_login') ? old('email') : '' }}" required>
      @if(old('form_login') == true)
        @error('email')
          <span style="color:red">{!! $message !!}</span><br>
        @enderror
      @endif
      <input name="password" type="password" placeholder="Contraseña" required>
      @if(old('form_login') == true)
        @error('password')
          <span style="color:red">{!! $message !!}</span><br>
        @enderror
      @endif        <p>
      <input class="check-recordarme" type="checkbox" id="remember_login" name="remember" {{ old('remember') ? 'checked' : '' }}>
      <label for="remember_login">Recordarme</label>
      </p>
      <input name="login" type="submit" value="Ingresar" class="aceptar botonLogin">
  </form>
  <p class="olvide">Olvidé mi contraseña</p>
  <form action="mail.php" method="POST" class="formLogin">
      <input name="mailOlvide" type="email" placeholder="Ingresa tu e-mail" class="emailOlvide">
  </form>
</section>
