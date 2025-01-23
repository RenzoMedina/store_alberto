<?php
namespace app\controllers;

use core\database\QueryBuilder;
use Flight;

class StoreController{
    protected $store_con;
    public function __construct(){
        $this->store_con= new QueryBuilder();
    }
    public function index(){
        $data = $this->store_con->getAllVenta();
        view('store', ['data'=>$data]);
    }
    public function store(){
        session_start();
        $request = Flight::request()->data;
        $json = json_encode( $request );
        $this->store_con->createVentaBasic($json);
        $_SESSION['store_ok']='Venta agregado';
        Flight::redirect("/store");

    }
    public function box(){
       $valor = $this->store_con->cierreCaja();
       $this->store_con->totalCierreCaja($valor["total_ventas"]);
       Flight::redirect("/report");
    }
    public function listCredit(){
        $data = $this->store_con->getAllCredit();
        view('credito', ['data'=>$data]);
    }

    public function pagoCredito(){
        session_start();
        $request = Flight::request()->data;
        $json = json_encode( $request );
        $this->store_con->createPagoCredito($json);
        $this->store_con->updateStateVenta($json);
        $_SESSION['pago_credito_ok']='Se ha realizado el pago con éxito!';
        Flight::redirect("/store/credit");

    }
    public function edit($id){
        $data = $this->store_con->getByIdVenta($id);
        //Flight::json($data);
        view('storeEdit', ['data'=>$data]);
    }
    public function update($id){
        session_start();
        $data = Flight::request()->data;
        $json = json_encode( $data );
        $this->store_con->updateByIdVenta($id, $json);
        $_SESSION['venta_actualizado_ok']='Se ha actualizado con éxito!';
        Flight::redirect("/store");
        
    }
    public function destroy($id){
        session_start();
        $this->store_con->deleteByIdVenta($id);
        $_SESSION['venta_eliminado_ok']='Se ha eliminado con éxito!';
        Flight::redirect("/store");
    }
}