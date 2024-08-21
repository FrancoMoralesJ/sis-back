<?php
class ProductosModel extends Query
{
    private  $descripcion, $precio_compra, $precio_venta, $cantidad = 0, $id_marca,
        $id_medida, $id_categoria, $codigo,  $estado = 1, $id, $img;

    public function __construct()
    {
        parent::__construct();
    }
    public function getProductos()
    {
        $sql = "select p.*,m.id as idMed,m.nombre,c.id as idCat, c.nombre from productos p INNER JOIN medidas m ON p.id_medida= m.id INNER JOIN categorias c ON p.id_categoria=c.id";

        $data = $this->selectAll($sql);
        return $data;
    }
    public function getMedidas()
    {
        $sql = "select * from medidas";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCategorias()
    {
        $sql = "select * from categorias";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function registrarProductos(
        string $codigo,
        string $descripcion,
        string $precio_compra,
        string  $precio_venta,
        int $id_marca,
        int $id_medida,
        int $id_categoria,
        string $img
    ) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->cantidad = 0;
        $this->id_marca = $id_marca;
        $this->id_medida = $id_medida;
        $this->id_categoria = $id_categoria;
        $this->img = $img;
        $verificar = "SELECT * FROM productos WHERE codigo='$this->codigo'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO productos (codigo,descripcion,precio_compra,precio_venta,id_marca,id_medida,id_categoria,foto) 
             values (?,?,?,?,?,?,?,?)";
             $datos = array(
                $this->codigo, $this->descripcion, $this->precio_compra, $this->precio_venta, $this->id_marca, $this->id_medida, $this->id_categoria, $this->img
             );
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "Error";
            }
        } else {
            $res = "existe";
        }

        return $res;
    }


    public function modificarProductos(
        string $codigo,
        string $descripcion,
        string $precio_compra,
        string  $precio_venta,
        int $id_marca,
        int $id_medida,
        int $id_categoria,
        string $img,
        int $id
    ) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->id_marca=$id_marca;
        $this->id_medida = $id_medida;
        $this->id_categoria = $id_categoria;
        $this->img = $img;
        $this->id = $id;


        $sql = "UPDATE  productos SET codigo=?,descripcion=?,precio_compra=?,precio_venta=?,id_marca=?,id_medida=?,id_categoria=?,foto=? WHERE id=?";
        $datos = array(
            $this->codigo, $this->descripcion, $this->precio_compra, $this->precio_venta,$this->id_marca, $this->id_medida, $this->id_categoria, $this->img, $this->id
        );

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }
    public function editarProductos($id)
    {
        $sql = "SELECT * FROM productos WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesProductos(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE productos SET estado=? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);

        return $data;
    }


    public function getMarcas()
    {
        $sql = "select * from marcas";
        $data = $this->selectAll($sql);
        return $data;
    }
    

    public function filtrarProducto(String $campo, String $producto){

        $sql = "SELECT p.codigo ,p.foto,p.descripcion, m.nombre_marca,p.cantidad, p.estado FROM productos p 
        INNER JOIN marcas m ON p.id_marca = m.id 
        WHERE p." . $campo . " LIKE :producto";

        $params = array(':producto' =>  $producto . '%');
        $data= $this->filtrar($sql, $params);
        return $data;
    }
    public function verificarPermiso(int $id_usuario, string $permiso){
        $sql="select p.id ,p.permiso,d.id,d.id_usuario,d.id_permiso 
         from permisos p INNER JOIN detalle_permisos d ON p.id=d.id_permiso 
         WHERE d.id_usuario=:id_usuario AND p.permiso=:permiso ";
         $datos=['id_usuario'=>$id_usuario,"permiso"=>$permiso];
         $data=$this->filtrar($sql,$datos);

         return $data;

    }
}
