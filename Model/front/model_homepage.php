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

      function buycard($id_horaire)  {

        $consulta = $this->getConnection()->prepare("SELECT * FROM  reservation r  WHERE  r.ID_Horaire = $id_horaire");
        $consulta->execute();
        $resultados = $consulta->fetchAll();
       

        return $resultados;


      }
      function CapaciteBus($id_horaire)  {

        $consulta = $this->getConnection()->prepare("SELECT bus.Capacite FROM bus WHERE bus.Numero_de_bus = (SELECT h.ID_Bus  FROM horaire h    WHERE  h.ID = $id_horaire )");
        $consulta->execute();
        $resultados = $consulta->fetch();
       

        return $resultados;


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