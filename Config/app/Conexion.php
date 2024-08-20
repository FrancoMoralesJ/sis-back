<?php
class Conexion{
private $conect;

public function __construct(){
    // $pdo="sqlsrv:server=".host.";database=".db;

     $pdo = "mysql:host=".host.";dbname=".db.";charset=utf8mb4";
    try {
        $this->conect=new PDO($pdo,user,pass);
        $this->conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       echo "Eror de la conexion <br>".$e->getMessage();
    }
}
public function conect(){
    return $this->conect;
}
}
?>