<?
use app\controllers\HomeController;
use app\controllers\UserController;

$home = HomeController::class;

Flight::route('GET /', [$home,'index']);
Flight::route("GET /store",[$home, 'store']);
Flight::group('/user', function(){
    //class UserController
    $user = UserController::class;
    Flight::route('GET /index', [$user, 'index']);
});
Flight::start();