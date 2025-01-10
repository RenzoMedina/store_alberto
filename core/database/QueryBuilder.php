<?
namespace core\database;

use PDO;
use PDOException;
use core\database\Connection;

class QueryBuilder{
    protected $conn;
    public function __construct(){
        $this->conn = Connection::start();
    }

    public function createUser($data){
        $values = json_decode($data, true);
        $sql = "INSERT INTO table_users (nombre,apellido,password,repeat_password,id_rol) VALUES (?,?,?,?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['nombre'],PDO::PARAM_STR);
            $query->bindParam(2,$values['apellido'],PDO::PARAM_STR);
            $hashedPassword = password_hash($values['password'], PASSWORD_DEFAULT);
            $query->bindParam(3, $hashedPassword,PDO::PARAM_STR);
            $repeatHashedPassword = password_hash($values['repeat_password'],  PASSWORD_DEFAULT);
            $query ->bindParam(4,$repeatHashedPassword,PDO::PARAM_STR);
            $query->bindParam(5, $values['id_rol'], PDO::PARAM_INT);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
}