<?php


include_once "Model\admin_class\class_notification.php" ; 






class notification extends Database {


    public function getAllnotification(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  notification" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        $notification = array(); 
        foreach ($resultados as $B) {
            $notification[] = new Notification_class($B["id"],$B["content"],$B["recipient_id"], $B["recipient_type"]);
        }
        return $notification;
       
    }



    
    public function getByIdnotification($id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM notification  WHERE id = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetch();

        $notification = array(); 
     
        $notification[] = new Notification_class($resultados["id"],$resultados["content"],$resultados["recipient_id"], $resultados["recipient_type"]);
      
        return $notification;
    }
    
    public function getByColumnnotification($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM notification WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetch();
       
        $notification = array(); 

     
        $notification[] = new Notification_class($resultados["id"],$resultados["content"],$resultados["recipient_id"], $resultados["recipient_type"]);
  
    return $notification;
    }

    public function insertNotification($content, $recipient_id, $recipient_type) {
        try {
            $consulta = $this->getConnection()->prepare("INSERT INTO notification(content, recipient_id, recipient_type)
                                                        VALUES (:content, :recipient_id, :recipient_type)");
            $result = $consulta->execute(array(
                "content" => $content,
                "recipient_id" => $recipient_id,
                "recipient_type" => $recipient_type
            ));
    
            if ($result) {
                return true; // Successful insertion
            } else {
                return false; // Failed insertion
            }
        } catch (PDOException $e) {
            // Handle any database errors
            return false;
        }
    }
    
    
    // public function deleteByIdnotification($id){
    //     try {
    //         $consulta = $this->getConnection()->prepare("DELETE FROM notification WHERE id = :id");
    //         $consulta->execute(array(
    //             "id" => $id
    //         ));
           
    //     } catch (Exception $e) {
    //         echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
    //         return -1;
    //     }
    // }
    
    // public function deleteByColumnnotification($column,$value){
    //     try {
    //         $consulta = $this->getConnection()->prepare("DELETE FROM notification WHERE :column = :value");
    //         $consulta->execute(array(
    //             "column" => $value,
    //             "value" => $value,
    //         ));
           
    //     } catch (Exception $e) {
    //         echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
    //         return -1;
    //     }
    // }




    // public function Updatenotification($id, $content, $recipient_id, $recipient_type) {
    //     try {
    //         $consulta = $this->getConnection()->prepare("
    //             UPDATE notification 
    //             SET 
    //                 content = :content,  
    //                 recipient_id = :recipient_id,
    //                 recipient_type = :recipient_type
    //             WHERE id = :id 
    //         ");
    
    //         $resultado = $consulta->execute(array(
    //             "content" => $content,
    //             "recipient_id" => $recipient_id,
    //             "recipient_type" => $recipient_type,
    //             "id" => $id
    //         ));
    
    //         return $resultado;
    //     } catch (PDOException $e) {
    //         // Handle database errors
    //         // Log or return an error message
    //         return false;
    //     }
    // }
    




 
}


