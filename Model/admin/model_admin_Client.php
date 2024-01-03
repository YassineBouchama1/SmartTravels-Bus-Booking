<?php


  include_once "Model\Client_Class\Clientclass.php" ; 





class AdminClient extends Database {


    public function getAllClient(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  client" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        $Client = array(); 
        foreach ($resultados as $B) {
            $Client[] = new Client($B["email"],$B["password"],$B["inactive"], $B["points"], $B["is_client"]);
        }
        return $Client;
       
    }

    
    public function getByemailClient($email){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Client  WHERE email = :email");
        $consulta->execute(array(
            "email" => $email
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetch();

        $Client = array(); 
     
        $Client[] = new Client($resultados["email"],$resultados["password"],$resultados["inactive"], $resultados["date_created"], $resultados["points"], $resultados["is_client"]);
      
        return $Client;
    }
    
    public function getByColumnClient($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Client WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetch();
       
        $Client = array(); 

     
        $Client[] = new Client($resultados["email"],$resultados["password"],$resultados["inactive"], $resultados["date_created"], $resultados["points"], $resultados["is_client"]);
  
    return $Client;
    }
    
    public function deleteByemailClient($email){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Client WHERE email = :email");
            $consulta->execute(array(
                "email" => $email
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteByColumnClient($column,$value){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM Client WHERE :column = :value");
            $consulta->execute(array(
                "column" => $value,
                "value" => $value,
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }


    public function InsertClient($email,$password,$inactive,$points,$is_client){

        $consulta = $this->getConnection()->prepare("INSERT INTO Client(email,password,inactive,points,is_client)
                                        VALUES (:email,:password,:inactive,:points,:is_client)");
        $result = $consulta->execute(array(
            "email" => $email,
            "password" => $password,
            "inactive" => $inactive,
         
            "points" => $points,
            "is_client" => $is_client
          
        ));

        return $result; 
    }

    public function UpdateClient($password,$inactive,$points,$is_client,$email) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE Client 
                SET 
                    password = :password,
                    inactive = :inactive,
                    points = :points,
                    is_client = :is_client,
                WHERE email = :email 
            ");
    
            $resultado = $consulta->execute(array(
            
                "password" => $password,
                "inactive" => $inactive,
                "points" => $points,
                "is_client" => $is_client,
                "email" => $email
            ));
    
            return $resultado;
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    




 
}


