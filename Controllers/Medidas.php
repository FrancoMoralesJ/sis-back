<?php
class Medidas extends Controller
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
            $data['tag_page'] = "Cajas ";
            $data['page_titile'] = "Mantenimiento de Medidas";
            $data['page_name'] = "Medidas ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Medidas");
            if($_SESSION['modulo_medidas']=='Medidas'){
            $this->views->gteView($this, "index", $data); 
                
             }else{
                          header('location:'.base_url);
              }
    
        
    }

    public function listar()
    {
        $data = $this->model->getMedidas();
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i> ';

                $data[$i]['acciones'] = ' <div>
                <a type="submit" class="text-gradient-primary" onclick="btnActualizarMedidas(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                <a type="submit" class="text-danger" onclick="btnEliminarMedidas(' . $data[$i]['id'] . ');"><i class="fas fas fa-trash"></i></a> </div>';
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                
                <a type="submit" class="text-success" onclick="btnReingresarMedidas(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div> ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {


        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $nombre_corto = $_POST['nombre_corto'];





        if (empty($nombre) || empty($nombre_corto)) {
            $msg = "Todos los campos son obligatorios!!";
        } else {

            if ($id == "") {


                $data = $this->model->registrarMedidas($nombre, $nombre_corto);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "Esta medida ya existe!!";
                } else {
                    $msg = "Error al registrar medida!!";
                }
            } else {

                $data = $this->model->modificarMedidas($nombre, $nombre_corto, $id);

                if ($data == "modificado") {

                    $msg = "modificado";
                } else {
                    $msg = "Error al modificar medida!!";
                }

                //$msg = $_POST['usuario'] . $_POST['nombre'] . $_POST['caja'] . $_POST['id'];
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarMedidas($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {


        $data = $this->model->accionesMedidas(0, $id);
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


        $data = $this->model->accionesMedidas(1, $id);
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
