
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
  <h3 class="text-center mb-4">log in admin</h3>


  <div class="container ">
<form action="index.php?action=loginadmin" method="post">
  <?php if (isset($_GET["error"])) {   ?>
  <div class="alert alert-danger" role="alert">
  <?= $_GET["error"] ?>
</div>
   <?php } ?>
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="Email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="Password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php $contant =  ob_get_clean();
    include_once "View\layout.php" ; 
    
    
    ?>