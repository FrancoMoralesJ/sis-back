<?php


class Administracion extends Controller
{
    private $ptablero='';
    private $pempresa='';
    private $PUsuario ='';
    private $pCajas ='';
    private $pAqueoCajas ='';
    private $pClientes ='';
    private $pCategorias ='';
    private $pMedidas ='';
    private $pMarcas ='';
    private $pProductos ='';
    private $PNuevaCompra='';
    private $pHistorialCompra ='';
    private $pNuevaVenta ='';
    private $pHistorialVenta ='';
    private $pRegistrarClientes ='';
    private $pEliminarClientes ='';
    private $pAsignarPermisos ='';

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['acciones'])) {

            header("location:" . base_url);
        }
        parent::__construct();
    }
    public function index()
    {
       

            $id_usuario=$_SESSION['id_usuario'];

      
            $data['page_id'] = 15;
            $data['tag_page'] = "Dotos de la  empresa";
            $data['page_titile'] = "Dotos de la  empresa";
            $data['page_name'] = "Dotos de la  empresa";
            $data['user'] = $id_usuario;
        
            $data['empresa'] = $this->model->getEmpresa();
            $data['nombre_empresa']= $this->model->getEmpresa();
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Empresa");
            $data['misPermisos']=$this->model->verificarMisPermiso($id_usuario);
            $this->views->gteView($this, "index", $data);
    
        
    }

    public function modificar()
    {
        $id_empresa = $_POST['id'];
        $ruc = $_POST['ruc'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $mensaje = $_POST['mensaje'];


        $datos = $this->model->modificarEmpresa($ruc, $nombre, $telefono, $direccion, $mensaje, $id_empresa);

        if ($datos == 'ok') {
            $msg = 'ok';
        } else {
            $msg = 'error';
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
 
    public function home()
    {  
            $id_usuario=$_SESSION['id_usuario'];
        
            $data['page_id'] = 15;
            $data['tag_page'] = "Panel de Administación";
            $data['page_title'] = "Panel de Administación";
            $data['page_name'] = "Panel de Administación";
            $data['user'] = $_SESSION['usuario'];
            $data['total_user'] = $this->model->getDatos("usuarios");
            $data['total_clientes'] = $this->model->getDatos("clientes");
            $data['total_productos'] = $this->model->getDatos("productos");
            $data['total_Ventas'] = $this->model->getVentas();
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"tablero");

            $misPermisos=$this->model->verificarMisPermiso($id_usuario);
            
            $data['nombre_empresa']= $this->model->getEmpresa();
            $data['_Mi_nombre']='XD';

           
            for($i=0; $i < count($misPermisos);$i++){
                if($misPermisos[$i]['mis_permisos']=='Tablero'){
                    $this->ptablero='Tablero';
                }
                if($misPermisos[$i]['mis_permisos']=='Empresa'){
                    $this->pempresa='Empresa';
                }
                if($misPermisos[$i]['mis_permisos']=='Usuario'){
                    $this->PUsuario='Usuario';
                }
                if($misPermisos[$i]['mis_permisos']=='Cajas'){
                    $this->pCajas='Cajas';
                }
                if($misPermisos[$i]['mis_permisos']=='Arqueo_Caja'){
                    $this->pAqueoCajas='Arqueo_Caja';
                }
                if($misPermisos[$i]['mis_permisos']=='Clientes'){
                    $this->pClientes='Clientes';
                }
                if($misPermisos[$i]['mis_permisos']=='Categorias'){
                    $this->pCategorias='Categorias';
                }
                if($misPermisos[$i]['mis_permisos']=='Medidas'){
                    $this->pMedidas='Medidas';
                }
                if($misPermisos[$i]['mis_permisos']=='Marcas'){
                    $this->pMarcas='Marcas';
                }
                if($misPermisos[$i]['mis_permisos']=='Productos'){
                    $this->pProductos='Productos';
                }
                if($misPermisos[$i]['mis_permisos']=='Nueva_Compra'){
                    $this->PNuevaCompra='Nueva_Compra';
                }
                if($misPermisos[$i]['mis_permisos']=='Historial_Compra'){
                    $this->pHistorialCompra='Historial_Compra';
                }
                if($misPermisos[$i]['mis_permisos']=='Nueva_Venta'){
                    $this->pNuevaVenta='Nueva_Venta';
                }
                if($misPermisos[$i]['mis_permisos']=='Historial_Venta'){
                    $this->pHistorialVenta='Historial_Venta';
                }
                if($misPermisos[$i]['mis_permisos']=='Registrar_Clientes'){
                    $this->pRegistrarClientes='Registrar_Clientes';
                }
                if($misPermisos[$i]['mis_permisos']=='Eliminar_Clientes'){
                    $this->pEliminarClientes='Eliminar_Clientes';
                }
                if($misPermisos[$i]['mis_permisos']=='Asginar_Roles'){
                    $this->pAsignarPermisos='Eliminar_Clientes';
                }
            }
                   

                    $_SESSION['modulo_tablero'] = $this->ptablero;
                    $_SESSION['modulo_empresa'] = $this->pempresa;
                    $_SESSION['modulo_usario'] = $this->PUsuario;
                    $_SESSION['modulo_cajas'] = $this->pCajas;
                    $_SESSION['modulo_arqueo_cajas'] = $this->pAqueoCajas;
                    $_SESSION['modolo_clientes'] = $this->pClientes;
                    $_SESSION['modulo_categorias'] = $this->pCategorias;
                    $_SESSION['modulo_medidas'] = $this->pMedidas;
                    $_SESSION['modulo_marca'] = $this->pMarcas;
                    $_SESSION['modulo_productos'] = $this->pProductos;
                    $_SESSION['modulo_compra'] = $this->PNuevaCompra;
                    $_SESSION['modulo_historial_compras'] = $this->pHistorialCompra;
                    $_SESSION['modulo_venta'] = $this->pNuevaVenta;
                    $_SESSION['modulo_historial_venta'] = $this->pHistorialVenta;
                    $_SESSION['modulo_registrar_clientes'] = $this->pRegistrarClientes;
                    $_SESSION['modulo_eliminar_clientes'] = $this->pEliminarClientes;
                    $_SESSION['modulo_asignar_permisos'] = $this->pAsignarPermisos;

            $this->views->gteView($this, "home", $data);
        
       

    }

  
    public function getStokcMinProductos()
    {

        $datos = $this->model->getStockMin();
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getProductosV()
    
    {
        $datos = $this->model->getProductoMasV();
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function getVentasPorDia()

    {
        $datos = $this->model->getTotalVentaPorDia();
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function getProductoSinStock()

    {
        $datos = $this->model->getProductoSinStock();
        for ($i=0; $i < count($datos); $i++) { 
            $datos[$i]['foto']=base_url . "Assets/img/productos/".$datos[$i]['foto'];
        }
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }
   
}

