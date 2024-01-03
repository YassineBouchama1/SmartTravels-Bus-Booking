<?php
include_once 'Model\front\model_homepage.php' ; 

class Controller_homepage{


    function afficheHome() {
        
        $homepage = new homepage();
        return $homepage->homepage() ; 

    }
    function affichebuycard() {
        extract($_GET) ; 
    
        $id_horaire = $id_card ; 
        $homepage = new homepage();
       $reservation =   $homepage->buycard($id_horaire) ; 
       $CapaciteBus =   $homepage->CapaciteBus($id_horaire) ; 
 

       $controller_horaire = new controller_horaire() ; 
 
       $horaire = $controller_horaire->controllergetByIdhoraire($id_horaire);

    
         include_once 'View\front\addCard.php';


    }




    function citys() {
        
        $homepage = new homepage();
        return $homepage->city() ; 

    }
    function afficheResultat() {


        
        $homepage = new homepage();
        return $homepage->Resultatspage() ; 

    }

    function controller_form_insert()  {
        extract($_POST);

    
    
              
        $Adminhoraire = new Adminhoraire() ; 
        $horaire =   $Adminhoraire->getAllhoraire() ; 

        $Adminroute = new Adminroute() ; 
        $route =   $Adminroute->getAllroute() ; 

     
        session_start(); 

      

        if (isset($DEPART) && isset($ARRIVEE) && isset($date) && isset($people)) {
            $array = array(
                'DEPART' => $DEPART,
                'ARRIVEE' => $ARRIVEE,
                'date' => $date,
                'people' => $people
            );

           
            $_SESSION['saved_array'] = $array;
        } else {
            
            if (isset($_SESSION['saved_array'])) {
               
                $array = $_SESSION['saved_array'];

             
            }
        }

        $homepage = new homepage();
       $resultcity =  $homepage->city() ; 

     

        include_once 'View\front\Resultats.php' ; 
        // header("Location: index.php?action=Resultat");

   
     }
}