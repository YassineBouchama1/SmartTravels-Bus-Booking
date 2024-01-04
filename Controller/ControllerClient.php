<?php 

include_once "Model\admin\model_admin_Client.php";


class controller_client {


    function controller_select()  {
     
        
            $AdminClient = new AdminClient() ; 
            $client =   $AdminClient->getAllClient() ; 
    
 
       return  $client ; 
    }
    
    
    function controller_client_insert()  {
        extract($_POST);
    
              
       
            
                $Adminclient = new Adminclient() ; 
                $Adminclient->InsertClient($email,$password,$inactive,$points,$is_client) ;
              

        header("Location: index.php?action=affichclient");
   
     }

     
    
    // function controller_client_update()  {
    //     $id = $_GET['id'];

    //     $AdminCompany = new AdminCompany() ; 
    //     $Company =   $AdminCompany->getAllCompany() ; 
      
    //     $Adminclient = new Adminclient() ; 

    //          $data =  $Adminclient->getByemailclient($email) ; 
    

    //          require_once  'View\admin\dash_client\updateclient.php';

       
   
    // }

    // function controller_delete()  {
    //     $id = $_GET['id'];
    //     $Adminclient = new Adminclient() ; 

    //          $Adminclient->deleteByIdclient($id); 
         
    //          header("Location: index.php?action=affichclient");
       
   
    // }
    
    function controller_submet_update_client()  {
        extract($_POST);


       

        if (isset($submit)) {
          
      

             if (!empty($clientNumber) && !empty($Plaque_immatriculation) ) {
                $Adminclient = new Adminclient() ; 

                $Adminclient->Updateclient($Numero_de_client,$clientNumber,$Plaque_immatriculation,$Capacite,$Company_id) ; 

              
              
             }

      header("Location: index.php?action=affichclient");


            } 
          

       
   
    }
}