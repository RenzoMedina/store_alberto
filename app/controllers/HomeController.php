<?php

namespace app\controllers;

use core\database\QueryBuilder;
class HomeController{
    protected $home;
    public function __construct(){
        $this->home = new QueryBuilder();
    }
    public function index(){
        $dasVentasDiarias = $this->home->dasVentasDiarias();
        $dasVentasDiariasEfectivo = $this->home->dasVentasDiariasEfectivo('efectivo');
        $dasVentasDiariasTarjeta = $this->home->dasVentasDiariasEfectivo('tarjeta');
        $dasVentasDiariasCredito = $this->home->dasVentasDiariasCredito();
        view('index', [
            "dasVentasDiarias" => $dasVentasDiarias,
            "dasVentasDiariasEfectivo" => $dasVentasDiariasEfectivo,
            "dasVentasDiariasTarjeta" => $dasVentasDiariasTarjeta,
            "dasVentasDiariasCredito" => $dasVentasDiariasCredito
        ]);
    }

    public function store(){
        view("store");
    }
}