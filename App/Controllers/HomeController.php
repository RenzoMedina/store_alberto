<?php

namespace App\Controllers;
class HomeController{
    public function index(){
        view('index');
    }

    public function store(){
        view("store");
    }
}