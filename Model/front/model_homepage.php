<?php 




 class homepage  extends Database{

      function homepage()  {
        
      
        // Read the JSON file content
        // Read JSON data from file
          $jsonData = file_get_contents('json\cities.json');

          // Decode JSON data
          $data = json_decode($jsonData, true);

          $resultcity = $data["cities"] ;

     
   
        include_once 'View\front\home.php';
      }

      function city()  {
        
        $jsonData = file_get_contents('json\cities.json');

        // Decode JSON data
        $data = json_decode($jsonData, true);
        $resultcity = $data["cities"] ;

       
         return   $resultcity ;
      }
  
      function Resultatspage()  {

    
        
        include_once 'View\front\Resultats.php';
      }
 }