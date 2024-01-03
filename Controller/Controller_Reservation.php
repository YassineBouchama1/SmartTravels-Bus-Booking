<?php
include_once 'Model\front\model_Reservation.php' ; 

class Controller_reservation{



    function addReservation() {
        extract($_GET) ; 
       
       


        
        $Adminclient = new Adminclient() ; 
        $Adminclient->InsertClient($emailClient,null,1,0,0) ;

        $Adminreservation = new Adminreservation() ; 
        $Adminreservation->Insertreservation($emailClient,$trip_Id,$number_seat) ; 
        header("Location: index.php?action=checkout&trip_Id=" . $_GET["trip_Id"] . "&route=" . $_GET["route"] . "&number_seat=" . $_GET["number_seat"] . "&data=" . $_GET["data"] . "&emailClient=" . $_GET["emailClient"]);

     


    }
    function checkout() {
        extract($_GET) ; 
       

     
        include_once 'View\front\checkout.php';

    }



   
}