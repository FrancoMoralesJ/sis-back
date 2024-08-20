<?php

class Query extends Conexion
{
    private $pdo, $con, $sql, $datos;

    public function __construct()
    {
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conect();
    }

    public function setSelect(String $sql, array $datos = [] )
    {
        $this->sql = $sql;
        $result = $this->con->prepare($this->sql);

        foreach($datos as $key => $value){
            $result->bindValue($key,$value);
        }
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function select(String $sql)
    {
        $this->sql = $sql;
        $result = $this->con->prepare($this->sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function selectAll(String $sql)
    {
        $this->sql = $sql;
        $result = $this->con->prepare($this->sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function save(String $sql, array $datos)
    {
        $this->sql = $sql;
        $this->datos = $datos;
        $inset = $this->con->prepare($this->sql);
        $data = $inset->execute($this->datos);
        if ($data) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }

    public function filtrar(String $sql, array $params)
    {
        $result = $this->con->prepare($sql);
        foreach ($params as $key => $value) {
            $result->bindValue($key, $value, PDO::PARAM_STR);
        }
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
