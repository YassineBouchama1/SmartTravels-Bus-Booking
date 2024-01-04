



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

class Notification_class {

    private $id;
    private $content;
    private $ID_Horaire; 
    private $number_seat; 
    private $time_created;
    
    public function __construct($id, $content, $ID_Horaire, $number_seat) {
        $this->id = $id;
        $this->content = $content;
        $this->ID_Horaire = $ID_Horaire;
        $this->number_seat = $number_seat;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getContent() { 
        return $this->content;
    }

    public function getIDHoraire() {
        return $this->ID_Horaire;
    }

    public function getNumberSeat() {
        return $this->number_seat;
    }
}

class notification extends Database {


    public function getAllnotification(){
        session_start();

        $consulta = $this->getConnection()->prepare("SELECT * FROM notification n, operator o, company c WHERE c.id = o.company_id AND n.recipient_id = c.id AND o.email = '" . $_SESSION["emailOperateur"] . "' ORDER BY time_created DESC");
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        return $resultados;
       
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
      $notification = new notification();
      $notificatio = $notification->getAllnotification() ; 


$num_rows = count($notificatio); 


$data = array();
foreach ($notificatio as $row) {
    $data[] = $row;
}


$output = array(
    "num_rows" => $num_rows,
    "data" => $data
);



//  print_r($notificatio) ;


 echo json_encode($output);






?>



