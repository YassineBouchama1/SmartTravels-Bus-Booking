<?php 

class Database {
    private $host = "localhost";
    private $db_name = "smarttravelgroup";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}



class AdminBus extends Database {



    public function getAllbus(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  bus" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        return $resultados;
       

    }

    
    
}




class AdminCompany extends Database {


    public function getAllCompany(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  Company" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

  
        return $resultados;
       
    }

    
    public function getByIdCompany($id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Company  WHERE id = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetch();

        $Company = array(); 
     
            $Company[] = new admin_Company($resultados["id"],$resultados["name"],$resultados["Bio"], $resultados["img"]);
      
        return $Company;
    }
    
    public function getByColumnCompany($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Company WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetch();
       
        $Company = array(); 

     
        $Company[] = new admin_Company($resultados["id"],$resultados["name"],$resultados["Bio"], $resultados["img"]);
  
    return $Company;
    }
    
    public function deleteByIdCompany($id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Company WHERE id = :id");
            $consulta->execute(array(
                "id" => $id
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteByColumnCompany($column,$value){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Company WHERE :column = :value");
            $consulta->execute(array(
                "column" => $value,
                "value" => $value,
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }


    public function InsertCompany($name,$Bio,$img){

        $consulta = $this->getConnection()->prepare("INSERT INTO Company(name,Bio,img)
                                        VALUES (:name,:Bio,:img)");
        $result = $consulta->execute(array(
            "name" => $name,
            "Bio" => $Bio,
            "img" => $img
          
        ));

        return $result; 
    }

    public function UpdateCompany($id, $name, $Bio, $img) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE Company 
                SET 
                    name = :name,  
                    Bio = :Bio,
                    img = :img
                WHERE id = :id 
            ");
    
            $resultado = $consulta->execute(array(
                "name" => $name,
                "Bio" => $Bio,
                "img" => $img,
                "id" => $id
            ));
    
            return $resultado;
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    




 
}



// Assuming the necessary 'require_once' statements for models are already included

$table = [];

if (isset($_GET["table"])) {
    $table[] = $_GET["table"];
}

// If the "table" parameter contains comma-separated values
if (!empty($table)) {
    $values = explode(',', $table[0]); // Split the string into an array based on commas
}

$AdminBus = new AdminBus();
$Bus = $AdminBus->getAllBus();

// print_r($Bus);
// print_r($values);

if (!empty($values) && !empty($Bus)) {
  $matchingBusNumbers = []; // Initialize an array to store matching bus numbers
  
  foreach ($Bus as $bus) {
      if (in_array($bus["Company_id"], $values)) {
          $matchingBusNumbers[] = $bus["Numero_de_bus"]; // Store matching bus numbers in the array
          // Perform additional actions if needed
      }
  }

  // Output or use the $matchingBusNumbers array

  echo json_encode($matchingBusNumbers);

}

