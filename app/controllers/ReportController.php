<?php

namespace app\controllers;

use Exception;
use core\database\QueryBuilder;

class ReportController{
    
    protected $report;
    public function __construct(){
        $this->report = new QueryBuilder();
    }
    public function index(){
        try{
        $reporteDiario = $this->report->getTotalCierreCaja();
        $reporteEfectivo = $this->report->detailsEfectivo();
        $reporteTarjeta = $this->report->detailsTarjeta();
        $reportePagoProveedor = $this->report->getTotalPagoProveedor();
        view('report',[
            'reporteDiario'=>$reporteDiario,
            'reporteEfectivo'=>$reporteEfectivo,
            'reporteTarjeta'=>$reporteTarjeta,
            'reportePagoProveedor'=>$reportePagoProveedor
        ]);
        }catch (Exception $e) { 
            echo "Error: " . $e->getMessage(); 
        }
    }
    public function showEfectivo(){
    }
}