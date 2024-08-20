<?php
class MedidasModel extends Query
{
    private  $nombre, $nombre_corto, $estado = 1, $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getMedidas()
    {
        $sql = "select * from medidas";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function registrarMedidas(string $nombre, string $nombre_corto)
    {
        $this->nombre = $nombre;
        $this->nombre_corto = $nombre_corto;
        $verificar = "select * from medidas where nombre='$this->nombre'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO medidas (nombre,nombre_corto) values(?,?)";
            $datos = array($this->nombre, $this->nombre_corto);
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


    public function modificarMedidas(string $nombre, string $nombre_corto, int $id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nombre_corto = $nombre_corto;

        $sql = "UPDATE  medidas SET nombre=?,nombre_corto=? WHERE id=?";

        $datos = array($this->nombre, $this->nombre_corto, $this->id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }

    public function editarMedidas(int $id)
    {
        $sql = "SELECT * FROM medidas WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesMedidas(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE medidas SET estado=? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);

        return $data;
    }
    // #BLTJ%Y6JZ#AX
    public function verificarPermiso(int $id_usuario, string $permiso){
        $sql="select p.id ,p.permiso,d.id,d.id_usuario,d.id_permiso 
         from permisos p INNER JOIN detalle_permisos d ON p.id=d.id_permiso 
         WHERE d.id_usuario=:id_usuario AND p.permiso=:permiso ";
         $datos=['id_usuario'=>$id_usuario,"permiso"=>$permiso];
         $data=$this->filtrar($sql,$datos);

         return $data;

    }
}
