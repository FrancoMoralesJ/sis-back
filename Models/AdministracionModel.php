<?php

class AdministracionModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresa";
        $data = $this->select($sql);
        return $data;
    }

    public function modificarEmpresa(string $ruc, string $nombre, string $telefono, string $direccion, string $mensaje, int $id)
    {
        $sql = "UPDATE empresa set ruc=?, nombre=?, telefono=?, direccion=?, mensaje=? WHERE id=?";
        $datos = array($ruc, $nombre, $telefono, $direccion, $mensaje, $id);
        $data = $this->save($sql, $datos);

        if ($data == 1) {
            $res = 'ok';
        } else {
            $res = 'error';
        }

        return $res;
    }

    public function getDatos(string $tabla)
    {
        $sql = "SELECT COUNT(*) as total FROM  $tabla";
        $data = $this->select($sql);
        return $data;
    }
    public function getVentas()
    {
        $sql = "SELECT COUNT(*) AS total
FROM ventas 
WHERE DATE(fecha) = CURDATE()
";
// $sql = "SELECT COUNT(*) AS total 
// FROM ventas 
// WHERE DATE(fecha) = CURDATE()";

        $data = $this->select($sql);
        return $data;
    }
    public function getStockMin()
    {
        $sql = "SELECT * 
FROM productos 
WHERE cantidad < 10 
ORDER BY cantidad DESC 
LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getProductoMasV()
    {
        $sql = "SELECT p.id, p.descripcion, SUM(dp.cantidad) AS TOTAL
FROM detalle_ventas dp
JOIN productos p ON dp.id_producto = p.id
GROUP BY p.id, p.descripcion
ORDER BY TOTAL DESC
LIMIT 10;";
        $data = $this->selectAll($sql);
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
    public function verificarMisPermiso(int $id){
        $sql="select u.usuario,u.nombre,p.permiso as mis_permisos from usuarios u INNER JOIN detalle_permisos d 
ON d.id_usuario=u.id INNER JOIN permisos p ON p.id=d.id_permiso WHERE u.id=:id";
        $datos=["id"=>$id];
        $data=$this->filtrar($sql,$datos);

        if($data){
            $consulta=$data;
        }else{
            $consulta=[];
        }
        return $consulta;
    }
    public function getTotalVentaPorDia(){
        $sql="SELECT v.fecha, SUM(total) AS total_ventas , p.descripcion FROM ventas v INNER JOIN detalle_ventas d ON d.id_venta=v.id INNER JOIN productos p ON p.id=d.id_producto WHERE fecha >= CURDATE() - INTERVAL 7 DAY GROUP BY fecha ORDER BY fecha DESC";

        $data = $this->selectAll($sql);
        return $data;
    }
    public function getProductoSinStock(){
        $sql="SELECT foto,descripcion FROM productos WHERE cantidad <=0";

        $data = $this->selectAll($sql);
        return $data;
    }


}
