
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>/assets/login/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>/assets/login/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>/assets/login/css/main.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"
      integrity="sha256-ywN/tj+hfHxivU0KIDrKwL6lu3A8rrt2vnPIRkiM9z8="
      crossorigin="anonymous"
    ></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
          
            <?php

echo $message;

?>


			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php base_url(); ?>/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php base_url(); ?>/assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php base_url(); ?>/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php base_url(); ?>/assets/login/vendor/select2/select2.min.js"></script>
	<script src="<?php base_url(); ?>/assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script src="<?php base_url(); ?>/assets/login/js/main.js"></script>

	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

</body>
</html>