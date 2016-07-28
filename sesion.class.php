<?php
class sesion {
  function __construct() {
     session_start ();
  }
  public function set($nombre, $valor) {
     $_SESSION [$nombre] = $valor;
  }
  public function get($nombre) {
     if (isset ( $_SESSION [$nombre] )) {
        return $_SESSION [$nombre];
     } else {
         return false;
     }
  }
  public function elimina_variable($nombre) {
      unset ( $_SESSION [$nombre] );
  }
  public function termina_sesion() {
      $_SESSION = array();
      session_destroy ();
  }
}
?>