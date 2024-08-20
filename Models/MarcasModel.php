<?php
class MarcasModel extends Query
{
    private  $nombre,  $estado = 1, $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getMarcas()
    {
        $sql = "select * from marcas";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function registrarMarcas(string $nombre)
    {
        $this->nombre = $nombre;
    
        $verificar = "select * from marcas where nombre_marca='$this->nombre'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO marcas (nombre_marca) values(?)";
            $datos = array($this->nombre);
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


    public function modificarMarcas(string $nombre, int $id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
      

        $sql = "UPDATE  marcas SET nombre_marca=? WHERE id=?";

        $datos = array($this->nombre,  $this->id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }

    public function editarMarcas(int $id)
    {
        $sql = "SELECT * FROM marcas WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesMarcas(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE marcas SET estado=? WHERE id=?";
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
