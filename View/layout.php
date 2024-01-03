
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/owl.carousel.min.css">
  <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="public/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="public/fonts/icomoon/style.css">
  <link rel="stylesheet" href="public/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="public/css/daterangepicker.css">
  <link rel="stylesheet" href="public/css/aos.css">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" rel="stylesheet">


<style>
	.chose {
  text-decoration: none;
  padding: 30px;
  color: #f9f9f9;
  border-radius: 25px;
  
}
.chose:hover{
 
  background-color: #8e8a8a47;
 
}
.active{
  background-color: #8e8a8a47;

}
/* .width{
  width: 21% !important;
} */


.label_file {
	display: block;
	width: 60vw;
	max-width: 300px;

	background-color: slateblue;
	border-radius: 2px;
	font-size: 1em;
	line-height: 2.5em;
	text-align: center;
}

.label_file:hover {
	background-color: cornflowerblue;
}

.label_file:active {
	background-color: mediumaquamarine;
}

#apply {
	border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px; 
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}
.img{
  width: 450px !important;
  height: 250px !important;
}

</style>

	<title>SmartTravel</title>
</head>

<body>
<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="site-navigation">
				<a href="index.php" class="logo m-0">SmartTravel</a>

				<ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
					<li ><a href="index.php">Home</a></li>
					
					<?php 
					if (isset($_SESSION["Operateur"]) ) { 	 ?>

						<li ><a href="index.php?action=SignOut">sign out Operateur</a></li>


					<?php } ?>
					<?php 
					if (isset( $_SESSION["Admin"]) && isset($admin)) { 	 ?>

						<li ><a href="index.php?action=SignOut_admin">sign out admin</a></li>


					<?php } ?>
					<?php 
					if (isset( $_SESSION["Admin"]) && isset($Operateurr)) { 	 ?>

						<li ><a href="index.php?action=Operateur">admin</a></li>


					<?php } ?>
						
				
				
				</ul>

				<a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
					<span></span>
				</a>

			</div>
		</div>
	</nav>


<?=  $contant ?>





<div class="site-footer">
		<div class="inner first">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">About Tour</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
						<div class="widget">
							<ul class="list-unstyled social">
								<li><a href="#"><span class="icon-twitter"></span></a></li>
								<li><a href="#"><span class="icon-instagram"></span></a></li>
								<li><a href="#"><span class="icon-facebook"></span></a></li>
								<li><a href="#"><span class="icon-linkedin"></span></a></li>
								<li><a href="#"><span class="icon-dribbble"></span></a></li>
								<li><a href="#"><span class="icon-pinterest"></span></a></li>
								<li><a href="#"><span class="icon-apple"></span></a></li>
								<li><a href="#"><span class="icon-google"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2 pl-lg-5">
						<div class="widget">
							<h3 class="heading">Pages</h3>
							<ul class="links list-unstyled">
								<li><a href="#">Blog</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2">
						<div class="widget">
							<h3 class="heading">Resources</h3>
							<ul class="links list-unstyled">
								<li><a href="#">Blog</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">Contact</h3>
							<ul class="list-unstyled quick-info links">
								<li class="email"><a href="#">mail@example.com</a></li>
								<li class="phone"><a href="#">+1 222 212 3819</a></li>
								<li class="address"><a href="#">43 Raymouth Rd. Baltemoer, London 3910</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="inner dark">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-8 mb-3 mb-md-0 mx-auto">
						<p>Copyright
						</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>



<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Include Bootstrap Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
	

	<script src="public/js/jquery-3.4.1.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/owl.carousel.min.js"></script>
	<script src="public/js/jquery.animateNumber.min.js"></script>
	<script src="public/js/jquery.waypoints.min.js"></script>
	<script src="public/js/jquery.fancybox.min.js"></script>
	<script src="public/js/aos.js"></script>
	<script src="public/js/moment.min.js"></script>
	<script src="public/js/daterangepicker.js"></script>
	

	<script src="public/js/typed.js"></script>

  
	

	<script>
		function ncityValueame(cityValue) {
						// Create a new XMLHttpRequest object

						var xhttp = new XMLHttpRequest();

						// Define a function to handle the response
						xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							// console.log(this.responseText); 
							var selectElement  =  document.getElementById("select_city") ;
							selectElement.innerHTML = this.responseText
						}
						};

						// Open a connection to the server
						xhttp.open("GET", "View/front/Ajax_filter/cityValue.php?cityValue=" + cityValue, true);

						// Send the request to the server
						xhttp.send();
		}
	</script>

	<script>
    // JavaScript code to capture the selected value
    document.getElementById('cityDropdown').addEventListener('change', function() {
        var cityValue = this.value;
        console.log('Selected value:', cityValue);
		ncityValueame(cityValue);
	

    });


</script>
	<script>
			


		$(function() {
			
			var slides = $('.slides'),
			images = slides.find('img');

			images.each(function(i) {
				$(this).attr('data-id', i + 1);
			})

			var typed = new Typed('.typed-words', {
				strings: ["Safi.","Rabat .", " Tanger.", " Agadir."],
				typeSpeed: 80,
				backSpeed: 80,
				backDelay: 2000,
				startDelay: 1000,
				loop: true,
				showCursor: true,
				preStringTyped: (arrayPos, self) => {
					arrayPos++;
					
					$('.slides img').removeClass('active');
					$('.slides img[data-id="'+arrayPos+'"]').addClass('active');
				}

			});


		});
		




	</script>

	<script src="public/js/custom.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	


</body>

</html>
