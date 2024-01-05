<?php
include_once 'Model\front\model_Reservation.php' ; 

class Controller_reservation{



    function addReservation() {
        extract($_GET) ; 
       
       

        $homepage = new homepage();
        $reservation =   $homepage->buycard($trip_Id) ; 
        
        $Adminreservation = new Adminreservation() ; 
        $Capacite = $Adminreservation->getCapacitereservation($trip_Id) ;
        
        $array = array();
 
        foreach ($reservation as  $value) {
            $array[] = $value["number_seat"];
        }
    


       
        if (count($array) >=  $Capacite["Capacite"] ) {
         
            $content = "is full" ; 
            $recipient_id = $Capacite["Company_id"] ; 
            $recipient_type = "admin" ; 
          
            $Controller_notification = new Controller_notification();
            $reservation =   $Controller_notification->create_notification($content,$recipient_id,$recipient_type) ; 
             
        }else {

            $AdminClient = new AdminClient() ; 
            $clients =   $AdminClient->getByemailClient($emailClient) ; 
          

          if ( $clients === false) {
          
            $Adminclient = new Adminclient();
            $Adminclient->InsertClient($emailClient, null, 1, 0, 0);
          }
              
             
           
             
         
                
      
           
        $Adminreservation = new Adminreservation() ; 
        $Adminreservation->Insertreservation($emailClient,$trip_Id,$number_seat) ; 

      
         $content = "one order by " ." $emailClient" . "   seat : " . $number_seat;
        $recipient_id = $Capacite["Company_id"] ; 
        $recipient_type = "operator" ; 
      
        $Controller_notification = new Controller_notification();
        $Controller_notification->create_notification($content,$recipient_id,$recipient_type) ;


        $homepage = new homepage();
        $reservation =   $homepage->buycard($trip_Id) ; 
        
        $Adminreservation = new Adminreservation() ; 
        $Capacite = $Adminreservation->getCapacitereservation($trip_Id) ;

        
        $array = array();
 
        foreach ($reservation as  $value) {
            $array[] = $value["number_seat"];
        }
          
    

        if (count($array) >=  $Capacite["Capacite"] ) {
            $content = "is full" ; 
            $recipient_id = $Capacite["Company_id"] ; 
            $recipient_type = "operator" ; 
          
            $Controller_notification = new Controller_notification();
            $Controller_notification->create_notification($content,$recipient_id,$recipient_type) ; 
             
        }
        }


     
        header("Location: index.php?action=checkout&trip_Id=" . $_GET["trip_Id"] . "&route=" . $_GET["route"] . "&number_seat=" . $_GET["number_seat"] . "&data=" . $_GET["data"] . "&emailClient=" . $_GET["emailClient"]);


    }
    function checkout() {
        extract($_GET) ; 
       

     
        include_once 'View\front\checkout.php';

    }



   
}