<?php 
// require_once  'Config/App/autoload.php';

 require_once "Config/Config.php";

 
 $ruta=!empty($_GET['url']) ? $_GET['url'] : "Home/index"; //capturi ry
 $array=explode("/",$ruta); //convertimos en array
 $controller = $array[0]; //array index 0 controlador
 $metodo = "index"; //metodo
 $parametro = ""; //su parametro

 if(!empty($array[1])){ //validamos si existe el parametro de metodo

    if(!empty($array[1]) !=""){ //si el metodo no es vacio le agregamos
        $metodo= $array[1];
       
    }
   
 }
 
 if(!empty($array[2])){
    if(!empty($array[2]) !=""){

        for($i=2; $i<count($array);$i++){
           $parametro .=$array[2].","; //concatenamos todos los parametros
        }
        $parametro=trim($parametro,","); //quitamos la ultima coma
    }
 }



//   require_once "Config/App/autoload.php";
spl_autoload_register(function($class){


   if(file_exists("Config/app/".$class.".php")){
           require_once "Config/app/".$class.".php";
          
   }
});

 $dirControllers="Controllers/".$controller.".php";

 if(file_exists($dirControllers)){ //verificamos si existe el controlador que pasamor por url
      require_once $dirControllers;
      
      $controller=new $controller();

    if(method_exists($controller,$metodo)){
    
         $controller->$metodo($parametro);
       //echo "Si existe Metodo  ".$metodo."<br>";
      


     }else{
       //echo "No existe Metodo  ".$metodo."<br>";
       header('location:'.base_url.'Errors');
     }

 }else{
   //  echo "no existe Controlador   ".$dirControllers."<br>";
   header('location:'.base_url.'Errors');
 }

?>