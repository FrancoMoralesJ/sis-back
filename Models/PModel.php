<?php
class PModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario($no, $pass)
    {
        $sql = "select * from usuarios where usuario='$no' AND  clave='$pass'";
        $data = $this->select($sql);
        return $data;
    }
}
