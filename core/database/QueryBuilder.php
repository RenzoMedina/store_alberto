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

    public function validateIdUser($data){
        $values = json_decode($data, true);
        $validate = "SELECT id FROM table_users WHERE nombre = ? AND apellido = ? LIMIT 1";
        
        try{
            $queryId=$this->conn->prepare($validate);
            $queryId->bindParam(1, $values['nombre'],PDO::PARAM_STR);
            $queryId->bindParam(2, $values['apellido'], PDO::PARAM_STR);
            $queryId->execute();

            if($queryId->rowCount() > 0){
                echo "El rol ya fue registrado";
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
            return false;
        }
    }
    public function createUser($data){
        $values = json_decode($data, true);
        $sql = "INSERT INTO table_users (nombre,apellido,password,repeat_password,id_rol,estado) VALUES (?,?,?,?,?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['nombre'],PDO::PARAM_STR);
            $query->bindParam(2,$values['apellido'],PDO::PARAM_STR);
            $hashedPassword = password_hash($values['password'], PASSWORD_DEFAULT);
            $query->bindParam(3, $hashedPassword,PDO::PARAM_STR);
            $repeatHashedPassword = password_hash($values['repeat_password'],  PASSWORD_DEFAULT);
            $query ->bindParam(4,$repeatHashedPassword,PDO::PARAM_STR);
            $query->bindParam(5, $values['id_rol'], PDO::PARAM_INT);
            $query->bindParam(6, $values['estado'], PDO::PARAM_STR);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function getAllUser(){
        $sql = "SELECT u.*, r.rol AS rol, r.estado AS rol_estado FROM table_users u INNER JOIN table_roles r ON u.id_rol = r.id";
        try{
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
    public function validateIdRol($data){
        $values = json_decode($data, true);

        $validate = "SELECT id FROM table_roles WHERE rol = ? AND estado = ? LIMIT 1";
        
        try{
            $queryId=$this->conn->prepare($validate);
            $queryId->bindParam(1, $values['rol'],PDO::PARAM_STR);
            $queryId->bindParam(2, $values['estado'], PDO::PARAM_STR);
            $queryId->execute();

            if($queryId->rowCount() > 0){
                echo "El rol ya fue registrado";
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
            return false;
        }
    }
    public function createRol($data){
        $values = json_decode($data, true);
        $sql = "INSERT INTO table_roles (rol,estado) VALUES (?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['rol'],PDO::PARAM_STR);
            $query->bindParam(2,$values['estado'],PDO::PARAM_STR);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function getAllRol(){
        $sql = "SELECT * FROM  table_roles";
        try{
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function createVentaBasic($data){
        $values = json_decode($data, true);
        $sql = "INSERT INTO table_venta_basica (valor,tipo,estado,nombre) VALUES (?,?,?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['valor'],PDO::PARAM_INT);
            $query->bindParam(2,$values['tipo'],PDO::PARAM_STR);
            $query->bindParam(3, $values['estado'],PDO::PARAM_STR);
            $query->bindParam(4,$values['nombre'],PDO::PARAM_STR);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
}