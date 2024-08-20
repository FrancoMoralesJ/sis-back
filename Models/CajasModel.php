<?php
class CajasModel extends Query
{
    private  $caja, $estado = 1, $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCajas()
    {
        $sql = "select * from caja";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function registrarCaja(string $caja)
    {
        $this->caja = $caja;
        $verificar = "select * from caja where caja='$this->caja'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO caja (caja) values(?)";
            $datos = array($this->caja);
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


    public function modificarCaja(string $caja, int $id)
    {
        $this->id = $id;
        $this->caja = $caja;

        $sql = "UPDATE  caja SET caja=? WHERE id=?";

        $datos = array($this->caja, $this->id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }

    public function editarCaja(int $id)
    {
        $sql = "SELECT * FROM caja WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesCaja(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE caja SET estado=? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);

        return $data;
    }
    // #BLTJ%Y6JZ#AX

    // Arqueo de cajas

    public function registrarArqueo(int $id_usario,string $montoInicial, string $fecha_apertura)
    {
        
        $verificar = "select * from cierre_caja where id_usuario='$id_usario' AND estado=1";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO cierre_caja (id_usuario,monto_inicial,fecha_apertura) values(?,?,?)";
            $datos = array($id_usario,$montoInicial,$fecha_apertura);
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

    public function getArqueo(int $id_usario)
    {
        $sql = "select id,monto_inicial,monto_final,fecha_apertura,fecha_cierre,total_ventas,monto_total,estado from cierre_caja WHERE id_usuario=$id_usario";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getVentas(int $id_usario)
    {
        $sql = "select sum(total) as cantidad_ventas from ventas where id_usuario=$id_usario and apertura=1";
        $data = $this->select($sql);
        return $data;
    }
    public function getTotalVentas(int $id_usario)
    {
        $sql = "select count(total) as total_ventas from ventas where id_usuario=$id_usario and estado=1 and apertura=1";
        $data = $this->select($sql);
        return $data;
    }
    public function getMontoInicial(int $id_usario){
        $sql="select id,monto_inicial from cierre_caja where id_usuario= $id_usario AND estado=1";
        $data=$this->select($sql);
        return $data;
    }
    public function actualizarArqueo(string $monto_finaL,string $fecha_apertura,int $cantidad_ventas,string $montoTotal,int $id_usuario){
           
        $sql='UPDATE cierre_caja SET monto_finaL=?,fecha_cierre=?,total_ventas=?,monto_total=?,estado=? WHERE id_usuario=?';
        $datos=array($monto_finaL,$fecha_apertura,$cantidad_ventas,$montoTotal,0,$id_usuario);
        $data=$this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "Error";
        }
        return $res;
    }
    public function cerrarAperturaVenta(int $id_usario){
        $sql="UPDATE ventas set apertura=? WHERE id_usuario=? AND estado=?";
        $datos=array(0,$id_usario,1);
        $data=$this->save($sql,$datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "Error";
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
}
