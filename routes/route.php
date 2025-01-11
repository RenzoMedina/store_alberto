<?
use app\controllers\ProfileController;
use app\controllers\HomeController;
use app\controllers\UserController;
use app\controllers\StoreController;
use app\controllers\ProductController;

$home = HomeController::class;
$profile = ProfileController::class;

Flight::route('GET /', [$home,'index']);

Flight::route('GET /report',function(){
    view('report');
});

Flight::route('GET /setting',[$profile,'index']);

Flight::route('GET /login', function(){
    view('login');
});

Flight::route("POST /profile",[$profile,'store'] );

Flight::group('/store', function(){
    //class StoreController
    $store = StoreController::class;
    Flight::route('/', [$store, 'index']);
});

Flight::group('/user', function(){
    //class UserController
    $user = UserController::class;
    Flight::route('GET /',[$user, 'main']);
    Flight::route('GET /list', [$user, 'index']);
    Flight::route('POST /store',[$user, 'store']);
});

Flight::group("/product", function(){
    //class ProductController
    $product = ProductController::class;
    Flight::route('GET /', [$product, 'index']);
});

Flight::start();
