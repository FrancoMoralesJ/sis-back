<?php

class Errors extends Controller
{

    
    public function index(){

        $this->views->gteView($this,'index');
    }
    
    public function permisos(){

        $this->views->gteView($this,'permisos');
    }
    
}