<?php
class Compras extends Controller
{

    function __construct()
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
            $data['page_id'] = 12;
            $data['tag_page'] = "Realizar Compras ";
            $data['page_titile'] = "Realizar Compras";
            $data['page_name'] = "Realizar Compras ";
            $data['user'] = $_SESSION['usuario'];
            $data['marcas'] =$this->model->getMarcas();
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Nueva_Compra");
            if($_SESSION['modulo_compra']=='Nueva_Compra'){
                $this->views->gteView($this, "index", $data);
             }else{
                   header('location:'.base_url);
             }


    
        
    }

    public  function buscarCodigo($cod)
    {
        $data = $this->model->getProductoCod($cod);

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function pp($pro)
    {
        $id_usuario = $_SESSION['id_usuario'];


        $comprobar = $this->model->consultarDetalle("detalle", 9, $id_usuario);
        print_r($comprobar);
    }
    public function ingresar()
    {

        $id = $_POST['id'];
        $datos = $this->model->getProductosId($id);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_compra'];
        $cantidad = $_POST['cantidad'];

        $comprobar = $this->model->consultarDetalle("detalle", $id_producto, $id_usuario);

        if (empty($comprobar)) { //si es vacio
            $sub_total = ($precio * $cantidad);
            $data = $this->model->registrarDetalle("detalle", $id_producto, $id_usuario, $precio, $cantidad, $sub_total);
            if ($data == "ok") {

                $msg = array('msg' => 'Producto Agregado..', 'icono' => 'success');
            } else {

                $msg = array('msg' => 'Error al ingresar detalle..', 'icono' => 'error');
            }
        } else {


            $total_cantidad = $comprobar['cantidad'] + $cantidad;
            $sbTotal = $total_cantidad * $precio;
            $datas = $this->model->actualizarDetalle("detalle", $precio, $total_cantidad, $sbTotal, $id_producto, $id_usuario);
            if ($datas == "modificado") {
                $msg = array('msg' => 'Producto Modificado..', 'icono' => 'success');
            } else {

                $msg = array('msg' => 'Error al  Modificado Detalle..', 'icono' => 'error');
            };
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar($tabla)
    {

        $id = $_SESSION['id_usuario'];
        $datos['detalle'] = $this->model->getDetalles($tabla, $id);
        $datos['total_pagar'] = $this->model->calcularCompras($tabla, $id);
        echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delete($id)
    {

        $data = $this->model->deleteDetalle("detalle", $id);
        if ($data == "ok") {
            $msg = "ok";
        } else {
            $msg = "error";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrarCompra()
    {
        $id_usuario = $_SESSION['id_usuario']; //ID DEL USER LOGEADO 
        $total = $this->model->calcularCompras("detalle", $id_usuario); // OPTENEMOS EL SUBTOTAL DEL TBL DETALLE
        $data = $this->model->registrarCompras($total['total']); //REGISTRAMOS SUBTOTAL A  TBL COMPRAS

        if ($data == "ok") { // SI NOS REGRESA OK REGISTRAMOS DETALLE COMPRAS

            $datos = $this->model->getDetalles("detalle", $id_usuario); //OPTENEMOS DATOS DEL TBL DETALLE
            $id_compra = $this->model->getID("compras"); //OPTENEMOS EL MAX ID DEL TBL COMPRAS 
            
            foreach ($datos as $row) {
                $id_producto = $row['id_producto'];
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $sub_total = $precio * $cantidad;
                $this->model->registrarDetalleCompra($id_compra['id'], $id_producto, $cantidad, $precio, $sub_total); //REGISTRA TB DETALLE COMPRA


                $stock_actual = $this->model->getProductosId($id_producto);
                $nuevo_stock = $stock_actual['cantidad'] + $cantidad;
                $this->model->actualizarStock($nuevo_stock, $id_producto); //ACTUALIZA STOCK DE TB PRODUCTOS


            }
            $vaciar = $this->model->vaciarDetalle("detalle", $id_usuario); //vaciamos tb detalle
            if ($vaciar == "ok") {
                $msg = array("msg" => "ok", "id_compra" => $id_compra['id']);
            }
        } else {
            $msg = "Error al comprar";
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function generarPDF($id_compra)
    {

        $empresa = $this->model->getEmpresa();
        $productos = $this->model->getCompras($id_compra);
        /*
        print_r($productos);
        exit();*/
        require('libraries/fpdf/fpdf.php');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expire:0');
        $pdf = new FPDF('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(2, 0, 0); //AGREGAMOS UN MARGIN A LA HOJA
        $pdf->SetTitle("Reporte Compra");
        $pdf->Image(base_url . 'Assets/img/logo.png', 31, 8, 16, 16);
        $pdf->Ln(14);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(75, 10, utf8_decode($empresa['nombre']), 0, 1, 'C');


        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(5, 5, '====================================================', 0, 1, 'L');
        //===========================================================

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('Ruc: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(17, 5, utf8_decode($empresa['ruc']), 0, 1, 'C');
        //===========================================================


        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('TELEFONO: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(15, 5, utf8_decode($empresa['telefono']), 0, 1, 'C');
        //===========================================================
        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('DIRECCION: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(15, 5, utf8_decode($empresa['direccion']), 0, 1, 'C');
        //===========================================================
        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('FOLIO: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(5, 5, utf8_decode($id_compra), 0, 1, 'C');


        //===========================================================
        $pdf->Cell(5, 5, '====================================================', 0, 1, 'L');
        //======================HEADER=====================================
        $pdf->Ln(); {
            $pdf->SetFillColor(0, 0, 0);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->SetFont('Arial', 'B', 7);
            $pdf->Cell(8, 5, "Cant", 0, 0, 'L', true);
            $pdf->Cell(43, 5, utf8_decode('Descripción'), 0, 0, 'L', true);
            $pdf->cell(9, 5, 'Precio', 0, 0, 'L', true);
            $pdf->Cell(16, 5, 'Sub Total', 0, 1, 'R', true);
        }

        //CONTENIDO
        $pdf->SetTextColor(0, 0, 0);
        $total = 0.00;
        foreach ($productos as $row) {
            $total = $total + $row['sub_total'];
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(8, 5, $row['cantidad'], 0, 0, 'L');
            $pdf->Cell(43, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
            $pdf->cell(9, 5, $row['precio'], 0, 0, 'L');
            $pdf->Cell(16, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'R');
        }

        $pdf->Ln();
        $pdf->Cell(5, 2, '====================================================', 0, 1, 'L');
        $pdf->Cell(75, 3, 'Total a Pagar', 0, 1, 'R');
        $pdf->Cell(75, 5, number_format($total, '2', '.', ','), 0, 1, 'R');


        $pdf->Output();
    }

    public function historial()
    {
     


            $id_usuario=$_SESSION['id_usuario'];
            $data['page_id'] = 12;
            $data['tag_page'] = "Historial Compras ";
            $data['page_titile'] = "Historial Compras";
            $data['page_name'] = "Historial ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Historial_Compra");
            if($_SESSION['modulo_historial_compras']=='Historial_Compra'){
                 $this->views->gteView($this, "historial", $data);
             }else{
                   header('location:'.base_url);
             }
        
    }

    public function listar_historial()
    {
    
        $data = $this->model->getHistorialCompras();
        


        // "'.$data[$i]['id'].'"
        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['total']) {
                $data[$i]['total'] = '<small class="text-olive font-weight-bold">S/ </small>' . $data[$i]['total'];
            }
            if ($data[$i]['estado'] == 1) {

                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';

                $data[$i]['acciones'] = '<div>
                <a class="text-warning" onclick="anularVenta('.$data[$i]['id'].')" style="cursor: pointer;" > <i class="fas fa-ban"></i></a>
                <a  class="text-danger" href="' . base_url . "Compras/generarPDF/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a></div>';
                
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                <a  class="text-danger" href="' . base_url . "Compras/generarPDF/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a></div>';
            }

            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function calcularDescuento($data)
    {
        $datos = explode(",", $data);
        $id = $datos[0];
        $desc = $datos[1];

        if (empty($id) || empty($desc)) {
            $msg = array('msg' => 'Error al calcular descuento!!.', 'icono' => 'error');
        } else {
            $descuentoActual = $this->model->verificarDescuento($id);


            $descuentoTotal = $descuentoActual['descuento'] + $desc;
            $sub_total = ($descuentoActual['cantidad'] * $descuentoActual['precio']) - $descuentoTotal;

            $data = $this->model->actualizarDescuento($descuentoTotal, $sub_total, $id);

            if ($data == 'ok') {
                $msg = array('msg' => 'Descuento aplicado!!.', 'icono' => 'success');
            } else {
                $msg = array('msg' => 'Error al aplicar el descuento !!.', 'icono' => 'warning');
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    //=================================================VENTAS==============================================================


    public function Ventas()
    {
      

        
            $id_usuario=$_SESSION['id_usuario'];
            $data['page_id'] = 12;
            $data['tag_page'] = "Realizar Ventas";
            $data['page_titile'] = "Realizar Ventas";
            $data['page_name'] = "Realizar Ventas ";
            $data['user'] = $_SESSION['usuario'];
            $data['clientes'] = $this->model->getClientes();
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Nueva_Venta");
            if($_SESSION['modulo_venta']=='Nueva_Venta'){
            $this->views->gteView($this, "Venta", $data);
             
            }else{
                  header('location:'.base_url);
            }
    
    }

    public function historialVentas()
    {
        


         
            $id_usuario=$_SESSION['id_usuario'];
            $data['page_id'] = 55;
            $data['tag_page'] = "Historial Ventas ";
            $data['page_titile'] = "Historial Ventas";
            $data['page_name'] = "Historial Ventas ";
            $data['user'] = $_SESSION['usuario'];
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Historial_Venta");
            if($_SESSION['modulo_historial_venta']=='Historial_Venta'){
            $this->views->gteView($this, "historialVenta", $data);
             }else{
                      header('location:'.base_url);
             }
    
       
    }

    public function ingresarVenta()
    {
        
        $id = $_POST['id'];
        $datos = $this->model->getProductosId($id);
        $id_producto = $datos['id'];
        $id_usuario = $_SESSION['id_usuario'];
        $precio = $datos['precio_venta'];
        $cantidad = $_POST['cantidad'];

        
        

        $comprobar = $this->model->consultarDetalle("detalle_temp", $id_producto, $id_usuario);

        if (empty($comprobar)) { //si es vacio
            
        // print_r($comprobar);
        // exit();
        $datos = $this->model->getProductosId($id);
            if($datos['cantidad'] < $cantidad && $datos['estado']==1 ){
                $msg = array('msg' => "El producto    ".$datos['descripcion']."    no tiene Stock..", 'icono' => 'error');

            }else if ( $datos['cantidad'] < $cantidad && $datos['estado']==0){
                $msg = array('msg' => "El producto ".$datos['descripcion']." no tiene stock y esta inactivo..", 'icono' => 'error');

            }else if ( $datos['cantidad'] > $cantidad && $datos['estado']==0 ){
                $msg = array('msg' => "El producto ".$datos['descripcion']."  esta inactivo..", 'icono' => 'error');
            }else{
                $descuento=0;
                $sub_total = ($precio * $cantidad) - $descuento ;
     
                 $data = $this->model->registrarDetalle("detalle_temp", $id_producto, $id_usuario, $precio, $cantidad, $sub_total);
                 if ($data == "ok") {
      
                     $msg = array('msg' => 'Producto Agregado a Venta..', 'icono' => 'success');
                 } else {
     
                     $msg = array('msg' => 'Error al ingresar detalle Venta..', 'icono' => 'error');
                 }
            }
          
        } else {

            $total_cantidad = ($comprobar['cantidad']) + ($cantidad);
            $sbTotal = ($total_cantidad * $precio) - $comprobar['descuento'];
            if($datos['cantidad'] < $total_cantidad && $datos['estado']==1){
                $msg = array('msg' => "El producto  ".$datos['descripcion']."  que intentas agregar no tiene Stock suficiente..", 'icono' => 'error');

            }else if ($datos['cantidad'] < $total_cantidad && $datos['estado']==0){
                $msg = array('msg' => "El producto ".$datos['descripcion']." no tiene stock y esta inactivo..", 'icono' => 'error');

            }else if ($datos['cantidad'] > $total_cantidad && $datos['estado']==0){
                $msg = array('msg' => "El producto ".$datos['descripcion']."  esta inactivo..", 'icono' => 'error');

            }else{
                $datas = $this->model->actualizarDetalle("detalle_temp", $precio, $total_cantidad, $sbTotal, $id_producto, $id_usuario);
                if ($datas == "modificado") {
                    $msg = array('msg' => 'Producto Venta Modificado..', 'icono' => 'success');
                } else {

                    $msg = array('msg' => 'Error al  Modificado Detalle Venta..', 'icono' => 'error');
                };
            }
            
        }
      
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function deleteVenta($id)
    {

        $data = $this->model->deleteDetalle("detalle_temp", $id);
        if ($data == "ok") {
            $msg = "ok";
        } else {
            $msg = "error";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrarVenta(int $id_cliente)
    {


        $id_usuario = $_SESSION['id_usuario']; //ID DEL USER LOGEADO 

        $vereficar=$this->model->getVerificarCaja($id_usuario);

        if(empty($vereficar)){
            $msg=array("msg"=>"Nose puede hacer la venta por que la caja esta cerrada!!", "icono"=>"warning");
        }else{

            $total = $this->model->calcularCompras("detalle_temp", $id_usuario); // OPTENEMOS EL SUBTOTAL DEL TBL DETALLE TEMP
            $data = $this->model->registrarVentas($id_usuario,$id_cliente, $total['total']);
            if ($data == "ok") { // SI NOS REGRESA OK REGISTRAMOS DETALLE COMPRAS
    
                $datos = $this->model->getDetalles("detalle_temp", $id_usuario); //OPTENEMOS DATOS DEL TBL DETALLE
                $id_venta = $this->model->getID("ventas"); //OPTENEMOS EL MAX ID DEL TBL COMPRAS 
                foreach ($datos as $row) {
                    $id_producto = $row['id_producto'];
                    $cantidad = $row['cantidad'];
                    $desc = $row['descuento'];
                    $precio = $row['precio'];
                    $sub_total = ($cantidad * $precio) - $desc;
                    $this->model->registrarDetalleVenta($id_venta['id'], $id_producto, $cantidad, $precio, $desc, $sub_total); //REGISTRA TB DETALLE VENTA
    
    
                    $stock_actual = $this->model->getProductosId($id_producto);
                    $nuevo_stock = $stock_actual['cantidad'] - $cantidad; //RESTAMOS EL STOCK
                    $this->model->actualizarStock($nuevo_stock, $id_producto); //ACTUALIZA STOCK DE TB PRODUCTOS
    
    
                }
                $vaciar = $this->model->vaciarDetalle("detalle_temp", $id_usuario); //VACIAMOS TB DETALLES_TP
                if ($vaciar == "ok") {
                    $msg = array("msg" => "ok", "id_venta" => $id_venta['id']);
                }
            } else {
                $msg = "Error al vender..";
            }

        }

       

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function generarPdfVenta($id_venta)
    {


        $empresa = $this->model->getEmpresa();
        $productos = $this->model->getVentas($id_venta);
        $total_desc = $this->model->getDescuento($id_venta);

        $clientes = $this->model->clientesVenta($id_venta);


        /*
        print_r($productos);
        exit();*/
        require('libraries/fpdf/fpdf.php');
        $pdf = new FPDF('P', 'mm', array(80, 200));
        $pdf->AddPage();
        $pdf->SetMargins(2, 0, 0); //AGREGAMOS UN MARGIN A LA HOJA
        $pdf->SetTitle("Reporte Ventas");
        $pdf->Image(base_url . 'Assets/img/logo.png', 31, 8, 16, 16);
        $pdf->Ln(14);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(75, 10, utf8_decode($empresa['nombre']), 0, 1, 'C');


        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(5, 5, '====================================================', 0, 1, 'L');
        //===========================================================

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('Ruc: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(17, 5, utf8_decode($empresa['ruc']), 0, 1, 'C');
        //===========================================================


        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('TELEFONO: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(15, 5, utf8_decode($empresa['telefono']), 0, 1, 'C');
        //===========================================================
        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('DIRECCION: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(15, 5, utf8_decode($empresa['direccion']), 0, 1, 'C');
        //===========================================================
        //===========================================================
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(19);
        $pdf->Cell(18, 5, utf8_decode('FOLIO: '), 0, 0, 'L');

        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(5, 5, utf8_decode($id_venta), 0, 1, 'C');

        //===========================================================
        $pdf->Cell(5, 5, '====================================================', 0, 1, 'L');
        //======================CLIENTE=====================================


        $pdf->SetFillColor(0, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(25, 5, "Nombre", 0, 0, 'L', true);
        $pdf->Cell(25, 5, utf8_decode('Teléfono'), 0, 0, 'L', true);
        $pdf->Cell(26, 5, utf8_decode('Descripción'), 0, 1, 'L', true);
        //CONTENIDO CLIENTE

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(25, 5, utf8_decode($clientes['nombre']), 0, 0, 'L', true);
        $pdf->Cell(25, 5, utf8_decode($clientes['telefono']), 0, 0, 'L', true);
        $pdf->Cell(25, 5, utf8_decode($clientes['direccion']), 0, 1, 'L', true);


        //===========================================================
        $pdf->Cell(5, 5, '====================================================', 0, 1, 'L');
        //======================HEADER TB VENTA=====================================


        $pdf->SetFillColor(0, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(8, 5, "Cant", 0, 0, 'L', true);
        $pdf->Cell(43, 5, utf8_decode('Descripción'), 0, 0, 'L', true);
        $pdf->cell(9, 5, 'Precio', 0, 0, 'L', true);
        $pdf->Cell(16, 5, 'Sub Total', 0, 1, 'R', true);


        //CONTENIDO
        $pdf->SetTextColor(0, 0, 0);
        $total = 0.00;
        foreach ($productos as $row) {
            $total = $total + $row['sub_total'];
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(8, 5, $row['cantidad'], 0, 0, 'L');
            $pdf->Cell(43, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
            $pdf->cell(9, 5, $row['precio'], 0, 0, 'L');
            $pdf->Cell(16, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'R');
        }

        $pdf->Ln();

        $pdf->Cell(75, 3, 'Descuento Total', 0, 1, 'R');
        $pdf->Cell(75, 5, number_format($total_desc['total'], '2', '.', ','), 0, 1, 'R');


        $pdf->Cell(75, 3, 'Total a Pagar', 0, 1, 'R');
        $pdf->Cell(75, 5, number_format($total, '2', '.', ','), 0, 1, 'R');



        $pdf->Output();
    }

  


    public function anularCompra($id_compra){

        $datos=$this->model->getAnularCompra($id_compra);
        

        $estado=$this->model->actualizarEstadoCompras($id_compra);
        
        foreach ($datos as $row) {
            // $this->model->actualizarStock($row['cantidad'],$row['id_producto']);

            $stock_actual = $this->model->getProductosId($row['id_producto']);
            $nuevo_stock = ($stock_actual['cantidad']) - ($row['cantidad']); //RESTAMOS EL STOCK

            print_r($nuevo_stock);
            exit();
            $this->model->actualizarStock($nuevo_stock, $row['id_producto']); //ACTUALIZA STOCK DE TB PRODUCTOS
        }
        if($estado=='ok'){
            $msg=array("msg"=>"ok", "icono"=>"success");
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }

// ==============Ventas================================
public function listar_historialVentas()
{   
    $id_usuario=$_SESSION['id_usuario'];
    $datos = $this->model->getHistorialVentas($id_usuario);
    for ($i = 0; $i < count($datos); $i++) {

        if ($datos[$i]['total']) {
            $datos[$i]['total'] = '<small class="text-olive font-weight-bold">S/ </small>' . $datos[$i]['total'];
        }
        if($datos[$i]['estado']==1){
            $datos[$i]['acciones'] = '<div>
            <a onclick="anularVenta('.$datos[$i]['id'] .');" ><li class="fas fa-ban text-warning"></li></a>

            <a href=' . base_url . 'Compras/generarPdfVenta/' . $datos[$i]['id'] . ' target="_blank" ><li class="fas fa-file-pdf text-danger"></li></a>
            </div>';
        }else{
            $datos[$i]['acciones'] = '<div>
                <a href=' . base_url . 'Compras/generarPdfVenta/' . $datos[$i]['id'] . ' target="_blank" ><li class="fas fa-file-pdf text-danger"></li></a>
            </div>';
        }
        
    }
    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
    die();
}
    public function anularVenta($id_compra){

        $datos=$this->model->getAnularVenta($id_compra);
        

        $estado=$this->model->actualizarEstadoVentas($id_compra);
        
        foreach ($datos as $row) {
        
            $stock_actual = $this->model->getProductosId($row['id_producto']);
            $nuevo_stock = ($stock_actual['cantidad']) + ($row['cantidad']); //SUMANOS EL STOCK
            $this->model->actualizarStock($nuevo_stock, $row['id_producto']); //ACTUALIZA STOCK DE TB PRODUCTOS
        }
        if($estado=='ok'){
            $msg=array("msg"=>"ok", "icono"=>"success");
        }
        echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        die();
    }

    
}
