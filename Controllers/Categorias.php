<?php
class Categorias extends Controller
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
            $data['page_id'] = 12;
            $data['tag_page'] = "Categorías ";
            $data['page_titile'] = "Mantenimiento de Categorías";
            $data['page_name'] = "Categorías ";
            $data['user'] = $_SESSION['usuario'];

            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Categorias");
            
            if($_SESSION['modulo_categorias']=='Categorias'){
                $this->views->gteView($this, "index", $data);
             }else{
                   header('location:'.base_url);
             }
        
        
    }

    public function listar()
    {
        $data = $this->model->getCategorias();
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';

                $data[$i]['acciones'] = ' <div>
                <a type="submit" class="text-gradient-primary" onclick="btnActualizarCategorias(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                <a type="submit" class="text-danger" onclick="btnEliminarCategorias(' . $data[$i]['id'] . ');"><i class="fas fas fa-trash"></i></a> </div>';
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                
                <a type="submit" class="text-success" onclick="btnReingresarCategorias(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div> ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {


        $id = $_POST['id'];
        $caja = $_POST['nombre'];





        if (empty($caja)) {
            $msg = "Todos los campos son obligatorios";
        } else {

            if ($id == "") {


                $data = $this->model->registrarCategorias($caja);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El caja ya existe";
                } else {
                    $msg = "Error al registrar caja";
                }
            } else {

                $data = $this->model->modificarCategorias($caja, $id);

                if ($data == "modificado") {

                    $msg = "modificado";
                } else {
                    $msg = "Error al modificar caja";
                }

                //$msg = $_POST['usuario'] . $_POST['nombre'] . $_POST['caja'] . $_POST['id'];
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarCategorias($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {


        $data = $this->model->accionesCategorias(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el caja";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function reingresar(int $id)
    {


        $data = $this->model->accionesCategorias(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el caja";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
