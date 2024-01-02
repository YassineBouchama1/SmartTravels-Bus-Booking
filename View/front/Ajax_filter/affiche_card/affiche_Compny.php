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

}


class controller_Compant {
  
    function ajaxaffiche() {
        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 
        return  $Company ;
    }

}


$AdminBus = new AdminBus() ; 
$Bus =   $AdminBus->getAllBus() ; 

  $controller_Compant = new controller_Compant() ; 


  $data =  $controller_Compant->ajaxaffiche() ; 
  



  $combinedData = [
    'data' => $data,
    'Bus' => $Bus
];

// Convert the combined data to JSON
echo json_encode($combinedData);

//   echo json_encode($data);