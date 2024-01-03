<?php 
if (isset($_SESSION["Operateur"])) {
 

ob_start();
$Operateurr = "Operateur"; ?>




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

         
         <!-- <a class="mb-5 chose "  href="index.php?action=CreateCompany">Ajouter Company</a> -->
       
        
         <a class="mb-5 chose active"  href="index.php?action=affichBus" >Ajouter Bus</a>


         <!-- <a class="mb-5 chose"  href="index.php?action=route" >Ajouter Un Route</a> -->


         <a class="mb-5 chose"  href="index.php?action=Horaire" >Ajouter Un Horaire</a>

       
     
  
       
         
         </div>
          <div class="col-sm-12 form">

            <div class="row">
              <form  method="post" enctype="multipart/form-data" action="index.php?action=CreateBus">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">busNumber</label>
                <input name="busNumber" required value="" placeholder="busNumber..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Plaque_immatriculation</label>
                <input name="Plaque_immatriculation" required value="" placeholder="Plaque_immatriculation..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Capacite</label>
                <input oninput="this.value = Math.min(this.value, 60)" name="Capacite" required value="" placeholder="Capacite...MAX = 60" type="number" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-3 mb-4" style="display: none;">
              <label for="exampleFormControlTextarea1" class="form-label">Company</label>
              <select class="form-select" name="Company_id" aria-label="Default select example" required>               
               
                <option  selected value="<?=  $Bus[0]["company_id"] ?>"><?= $Bus[0]["name"]  ?></option>
               
              
              </select>
              </div>
          
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Ajouter bus</button>
       
             
        
             </div>
         
                    </form>
              </div>
            
            </div>

            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Catégories : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">busNumber</th>
                    <th  scope="col">Plaque_immatriculation</th>
                    <th  scope="col">Capacite</th>
                    <th  scope="col">Company</th>
                 
                    <th  scope="col">Opérations</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php foreach ($Bus as  $value) {   ?>
               
                 
                    <tr>
                    <td ><?= $value["busNumber"] ?></td>
                    <th  scope="row"><?= $value["Plaque_immatriculation"] ?></th>
                    <td ><?= $value["Capacite"] ?></td>
                    <td ><?= $value["name"] ?></td>
                  
                    <td >
                    <a class="btn btn-success mb-2 ms-2" href="index.php?action=updateBus&id=<?= $value["Numero_de_bus"] ?>">update</a>

                    <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value["Numero_de_bus"]?>" data-bs-name="<?= $value["busNumber"] ?>" href="#">delete</a>

                    </td>
                    </tr>
               
              <?php } ?>
              
                </tbody> 
                </table>
                <div id="rebons"></div>
            
            
            </div>
          </div>
          </div>
        </div>

</div>
	
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Catégories</h1>
      </div>
      <div class="modal-body">
        
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>


	
<script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-success mb-2 ms-2" href="index.php?action=destroBus&id=${id}">delete</a>
`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });

</script>

    <?php $contant =  ob_get_clean();
    include_once "View\layout.php" ; 
    
  }
    ?>
