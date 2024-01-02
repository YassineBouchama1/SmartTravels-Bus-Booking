<?php 



// require_once  "../../../../Model/conn.php";
include "../../../../Model\admin_class\class_admin_Bus.php" ;
include "../../../../Model\admin_class\class_admin_Company.php" ;
include "../../../../Model\admin_class\class_admin_Horaire.php" ;
include "../../../../Model\admin_class\class_admin_route.php" ;


require_once "../../../../Model/admin/model_admin_Bus.php";
require_once "../../../../Model/admin/model_admin_Horaire.php";
  require_once "../../../../Model/admin/model_admin_Company.php";



class controller_horaire {

    function ajaxaffiche() {
        $Adminhoraire = new Adminhoraire() ; 
        $horaire =   $Adminhoraire->getAllhoraireJoin() ; 
        return  $horaire ;
    }

}
 



extract($_POST);

    
     



  $controller_horaire = new controller_horaire() ; 


        $AdminCompany = new AdminCompany() ; 
        $Company =   $AdminCompany->getAllCompany() ; 
        $AdminBus = new AdminBus() ; 
        $Bus =   $AdminBus->getAllBus() ; 
     
  $data =  $controller_horaire->ajaxaffiche() ; 

  
session_start(); 

if (isset($_SESSION['saved_array'])) {
    $array =  $_SESSION['saved_array'] ;
}



if (isset($array)) {

    if (isset($_GET["days"])) {
        $days = $_GET["days"] ; 
        
     
         if ($days === "All") {
            $timeStart = "00:00";
            $timeEnd = "23:59";
        } elseif ($days === "morning") {
            $timeStart = "06:00";
            $timeEnd = "11:59";
        } elseif ($days === "evening") {
            $timeStart = "12:00";
            $timeEnd = "23:59";
        }
     }



$filteredProducts = array_filter($data, function ($item) use ($timeStart,$timeEnd,$array) {

    if (isset($_GET["minValue"]) &&  $_GET["minValue"] !== 0 && isset($_GET["maxValue"]) &&  $_GET["maxValue"] !== 0) {
    
        $minValue = $_GET["minValue"] ; 
        $maxValue = $_GET["maxValue"] ; 
    
    }
    return ($timeStart <= $item['Heure_depart']) && ($timeEnd >= $item['Heure_depart'])  && ($array["date"] === $item['Date']) &&  ($array["DEPART"] === $item['Ville_depart']) && ($array["ARRIVEE"] === $item['Ville_destination'])  &&   ($minValue <= $item['price'] && $maxValue >= $item['price']);
});

$combinedData = [
    'data' => array_values($filteredProducts), 
    'Bus' => $Bus,
    'Company' => $Company
];
}else {
    $combinedData = [
        'data' => $data, 
        'Bus' => $Bus,
        'Company' => $Company
    ];
}
 echo json_encode($combinedData);

//    echo json_encode($data);

