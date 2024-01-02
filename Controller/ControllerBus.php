<?php 

include_once "Model/admin/model_admin_Bus.php";


class controller_Bus {


    function controller_select()  {
        session_start();
        
   
      
        if (isset($_SESSION["emailOperateur"])) {
            $AdminBus = new AdminBus() ; 
            $Bus =   $AdminBus->getBusByemail($_SESSION["emailOperateur"]) ; 
    
    }
   
    
        include_once "View/admin/dash_Bus/afficheBus.php" ;
    }
    
    
    function controller_Bus_insert()  {
        extract($_POST);
    
              
             if (!empty($busNumber) && !empty($Plaque_immatriculation) ) {
            
                $AdminBus = new AdminBus() ; 
                $AdminBus->Insertbus($busNumber,$Plaque_immatriculation,$Capacite,$Company_id) ;
              
             }

        header("Location: index.php?action=affichBus");
   
     }

     
    
    function controller_Bus_update()  {
        $id = $_GET['id'];

        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 
      
        $AdminBus = new AdminBus() ; 

             $data =  $AdminBus->getByIdBus($id) ; 
             $CompanyID  = $data[0]->getCompany_id();
             $CompanyName =   $AdminCompany->getByColumnCompany("id",  $CompanyID) ; 

             require_once  'View\admin\dash_Bus\updateBus.php';

       
   
    }

    function controller_delete()  {
        $id = $_GET['id'];
        $AdminBus = new AdminBus() ; 

             $AdminBus->deleteByIdBus($id); 
         
             header("Location: index.php?action=affichBus");
       
   
    }
    
    function controller_submet_update_Bus()  {
        extract($_POST);

        // echo  "Numero_de_bus = $Numero_de_bus" ; echo "<br>" ; 
        // echo  "busNumber = $busNumber" ; echo "<br>" ; 
        // echo  "Plaque_immatriculation = $Plaque_immatriculation" ; echo "<br>" ; 
        // echo  "Capacite = $Capacite" ; echo "<br>" ; 
        // echo  "Company_id = $Company_id" ; echo "<br>" ; 

       

        if (isset($submit)) {
          
      

             if (!empty($busNumber) && !empty($Plaque_immatriculation) ) {
                $AdminBus = new AdminBus() ; 

                $AdminBus->Updatebus($Numero_de_bus,$busNumber,$Plaque_immatriculation,$Capacite,$Company_id) ; 

              
              
             }

      header("Location: index.php?action=affichBus");


            } 
          

       
   
    }
}