<?php
if (isset( $_SESSION['saved_array'])) {
	



ob_start(); ?>


<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 mx-auto text-center">
        <div class="intro-wrap">
          <div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Travel In <span class="typed-words"></span></h1>

            <div class="row">
							<div class="col-12">


								<form class="form" method="post"  action="index.php?action=Saveform">
									<div class="row mb-2">
										<div class="col-sm-12 col-md-6 mb-5 mb-lg-0 col-lg-4">
										
										<label for="#" class="form-label">DÉPART</label>

										<select required name="DEPART" class="form-control select2 " id="cityDropdown">
							
										<option>Select City</option>
											<?php foreach ($resultcity as $value) { 	
												if (isset($_SESSION['saved_array'])) {
													$array =  $_SESSION['saved_array'] ;
													if ($value ===  $array["DEPART"]) {

														
													
											
												?>
									<option selected value="<?= $array["DEPART"] ?>"><?= $array["DEPART"] ?></option>


												<?php continue; }	} ?>
											
										
									
										<option value="<?= $value ?>"><?= $value ?></option>

										<?php }?>
										</select>
								
										</div>
										
     
								
										<div class="col-sm-12 col-md-6 mb-5 mb-lg-0 col-lg-4">
										<label for="#" class="form-label">ARRIVÉE</label>

											
										<select id="select_city" required name="ARRIVEE" class="form-control select2 " >
										<option >Select City</option>
										<?php 	
												if (isset($_SESSION['saved_array'])) {
													$array =  $_SESSION['saved_array'] ;
											
												?>
									<option selected value="<?= $array["ARRIVEE"] ?>"><?= $array["ARRIVEE"] ?></option>


												<?php 	} ?>
										
										</select>
										</div>
								
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
										<div class="mb-3">
											<label for="datepicker" class="form-label">Select Date:</label>
											<?php 	
												if (isset($_SESSION['saved_array'])) {
													$array =  $_SESSION['saved_array'] ;
											
												?>

                                     <input value="<?= $array["date"] ?>" name="date" required type="date" class="form-control" id="datepicker">

												<?php 	} ?>
											
										</div>											
										</div>
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
										<label for="datepicker" class="form-label">The number of people</label>

									<select required name="people" class="form-control select2 ">
									<?php 	
												if (isset($_SESSION['saved_array'])) {
													$array =  $_SESSION['saved_array'] ;
											
												?>
										<option selected><?= $array["people"] ?></option>


												<?php 	} ?>
										
										<option >1 people</option>
										<option>2 people</option>
										<option>3 people</option>
										<option>4 people</option>
										<option>5 people</option>
										<option>6 people</option>
										</select>
										</div>
										<div class="col-lg-4">
										<label style="visibility: hidden;" for="datepicker" class="form-label">12</label>

											<label class="control control--checkbox mt-3">
												<span class="caption">Save this search</span>
												<input type="checkbox" checked="checked" />
												<div class="control__indicator"></div>
											</label>
										</div>

										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
										<label style="visibility: hidden;" for="datepicker" class="form-label">12</label>

										
											<input required name="submit" type="submit" class="btn btn-primary btn-block" value="Search">
										</div>
									

									</div> 
								   
								
								</form>


							</div>
						</div>

			
					</div>        </div>
      </div>
    </div>
  </div>
</div>

<div class="container ">
  <div class="row mt-5">
    <div class="col-sm-3   ">
    <hr>
    <h2>Company</h2>
<div class=" m-3 " id="data_Catégories">




</div>
    

<hr>
<h3>Filter par price</h3>
      <div class="form-group mt-5">
      <input id="myRange" type="text" data-slider-min="0" data-slider-max="280" data-slider-step="1" data-slider-value="[50,280]">

      </div>
  <hr>
<h2>Date</h2>
    <div class="form-check">
      <input value="All" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault12" checked>
      <label class="form-check-label" for="flexRadioDefault12">
        All
      </label>
    </div>
    <div class="form-check">
      <input value="morning" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
      <label class="form-check-label" for="flexRadioDefault1">
        Date in morning
      </label>
    </div>
    <div class="form-check">
      <input value="evening" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
      <label class="form-check-label" for="flexRadioDefault2">
        Date in evening
      </label>
    </div>
  



    </div>
    <div class="col-sm-9  ">
      <div class=" mb-3 ">
      <h5 ><?=  $array["DEPART"] ?> vers <?=  $array["ARRIVEE"] ?> le <?= $array["date"] ?>. pour <?= $array["people"]?>. 
    <!-- card --></div>
      
    <div id="data">

    </div>


      <!-- end card -->
    
      <nav aria-label="..." class=" d-flex  justify-content-center  w-100 ">
                  <ul class="pagination " id="paginate">
                
                  
                  </ul>
                </nav>
    </div>
    
  </div>

</div>



<script>
  
    <?php  include_once "View/front/Ajax_filter/affiche_card/affiche_card.js" ; ?>
    

  </script>





<?php $contant =  ob_get_clean();
 include_once "View\layout.php" ; 

}else {
	header("Location: index.php");

}
?>