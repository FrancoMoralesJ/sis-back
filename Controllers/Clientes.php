<?php
class Clientes extends Controller
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
            $data['tag_page'] = "Clientes ";
            $data['page_titile'] = "Mantenimiento de Cliente";
            $data['page_name'] = "Clientes ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Clientes");
            
            if($_SESSION['modolo_clientes']=='Clientes'){
                $this->views->gteView($this, "index", $data);
             }else{
                   header('location:'.base_url);
             }


    }
    public function listar()
    {
        $data = $this->model->getClientes();
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';

                $data[$i]['acciones'] = ' <div>
                <a type="submit" class="text-gradient-primary" onclick="btnActualizarCliente(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                <a type="submit" class="text-danger" onclick="btnEliminarCliente(' . $data[$i]['id'] . ');"><i class="fas fas fa-trash"></i></a> </div>';
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                
                <a type="submit" class="text-success" onclick="btnReingresarCliente(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div> ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {


        $id = $_POST['id'];
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];


        $id_usuario=$_SESSION['id_usuario'];
        $permisos=$this->model->verificarPermiso($id_usuario,"registrar_clientes");

        if(!empty($permisos) || $id_usuario==1){
            if (empty($dni)  || empty($nombre) || empty($telefono) || empty($direccion)) {
                $msg = "Todos los campos son obligatorios";
            } else {
    
                if ($id == "") {
    
    
                    $data = $this->model->registrarCliente($dni,  $nombre,  $telefono,  $direccion);
                    if ($data == "ok") {
                        $msg = "si";
                    } else if ($data == "existe") {
                        $msg = "El cliente ya existe";
                    } else {
                        $msg = "Error al registrar clientes";
                    }
                } else {
    
                    $data = $this->model->modificarCliente($dni,  $nombre,  $telefono,  $direccion, $id);
    
                    if ($data == "modificado") {
    
                        $msg = "modificado";
                    } else {
                        $msg = "Error al modificar cliente";
                    }
    
                    //$msg = $_POST['usuario'] . $_POST['nombre'] . $_POST['caja'] . $_POST['id'];
                }
            }
    
        }else{
            $msg = "No tienes permiso para registrar clientes!";
        }



        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarCliente($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {


        $data = $this->model->accionesCliente(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el cliente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function reingresar(int $id)
    {


        $data = $this->model->accionesCliente(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el cliente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function salir()
    {

        session_start();
        session_destroy();
        header("location:" . base_url);
    }
}
