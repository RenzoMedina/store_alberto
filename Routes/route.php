<?
use App\Controllers\HomeController;

$home = HomeController::class;

Flight::route('GET /', [$home,'index']);
Flight::route("GET /store",[$home, 'store']);
Flight::start();