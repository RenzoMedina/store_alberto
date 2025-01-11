<?php
namespace app\controllers;

use core\database\QueryBuilder;
use Flight;
class UserController{
    protected $user ;
    public function __construct(){
        $this->user = new QueryBuilder();
    }

    public function main(){
        $data = $this->user->getAllRol();
        //dd($data);
        view('user', ['data' => $data]);
    }
    public function index(){
        $data = $this->user->getAllUser();
        //dd($data);
        view('userList', ['data' => $data]);
    }
    public function store(){
        session_start();
        $request = Flight::request()->data;
        $json = json_encode( $request );
        if($this->user->validateIdUser($json )){
            $this->user->createUser($json);
            $_SESSION['user_success']='Usuario creado exitosamente.';
            Flight::redirect("/");
        }else{
            $_SESSION['user_error']='El usuario ya existe, intente con otros datos';
            Flight::redirect("/user");
        }
        
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