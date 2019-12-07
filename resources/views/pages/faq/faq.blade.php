<h2 class="aceptar preguntasFrecuentesH2">PREGUNTAS FRECUENTES</h2>
<ul class="preguntasFrecuentes" type="bullet">
  <li class="pregunta">¿Cómo creo una cuenta?<p class="respuesta">Hace clic en el icono <img src="<?=$carpeta?>/user.png" style="height:10px" alt=""> y llena el formulario de registro.</p></li>
  <li class="pregunta">¿Cómo restablezco mi contraseña?<p class="respuesta">En el formulario de ingreso, hace clic en "Olvidé mi contraseña" y siga los pasos indicados</p></li>
  <li class="pregunta">¿Por qué debo pagar por NOMADE?<p class="respuesta">Efectuar una transacción por Nomade le brinda al inquilino la seguridad de que tu pago no se finalizará hasta que este confirme que el propietario cumplió con todos los requisitos.</p></li>
  <li class="pregunta">¿Qué comprenden las tarifas?<p class="respuesta">Las tarifas corresponden, por un lado a la comisión de Nomade, y por otro lado a los gastos que el propietario debe enfrentar para preparar el hogar y recibirlo de la mejor manera.</p></li>
  <li class="pregunta">¿Cuál es la politica de cancelación?<p class="respuesta">Cada dueño es libre de optar por las políticas de cancelación que desee, mientras respete el plazo mínimo de 24 horas para cancelar sin costos.</p></li>
</ul>
<h2 class="aceptar escribirComentarioH2">ESCRIBIR COMENTARIO</h2>
<form class="formInfo escribirComentario" action="" method="POST">
 <h5>
     <?php
     // Si el usuario está conectado abre un formulario, si no, pide conexión.
     if(isset($_SESSION["usuario_logeado"])) {
         echo $_SESSION["usuario_logeado"]['usuario'];
     }else {
     ?>
     <p class="comentario">
       Para hacer un comentario debés estar logeado
     </p>
     <span class="conectarse">Conectarse</span>
     <?php
     }
     ?>
 </h5>
 <?php
     if(!isset($_SESSION["usuario_logeado"])) {
 ?>
 <style>
     #areaComentario {
         display:none;
     }
     #aceptarComentario {
         display:none;
     }
 </style>
 <?php
     }
 ?>
 <textarea name="comentario" rows="5" placeholder="Escribí acá tu comentario" id="areaComentario" required></textarea>
 <input type="submit" value="Enviar" class="aceptar" id="aceptarComentario">
</form>
<h2 class="aceptar forumH2">COMENTARIOS DE USUARIOS</h2>

<?php $comentarios = []; ?>

  @forelse($comentarios as $comentario)

     <article class="forum">
         <h5 class="autorComentario"><?=$comentario["autor"]?></h5>
         <p class="fechaComentario"><?=$comentario["fecha"]?></p>
         <p class="comentario"><?=$comentario["comentario"]?></p>
     </article>

  @empty
    <article class="forum">
      <p class="comentario">
        Aún no hay comentarios. ¡Sé el primero en comentar!
      </p>
    </article>
  @endforelse
