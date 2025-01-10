<?php
namespace app\controllers;

use core\database\QueryBuilder;
use Flight;
class UserController{
    protected $user ;
    public function __construct(){
        $this->user = new QueryBuilder();
    }
    public function index(){
        view('user');
    }
    public function store(){
        session_start();
        $request = Flight::request()->data;
        $json = json_encode( $request );
        $this->user->createUser($json);
        $_SESSION['user_success']='Usuario creado exitosamente.';
        Flight::redirect("/");
    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}