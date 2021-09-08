<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VyaparBill | Registration Page</title>
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
        .register-page{
      background-image: url(<?php echo base_url('assets/admin/dist/img/abs.jpg'); ?>);
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
.registerPage{
  margin-top: 30px;
}

@media screen and (max-width: 580px) {
  .loginFooter{
    background: powderblue;
    width: 100%;
    display: none;
  }
}
  </style>
</head>
<body class="hold-transition register-page">

<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="registerPage">
        <div class="register-logo">
          <h2 class="login-box-msg">REGISTER HERE</h2>
          <h4>Welcome <span id="datetime"></span></h4>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                    <div class="companyLogo">
                        <a href="<?php echo base_url();?>">
                          <img src="<?php echo base_url('assets/admin/dist/img/logo.png'); ?>" style="width: 200px;">
                        </a>
                      </div>
              <?php 
                if(isset($erromail)) echo $erromail;
              ?>

              <div class="registerForm">
                <form action="<?php echo base_url('bill/register');?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <input type="text" id="owner_name" name="owner_name" class="form-control" placeholder="Your name" value="<?php echo $this->input->post('owner_name');?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" id="mobileno" name="mobileno" class="form-control" placeholder="Your mobile" value="<?php echo $this->input->post('mobileno');?>" pattern="[0-9]{10}" value="<?php echo $this->input->post('mobileno');?>" oninvalid="this.setCustomValidity('Mobile no should be 10 digits')" oninput="this.setCustomValidity('')"  required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Your email" value="<?php echo $this->input->post('email');?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" value="<?php echo $this->input->post('password');?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                            
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <input type="text" id="org_name" name="org_name" class="form-control" placeholder="Company Name" value="<?php echo $this->input->post('org_name');?>" required>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-building"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mb-3">
                        <select class="form-control" id="business_type" name="business_type" required>
                          <option value="">--Business Type--</option>
                          <option value="Manufacturer"<?= ($this->input->post('business_type') == "Manufacturer"?"selected":'');?>>Manufacturer</option>
                          <option value="Trader"<?= ($this->input->post('business_type') == "Trader"?"selected":'');?>>Trader</option>
                          <option value="Retailer"<?= ($this->input->post('business_type') == "Retailer"?"selected":'');?>>Retailer</option>
                        </select>
                      </div>

                      <div class="form-group mb-3">
                        <select class="form-control" id="package_name" name="package_name" required>
                          <option value="">--Package Type--</option>
                          <option value="Free" <?= ($this->input->post('package_name') == "Free"?"selected":'');?>>Free</option>
                          <option value="Business" <?= ($this->input->post('package_name') == "Business"?"selected":'');?>>Business</option>
                        </select>
                      </div>   

                      <div class="row">
                        <div class="col-8">
                          <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required <?= ($this->input->post('terms') == "agree"?"checked":'');?>>
                            <label for="agreeTerms">
                             I agree to the <a href="#">terms</a>
                            </label>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" id="submit" name="submit" value="register" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                      </div>

                    </div>
                  </div>
                </form>
              </div>


                <!-- 
              <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i>
                  Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i>
                  Sign up using Google+
                </a>
              </div> -->

              <a href="<?php echo base_url('bill/login');?>" class="text-center">I already have a membership. Login Here.</a>
            </div>
            <!-- /.form-box -->
        </div>
            <!-- /.card -->
      </div>
    </div>
    <div class="col-md-2"></div>
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
<!-- /.register-box -->


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
<script src="<?php echo base_url('assets/admin/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
