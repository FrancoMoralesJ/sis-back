<?php
class Ventas extends Controller
{

    function __construct()
    {
        session_start();
        if (empty($_SESSION['acciones'])) {

            header("location:" . base_url);
        }
        parent::__construct();
    }

    public function index()
    {
        $data['page_id'] = 12;
        $data['tag_page'] = "Realizar Ventas ";
        $data['page_titile'] = "Realizar Ventas";
        $data['page_name'] = "Realizar Ventas ";
        $data['user'] = $_SESSION['usuario'];
        $this->views->gteView($this, "index", $data);

        
        
    }


    public function historial()
    {

        echo "hola soy ventas..";
    }

    public function historialVentas()
    {
        $data['page_id'] = 12;
        $data['tag_page'] = "Realizar Ventas ";
        $data['page_titile'] = "Realizar Ventas";
        $data['page_name'] = "Realizar Ventas ";
        $data['user'] = $_SESSION['usuario'];
        $this->views->gteView($this, "historial", $data);
    }
}
