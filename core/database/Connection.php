<?
namespace core\database;
use PDO;
use PDOException;

abstract class Connection{
    public static function start(){
        $dns = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'];
        try{
            $pdo = new PDO($dns,$_ENV['DB_USER'],$_ENV['DB_PASS']);
            return $pdo;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
}