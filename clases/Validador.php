<?php

class Validador{

  private $cantidadLetrasMinimasNombre = 3;
  private $cantidadLetrasMinimasContrasenia = 8;

  public function estaVacio($campo){
      return $campo == "";
  }

  public function tieneFormatoEmail($email){
      return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public function cantidadMinimaLetrasNombre($campo){
      return strlen($campo) < $this->cantidadLetrasMinimasNombre;
  }

  public function getCantidadLetrasMinimasNombre(){
      return $this->cantidadLetrasMinimasNombre;
  }

  public function cantidadMinimaLetrasContrasenia($campo){
      return strlen($campo) < $this->cantidadLetrasMinimasContrasenia;
  }

  public function getCantidadLetrasMinimasContrasenia(){
      return $this->cantidadLetrasMinimasContrasenia;
  }

  public function contraseniasIguales($pass1,$pass2){
      return $pass1 == $pass2;
  }

  public function full_name($nombre){
      if($this->estaVacio($nombre)){
          return "El nombre es obligatorio.";
      }else if($this->cantidadMinimaLetrasNombre($nombre)){
          return "El nombre debe tener al menos ".$this->cantidadLetrasMinimasNombre." caracteres.";
      }
      return "ok";
  }

  public function email($email){
      if($this->estaVacio($email)){
          return "El email es obligatorio.";
      }else if(!$this->tieneFormatoEmail($email)){
          return "El email no es válido.";
      }
      return "ok";
  }

  public function contrasenias($pass1,$pass2){

      if($this->estaVacio($pass1)){
          return "La contraseña es obligatoria.";
      }else if($this->cantidadMinimaLetrasContrasenia($pass1)){
          return "La contraseña debe tener al menos ".$this->cantidadLetrasMinimasContrasenia." caracteres";
      }else if(!$this->contraseniasIguales($pass1,$pass2)){
          return "Las contraseñas deben ser iguales.";
      }
      return "ok";
  }

  public function login($email,$pass){
      if($this->estaVacio($email) || $this->estaVacio($pass)){
          return "Los campos son obligatorios.";
      }else if(!$this->tieneFormatoEmail($email)){
          return "El email es inválido.";
      }
      return "";
  }


}
