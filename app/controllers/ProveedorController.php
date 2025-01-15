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
        Flight::redirect("/proveedor/list");
    }

    public function getAll(){
        $data = $this->proveedor->getAllProveedor();
        view('proveedorList', ['data'=>$data]);
    }
    public function edit($id){
        $data= $this->proveedor->getByIdProveedor($id);
        view('proveedorEdit',['data'=>$data]);
    }

    public function update($id){
        session_start();
        $data= Flight::request()->data;
        $json = json_encode( $data );
        $this->proveedor->updateProveedor($json, $id);
        $_SESSION['proveedor_udpate']='Proveedor se ha actualizado con éxito!!';
        Flight::redirect("/proveedor/list");
    }
}