<?php

namespace app\controllers;
class HomeController{
    public function index(){
        view('index');
    }

    public function store(){
        view("store");
    }
}