<?php

class BBDD{

  private $user;
  private $pass;
  private $db_name;
  private $host;
  private $conexion;

  public function __construct($db_name,$user = "root",$pass = "",$host = "localhost"){
      $this->user = $user;
      $this->pass = $pass;
      $this->db_name = $db_name;
      $this->host = $host;

      $opciones = array(
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      );

      try{
          $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
          $this->conexion = new PDO($dsn, $this->user, $this->pass, $opciones);
      }catch(PDOException $Exception){
          echo $Exception->getMessage();
      }
  }

  public function registrarCuenta($usuario, $email, $contrasena){
    $sql = $this->conexion;

    $consulta = $sql->prepare("INSERT INTO usuarios (id, usuario, email, contrasena) VALUES (DEFAULT, :usuario, :email, :contrasena)");

    $consulta->bindValue(":usuario", $usuario);
    $consulta->bindValue(":email", $email);
    $consulta->bindValue(":contrasena", password_hash($contrasena, PASSWORD_DEFAULT));

    $consulta->execute();

    return true;

  }

  public function traerUsuario($usuario){
    $sql = $this->conexion;

    $consulta = $sql->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");

    if(!$consulta){
      die(var_export($sql->errorinfo(), TRUE));
    }

    return $consulta->fetch(PDO::FETCH_ASSOC);
  }

  public function verificarContrasena($usuario, $contrasena){
    $sql = $this->conexion;

    $datosUsuario = $this->traerUsuario($usuario);

    // Si no existe usuario
    if (!empty($datosUsuario)){
      if(password_verify($contrasena, $datosUsuario['contrasena'])) {
        return 'ok';
      }else{
        return "Contraseña incorrecta";
      }
    }else{
      return "Usuario inexistente";
    }
  }
}
