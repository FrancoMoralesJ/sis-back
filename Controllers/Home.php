<?php

class Home extends Controller
{


   public function __construct()
   {
      session_start();
      if (!empty($_SESSION['acciones'])) {

         header("location:" . base_url . "Administracion/home"); //
      }
      parent::__construct();
   }
   public function  index()
   {  
      
    
       $this->views->gteView($this, "index");
   }

   public function  registrar($hola)
   {
      //echo "Soy registrar de home ".$hola."<br>";
   }
}
