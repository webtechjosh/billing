<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VyaparBill | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo base_url('assets/frontadmin/images/favicon.jpeg');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
  box-shadow: 0px 0px 10px gray;
  border-radius: 10px;
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
<body class="hold-transition login-page">

  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="login-box" >

          <div class="login-logo">
          <h2 class="login-box-msg">LOGIN</h2>
          <h4>Welcome <span id="datetime"></span></h4>
          </div>
            <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <div class="companyLogo">
                <a href="<?php echo base_url();?>">
                  <img src="<?php echo base_url('assets/admin/dist/img/logo.png'); ?>" style="width: 200px;">
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
                    <input type="radio" id="user" name="role" value="user" class="usertype"> 
                    <label for="user">
                       User
                    </label>
                  </div> 
                  <div class="icheck-success d-inline">
                    <input type="radio" id="admin" name="role" value="admin" class="usertype">
                    <label for="admin">
                       Admin
                    </label>
                  </div>
              </div>

                <div class="input-group mb-3">
                  <input type="email" id="email" name="login[email]" class="form-control" placeholder="Email"  required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" id="password" name="login[password]" class="form-control" placeholder="Password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
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
              


              <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
              </p>
              <p class="mb-0">
                <a href="<?php echo base_url('bill/register');?>" class="text-center">Register a new membership</a>
              </p>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
</div>

  <div class="loginFooter">  
      <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <div class="companyInfo">
                        <h1>VYAPARBILL.COM</h1>
                   </div>
                </div>
                <div class="col-md-4">
                    <div class="footerAddress">
                      <p><i class="fa fa-home"></i> A-44, First Floor, Sector 2 <br> Noida, U.P. 201301</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footerContact">
                    <p><i class="fa fa-phone"></i> 0120-421-2546 <br> <i class="fa fa-envelope"></i> support@vyaparbill.com</p>
                    <p></p> 
                    </div>
                </div>
            </div>
      </div>
  </div>

<!-- /.login-box -->

<!-- Javascript -->
<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
</script>
<!-- jQuery -->
<script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js'); ?>`"></script>


</body>
</html>
