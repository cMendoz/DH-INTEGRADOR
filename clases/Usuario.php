<?php

/* Clase Usuario */

class Usuario{

			/* CARACTERÍSTICAS */

	private $nombre;
	private $email;
	private $password;
	private $foto;
	private $moneda;
	private $idioma;
	private $pais;
	private $ciudad;
	private $metodoDePago;
	private $theme;
	private $historialDeReservas;
	private $historialDeAlquileres;

	/*	 * Getters and setters	 */

	public function getNombre(){
		return $this->nombre;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function getMoneda(){
		return $this->moneda;
	}

	public function getIdioma(){
		return $this->idioma;
	}

	public function getPais(){
		return $this->pais;
	}

	public function getCiudad(){
		return $this->ciudad;
	}

	public function getMetodoDePago(){
		return $this->metodoDePago;
	}

	public function getTheme(){
		return $this->theme;
	}

	public function getHistorialDeReservas(){
		return $this->historialDeReservas;
	}

	public function getHistorialDeAlquileres(){
		return $this->historialDeAlquileres;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function setMoneda($moneda){
		$this->moneda = $moneda;
	}

	public function setIdioma($idioma){
		$this->idioma = $idioma;
	}

	public function setPais($pais){
		$this->pais = $pais;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}

	public function setMetodoDePago($metodoDePago){
		$this->metodoDePago = $metodoDePago;
	}

	public function setTheme($theme){
		$this->theme = $theme;
	}

	public function addHistorialDeReservas($reserva){
		array_push($reserva, $this->historialDeReservas);
	}

	public function addHistorialDeAlquileres($alquiler){
		array_push ($alquiler, $this->historialDeAlquileres);
	}

	/*	/end Getters and setters 	*/

					/* RESPONSABILIDADES */

	public function crearCuenta(){
		include 'conexion.php';

		// Valido
		// verifica si todos los campos estan llenos..
		if (isset($_POST["email"])){$email = $_POST["email"];}
		if (isset($_POST["usuarioNuevo"])){$usuarioNuevo = $_POST["usuarioNuevo"];}
		if (isset($_POST["nombre"])){$nombre = $_POST["nombre"];}
		if (isset($_POST["apellido"])){$apellido = $_POST["apellido"];}
		if (isset($_POST["contrasenaNueva"])){$contrasenaNueva = $_POST["contrasenaNueva"];}
		if (isset($_POST["contrasenaNueva2"])){$contrasenaNueva2 = $_POST["contrasenaNueva2"];}

		$error = 0;

		// Si alguno de los campos no se envió
		if($email == "" || $usuarioNuevo == "" || $contrasenaNueva == "" || $contrasenaNueva2 == "") {

			$error = 1;
			$alertContrasena = '<span class="alertaContrasena">Todos los campos son obligatorios.</span>';

			// FORZAR al formulario login a que sea visible desde el principio en la vista

		} elseif ($_POST["contrasenaNueva"] != $_POST["contrasenaNueva2"] || strlen($_POST["contrasenaNueva"]) < 8 ) {
			//si las contrasenas no coinciden, o tienen menos de 8 letras ... borrar lo escrito en contrasena
			$contrasenaNueva = "";
			$contrasenaNueva2 = "";

			$error = 1;
			$alertContrasena = '<span class="alertaContrasena">La contraseña debe tener al menos 8 carácteres y ser la misma en la confirmación.</span>';

		} elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

				// Si todo lo anterior fue chequeado y el usuario no existe en la base de datos
				// Cifro la contraseñarray
				$contrasenaNueva = password_hash($_POST['contrasenaNueva'], PASSWORD_DEFAULT);
				//Inyectar los valores de $_POST en la base de datos.
				$datosUsuario = [
				"usuario" => $_POST["usuarioNuevo"],
				"email" => $_POST["email"],
				"contrasena" => $contrasenaNueva,
				"foto" => "",
				"moneda" => "ARS",
				"idioma" => "es",
				"pais" => "Argentina",
				"metododepago" => "american",
				"theme" => "claro",
				];//creo el json del usuario

				$usuario = $_POST['usuarioNuevo'];
				$email = $_POST['email'];
				$contrasena = $contrasenaNueva;

				$usuarioValido = $_POST["usuarioNuevo"];

				$this->iniciarSesion($usuarioValido);

				// recordarme
				if (isset($_POST['recordarme'])){
					setcookie("usuario",$usuarioValido,time()+60*60*24*30);
				}else{
					setcookie("usuario",'',time()-1);
				}

				$error = 0;
				$alertContrasena = '';
			}


		$respuesta = [
			'error' => $error,
			'alertContrasena' => $alertContrasena,
			'alertConexion' => ''
		];

		return $respuesta;
	}

	public function login(){
		//para logearse verifica que los dos campos esten llenos:
		if(!isset($_POST["usuario"]) || !isset($_POST["contrasena"])) {

			if (isset($_POST["usuario"])){$usuario = $_POST["usuario"];}

			$error = 1;
			$alertConexion = '<span class="alertaContrasena">Los dos campos son obligatorios.</span>';

		} else {

			// Si se cuenta con estos datos verifico que el usuario esté registrado en la base de datos
			$usuario = $_POST["usuario"];
			$rutaUsuario = "usuarios/".$usuario.".json";

			// Si el usuario está registrado en la base de datos
			if (file_exists($rutaUsuario)){

				$usuarioEnBaseDeDatos = json_decode(file_get_contents("usuarios/".$usuario.".json"),true);

				// Valido la contraseña
				// Si la contraseña es correcta inicio sesión
				if(password_verify($_POST['contrasena'], $usuarioEnBaseDeDatos["contrasena"])) {

					$usuarioValido = $usuario;
					$error = 0;
					$alertConexion = '';

					$this->iniciarSesion($usuarioValido);



				// si la contraseña no es correcta
				} else {

					$error = 1;
					$contrasena = "";
					$alertConexion = '<span class="alertaContrasena">La contraseña es incorrecta.</span>';

				}

			// Si el usuario no está registrado en la base de datos
			}else{

				$error = 1;
				$usuario = $contrasena = "";
				$alertConexion = '<span class="alertaContrasena">No se encontró tu usuario. ¡Registrá una cuenta nueva!</span>';

			}
		}

		$respuesta = [
			'error' => $error,
			'alertContrasena' => '',
			'alertConexion' => $alertConexion
		];

		return $respuesta;
	}

	public function iniciarSesion($usuario){

		$_SESSION['usuario_logeado'] = [
	        'usuario' => $this->getNombre(),
	        'email' => $this->getEmail(),
	        'foto' => $this->getFoto(),
	    ];

	    // Leo propiedades del usuario
	    //$propietario = $bd->getPropiedades();
			$propietario = "";

	    $rutaDeptos = 'deptos.json';
	    global $misDeptos;
	    $misDeptos = [];

	    if(file_exists($rutaDeptos)){
	      $deptos = json_decode(file_get_contents($rutaDeptos),true);
	      foreach($deptos as $depto) {
	        if(strtolower($depto["propietario"]) == $propietario) {
	          $misDeptos[] = $depto;
	        }
	      }
		}

		return 'ok';
    }
/*
	if (isset($_SESSION['usuario_logeado'])){
	  if (isset($_SESSION['usuario_logeado']['usuario'])){
	    iniciarSesion($_SESSION['usuario_logeado']['usuario']);
	  }
	}
*/
	public function cerrarSesion(){
		unset($_SESSION['usuario_logeado']);
		session_destroy();
		setcookie("usuario",NULL,-1);
	}

	public function editarPerfil(){
		if(isset($_FILES["fotoDePerfil"]) && $_FILES["fotoDePerfil"]["error"] == 0) {
		  if(isset($_SESSION['usuario_logeado'])){
		    $ext = pathinfo($_FILES["fotoDePerfil"]["name"],PATHINFO_EXTENSION);
		    $name = uniqid().".".$ext;
		    move_uploaded_file($_FILES["fotoDePerfil"]["tmp_name"], dirname(__FILE__)."/../img/foto_de_perfil/".$name);
		    //asignar la foto a un usuario (el que está conectado).. extrae el usuario de json y lo modifica
		    $usuarioValido = $_SESSION['usuario_logeado']['usuario'];
		    $usuario = json_decode(file_get_contents("usuarios/".$usuarioValido.".json"),true);
		    $usuario["foto"] = $name;
		    // vuelve a "guardar" el usuario json
		    $json = json_encode($usuario);
		    file_put_contents("usuarios/".$usuarioValido.".json",$json);

		    $this->iniciarSesion($_SESSION['usuario_logeado']['usuario']);
		  }
		}
	}

	public function publicarPropiedad($nombre="",$foto="",$superficie="",$camas="",$precio=""){
	  global $deptos;
	  if(isset($_SESSION["usuario_logeado"]["usuario"])) {
	    $propietario = $_SESSION["usuario_logeado"]["usuario"];
	  }

	  $deptos[] = [
	  "nombre" => $nombre,
	  "foto" => $foto,
	  "superficie" => $superficie,
	  "camas" => $camas,
	  "precio" => $precio,
	  "propietario" => $propietario,
	  "favoritoDe" =>  [],
	  "ID"  => uniqid(),
	  ];

	  $json = json_encode($deptos);
	  file_put_contents("deptos.json",$json);


	    if(isset($_SESSION['usuario_logeado'])){
		    $nombreDepto = $_POST["nombre"];
		    $fotoDepto = $_POST["foto"];
		    $superficieDepto = $_POST["superficie"];
		    $camasDepto = $_POST["camas"];
		    $precioDepto = $_POST["precio"];

		    agregarDepto($nombreDepto, $fotoDepto, $superficieDepto, $camasDepto, $precioDepto);

		    iniciarSesion($_SESSION['usuario_logeado']['usuario']);
		}
	}

	public function editarPropiedad(){

	}

	public function borrarPropiedad(){

	}

	public function borrarCuenta(){

	}

	public function agregarComentario(){
	  if(isset($_SESSION['usuario_logeado'])){
	    $comentario = $_POST["comentario"];
	    $autor = strtolower($_SESSION["usuario_logeado"]["usuario"]);
	    $fecha = date("h:i - d F Y");
	    $comentarios[] = [
	      "autor" => $autor,
	      "comentario" => $comentario,
	      "fecha" => $fecha,
	    ];
	    $json = json_encode($comentarios);
	    file_put_contents("comentarios.json",$json);

	    // Leo los registros actualizados de la BD
	    iniciarSesion($_SESSION["usuario_logeado"]["usuario"]);

	  }
	}

	public function editarComentario(){

	}

	public function borrarComentario(){

	}


}
