<?php ob_start(); 

?>




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
              <form  method="post" enctype="multipart/form-data" action="index.php?action=SubmitupdateCompany">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Nom de Company</label>
                <input name="name" required value="<?= $data[0]->getName() ?>" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1" >
                <input style="display: none;" name="id" required value="<?= $data[0]->getId() ?>" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description</label>
                <textarea name="Bio"  required placeholder="Description..." class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $data[0]->getBio() ?></textarea>
              </div> 
              <label class="mb-2" for="">add img</label>
             <div class="row g-0 text-center  ms-1">
           <div class="col-6 col-xl-4">  <label class="label_file col-sm-4" for="apply"><input required type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
             </div>
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">update Company</button>

             
        
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
