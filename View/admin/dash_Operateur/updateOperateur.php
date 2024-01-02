
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
              <form  method="post" enctype="multipart/form-data" action="index.php?action=submitUpdateOperateur">
              <div class="col-12 col-sm-12  p-5 row  text-start">
             
   
              <div class="mb-3 col-sm-4">
              <label for="exampleFormControlInput1" class="form-label ">email</label>
                <input name="email" required value="<?=   $Operateur[0]->getEmail() ?>" placeholder="email..." type="email" class="form-control " id="exampleFormControlInput1" >

              </div>
              <div class="mb-3 col-sm-4" style="display: none;">
              <label for="exampleFormControlInput1" class="form-label ">email</label>
                <input name="whereemail" required value="<?=   $Operateur[0]->getEmail() ?>" placeholder="email..." type="email" class="form-control " id="exampleFormControlInput1" >

              </div>
              <div class="mb-3 col-sm-4">
              <label for="exampleFormControlInput1" class="form-label ">password</label>
                <input name="password" required value="<?=   $Operateur[0]->getPassword() ?>" placeholder="password..." type="password" class="form-control " id="exampleFormControlInput1" >

              </div>
              <div class="mb-3 col-sm-4">
              <label for="#" class="form-label">Company</label>
             
              <?php
         
              ?>
              <select name="company_id" class="form-control select2 ">
                        <option>Select City</option>
                          <?php foreach ($Company as $value) { 
                            if ($value->getId() ===  $Operateur[0]->getCompanyId()) {
                                $getName = $value->getName() ;
                                $getId = $value->getId() ;
                                continue ;
                                
                            }	 ?>
                          

                        <option value="<?= $value->getId() ?>"><?= $value->getName() ?></option>

                        <?php }?>

                        <option selected value="<?= $getId ?>"><?= $getName ?></option>

                        </select>

              </div>
   
            
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Update Operateur</button>
       
             </div>
        
             </div>
         
                    </form>
              </div>
            
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
            
            <a class="btn btn-success mb-2 ms-2" href="index.php?action=destroRoot&id=${id}">delete</a>
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
    
    
    ?>
