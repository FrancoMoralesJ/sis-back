<?php
class Controller{

  protected $views;
  protected $model;
  
  public function __construct(){
    $this->views=new Views();
    $this->cargarModel();

    
  }

  public function cargarModel(){

    $model = get_class($this)."Model";//optener nombre de la clase

    $ruta="Models/".$model.".php"; //comprovamos si existe el modelo en la carpeta Models
   
    if(file_exists($ruta)){ //si existe
        
        require_once $ruta;//requerimos

        $this->model=new $model();//instanciamos en modelo
       
    }

    // else {
    //   die("Error: El modelo '$model' no pudo ser encontrado en '$ruta'.");
    // }

  }  
}

?>