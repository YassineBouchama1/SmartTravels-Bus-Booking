<?php
//  include_once "Model/conn.php" ; 






class AdminCompany extends Database {


    public function getAllCompany(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  Company" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        $Company = array(); 
        foreach ($resultados as $B) {
            $Company[] = new admin_Company($B["id"],$B["name"],$B["Bio"], $B["img"]);
        }
        return $Company;
       
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


