<?
use app\controllers\HomeController;
use app\controllers\UserController;
use app\controllers\StoreController;
use app\controllers\ProductController;

$home = HomeController::class;

Flight::route('GET /', [$home,'index']);
Flight::route('GET /report',function(){
    view('report');
});
Flight::route('GET /setting',function(){
    view('settings');
});

Flight::group('/store', function(){
    //class StoreController
    $store = StoreController::class;
    Flight::route('/', [$store, 'index']);
});
Flight::group('/user', function(){
    //class UserController
    $user = UserController::class;
    Flight::route('GET /', [$user, 'index']);
});
Flight::group("/product", function(){
    //class ProductController
    $product = ProductController::class;
    Flight::route('GET /', [$product, 'index']);
});

Flight::start();
