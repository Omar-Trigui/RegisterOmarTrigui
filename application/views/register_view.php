<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php base_url();?> assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/login/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/login/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/login/css/main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('captcha', {
          'sitekey' : '6LdwnMgUAAAAAEk_n6GK29GOEaLRVedkv13ll3zS'
        });
      };
</script>
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
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php base_url(); ?>assets/login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form"  method="post" action="<?php echo base_url(); ?>register/validation">
					<span class="login100-form-title">
						Registration
						
					</span>
					<?php 
					if($this->session->flashdata('message')){
						echo'<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
					}
					if($this->session->flashdata('error_msg')){
						echo'<div class="alert alert-danger"><strong>'.$this->session->flashdata('error_msg').'</strong></div>';
					}
					?>
					
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user_name" placeholder="username"  value="<?php echo set_value('user_name'); ?>">
					
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<span class="text-danger"><?php echo form_error('user_name'); ?></span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text"  name="user_email" id="emailOrDomain"  value="<?php echo set_value('user_email'); ?>" placeholder="Email">
						<span class="text-danger"><?php echo form_error('user_email'); ?></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div id="result"></div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  placeholder="Password" name="user_password"  value="<?php echo set_value('user_password'); ?>" >
						<span class="text-danger"><?php echo form_error('user_password'); ?></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
			
					<div class="form-group">
     
	 <div id="captcha" data-callback="recaptchaCallback"  ></div>
	</div>
					
					<div class="container-login100-form-btn">
					<input type="submit" name="register" value="Register" id="mybtn" class="login100-form-btn" disabled/>
						<!-- <button class="login100-form-btn">
							Register
						</button> -->
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
	<script src="<?php base_url(); ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script src="<?php base_url(); ?>assets/login/js/main.js"></script>

	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
 <script>
     (function($) {
  $.fn.donetyping = function(callback) {
    var _this = $(this);
    var x_timer;
    _this.keyup(function() {
      clearTimeout(x_timer);
      x_timer = setTimeout(clear_timer, 1000);
    });

    function clear_timer() {
      clearTimeout(x_timer);
      callback.call(_this);
    }
  }
})(jQuery);

$('#emailOrDomain').donetyping(function(callback) {
    var val = $("#emailOrDomain").val();
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://api.debounce.io/v1/?api=5dfa48d292ddd&email="+val,
        "method": "GET",
       
        "headers": {}
        }

        $.ajax(settings).done(function (response) {
            if(response.debounce.reason.localeCompare("Deliverable") ==0){
                console.log("good email");
                $("#result").empty();
                $('#result').append("<p style='color:green;'>good email</p>")
                $("#mybtn").attr("disabled", false);
            }else{
                console.log("bad email");
                $("#result").empty();
                $('#result').append("<p style='color:red;'>bad email</p>")
                $("#mybtn").attr("disabled", true);
               
                
            }
        
        });
  
});
    //   $("#target").submit(function(event) {
    //     var val = $("#emailOrDomain").val();

    //     var settings = {
    //     "async": true,
    //     "crossDomain": true,
    //     "url": "https://api.debounce.io/v1/?api=5dfa48d292ddd&email=omartrigui1995@gmail.com",
    //     "method": "GET",
       
    //     "headers": {}
    //     }

    //     $.ajax(settings).done(function (response) {
    //     console.log(response);
    //     });

    //     // $.ajax({
    //     //   url: endpoint + encodeURIComponent(val)
    //     // })
    //     //   .done(function(data) {
    //     //     console.log(data);
    //     //   })
    //     //   .error(function(data) {
    //     //     console.warn(data);
    //     //   });
    //     // console.log(val);
    //     event.preventDefault();
    //   });
    function recaptchaCallback() {
    $('#mybtn').removeAttr('disabled');
};
    </script>
<!--===============================================================================================-->


</body>
</html>