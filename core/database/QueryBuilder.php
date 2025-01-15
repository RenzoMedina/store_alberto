<?php
namespace core\database;

use PDO;
use PDOException;
use core\database\Connection;

class QueryBuilder{
    protected $conn;
    public function __construct(){
        date_default_timezone_set('America/Santiago');
        $this->conn = Connection::start();
    }

    public function validateLogin($data){
        $values = json_decode($data, true);
        $validate = "SELECT u.*, r.rol AS rol, r.estado AS rol_estado FROM table_users u INNER JOIN table_roles r ON u.id_rol = r.id WHERE nombre = ?";
        
        try{
            $queryId=$this->conn->prepare($validate);
            $queryId->bindParam(1, $values['nombre'],PDO::PARAM_STR);
            $queryId->execute();
            $resul = $queryId->fetch(PDO::FETCH_ASSOC);
            if($resul && password_verify($values['password'],$resul['password'])){
                return $resul;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
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
            $nombre_min =strtolower($values['nombre']);
            $query->bindParam(1,$nombre_min,PDO::PARAM_STR);
            $apellido_min =strtolower($values['apellido']);
            $query->bindParam(2,$apellido_min,PDO::PARAM_STR);
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

    /*
        * Query of ventas
     */
    public function createVentaBasic($data){
        $values = json_decode($data, true);        
        $sql = "INSERT INTO table_venta_basica (fecha,valor,tipo,estado,nombre) VALUES (?,?,?,?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['fecha']);
            $query->bindParam(2,$values['valor'],PDO::PARAM_INT);
            $query->bindParam(3,$values['tipo'],PDO::PARAM_STR);
            $query->bindParam(4, $values['estado'],PDO::PARAM_STR);
            $name_min = strtolower($values['nombre']);
            $query->bindParam(5,$name_min,PDO::PARAM_STR);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function getAllVenta(){
        $fecha = date('Y-m-d');
        //$fecha = '2025-01-11';
        $sql = "SELECT * FROM table_venta_basica WHERE fecha = ? ORDER BY  create_at DESC";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $fecha, PDO::PARAM_STR);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function cierreCaja(){
        $sql = "SELECT SUM(valor) AS total_ventas FROM table_venta_basica";
        try{
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_ASSOC);
            return $total = $resul[0];
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
    public function totalCierreCaja($total){
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO total_ventas_diarias(fecha,total) VALUES (?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$fecha);
            $query->bindParam(2,$total,PDO::PARAM_INT);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
    
    public function getTotalCierreCaja(){
        $sql = "SELECT * FROM total_ventas_diarias";
        try{
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function getAllCredit(){
        $sql = "SELECT nombre, SUM(valor) AS total_valor FROM table_venta_basica WHERE tipo ='credito' GROUP BY nombre";
        try{
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function updateStateVenta($data){
        $values = json_decode($data, true);  
        $sql = "UPDATE table_venta_basica SET estado = ?, tipo = ?  WHERE nombre = ?";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['estado'],PDO::PARAM_STR);
            $query->bindParam(2,$values['tipo'],PDO::PARAM_STR);
            $query->bindParam(3,$values['nombre'],PDO::PARAM_STR);
            $query->execute();
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function createPagoCredito($data){
        $values = json_decode($data, true);  
        $sql = "INSERT INTO table_pago_credito (nombre,estado,total) VALUES (?,?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['nombre'],PDO::PARAM_STR);
            $query->bindParam(2,$values['estado'],PDO::PARAM_STR);
            $query->bindParam(3,$values['total'],PDO::PARAM_INT);
            $query->execute();
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function detailsEfectivo(){
        $fecha = date('Y-m-d');
        $sql = "SELECT fecha, tipo, SUM(valor) AS total_valor FROM table_venta_basica WHERE fecha = ? AND tipo = 'efectivo' GROUP BY fecha, tipo ORDER BY fecha DESC";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$fecha,PDO::PARAM_STR);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
    public function detailsTarjeta(){
        $fecha = date('Y-m-d');
        $sql = "SELECT fecha, tipo, SUM(valor) AS total_valor FROM table_venta_basica WHERE fecha = ? AND tipo = 'tarjeta' GROUP BY fecha, tipo ORDER BY fecha DESC";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$fecha,PDO::PARAM_STR);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

        /*
        * Query of proveedor
     */

    public function createProveedor($data){
        $values = json_decode($data, true);        
        $sql = "INSERT INTO table_proveedores (rut,nombre,categoria,estado) VALUES (?,?,?,?)";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['rut_proveedor']);
            $query->bindParam(2,$values['nombre_proveedor'],PDO::PARAM_STR);
            $query->bindParam(3,$values['categorias'],PDO::PARAM_STR);
            $query->bindParam(4, $values['estado'],PDO::PARAM_STR);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
    public function getAllProveedor(){
        $sql = "SELECT * FROM table_proveedores ORDER BY nombre";
        try{
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_OBJ);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function getByIdProveedor($id){
        $sql = "SELECT * FROM table_proveedores WHERE id=?";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$id, PDO::PARAM_INT);
            $query->execute();
            $resul = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resul;
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }

    public function updateProveedor($data, $id){
        $fecha = date("Y-m-d H:i:s");
        $values = json_decode($data, true);        
        $sql = "UPDATE table_proveedores SET rut=?,nombre=?,categoria=?,estado=?, update_at=? WHERE id=?";
        try{
            $query = $this->conn->prepare($sql);
            $query->bindParam(1,$values['rut_proveedor']);
            $query->bindParam(2,$values['nombre_proveedor'],PDO::PARAM_STR);
            $query->bindParam(3,$values['categorias'],PDO::PARAM_STR);
            $query->bindParam(4, $values['estado'],PDO::PARAM_STR);
            $query->bindParam(5, $fecha,PDO::PARAM_STR);
            $query->bindParam(6, $id,PDO::PARAM_INT);
            $query->execute();
            
        }catch(PDOException $e){
            echo "Error".$e->getMessage();
        }
    }
}