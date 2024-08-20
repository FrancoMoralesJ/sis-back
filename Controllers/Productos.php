<?php
class Productos extends Controller
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
            $data['page_id'] = 12;
            $data['tag_page'] = "Productos ";
            $data['page_titile'] = "Mantenimiento de Productos";
            $data['page_name'] = "Productos
            ";
            $data['user'] = $_SESSION['usuario'];
            $data['medidas'] = $this->model->getMedidas();
            $data['categorias'] = $this->model->getCategorias();
            $data['marcas'] =$this->model->getMarcas();
            $data['id_User']=$id_usuario;
            $data['roles']=$this->model->verificarPermiso($id_usuario,"Productos");

            if($_SESSION['modulo_productos']=='Productos'){
                $this->views->gteView($this, "index", $data); 
                    
            }else{
                              header('location:'.base_url);
            }
    
        

        //print_r($this->model->getUsuario());
    }

    public function listar()
    {
        if (empty($_SESSION['acciones'])) {

            header("location:" . base_url);
        }
        $data = $this->model->getProductos();
        for ($i = 0; $i < count($data); $i++) {

            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . base_url . "Assets/img/productos/" . $data[$i]['foto'] . '" width="40px" >';

            if ($data[$i]['cantidad'] <= 0) {
                $data[$i]['cantidad'] = '<p class="font-weight-bold text-danger  ">' . $data[$i]['cantidad'] . '</p>';
            } else {
                $data[$i]['cantidad'] = '<p class="font-weight-bold text-primary  ">' . $data[$i]['cantidad'] . '</p>';
            }
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-success"></i>';
                $data[$i]['acciones'] = ' <div>
                <a  class=" text-gradient-primary" onclick="btnActualizarProductos(' . $data[$i]['id'] . ');"><i class="fas fa-edit"></i></a>
                <a class=" text-danger" onclick="btnEliminarProductos(' . $data[$i]['id'] . ');"><i class="fa fa-times"></i></a>
                </div>
            ';
            } else {
                $data[$i]['estado'] = '<i class="fas fa-check-circle text-danger"></i>';
                $data[$i]['acciones'] = ' <div>
                <a   class=" text-success" onclick="btnReingresarProductos(' . $data[$i]['id'] . ');"><i class="fas fa-sync-alt"></i></a>
                </div>
            ';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }


    public function registrar()
    {

        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $precio_compra = $_POST['preciocompra'];
        $precio_venta = $_POST['precioventa'];
        $cantidad = 0;  // $_POST['cantidad'];
        $id_marca=$_POST['marcas'];
        $id_medida = $_POST['medida'];
        $id_categoria = $_POST['categoria'];
        $img = $_FILES['imagen'];

        $name = $img['name'];
        $temp_name = $img['tmp_name'];
        $id = $_POST['id'];

        $fecha = date("YmdHis");
        $destino = "";

     
        $compresion=9;

        if (
            empty($codigo)  || empty($descripcion) || empty($precio_compra) || empty($precio_venta) || empty($id_marca) || empty($id_medida) || empty($id_categoria)
        ) {
            $msg = "Todos los campos son obligatorios";
        } else {


            if (!empty($name)) { //REGISTRAR
                $imgNombre = $fecha . '.webp';
                $destino = "Assets/img/productos/" . $imgNombre;
            } else if (!empty($_POST['foto_actual'])  && empty($name)) { //MODIFICAR
              
                $imgNombre = $_POST['foto_actual'];
            } else {
                $imgNombre = "default.webp"; //ELIMINAR
            }

                
            if ($id == "") {
                

                $data = $this->model->registrarProductos($codigo, $descripcion, $precio_compra, $precio_venta, $id_marca, $id_medida, $id_categoria, $imgNombre);
                if ($data == "ok") {

                    // if (!empty($imgNombre)) {
                    //     move_uploaded_file($temp_name, $destino); //movemos la imagen
                    // }
                    if (!empty($imgNombre)) {
                        // move_uploaded_file($fotoTemp, $rutaIMG);
                        if ($imgNombre != 'default.webp') {
                            convertirWebP($temp_name, $destino, $compresion);
                        }
                    }




                    $msg = "si";


                } else if ($data == "existe") {
                    $msg = "El producto ya existe!!";
                } else {
                    $msg = "Error al registrar producto!!";
                }
            } else { //MODIFICAR

                //comparamos si hubo cambios en la foto...

                $imgDelete = $this->model->editarProductos($id);

                // if ($imgDelete['foto'] !="default.webp") { //COMPROBAMOS  SI LAS IMAGENES SON IGUAL O SON POR DEFAULT PARA PODER ELIMINAR

                //     if (file_exists("Assets/img/productos/" . $imgDelete['foto'])) {

                //         unlink("Assets/img/productos/20240820152656.webp");
                //     }
                // }
                if ($imgDelete['foto'] !="default.webp" && $imgDelete['foto'] !=$imgNombre) { //COMPROBAMOS  SI LAS IMAGENES SON IGUAL O SON POR DEFAULT PARA PODER ELIMINAR

                        if (file_exists("Assets/img/productos/" . $imgDelete['foto'])) {
    
                            unlink("Assets/img/productos/". $imgDelete['foto']);
                        }
                    }

                $data = $this->model->modificarProductos($codigo, $descripcion, $precio_compra, $precio_venta, $id_marca, $id_medida, $id_categoria, $imgNombre, $id);;
                
                
                
                if ($data == "modificado") {


                    if (!empty($imgNombre)) {
                        if ($imgNombre != 'default.webp' &&  $imgNombre !=$imgDelete['foto'] ) {
                            
                            convertirWebP($temp_name, $destino, $compresion);
                        }
                    }
                    $msg = "modificado";
                } else {
                    $msg = "Error al modificar producto!!";
                }
                //$msg = $_POST['usuario'] . $_POST['nombre'] . $_POST['caja'] . $_POST['id'];
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function editar(int $id)
    {
        $data = $this->model->editarProductos($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {


        $data = $this->model->accionesProductos(0, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el producto!!";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function reingresar(int $id)
    {


        $data = $this->model->accionesProductos(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al reingresar el producto!!";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function filtrarProductos() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id']; 
            $tipo = $_GET['tipo']; 
    
            $respuesta = [
                'id' => $id,
                'tipo' => $tipo,
                'mensaje' => 'Datos recibidos correctamente'
            ];
            $campo="";
            if($tipo==1){
                $campo='codigo';
            }
            else if($tipo==2){
                $campo='descripcion';
            }
            else if($tipo==3){
                $campo='id_marca';
            }
            if(empty($id) && empty($tipo)){
               
                $data['Productos']=[''];
            }else{
                
                $data['Productos']=$this->model->filtrarProducto($campo,$id);
            }
            

        // print_r($data);
        // exit();


        
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            die();
        }
    }
    function generarCodigo() {
        // Genera un número aleatorio con la longitud especificada
     $numeroAleatorio = random_int(1000, 9999); // Asegura que sea de 4 dígitos
     // Retorna el código con el prefijo 'COD'
     $codigo= 'COD0' . $numeroAleatorio;
 
     echo json_encode($codigo,JSON_UNESCAPED_UNICODE);
     }

}
 