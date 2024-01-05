<?php ob_start(); ?>




	<div class="hero">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Travel In <span class="typed-words"></span></h1>

			
					</div>
				</div>
	
			</div>
		</div>
	</div>

  <div class="container ">
  

  <div class=" text-center ">
        <div class="row">
        <div class="col-sm-12 bg-black p-4 " >

         
         <a class="mb-5 chose "  href="index.php?action=CreateCompany">Ajouter Company</a>
       
        
         <a class="mb-5 chose "  href="index.php?action=affichBus" >Ajouter Bus</a>


         <a class="mb-5 chose active"  href="index.php?action=Horaire" >Ajouter Un Horaire</a>


         <a class="mb-5 chose"  href="index.php?action=route" >Ajouter Un Route</a>
       
     

     
       
         
         </div>
          <div class="col-sm-12 form">
            <div class="row">
              <form  method="post" enctype="multipart/form-data" action="index.php?action=UpdateHoraire_submet">
              <div class="col-12 col-sm-12  p-5 row  text-start">
              <div class="mb-3 col-sm-3">
              <label for="timeInput13">Date</label>
              <input value="<?=  $data[0]->getDate() ?>" name="date" type="date" class="form-control" id="timeInput13">

              </div>
              <div class="mb-3 col-sm-3">
              <label for="timeInput">Heure_depart</label>
              <input value="<?=  $data[0]->getHeure_depart() ?>" name="Heure_depart" type="time" class="form-control" id="timeInput">

              </div>
              <div class="mb-3 col-sm-3" style="display: none;">
              <label for="timeInput">Heure_depart</label>
              <input value="<?=  $data[0]->getId() ?>" name="id" type="text" class="form-control" id="timeInput" >

              </div>
              <div class="mb-3 col-sm-3">
              <label for="timeInput1">Heure_arrivee</label>
              <input value="<?=  $data[0]->getHeure_arrivee() ?>" name="Heure_arrivee" type="time" class="form-control" id="timeInput1">

              </div>
              <div class="mb-3 col-sm-3">
              <label for="exampleFormControlInput1" class="form-label ">Sieges_disponibles</label>
                <input value="<?=  $data[0]->getSieges_disponibles() ?>" name="Sieges_disponibles" required  placeholder="Sieges_disponibles..." type="number" class="form-control " id="exampleFormControlInput1" >

              </div>
              <div class="mb-3 col-sm-3">
              <label for="exampleFormControlInput1" class="form-label ">Price</label>
                <input name="price" required value="<?=  $data[0]->getPrice() ?>"  placeholder="Price..." type="number" class="form-control " id="exampleFormControlInput1" >

              </div>
          
            
                 <!-- <?php
              echo "<pre>";
              print_r($Bus);
              print_r($data[0]->getID_Bus());
              echo "</pre>"; ?> -->
               
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">Bus</label>
              <select class="form-select" name="ID_Bus" aria-label="Default select example" required>
                <?php foreach ($Bus as  $value) {   
                    if ($value["Numero_de_bus"] ===  $data[0]->getID_Bus()) {

                      $busNumber = $value["busNumber"] ;
                      $Numero_de_bus =$value["Numero_de_bus"] ;
                      continue ;
                    }
                   ?>

                     <option value="<?=  $value["Numero_de_bus"]  ?>"><?= $value["busNumber"]  ?></option>
               
                <?php   } 
                 ?>
                                 <option value="<?=  $Numero_de_bus ?>" selected><?=  $busNumber ?></option>

              </select>
              </div>
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">route</label>
              <select class="form-select" name="ID_Route" aria-label="Default select example" required>
                <?php foreach ($route as  $value) {    ;?>
                  <?php 
                
                if ($value->getID() ===  $data[0]->getID_Route()) {
                  $depart = $value->getVille_depart() ;
                  $destination = $value->getVille_destination()  ;
               continue;
              }
              ?>
                  
                <option  value="<?=  $value->getID() ?>"><?= $value->getVille_depart() ." -> ". $value->getVille_destination() ?></option>
               
                <?php   }  ?>
                <option value="<?=  $data[0]->getID_Route()  ?>" selected><?=  $depart ." -> ". $destination   ?></option>

              </select>
              </div>
            
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Update Horaire</button>
       
             </div>
        
             </div>
         
                    </form>
              </div>
            
            </div>

    
          </div>
        </div>

</div>
	


	


    <?php $contant =  ob_get_clean();
    include_once "View\layout.php" ; 
    
    
    ?>
