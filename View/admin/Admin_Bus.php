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

         
         <a class="mb-5 chose "  href="index.php?action=Company">Ajouter Company</a>
       
        
         <a class="mb-5 chose active"  href="index.php?action=Bus" >Ajouter Bus</a>


         <a class="mb-5 chose"  href="index.php?action=Horaire" >Ajouter Un Horaire</a>
       
     

       
        
       
         
         </div>
          <div class="col-sm-12 form">
            <div class="row">
              <form  method="post" enctype="multipart/form-data">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Nom de Catégories</label>
                <input name="Nom_Catégories" value="" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description</label>
                <textarea name="Description"  placeholder="Description..." class="form-control" id="exampleFormControlTextarea1" rows="3"><?php   echo $Description ?? '';  ?></textarea>
              </div> 
              <label class="mb-2" for="">add img</label>
             <div class="row g-0 text-center  ms-1">
           <div class="col-6 col-xl-4">  <label class="label_file col-sm-4" for="apply"><input type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
             </div>
       
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Ajouter Catégories</button>
        
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
                    <th  scope="col">photo</th>
                    <th  scope="col">Nom de Catégories</th>
                    <th  scope="col">Description</th>
                 
                    <th  scope="col">Opérations</th>
                    </tr>
                </thead>
                <!-- <tbody class="table-group-divider">
                  <?php foreach ($categorieData as  $value) {   ?>
                    
                 
                    <tr>
                    <td ><img src="<?= $value['img'] ?>" alt="" width="150px" height="154px"></td>
                    <th  scope="row"><?= $value['Nom'] ?></th>
                    <td ><?= $value['Description'] ?></td>
                  
                    <td >
                    <a class="btn btn-success mb-2 ms-2" href="Dashboard/update_categorie.php?id=<?= $value['id'] ?>">update</a>
                   

                  
                   
                    <button onclick="NoneRequest(<?= $value['id'] ?>, this)" class="btn btn-<?php if (is_null($value['deleted_at'])) {
                      echo "info" ;
                    }else {
                      echo "secondary" ;
                    } ?> mb-2 ms-2" type="button" ><div id="result_<?= $value['id'] ?>"><?php if (is_null($value['deleted_at'])) {
                      echo "None" ;
                    }else {
                      echo "Block" ;
                    } ?></div></button>

                    <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value['id'] ?>" data-bs-name="<?= $value['Nom'] ?>" href="#">delete</a>

                    </td>
                    </tr>
               
              <?php } ?>
              
                </tbody> -->
                </table>
                <div id="rebons"></div>
            
            
            </div>
          </div>
          </div>
        </div>

</div>
	



	


    <?php $contant =  ob_get_clean();
    include_once "layout_Admin.php" ; 
    
    
    ?>
