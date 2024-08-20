<?php
class Cajas extends Controller
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
            $data['tag_page'] = "Cajas ";
            $data['page_titile'] = "Mantenimiento de Cajas";
            $data['page_name'] = "Cajas ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Cajas");
            if($_SESSION['modulo_cajas']=='Cajas'){
             $this->views->gteView($this, "index", $data);
            }else{
                header('location:'.base_url);
            }
    
    }

    public function listar()
    {
        $data = $this->model->getCajas();
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';

                $data[$i]['acciones'] = ' <div>
                <a type="submit" class="text-gradient-primary" onclick="btnActualizarCaja(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                <a type="submit" class="text-danger" onclick="btnEliminarCaja(' . $data[$i]['id'] . ');"><i class="fas fas fa-trash"></i></a> </div>';
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                
                <a type="submit" class="text-success" onclick="btnReingresarCaja(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div> ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {


        $id = $_POST['id'];
        $caja = $_POST['caja'];
        if (empty($caja)) {
            $msg = "Todos los campos son obligatorios";
        } else {

            if ($id == "") {


                $data = $this->model->registrarCaja($caja);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El caja ya existe";
                } else {
                    $msg = "Error al registrar caja";
                }
            } else {

                $data = $this->model->modificarCaja($caja, $id);

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
        $data = $this->model->editarCaja($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {


        $data = $this->model->accionesCaja(0, $id);
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


        $data = $this->model->accionesCaja(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el caja";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function arqueo()
    {
       

        
        $id_usuario=$_SESSION['id_usuario'];
       

        // if(!empty($permisos) || $id_usuario==1){
            $data['page_id'] = 178;
            $data['tag_page'] = "Arqueo Caja ";
            $data['page_titile'] = "Arqueo Caja";
            $data['page_name'] = "Arqueo Caja ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$_SESSION['id_usuario'];
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Arqueo_caja");

            $this->views->gteView($this, "arqueo", $data);
    
        // }else{
        //     header('location:'.base_url.'Errors/permisos');
        // }
    }
    public function abrirArqueo()
    {
        $id = $_POST['id'];
        $montoInicial = $_POST['txt_caja_apertura'];
        $fechaApertura=date('Y-m-d');
        $id_usuario=$_SESSION['id_usuario'];




        if (empty($montoInicial) || empty($fechaApertura) ) {
            $msg =["msg"=>"Todos los campos son obligatorios","icon"=>"warning"];
        } else {

            if ($id == "") {


                $data = $this->model->registrarArqueo($id_usuario, $montoInicial,$fechaApertura);
                if ($data == "ok") {
                    $msg =["msg"=>"Caja registrado con éxito","icon"=>"success"];
                } else if ($data == "existe") {
                    $msg =["msg"=>"Caja ya existe","icon"=>"warning"];
                } else {
                    $msg =["msg"=>"Error al registrar Caja","icon"=>"warning"];
                }
            }else{

                    $monto_inicial=$this->model->getMontoInicial($id_usuario);
                    $monto_fina=$this->model->getVentas($id_usuario);
                    $fecha_cierre=$fechaApertura;
                    $cantidad_ventas= $this->model->getTotalVentas($id_usuario);
                    
                    $montoInicial=$monto_inicial['monto_inicial'] !=0 ? $monto_inicial['monto_inicial']:0;
                    $montoFinal=$monto_fina['cantidad_ventas']!=0 ?$monto_fina['cantidad_ventas']: 0;
                    $cantidadVenta=$cantidad_ventas['total_ventas']!=0? $cantidad_ventas['total_ventas'] :0;
                    $Total=($montoFinal+ $montoInicial);

                    $data=$this->model->actualizarArqueo($montoFinal,$fecha_cierre,$cantidadVenta,$Total,$id_usuario);
                    $apertura=$this->model->cerrarAperturaVenta($id_usuario);

                    if($data=='ok' && $apertura=='ok'){
                        $msg =["msg"=>"La caja se cerror con éxito!!  \n Con s/: $Total","icon"=>"success"];
                    }else{
                        $msg =["msg"=>"Error al cerrar la caja","icon"=>"error"];
                    }
                    // $msg =["msg"=>"Actualizar","icon"=>"error"];
                }
            }
            
           
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);

        die();
    }
    public function listar_arqueo()
    {  
         $id_usuario=$_SESSION['id_usuario'];

        $data = $this->model->getArqueo($id_usuario);

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<span class="badge badge-success text_white">Abierto</span>';

            } else {

                $data[$i]['estado'] = '<span class="badge badge-danger text_white">Cerrado</span>';
                
            }
        } 
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    
    public function getVentas(){
        $id_usuario=$_SESSION['id_usuario'];
        $data['monto_total_ventas'] = $this->model->getVentas($id_usuario);
        $data['cantidad_ventas'] = $this->model->getTotalVentas($id_usuario);
        $data['total_montoInicial']=$this->model->getMontoInicial($id_usuario);
        
        $data['total_montoFinal']=($data['monto_total_ventas']['cantidad_ventas'] +$data['total_montoInicial']['monto_inicial']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function verificarBtn(){
        $id_usuario=$_SESSION['id_usuario'];
        $data = $this->model->getVerificarCaja($id_usuario);
        if(!empty($data)){
            $msg =["msg"=>"ok"];
        }else{
            $msg =["msg"=>"error"];
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

}
