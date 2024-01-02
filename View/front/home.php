<?php ob_start(); ?>




	<div class="hero">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
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
											<?php foreach ($resultcity as $value) { 	 ?>
											
										
									
										<option value="<?= $value ?>"><?= $value ?></option>

										<?php }?>
										</select>
								
										</div>
										
     
								
										<div class="col-sm-12 col-md-6 mb-5 mb-lg-0 col-lg-4">
										<label for="#" class="form-label">ARRIVÉE</label>

											
										<select id="select_city" required name="ARRIVEE" class="form-control select2 " >
										<option >Select City</option>
										
										</select>
										</div>
								
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
										<div class="mb-3">
											<label for="datepicker" class="form-label">Select Date:</label>
											<input name="date" required type="date" class="form-control" id="datepicker">
										</div>											
										</div>
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
										<label for="datepicker" class="form-label">The number of people</label>

									<select required name="people" class="form-control select2 ">
										
										<option selected>1 people</option>
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
					</div>
				</div>
				<div class="col-lg-5">
					<div class="slides">
						<img src="public/images/1.jpg" alt="Image" class="img-fluid active">
						<img src="public/images/hero-slider-3.jpg" alt="Image" class="img-fluid">
						<img src="public/images/hero-slider-5.jpg" alt="Image" class="img-fluid">
						<img src="public/images/hero-slider-4.jpg" alt="Image" class="img-fluid">
						<img src="public/images/4.jpg" alt="Image" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="untree_co-section">
		<div class="container">
			<div class="row mb-5 justify-content-center">
				<div class="col-lg-6 text-center">
					<h2 class="section-title text-center mb-3">Our Services</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
			</div>
			<div class="row align-items-stretch">
				<div class="col-lg-4 order-lg-1">
					<div class="h-100"><div class="frame h-100"><div class="feature-img-bg h-100" style="background-image: url('public/images/hero-slider-1.jpg');"></div></div></div>
				</div>

				<div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1" >

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-house display-4 text-primary"></span>
							<h3>Beautiful Condo</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

					<div class="feature-1 ">
						<div class="align-self-center">
							<span class="flaticon-restaurant display-4 text-primary"></span>
							<h3>Restaurants & Cafe</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

				</div>

				<div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3" >

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-mail display-4 text-primary"></span>
							<h3>Easy to Connect</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-phone-call display-4 text-primary"></span>
							<h3>24/7 Support</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div class="untree_co-section count-numbers py-5">
		<div class="container">
			<div class="row">
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="9313">0</span>
						</div>
						<span class="caption">No. of Travels</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="8492">0</span>
						</div>
						<span class="caption">No. of Clients</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="100">0</span>
						</div>
						<span class="caption">No. of Employees</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="120">0</span>
						</div>
						<span class="caption">No. of Countries</span>
					</div>
				</div>
			</div>
		</div>
	</div>



    <?php $contant =  ob_get_clean();
    include_once "View\layout.php" ; 
    
    
    ?>
