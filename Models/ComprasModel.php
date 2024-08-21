<?php
class ComprasModel extends Query
{
    private  $caja, $nombre, $estado = 1, $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductoCod($cod)
    {
        $sql = "select * from productos where codigo='$cod'";
        $data = $this->select($sql);
        return $data;
    }

    public function getProductosId($id)
    {
        $sql = "select * from productos where id='$id'";
        $data = $this->select($sql);
        return $data;
    }
    public function actualizarStock(int $stokc, int $id_pro)
    {

        $sql = "UPDATE productos SET cantidad=? WHERE id=?";
        $datos = array($stokc, $id_pro);
        $data = $this->save($sql, $datos);
        return $data;
    }

    //==============================DETALLE===============================
    public function registrarDetalle(string $tabla, int $id_producto, int $id_usuario, string $precio, int $cantidad, string $sub_total)
    {

        $sql = "INSERT INTO $tabla (id_producto,id_usuario,precio,cantidad,sub_total) values(?,?,?,?,?)";
        $datos = array($id_producto, $id_usuario, $precio, $cantidad, $sub_total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function actualizarDetalle(string $tabla, string $precio, int $cantidad, string $sub_total, int $id_producto, int $id_usuario)
    {

        $sql = "UPDATE $tabla  SET precio=?,cantidad=?,sub_total=? WHERE id_producto=? AND id_usuario=?";

        $datos = array($precio, $cantidad, $sub_total, $id_producto,  $id_usuario);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function getDetalles(string $tabla, int $id_usuario)
    {
        $sql = "select d.*, p.id as idpro, p.descripcion  from  $tabla d INNER JOIN productos p on d.id_producto=p.id WHERE d.id_usuario='$id_usuario'";
        $data = $this->selectAll($sql);

        return $data;
    }

    public function consultarDetalle(string $tabla, int $id_producto, int $id_usuario)
    {
        $sql = "select * from $tabla where id_producto='$id_producto' AND id_usuario='$id_usuario'";
        $data = $this->select($sql);
        
        return $data;
    }

    public function calcularCompras(string $tabla, int $id_usuario)
    {

        $sql = "select  SUM(sub_total) as total from $tabla where id_usuario='$id_usuario'";
        $data = $this->select($sql);

        return $data;
    }
    public function deleteDetalle(string $tabla, int $id)
    {

        $sql = "DELETE  FROM $tabla WHERE id=?";
        $datos = array($id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    //=========================COMPRAS====================================
    public function registrarCompras(string $total)
    {

        $sql = "INSERT INTO compras (total) VALUES  (?)";

        $datos = array($total);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    //===========================DETALLE COMPRA===========================================
    public function getID($tabla)
    {
        $sql = "select max(id) as id from $tabla";
        $data = $this->select($sql);
        return $data;
    }

    public function registrarDetalleCompra(int $id_compra, int $id_producto, int $cantidad, string $precio, string $sub_total)
    {

        $sql = "INSERT INTO detalle_compras (id_compra,id_producto,cantidad,precio,sub_total) VALUES (?,?,?,?,?)";
        $datas = array($id_compra, $id_producto, $cantidad, $precio, $sub_total);
        $data = $this->save($sql, $datas);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function vaciarDetalle(string $tabla, int $id_usuario)
    {
        $sql = "DELETE FROM $tabla WHERE id_usuario=?";
        $datas = array($id_usuario);
        $data = $this->save($sql, $datas);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function getCompras(int $id_compra)
    {
        $sql = "select c.*, d.*,p.id as id_pr ,p.descripcion from compras c INNER JOIN detalle_compras d on c.id=d.id_compra INNER JOIN productos p on p.id=d.id_producto WHERE c.id='$id_compra'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getHistorialCompras()
    {
        $sql = "SELECT * FROM compras";
        $data = $this->selectAll($sql);
        return $data;
    }

    //===============CLIENTES=====================


    public function getClientes()
    {

        $sql = "select * from clientes";
        $data = $this->selectAll($sql);

        return $data;
    }


    //===========================EMPRESA===========================

    public function getEmpresa()
    {

        $sql = "select * from empresa";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarVentas(int $id_usuario,int $id_cliente, string $total = '0.00')
    {

        $sql = "INSERT INTO ventas (id_usuario,id_cliente,total) VALUES  (?,?,?)";

        $datos = array($id_usuario,$id_cliente, $total);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function registrarDetalleVenta(int $id_venta, int $id_producto, int $cantidad, string $precio, string $descuento, string $sub_total)
    {

        $sql = "INSERT INTO detalle_ventas (id_venta,id_producto,cantidad,precio,descuento,sub_total) VALUES (?,?,?,?,?,?)";
        $datas = array($id_venta, $id_producto, $cantidad, $precio, $descuento, $sub_total);
        $data = $this->save($sql, $datas);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function getVentas(int $id_venta)
    {
        $sql = "select v.*, d.*,p.id as id_pr ,p.descripcion from ventas v INNER JOIN detalle_ventas d on v.id=d.id_venta INNER JOIN productos p on p.id=d.id_producto WHERE v.id='$id_venta'";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function clientesVenta(int $id_venta)
    {

        $sql = "select v.id,v.id_cliente,c.* from ventas v INNER JOIN clientes c ON c.id =v.id_cliente where v.id=$id_venta";
        $data = $this->select($sql);

        return $data;
    }


    public function actualizarDescuento(string $desc, string $sub_total, int $id)
    {

        $sql = "UPDATE detalle_temp SET descuento=?, sub_total=? WHERE id=?";

        $datos = array($desc, $sub_total, $id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function verificarDescuento(int $id)
    {
        $sql = "SELECT * FROM detalle_temp WHERE id=$id";
        $data = $this->select($sql);
        return $data;
    }
    public function getDescuento(int $id_venta)
    {
        $sql = "select SUM(descuento) as total from detalle_ventas WHERE id_venta=$id_venta";
        $data = $this->select($sql);
        return $data;
    }

    public function getAnularCompra($id_compra){

        $sql = "select c.*, d.* from compras c INNER JOIN detalle_compras d on c.id=d.id_compra  WHERE c.id='$id_compra'";
        $data = $this->selectAll($sql);
        return $data; 

    }

    
    public function actualizarEstadoCompras(int $id_compra)
    {

        $sql = "UPDATE compras SET estado=? WHERE id=?";

        $datos = array(0, $id_compra);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getMarcas()
    {
        $sql = "select * from marcas";
        $data = $this->selectAll($sql);
        return $data;
    }
    
    public function getCategorias()
    {
        $sql = "select * from categorias";
        $data = $this->selectAll($sql);
        return $data;
    }

    //  ===============================================
    public function getAnularVenta($id_ventas){

        $sql = "select v.*, d.* from ventas v INNER JOIN detalle_ventas d on v.id=d.id_venta  WHERE v.id='$id_ventas'";
        $data = $this->selectAll($sql);
        return $data; 

    }
    
    public function getHistorialVentas($id_usuario)
    {

        $sql = "select v.id,c.nombre,v.total,v.fecha,v.estado from ventas v INNER JOIN clientes c
 ON v.id_cliente=c.id INNER JOIN usuarios u on u.id=v.id_usuario where v.id_usuario=$id_usuario";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function actualizarEstadoVentas(int $id_ventas)
    {

        $sql = "UPDATE ventas SET estado=? WHERE id=?";

        $datos = array(0, $id_ventas);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    // ===============================================================
    public function getVerificarCaja(int $id_usuario){
        $sql = "select * from cierre_caja where id_usuario=$id_usuario and estado=1";
            $data = $this->select($sql);
            return $data;
        }
    // ===============================================================
    public function verificarPermiso(int $id_usuario, string $permiso){
        $sql="select p.id ,p.permiso,d.id,d.id_usuario,d.id_permiso 
         from permisos p INNER JOIN detalle_permisos d ON p.id=d.id_permiso 
         WHERE d.id_usuario=:id_usuario AND p.permiso=:permiso ";
         $datos=['id_usuario'=>$id_usuario,"permiso"=>$permiso];
         $data=$this->filtrar($sql,$datos);

         return $data;

    }

    public function filtrarProducto(String $campo, String $producto){

        $sql = "SELECT p.codigo ,p.foto,p.descripcion, m.nombre_marca,p.precio_venta,p.cantidad, p.estado FROM productos p INNER JOIN marcas m ON 
        p.id_marca = m.id INNER JOIN categorias c ON c.id=p.id_categoria WHERE p.".$campo."=:".$campo;

        $params = array(':'.$campo =>  $producto );
        $data= $this->filtrar($sql, $params);
        return $data;
    }
}
