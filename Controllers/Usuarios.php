<?php
class Usuarios extends Controller
{   
    public function __construct()
    {
        
        session_start();

        parent::__construct(); //iniciamos el modelo
    }

    public function index()
    {

        if (empty($_SESSION['acciones'])) {

            header("location:" . base_url);
        }
            $id_usuario=$_SESSION['id_usuario'];
            $data['page_id'] = 44;
            $data['tag_page'] = "Usuarios ";
            $data['page_titile'] = "Usuarios";
            $data['page_name'] = "Usuarios ";
            $data['user'] = $_SESSION['usuario'];
            $data['cajas'] = $this->model->getCajas();
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"usuario");
            
            if($_SESSION['modulo_usario']=='Usuario'){
                $this->views->gteView($this, "index", $data); 
                    
            }else{
                              header('location:'.base_url);
            }
    
       

        
        //print_r($this->model->getUsuario());
    }

    public function validar()
    {


        if (empty($_POST['User']) || empty($_POST['Pass'])) {
            $msg = "Los campos están vacios";
        } else {

            $usuario = $_POST['User'];
            $pass = $_POST['Pass'];
            $hash = hash("SHA256", $pass);

           

            
            $data = $this->model->getUsuario($usuario, $hash);
           
            $misPermisos=$this->model->verificarMisPermiso(1);

            if (!empty($data)) {
                
                 

                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['usuario'];
                $_SESSION['acciones'] = true;
                $_SESSION['nom'] = $data['id'];

                $_SESSION['tablero'] = "xd";
                
                // if(!empty($misPermisos)){

                //     $ff='xddd';
                //     $_SESSION['Mascota'] =$ff;
                    
                //     for ($i=0; $i < count($misPermisos); $i++) { 
                        
                //     }
                //       //fin-foreach

                // }else{
                //     $msg = "Error";
                // }
                $msg = "ok";
            } else if (empty($data)) {
                $msg = "error";

            }
       }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        // print_r($data);
        die();
    }




    public function listar(){
    
        $data = $this->model->getUsuarios();
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                if($data[$i]['id']==1){
                    $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';
                    $data[$i]['acciones'] = ' 
                    <i class="badge badge-primary">Administrador</i>
                ';  
                }else{
                    $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';
                    $data[$i]['acciones'] = ' <div>
                   
                    <a  class="text-gradient-primary" href="'.base_url.'Usuarios/setPermisos/'.$data[$i]['id'].'"><i class="fas fa-key"></i></a>
                    <a  class="text-gradient-primary" onclick="btnActualizarUsuario(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                    <a  class="text-danger" onclick="btnEliminar(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></a>
                    </div>
                ';
                }




            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                <a type="submit" class="text-success" onclick="btnReingresarUser(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div>
            ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {



        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $hash = hash("SHA256", $clave);
        $confirmar = $_POST['confirmar'];
        $caja = $_POST['caja'];
        $id = $_POST['id'];

        if (empty($usuario)  || empty($nombre) || empty($caja)) {
            $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
        } else {

            if ($id == "") {

                if ($clave != $confirmar) {

                    $msg = array('msg' => 'Las contraseñas no coensiden', 'icono' => 'warning');
                } else {
                    $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $caja);
                    if ($data == "ok") {
                        $msg = array('msg' => 'El usuario se registro correctamente..', 'icono' => 'success');
                    } else if ($data == "existe") {
                        $msg = array('msg' => 'El Usuario ya se encuentra registrado..', 'icono' => 'warning');
                    } else {
                        $msg = array('msg' => 'Error al registrar usuario..', 'icono' => 'warning');
                    }
                }
            } else {

                $data = $this->model->modificarUsuario($usuario, $nombre, $caja, $id);

                if ($data == "modificado") {
                    $msg = array('msg' => 'Usuario Modificado', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al modificar Usuario', 'icono' => 'error');
                }

                //$msg = $_POST['usuario'] . $_POST['nombre'] . $_POST['caja'] . $_POST['id'];
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarUsuario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionesUser(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'ok', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar el usuario', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function reingresar(int $id)
    { 


        $data = $this->model->accionesUser(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Usuario fue dado de baja con Exito..', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al Reingresar  Usuario..', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function cambiarPass()
    {
        $passActual = $_POST['passActual'];
        $passNuevo = $_POST['passNuevo'];
        $passConfirm = $_POST['passConfirm'];
        $id_usuario = $_SESSION['id_usuario'];

        if (empty($passActual) || empty($passNuevo) || empty($passConfirm)) {
            $msg = array('msg' => 'Todos los campos son abligatorios..', 'icono' => 'warning');
        } else {
            if ($passNuevo != $passConfirm) {
                $msg = array('msg' => 'Las constraseñas no son IGUALES..', 'icono' => 'warning');
            } else {
                $hash = hash("SHA256", $passActual);
                $data = $this->model->getPass($id_usuario, $hash);
                if (!empty($data)) {

                    $nuevaClave = $this->model->setCambiarClave($id_usuario, hash("SHA256", $passNuevo));
                    if ($nuevaClave == 1) {
                        $msg = array('msg' => 'Constraseñas cambiado con Exito..', 'icono' => 'success');
                    } else {
                        $msg = array('msg' => 'Error al Constraseñas..', 'icono' => 'error');
                    }
                } else {
                    $msg = array('msg' => 'Constraseñas incorrecta..', 'icono' => 'warning');
                }
            }
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


    public function setPermisos($id_usuario=100){
        if (empty($_SESSION['acciones'])) {

            header("location:" . base_url);
        }

        $data['page_id'] = 44;
        $data['tag_page'] = "permisos ";
        $data['page_titile'] = "permisos"; 
        $data['misPermisos'] = $this->model->getPermisos();
        $permisos=$this->model->getDetallePermisos($id_usuario);
        $data['permidosAsignados']=[];
        foreach($permisos as $row){
            $data['permidosAsignados'][$row['id_permiso']]=true;
        }
        $data['id_usuario'] = $id_usuario;
        
       
                    
        if($_SESSION['modulo_asignar_permisos']=='Asginar_Roles' || $_SESSION['nombre']=='admin'){
            $this->views->gteView($this, "permisos", $data);
        }else{
           header('location:'.base_url);
        }


    }
    public function  p(int $id_usuario){
        
        $permisosDetalle=$this->model->getDetallePermisos($id_usuario);
        $data['permidosAsignados']=[];
       
        
       
    
    

        foreach($permisosDetalle as  $row) {
            $data['permidosAsignados'][$row['id_permiso']]=true;
        }
        print_r($data['permidosAsignados'][7]);
        
        print("\n ==============================================");
        print(" ==============================================");
        print(" ============================================== ");
        print(" ============================================== \n");
        $permisos['misPermisos']= $this->model->getPermisos();

          foreach (  $permisos['misPermisos'] as $daa) { 
              
                  print(isset($data['permidosAsignados'][$daa['id']] )? "Si hay \n":"no hay \n" ); 
                  print("\n");  
           
            }

        
       
    }
    public function registrarPermisos(){

     
        $msg=["msg"=>"",'icono' => 'Error'];
        $id_usuario=$_POST['usuario'];
        $permisos=$this->model->eliminarPermisos($id_usuario);
        if($permisos=='ok'){
            foreach($_POST['permisos'] as $id_permisos){
                $data=$this->model->registrarPermisos($id_usuario,$id_permisos);
                if($data=='ok'){
                    $msg = array('msg' => 'Permiso asignado con éxito.', 'icono' => 'success');

                }else{
                    $msg = array('msg' => 'Error al asignar permisos.', 'icono' => 'error');
                }
                  
           }
        }else{
            $msg = array('msg' => 'Error al eliminar permisos.', 'icono' => 'error');
        }
      
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);

    }

    public function VerificarPermisos(){
        
        $data=$this->model->verificarPermiso(2,"Medidas");
        print_r($data);
    }
}
