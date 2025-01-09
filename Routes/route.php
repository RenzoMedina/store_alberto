<?php
use App\Controllers\HomeController;

$home = HomeController::class;

Flight::route('GET /', [$home,"index"]);
Flight::start();