<?
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
    public function show($id){}
    public function edit($id){}
    public function update($id){}
    public function destroy($id){}
}