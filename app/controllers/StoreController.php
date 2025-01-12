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
    public function show($id){}
    public function edit($id){}
    public function update($id){}
    public function destroy($id){}
}