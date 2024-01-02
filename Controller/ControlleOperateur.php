<?php 

include_once "Model/admin/model_admin_Operateur.php";


class controller_Operateur {


    function controller_select()  {
       
        session_start();
       
        unset($_SESSION['Operateur']);

      
    
        $AdminOperateur = new AdminOperateur() ; 
        $Operateur =   $AdminOperateur->getAllOperateur() ; 

        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 

        // print_r($Operateur) ; 


        include_once "View/admin/dash_Operateur/afficheOperateur.php" ;
    }

    
    function controller_insert()  {
        extract($_POST);
        $inactive = 1 ;
        $AdminOperateur = new AdminOperateur() ; 
        $Operateur =   $AdminOperateur->getByEmailOperateur($email) ; 



        if ($Operateur[0]->getEmail() === $email) {
           echo "yes";
        }else {
            $AdminOperateur = new AdminOperateur() ; 
            $AdminOperateur->InsertOperateur($email,$password,$inactive,$company_id) ; 
        }


       header("Location: index.php?action=Operateur");
   
    }

    
    function controller_update()  {
        $email = $_GET['email'];
        $inactive = 1 ;
        $AdminOperateur = new AdminOperateur() ; 
        $Operateur =   $AdminOperateur->getByEmailOperateur($email) ;
        
        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 

             require_once  'View\admin\dash_Operateur\updateOperateur.php';

       
   
    }

    function controller_delete()  {
        $email = $_GET['email'];
        $AdminOperateur = new AdminOperateur() ; 

             $AdminOperateur->deleteByEmailOperateur($email); 
         
             header("Location: index.php?action=Operateur");
       
   
    }
    
    function controller_submet_update()  {
        extract($_POST);
        $inactive = 1 ;
       

        if (isset($submit)) {
          
            // print_r($_POST);

     
                $AdminOperateur = new AdminOperateur() ; 

                $AdminOperateur-> UpdateOperateur($whereemail,$email,$password,$inactive,$company_id) ; 


          header("Location: index.php?action=Operateur");


            } 
          

       
   
    }
}