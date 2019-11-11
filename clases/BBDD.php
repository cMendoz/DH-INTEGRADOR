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

  public function registrarCuenta($usuario, $nombre, $apellido, $email, $contrasenia, $foto = NULL, $moneda = "ARS", $idioma = "ES", $theme = "0", $ubicacion = NULL){
    $sql = $this->conexion;

    $consulta = $sql->prepare("INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `email`, `contrasenia`, `moneda`, `idioma`, `theme`, `ubicacion`) VALUES (NULL, :usuario, :nombre, :apellido, :email, :contrasenia, :moneda, :idioma, :theme, :ubicacion);");

    $consulta->bindValue(":usuario", $usuario);
    $consulta->bindValue(":nombre", $nombre);
    $consulta->bindValue(":apellido", $apellido);
    $consulta->bindValue(":email", $email);
    $consulta->bindValue(":contasenia", $constasenia);
    $consulta->bindValue(":foto", $foto);
    $consulta->bindValue(":moneda", $moneda);
    $consulta->bindValue(":idioma" ,$idioma);
    $consulta->bindValue(":theme", $theme);
    $consulta->bindValue(":ubicacion", $ubicacion);

    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_ASSOC);

  }


  public function traerSeries(){
    $sql = $this->conexion;

    $consulta = $sql->prepare("SELECT * FROM series");
    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
  }

  public function traerDetallesSerie($idSerie){
    $sql = $this->conexion;

    $consulta = $sql->prepare("SELECT series.title AS 'serie_title', series.release_date AS 'serie_release_date', series.end_date AS 'serie_end_date', COUNT(seasons.title) AS 'seasons_count', genres.name AS 'genero'
    FROM series
    INNER JOIN seasons ON (seasons.serie_id = '$idSerie') INNER JOIN genres ON (genres.id = series.genre_id)
    WHERE series.id='$idSerie'");

    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
  }

  public function agregarPelicula($titulo = NULL, $rating = NULL, $premios = NULL, $release_date = NULL){
    $sql = $this->conexion;

    $consulta = $sql->prepare("INSERT INTO movies VALUES (title, rating, awards, release_date)");
  }
}
