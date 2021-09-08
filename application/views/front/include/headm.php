<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YFE3B07ZWB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-YFE3B07ZWB');
    </script>
    <title>VyaparBill - Let's Start Invoicing Paperless</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link rel="icon" href="<?php echo base_url('assets/frontadmin/images/favicon.jpeg');?>">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/animate.css');?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/magnific-popup.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/flaticon.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontadmin/css/style.css');?>">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!--Canonical Tag-->
	<link rel=“canonical” href=“https://vyaparbill.com/” />


	<style>
    .login-page{
      background-image: url(<?php echo base_url('assets/admin/dist/img/billing.jpg'); ?>);
      background-size: cover;
      height: 90vh;
    }
/* .login-page, .register-page {
  
    -ms-flex-align: center;
    align-items: center;
    background: #e9ecef;
        background-image: none;
        background-size: auto;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    height: 90vh;
    -ms-flex-pack: center;
    justify-content: center;
} */
    .login-logo, .register-logo {
    font-size: 2.1rem;
    font-weight: 300;
    margin-bottom: 0px;
    text-align: center;
    background: green;
    padding: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    color: #fff;
}
#overlay {
  position: fixed; /* Sit on top of the page content *//* Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.1); /* Black background with opacity */
  z-index: 10; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
.login-box{
  
}

.loginFooter{
  position: fixed;
  bottom: 0px;
  border-top: 3px solid #222;
  padding-top: 10px;
}
.loginFooter{
  background: powderblue;
  width: 100%;
}
.footerAddress{
  text-align: center;
}
.footerContact{
  text-align: left;
}
.companyLogo{
  text-align: center;
  padding: 10px;
}
.errorMsg span{
  color: red;
}

@media screen and (max-width: 580px) {
  .loginFooter{
    background: powderblue;
    width: 100%;
    display: none;
  }
  .login-box, .register-box {
    margin-top: .5rem;
    width: 100%;
  }
}
  </style>

  </head>
  <body>

  <div class="modal fade" id="myModal" role="dialog" style="display: block;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <!-- <div class="modal-header">
		<h4 class="modal-title"><i class="fa fa-user-circle"></i> Login VyaparBill</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> -->
        <div class="modal-body">
		<div class="login-box" >

  <!-- /.login-logo -->
<div class="card" style="border:none; box-shadow:none;">
  <div class="card-body login-card-body" style="box-shadow: none;">
  <button type="button" class="close" data-dismiss="modal">&times;</button>

	<div class="companyLogo">
	  <a href="<?php echo base_url();?>">
		<img src="<?php echo base_url('assets/admin/dist/img/logo.png'); ?>" style="width: 175px;">
	  </a>
	</div>
	<div class="errorMsg">
	  <?php if(isset($logerror)) {
		echo "<span> $logerror; </span>";
	  }
	 ?> 
	</div>
	
	<form action="<?php echo base_url('bill/login');?>" method="post">
	<div class="form-group clearfix">
		<div class="icheck-success d-inline">
		  <input type="radio" name="r3" checked="" id="radioSuccess1"> 
		  <label for="radioSuccess1">
			 User
		  </label>
		</div> 
		<div class="icheck-success d-inline">
		  <input type="radio" name="r3" id="radioSuccess2">
		  <label for="radioSuccess2">
			 Admin
		  </label>
		</div>
	</div>
	  <div class="input-group mb-3">
		<input type="email" id="email" name="login[email]" class="form-control" placeholder="Email"  required>
		<div class="input-group-append">
		  <div class="input-group-text">
			<span class="fa fa-envelope"></span>
		  </div>
		</div>
	  </div>
	  <div class="input-group mb-3">
		<input type="password" id="password" name="login[password]" class="form-control" placeholder="Password" required>
		<div class="input-group-append">
		  <div class="input-group-text">
			<span class="fa fa-lock"></span>
		  </div>
		</div>
	  </div>
	  <div class="row">
		<div class="col-7">
		  <div class="icheck-primary">
			<input type="checkbox" id="remember">
			<label for="remember">
			  Remember Me
			</label>
		  </div>
		</div>
		<!-- /.col -->
		<div class="col-5">
		  <button type="submit" id="submit" name="submit" value="submit" class="btn btn-success btn-block">Login</button>
		</div>
		<!-- /.col -->
	  </div>
	</form>
   
	<!-- <div class="social-auth-links text-center mb-3">
	  <p>- OR -</p>
	  <a href="#" class="btn btn-block btn-primary">
		<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
	  </a>
	  <a href="#" class="btn btn-block btn-danger">
		<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
	  </a>
	</div> -->
	<!-- /.social-auth-links -->
	
	<!-- <p class="mb-1">
	  <a href="forgot-password.html">I forgot my password</a>
	</p> -->
	<p class="mb-0">
	  <a href="<?php echo base_url('bill/register');?>" class="text-center">Register a new membership</a>
	</p>
  </div>
  <!-- /.login-card-body -->
</div>
</div>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
</div>


    <div class="wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="bg-wrap">
						<div class="row">
							<div class="col-md-6 d-flex align-items-center">
								<p class="mb-0 phone pl-md-2">
									<a href="tel:01204212546" class="mr-2"><span class="fa fa-phone mr-1"></span> +120 4212-546</a> 
									<a href="mailto:info@vyaparbill.com"><span class="fa fa-paper-plane mr-1"></span> info@vyaparbill.com</a>
								</p>
							</div>
							<div class="col-md-6 d-flex justify-content-md-end">
								<div class="social-media">
								<p class="mb-0 d-flex">
									<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
									<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
									<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
									<a href="https://web.whatsapp.com/" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-whatsapp"><i class="sr-only">Whatsapp</i></span></a>
								</p>
						</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<div class="logo">
			<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/frontadmin/images/logo.png');?>" alt="VyaparBill"></a>
		</div>
		<form action="#" class="searchform order-sm-start order-lg-last">
	  <div class="form-group d-flex loginSignup">
		  <a class="loginButton" href="<?php echo base_url('bill/login');?>" >Login</a>
		  <a class="loginButton" href="<?php echo base_url('bill/register');?>">SignUp</a>
		<!-- <input type="submit" value="Login" class="btn btn-primary">
		<div class="submitting"></div>
		<input type="submit" value="Sign Up" class="btn btn-primary">
		<div class="submitting"></div> -->

	  </div>
	</form>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="fa fa-bars"></span> Menu
	  </button>
	  <div class="collapse navbar-collapse" id="ftco-nav">
		<ul class="navbar-nav m-auto">
			<li class="nav-item active"><a href="<?php echo base_url();?>" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="<?php echo base_url('about');?>" class="nav-link">About Us</a></li>
			<li class="nav-item"><a href="<?php echo base_url('services');?>" class="nav-link">Features</a></li>
		  <li class="nav-item"><a href="<?php echo base_url('price');?>" class="nav-link">Pricing</a></li>
		  <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
		  <li class="nav-item"><a href="<?php echo base_url('contact');?>" class="nav-link">Contact Us</a></li>
		</ul>
	  </div>
	</div>
</nav>
