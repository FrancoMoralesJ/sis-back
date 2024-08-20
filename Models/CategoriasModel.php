<?php
class CategoriasModel extends Query
{
    private  $caja, $nombre, $estado = 1, $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()
    {
        $sql = "select * from categorias";
        $data = $this->selectAll($sql);
        return $data;
    }



    public function registrarCategorias(string $nombre)
    {
        $this->nombre = $nombre;
        $verificar = "select * from categorias where nombre='$this->nombre'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO categorias (nombre) values(?)";
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


    public function modificarCategorias(string $nombre, int $id)
    {
        $this->id = $id;
        $this->nombre = $nombre;

        $sql = "UPDATE  categorias SET nombre=? WHERE id=?";

        $datos = array($this->nombre, $this->id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }

    public function editarCategorias(int $id)
    {
        $sql = "SELECT * FROM categorias WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesCategorias(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE categorias SET estado=? WHERE id=?";
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
