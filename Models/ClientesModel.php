<?php
class ClientesModel extends Query
{
    private $dni, $nombre, $telefono, $direccion, $estado = 1, $id;

    public function __construct()
    {
        parent::__construct();
    }

    public function getClientes()
    {
        $sql = "select * from clientes";
        $data = $this->selectAll($sql);
        return $data;
    }

    /*
    public function getCajas()
    {
        $sql = "select * from caja";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getUsuario($usuario, $pass)
    {
        $sql = "select * from usuarios where usuario='$usuario' AND  clave='$pass'";
        $data = $this->select($sql);
        return $data;
    }
*/
    public function registrarCliente(int $dni, string $nombre, string $telefono, string $direccion)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $verificar = "select * from clientes where dni='$this->dni'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO clientes (dni,nombre,telefono,direccion) values(?,?,?,?)";
            $datos = array($this->dni, $this->nombre, $this->telefono, $this->direccion);
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


    public function modificarCliente(int $dni, string $nombre, string $telefono, string $direccion, int $id)
    {
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;

        $sql = "UPDATE  clientes SET dni=?,nombre=?,telefono=?,direccion=? WHERE id=?";

        $datos = array($this->dni, $this->nombre,  $this->telefono, $this->direccion, $this->id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }

    public function editarCliente($id)
    {
        $sql = "SELECT * FROM clientes WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesCliente(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE clientes SET estado=? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);

        return $data;
    }
    // #BLTJ%Y6JZ#AX opner cliente ventas

    public function verificarPermiso(int $id_usuario, string $permiso){
        $sql="select p.id ,p.permiso,d.id,d.id_usuario,d.id_permiso 
         from permisos p INNER JOIN detalle_permisos d ON p.id=d.id_permiso 
         WHERE d.id_usuario=:id_usuario AND p.permiso=:permiso ";
         $datos=['id_usuario'=>$id_usuario,"permiso"=>$permiso];
         $data=$this->filtrar($sql,$datos);

         return $data;

    }
}
