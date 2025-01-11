<?

namespace app\controllers;

use Flight;
use core\database\QueryBuilder;

class ProfileController{

    protected $profile;
    public function __construct(){
        $this->profile = new QueryBuilder();
    }

    public function index(){
        $data = $this->profile->getAllRol();
        view('settings', ['data'=>$data]);
    }
    public function store(){
        session_start();
        $request = Flight::request()->data;
        $json = json_encode( $request );
        $this->profile->createRol($json);
        $_SESSION['rol_success']='Rol creado exitosamente.';
        Flight::redirect('/setting');
    }
}