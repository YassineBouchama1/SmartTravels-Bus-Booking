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
    
          <div class="col-sm-12 form">

            <div class="row">
              <form  method="post" enctype="multipart/form-data" action="index.php?action=updateSubmitBus">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-dark ">busNumber</label>
                <input name="busNumber" required value="<?= $data[0]->getBusNumber() ?>" placeholder="busNumber..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3"  style="display: none;">
                <label for="exampleFormControlInput1" class="form-label text-dark ">Numero_de_bus</label>
                <input name="Numero_de_bus" required value="<?= $data[0]->getNumero_de_bus() ?>" placeholder="busNumber..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-dark ">Plaque_immatriculation</label>
                <input name="Plaque_immatriculation" required value="<?= $data[0]->getPlaque_immatriculation() ?>" placeholder="Plaque_immatriculation..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-dark ">Capacite</label>
                <input name="Capacite" required value="<?= $data[0]->getCapacite() ?>" placeholder="Capacite..." type="number" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-3 mb-4" style="display: none;">
              <label for="exampleFormControlTextarea1" class="form-label text-dark">Company</label>
           
              <select class="form-select" name="Company_id" aria-label="Default select example">
              
             <?php print_r($CompanyName) ?>
              <option value="<?= $CompanyName[0]->getId() ?>" selected><?= $CompanyName[0]->getName()?></option>
              <?php foreach ($Company as  $value2) {    ;
                
                  if ($value2->getName() ===$CompanyName[0]->getName()) 
                 continue;
               
                ?>

              <option  value="<?= $value2->getId() ?>"><?= $value2->getName() ?></option>
             
              <?php   }  ?>
            </select>
              </div>
          
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">update bus</button>
       
             
        
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
