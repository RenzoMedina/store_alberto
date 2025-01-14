<?php

namespace app\controllers;
use core\database\QueryBuilder;
use Flight;

class ProveedorController{
    protected $proveedor;
    public function __construct(){
        $this->proveedor = new QueryBuilder();
    }
    public function index(){
        view('proveedorRegister');
    }

    public function store(){
        session_start();
        $request = Flight::request()->data;
        $json = json_encode( $request );
        $this->proveedor->createProveedor($json);
        $_SESSION['proveedor_ok']='Proveedor registro con éxito!!';
        Flight::redirect("/proveedor");
    }
}