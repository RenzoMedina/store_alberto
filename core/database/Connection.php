<?
namespace core\database;
use PDO;
use PDOException;

abstract class Connection{
    protected const Host="bmhkm2itgpivjvpoy9p1-mysql.services.clever-cloud.com";
    protected const User="ug9cajamcseabzcn";
    protected const Pass= "y1UAehsiUCdEMuH9ryAR";
    protected const DbName="bmhkm2itgpivjvpoy9p1";
    public static function start(){
        $dns = 'mysql:host='.self::Host.';dbname='.self::DbName;
        try{
            $pdo = new PDO($dns,self::User,self::Pass);
            return $pdo;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
}