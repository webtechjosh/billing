<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model("Common_model", "common");
		$this->load->model("Admin_model","company");		
	}

	public function emailVerificationOtp(){

		$this->load->model("Common_model", "common");

		$email  = $this->input->post('email');

        $rv = $this->common->email_otp($email);

        if(count($rv)>0){
		$to = $rv['email']; 

		if( !empty($to) ) {
			
			$regOtp = rand(10000, 99999);
			
			$id = $this->common->otp_save($regOtp, $rv['userid']);

            $emailSucess = $this->sendOtpOnMail("support@vyaparbill.com", $to, $regOtp, 'Reset Password ');			

            if($emailSucess){

    			$sucess = array('msg' => 'ok', 'otp' => $regOtp);                
            } else{
                $sucess = array('msg' => 'emailerror');
            }

		} }else {

			$sucess = array('msg' => 'fail');

		}

		echo json_encode($sucess);
	}


	public function resetpassword(){
		$this->load->model("Common_model", "common");
		$data = $this->input->post();

		$verifyOTP1 = $this->common->otp_verify1($data['otp']);
    
		if(!empty($verifyOTP1['uid'])){

			$returnid = $this->common->resetpass($data['newpass'], $verifyOTP1['uid']);

			$msg = array('msg' => 'ok', 'id'=>$returnid);
			
		} else {

			$msg = array('msg' => 'fail');
		}
		echo json_encode($msg);
    
	}




	public function register(){

		$this->load->model("Admin_model","company");		

		$this->load->model("Common_model", "common");

		$data = $this->input->post();


	   $emailExits = $this->company->isEmailExists('tbl_company', $data['email']);
			if( $emailExits ){

			  	$error = array('erromail'=>'fail');

		      } else {

		      	if($data['package_name'] == 'Free')
			         	{
			      	  $data['status'] = 'Approved';
			     }
			      $regOtp = rand(10000, 99999);	

			      $to = $data['email'];

//			      $emailSucess = true;
			      $emailSucess = $this->sendOtpOnMail("support@vyaparbill.com", $to, $regOtp, 'Email Verification');

			      if($emailSucess){

			      	  $id = $this->common->otp_save($regOtp);

				  	  $error = array('erromail'=>'ok', 'otpreg' => $regOtp);

			      } else {

			      	$error = array('erromail'=>'emailfail');
			      }
		      }

		    echo json_encode($error);  
		  }    


   public function registerwithopt(){

	   	$this->load->model("Admin_model","company");
	   	$this->load->model("Common_model", "common");
	   	$data = $this->input->post();
	   	$insetData = array();

	   	foreach ($data['regData'] as $key => $value) {
		   		$insetData[$value['name']] = $value['value'];
		   		if($value['value'] == 'Free'){
		   			$insetData['status'] = 'Approved';
		   		}
	   		}

		$sessOtp = $this->common->otp_verify($data['otp']);	   	

	   	if($sessOtp){

		   	$sucess = $this->company->register($insetData);

		      	if( $sucess ){

		      		$msg = array('msg' => 'ok');

		      	} else {

		      		$msg = array('msg' => 'fail');
		      	}	
	   	} else {
		      $msg = array('msg' => 'invalid');	   		
	   	}
		echo json_encode($msg);
   }


    public function sendOtpOnMail($from, $to, $cod, $msg){
      $this->load->library('parser');
      $config = Array(
      'protocol' => 'smtp',
/*      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'senderdigi@gmail.com', 
      'smtp_pass' => '9711770903',*/ 
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
     );
        $fromemail =$from;
        $subject = "OTP from VyaparBill";
        $body = "$msg";
        $toemail = $to;
        $message = "Dear user your one time password (OTP) to ".$msg." your Vyaparbill account is ".$cod.".\nCheers VyaparBill";

	  $this->load->library('email', $config);
	  $this->email->set_newline("\r\n");
	  $this->email->from($fromemail, "OTP");
	  $this->email->to($toemail);
	  $this->email->subject($subject);
	  $this->email->message($message);

	  if($this->email->send())
		 {
		 	return true;
		 }
		 else
		{
		  return false;
		}
    }



    public function expcheckdemo($otp = '78545'){

    	$result = $this->common->otp_verify($otp);
    	echo $result;
    }


// Code_back

/*	public function resetpassword(){
		$data = $this->input->post();
		$otpValue = $this->session->userdata('evcode');

		$tblname = 	$this->session->userdata('tblNameforreset');
		$id      =	$this->session->userdata('uid');									  
		
		if($data['otp'] == $otpValue){
			$this->common->resetpass($tblname, $data['newpass'], $id);
			$msg = array('msg' => 'ok');
		} else {
			$msg = array('msg' => 'fail');
		}
		echo json_encode($msg);
	}    */


}