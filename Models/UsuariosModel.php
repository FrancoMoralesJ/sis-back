<?php
class UsuariosModel extends Query
{
    private $usuario, $nombre, $clave, $id_caja, $estado = 1, $id,$caja ;

    public function __construct()
    {
        parent::__construct();
    }


    public function getUsuarios()
    {
        $sql = "select u.*, c.id as id_caja, c.caja from usuarios u INNER JOIN  caja c ON  u.id_caja =c.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCajas()
    {
        $sql = "select * from caja";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getUsuario($usuario, $pass)
    {
        $sql = "select * from usuarios where usuario=:usuario AND  clave=:clave";
        $dtos=[':usuario'=>$usuario,':clave'=>$pass];
        $data = $this->setSelect($sql,$dtos);
        return $data;
    }

    public function registrarUsuario(string $usuario, string $nombre, string $clave, int $id_caja)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->id_caja = $id_caja;
        $verificar = "SELECT * FROM usuarios WHERE usuario='$this->usuario'";
        $existe = $this->selectAll($verificar);
        if (empty($existe)) {
            $sql = "insert into usuarios (usuario,nombre,clave,id_caja) values (?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->id_caja);
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


    public function modificarUsuario(string $usuario, string $nombre,  int $caja, int $id)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->caja = $caja;
        $this->id = $id;

        $sql = "UPDATE  usuarios SET usuario=?,nombre=?,id_caja=? WHERE id=?";
        $datos = array($this->usuario, $this->nombre, $this->caja, $this->id);

        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "Error";
        }


        return $res;
    }
    public function editarUsuario($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id='$id'";
        $data = $this->select($sql);

        return $data;
    }

    public function accionesUser(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE usuarios SET estado=? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);

        return $data;
    }

    public function getPass(int $id, string $clave)
    {

        $sql = "select * from usuarios WHERE id=$id AND clave='$clave'";
        $data = $this->select($sql);

        return $data;
    }
    

    public function setCambiarClave(int $id, string $nuevaclave)
    {

        $sql = "UPDATE usuarios SET clave=? WHERE id=?";
        $data = array($nuevaclave, $id);
        $data = $this->save($sql, $data);

        return $data;
    }

    public function getPermisos()
    {

        $sql = "select * from permisos";
        $data = $this->selectAll($sql);

        return $data;
    }
    public function getDetallePermisos(int $id_usuario){
        $sql="select * from detalle_permisos where id_usuario=:id_usuario";
        $datos=["id_usuario"=>$id_usuario];
        $data=$this->filtrar( $sql,$datos);
        return $data;
        // filtrar
    }
    public function registrarPermisos(int $id_usuario, int $id_permisos)
    {

        $sql = "INSERT INTO detalle_permisos (id_usuario,id_permiso) values (?,?) ";
        $data = array($id_usuario, $id_permisos);
        $data = $this->save($sql, $data);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "Error";
        }
        return $res;
    }
    public function eliminarPermisos(int $id_usuario)
    {

        $sql = "DELETE FROM detalle_permisos where id_usuario=?  ";
        $data = array($id_usuario);
        $data = $this->save($sql, $data);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "Error";
        }
        return $res;
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
    
}
