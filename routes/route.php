<?php
use app\controllers\ProfileController;
use app\controllers\HomeController;
use app\controllers\ProveedorController;
use app\controllers\ReportController;
use app\controllers\UserController;
use app\controllers\StoreController;
use app\controllers\ProductController;

$home = HomeController::class;
$profile = ProfileController::class;
$report = ReportController::class;

Flight::route('GET /', [$home,'index']);

Flight::route('GET /report',[$report,'index']);
Flight::route('GET /report/visual',[$report,'showReport']);

Flight::route('GET /setting',[$profile,'index']);

Flight::route('GET /login', function(){
    view('login');
});

Flight::route("POST /profile",[$profile,'store'] );

/*
 * Routes of store
 */
Flight::group('/store', function(){
    //class StoreController
    $store = StoreController::class;
    Flight::route('GET /', [$store, 'index']);
    Flight::route('POST /create', [$store, 'store']);
    Flight::route('POST /box', [$store, 'box']);
    Flight::route('GET /credit', [$store, 'listCredit']);
    Flight::route('POST /pago', [$store, 'pagoCredito']);
});

/*
 * Routes of user
 */
Flight::group('/user', function(){
    //class UserController
    $user = UserController::class;
    Flight::route('GET /',[$user, 'main']);
    Flight::route('GET /list', [$user, 'index']);
    Flight::route('POST /store',[$user, 'store']);
    Flight::route('POST /login',[$user, 'login']);
});

/*
 * Routes of product 
 */
Flight::group("/product", function(){
    //class ProductController
    $product = ProductController::class;
    Flight::route('GET /', [$product, 'index']);
    Flight::route('GET /register', function(){
        view('productRegister');
    });
});

/*
 * Routes of proveedor
 */
Flight::group("/proveedor", function(){
    //class ProductController
    $proveedor = ProveedorController::class;
    Flight::route('GET /', [$proveedor, 'index']);
    Flight::route('GET /pago', [$proveedor, 'pago']);
    Flight::route('POST /pago/create', [$proveedor, 'pagoCreate']);
    Flight::route('GET /list', [$proveedor, 'getAll']);
    Flight::route('POST /store', [$proveedor, 'store']);
    Flight::route('GET /edit/@id', [$proveedor, 'edit']);
    Flight::route('POST /update/@id', [$proveedor, 'update']);
});


/*
 * Route of facturacion
 */
Flight::route('GET /facturacion', function(){
    view('facturacion');
});
Flight::start();
