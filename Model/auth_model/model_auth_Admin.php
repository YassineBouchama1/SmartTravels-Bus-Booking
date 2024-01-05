<?php


 class model_auth_Admin extends Database {


    function affiche_form_Admin()  {
      include "View\auth\login_Admin.php" ;  
    }

    function select_Admin() {
      
      $consulta = $this->getConnection()->prepare("SELECT * FROM  admin" );
      $consulta->execute();
      $resultados = $consulta->fetchAll();

      return $resultados ;

    }

    




 


}
