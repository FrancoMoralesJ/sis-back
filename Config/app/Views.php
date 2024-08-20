<?php

class Views
{
    // gteView
    public function gteView($controlador, $vista, $data = "")
    {
        $controlador = get_class($controlador);
        if ($controlador == "Home") {
            $vista = "Views/" . $vista . ".php";
        } else {
            $vista = "Views/" . $controlador . "/" . $vista . ".php";
        }
        require  $vista;
    }
}
