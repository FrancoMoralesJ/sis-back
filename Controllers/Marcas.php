<?php
class Marcas extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['acciones'])) {

            header("location:" . base_url);
        }

        parent::__construct(); //iniciamos el modelo
    }

    public function index()
    {
        


        
            $id_usuario=$_SESSION['id_usuario'];
            $data['page_id'] = 16;
            $data['tag_page'] = "Marcas ";
            $data['page_titile'] = "Módulo de marcas";
            $data['page_name'] = "Marcas ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Marcas");
              
            if($_SESSION['modulo_marca']=='Marcas'){
                $this->views->gteView($this, "index", $data); 
             }else{
                          header('location:'.base_url);
              }
   
    }

    public function listar()
    {
        $data = $this->model->getMarcas();
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i> ';

                $data[$i]['acciones'] = ' <div>
                <a type="submit" class="text-gradient-primary" onclick="btnActualizarMarca(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                <a type="submit" class="text-danger" onclick="btnEliminarMarca(' . $data[$i]['id'] . ');"><i class="fas fas fa-trash"></i></a> </div>';
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                
                <a type="submit" class="text-success" onclick="btnReingresarMarca(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div> ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {


        $id = $_POST['id'];
        $nombre = $_POST['nombre_marca'];
        
      

        if (empty($nombre) ) {
            $msg = "Todos los campos son obligatorios!!";
        } else {

            if ($id == "") {


                $data = $this->model->registrarMarcas($nombre);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "Esta marca ya existe!!";
                } else {
                    $msg = "Error al registrar marca!!";
                }
            } else {

                $data = $this->model->modificarMarcas($nombre, $id);

                if ($data == "modificado") {

                    $msg = "modificado";
                } else {
                    $msg = "Error al modificar marca!!";
                }

                //$msg = $_POST['usuario'] . $_POST['nombre'] . $_POST['caja'] . $_POST['id'];
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarMarcas($id);

        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {


        $data = $this->model->accionesMarcas(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el medida!!";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function reingresar(int $id)
    {


        $data = $this->model->accionesMarcas(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el medida!!";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);



        
        die();


    }

    public function buscar(){
        
    }
}
