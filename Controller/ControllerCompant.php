<?php 

include_once "Model/admin/model_admin_Company.php";


class controller_Compant {

    
    function ajaxaffiche() {
        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 
        return  $Company ;
    }

    function controller_select()  {
        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 
    
        include_once "View/admin/dash_Company/afficheCompany.php" ;
    }
    
    
    function controller_insert()  {
        extract($_POST);
        $uploadDir = "public/Dashboard/photo_Company/"; 

        $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
   
        // Generate a unique filename
        $uniqueFilename = uniqid('image_', true) . '.' . $fileExtension;

        $uploadedFile = $uploadDir . $uniqueFilename;

        move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile) ;
  

             if (!empty($name) && !empty($Bio) && !empty($uploadedFile)) {
                $AdminCompany = new AdminCompany() ; 
                $AdminCompany->InsertCompany($name,$Bio ,$uploadedFile) ; 
              
             }

           header("Location: index.php?action=admin");
   
    }
    
    function controller_update()  {
        $id = $_GET['id'];
        $AdminCompany = new AdminCompany() ; 

             $data =  $AdminCompany->getByIdCompany($id) ; 
            //  print_r($data) ;
             require_once  'View\admin\dash_Company\updateCompany.php';

       
   
    }

    function controller_delete()  {
        $id = $_GET['id'];
        $AdminCompany = new AdminCompany() ; 

             $AdminCompany->deleteByIdCompany($id); 
         
             header("Location: index.php?action=admin");
       
   
    }
    
    function controller_submet_update()  {
        extract($_POST);
       

        if (isset($submit)) {
          
      
        $uploadDir = "public/Dashboard/photo_Company/"; 

        $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
   
       
        $uniqueFilename = uniqid('image_', true) . '.' . $fileExtension;

        $uploadedFile = $uploadDir . $uniqueFilename;

        move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile) ;
  

             if (!empty($name) && !empty($Bio) && !empty($uploadedFile)) {
                $AdminCompany = new AdminCompany() ; 

                $AdminCompany->UpdateCompany($id, $name , $Bio ,$uploadedFile) ; 

               
              
             }

            header("Location: index.php?action=admin");


            } 
          

       
   
    }
}