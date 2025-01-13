<?

namespace app\controllers;

use core\database\QueryBuilder;

class ReportController{
    
    protected $report;
    public function __construct(){
        $this->report = new QueryBuilder();
    }
    public function index(){
        $reporteDiario = $this->report->getTotalCierreCaja();
        //$reporteEfectivo = $this->report->detailsEfectivo();
        view('report',[
            'reporteDiario'=>$reporteDiario
        ]);
    }
    
}