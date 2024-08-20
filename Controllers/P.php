<?php
class P extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function  index()
    {
        $this->views->gteView($this, "p");
    }
    public function validar()
    {



        /* if (empty($_POST['nombre']) || empty($_POST['pass'])) {
            $msg = "Los campos están vacios";
        } else {
            $user = $_POST['nombre'];
            $pass = $_POST['pass'];

            $data = $this->model->getUsuario($user, $pass);
            $msg = "ok";
        }
        json_encode($msg, JSON_UNESCAPED_UNICODE);
*/

        if ($_POST) {
            $nom = $_POST['nombre'];
            $pass = $_POST['pass'];
            $data = $this->model->getUsuario($nom, $pass);
            if ($data) {
                $msg = "ok";
            } else {
                $msg = "Los campos están vacios";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            // var_dump($msg);
        }
    }
}
