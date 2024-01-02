<?php






class AdminOperateur extends Database {


    public function getAllOperateur(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  operator" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

            $operator = array(); 
        foreach ($resultados as $B) { 

            $operator[] = new admin_Operateur($B["email"],$B["password"],$B["inactive"], $B["company_id"]);
        }
        return $operator;

    }

    
    public function getByEmailOperateur($email){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM operator  WHERE email = :email");
        $consulta->execute(array(
            "email" => $email
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetch();
        
       
        $operator = array(); 
    
           $operator[] = new admin_Operateur($resultados["email"],$resultados["password"],$resultados["inactive"], $resultados["company_id"]);

     
        return $operator;
    }
    
    public function getByColumnOperateur($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM Operateur WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetch();
       
        $operator = array(); 
    
       $operator[] = new admin_Operateur($resultados["email"],$resultados["password"],$resultados["inactive"], $resultados["company_id"]);

 
    return $operator;
    }
    
    public function deleteByEmailOperateur($email){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM operator WHERE email = :email");
            $consulta->execute(array(
                "email" => $email
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }


    public function InsertOperateur($email,$password,$inactive,$company_id){

        $consulta = $this->getConnection()->prepare("INSERT INTO operator(email,password,inactive,company_id)
                                        VALUES (:email,:password,:inactive,:company_id)");
        $result = $consulta->execute(array(
            "email" => $email,
            "password" => $password,
            "inactive" => $inactive,
            "company_id" => $company_id
          
        ));

        return $result; 
    }

    public function UpdateOperateur($whereemail,$email,$password,$inactive,$company_id) {
        echo "UPDATE operator SET email='$email', password='$password', inactive ='$inactive', company_id ='$company_id' WHERE email = $whereemail ";
        try {
            $consulta = $this->getConnection()->prepare(" UPDATE operator SET email='$email', password='$password', inactive ='$inactive', company_id ='$company_id' WHERE email = '$whereemail' 
            
            ");
    
            $resultado = $consulta->execute();
    
            return $resultado;
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    





}