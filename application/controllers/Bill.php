<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model("Bill_model","bill");
		$this->load->model("Admin_model","company");
		$this->load->model("Party_model","party");
		$this->load->helper('vyaparbill');
		$this->load->helper(array('cookie', 'url'));
	}

	public function index() {

	  $this->login();

	}

	public function login() {
		
		$action   = $this->input->post('submit');
		$data     = $this->input->post('login');
		if( $action == 'submit' ) {
		$ems='';
			$logindata['password'] = md5($data['password']);

			$logindata['email']    = $data['email'];

			$remember = $this->input->post('remember');
		
			if(!empty($remember)){
		    
				setcookie('useremail', $data['email'], time() + (86400 * 30), "/");
				setcookie('userpass', $data['password'], time() + (86400 * 30), "/");				
				setcookie('remember', 'remme', time() + (86400 * 30), "/");
			    
			 } 
			$com_details = $this->company->login($logindata);


			if( $com_details ) {

					 $role = $this->session->userdata('role'); 

					 if($role != 'admin'){
						redirect(base_url('user/dashboard'));
					 } else {
					    redirect(base_url('admin/dashboard'));
					 }


					

			} else {
				$msg = array('logerror'=>'Wrong user name or password');
                $this->session->set_flashdata('logerror', 'Wrong user name or password');
                redirect(base_url());
			}
		}
	}



	public function register(){

		$data = $this->input->post();

		$insetData = array_diff($data, array('register'));

		if( isset($data['submit']) && $data['submit'] == 'register'){

		   $emailExits = $this->company->isEmailExists('tbl_company', $data['email']);

			  if( $emailExits ){

			  	$error = array('erromail'=>'Email already exits with us');

			     $this->load->view('admin/register', $error);

		      } else {
		      	
		      	if($insetData['package_name'] == 'Free')
			      	{
			      	  $insetData['status'] = 'Approved';
			     	}
		      	$sucess = $this->company->register($insetData);

		      	if( $sucess ){

		      		redirect(base_url('bill'));

		      	} else {

		      		$error = array('erromail'=>'Unable to register now');

					$this->load->view('admin/register', $error);
		      	}
		      }

		} else {

			$this->load->view('admin/register');

		}

	}

	public function dashboard(){
		isValidUserSession();
		//$wh = array('pid' => $this->session->userdata('userID'), 'created_by' => $this->session->userdata('empID'));
		$wh = array('pid' => $this->session->userdata('userID'));
		$data['bills'] = $this->bill->get_invoice($wh);
		if ( !$data ) {
			$data['bills'] = array();
		} 

		$data['script'] = array('assets/admin/dist/js/common.js', 'assets/admin/dist/js/proforma.js', 'assets/admin/dist/js/common.js');
		$this->load->view('admin/index', $data);
		//$this->output->enable_profiler(TRUE);

	}

	public function logout(){
	    
	    $this->session->sess_destroy();
		redirect(base_url());
	}


	public function myprofile(){
		isValidUserSession();
		$wh = array('user_id' => $this->session->userdata('userID'), 'email' => $this->session->userdata('email'));
		$data['compinfo'] = $this->company->get_company_details($wh);
		$this->load->view('admin/myprofile', $data);

	}

	public function editprofile(){	
		isValidUserSession();
		$wh = array('user_id' => $this->session->userdata('userID'), 'email' => $this->session->userdata('email'));
 		$updateData = $this->input->post();

		if(isset($updateData['update']) && $updateData['update'] == 'profile') {

			$updateData = array_diff($updateData, array('profile'));
			$sucess = $this->company->updateProfile($updateData, $wh);
			if($sucess){
				$this->session->set_flashdata('profileupdatemsg','Data Udated sucessfully');
				$compDetails = $this->company->get_company_details($wh);
			    $this->session->set_userdata('userName',$compDetails->owner_name);
			    $this->session->set_userdata('userCompanyName',$compDetails->org_name);			
				redirect(base_url('user/editprofile'));
			}
		}

		$data['compinfo'] = $this->company->get_company_details($wh);		
		$this->load->view('admin/editprofile', $data);
	}
	

	public function changepassword(){

		$data = $this->input->post();

		if(isset($data['submit']) && $data['submit'] =='changepass'){
		$whq = array('user_id' => $this->session->userdata('userID'), 'email' => $this->session->userdata('email'), 'password' => md5($data['oldpassword']));
	  		$updatePass['password'] = md5($data['password']);
	  		$result = $this->company->changepass($updatePass, $whq);
	  		if($result){
		  		$this->session->set_flashdata('passchange','<div class="alert alert-success"> <strong>Success!</strong> Password updated sucessfully</div>');	  		
	  		} else {
		  		$this->session->set_flashdata('passchange','<div class="alert alert-danger"> <strong>Danger!</strong> Pls. enter valid oldpassword</div>');	  		
	  		}

		}
		$wh['script'] = array('assets/admin/dist/js/proforma.js');
		$this->load->view('admin/changepassword',$wh);

	}


	public function party(){	
		isValidUserSession();
		$wh = array('pid' => $this->session->userdata('userID'));
		$data['partylist'] = $this->party->get_party_details($wh);
		$this->load->view('admin/party', $data);

	}

	public function addparty(){
		isValidUserSession();
		$submit = $this->input->post('submit');
		if($submit == 'submit'){
			$data = $this->input->post();
			$data1 = array_diff_key($data, array('submit'=>"submit"));

/*			$email = $this->party->isEmailExists($data['email']);

			if($email) {
                $this->session->set_flashdata('partyemaierror', '<div class="alert alert-danger"><strong>Warning! </strong>Email already exits with us</div>');
			 	   $this->load->view('admin/addparty');				
			} else {*/

				$data1['pid'] = $this->session->userdata('userID');
				$id = $this->party->save($data1);
                $this->session->set_flashdata('partyemaierror', '<div class="alert alert-info"><strong>Warning! </strong>Party added sucessfully</div>');
				redirect(base_url('user/editparty/'.$id));
//			}
		}
		$data['script'] = array('assets/admin/dist/js/proforma.js');
		$this->load->view('admin/addparty',$data);
	}


	public function editparty($id = null) {

		isValidUserSession();
		$dataIns = $this->input->post();

		if(isset($dataIns['submit'])){
			$data1 = array_diff_key($dataIns, array('submit'=>"submit"));
			$wh = array('pid'=>$this->session->userdata('userID'), 'id'=> $id);

			$email = $this->party->isEmailExistsExcept($data1['email'], $id);
			if($email) {
				$data['partyDetails'] = $this->party->get_party_by_id($wh);
				$data['erromail'] = 'Email already exits with us';
				$this->load->view('admin/editparty', $data);
			 } else {
				$id = $this->party->save($data1, $wh);
				redirect(base_url('user/editparty/'.$id));			
			 } 	
		} else {
			
			$wh = array('pid'=>$this->session->userdata('userID'), 'id'=> $id);
		    $data['script'] = array('assets/admin/dist/js/proforma.js');			
			$data['partyDetails'] = $this->party->get_party_by_id($wh);
			$this->load->view('admin/editparty', $data);
		}	
	}


	public function proforma_invoice(){
$id = $this->session->userdata('userID');
    	isValidUserSession();

    	if(!isFreeRegistered()){

    		$noOfBills = billCountForFree();
    		$years =  yearsCountforFree();
    		//echo $noOfBills;
    	//	echo $years; die;
    		if($noOfBills > 50 && $years == 0){

     	 		$data['script'] = array('assets/admin/dist/js/common.js', 'assets/admin/dist/js/proforma.js', 'assets/admin/plugins/select2/js/select2.full.min.js');
				$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');	
				$data['bankdetails'] = $this->bill->get_bank_details($id);	
				$this->load->view('admin/exceed-limit', $data);	

    		} else {

		 		$data['script'] = array('assets/admin/dist/js/common.js', 'assets/admin/dist/js/proforma.js', 'assets/admin/plugins/select2/js/select2.full.min.js');
				$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');		
				$data['partydata'] = $this->bill->get_customer_gst_mobile();
				$data['bankdetails'] = $this->bill->get_bank_details($id);
				$this->load->view('admin/proforma-invoice', $data);	    		
    		}

    	} else {

	 		$data['script'] = array('assets/admin/dist/js/common.js', 'assets/admin/dist/js/proforma.js', 'assets/admin/plugins/select2/js/select2.full.min.js');
			$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');		
			$data['partydata'] = $this->bill->get_customer_gst_mobile();
			$data['bankdetails'] = $this->bill->get_bank_details($id);
			$this->load->view('admin/proforma-invoice', $data);	    		
    	}
    }

	public function create_proforma_bill(){
		
		$data = $this->input->post();
		$data = array_diff_key($data, array('files'=>''));
		$data['particulars'] = json_encode($data['particulars']);

		$data['pid']        = $this->session->userdata('userID');
//		$data['created_by'] = $this->session->userdata('empID');		
       // $data['invoice_date'] = toMySQLDate($data['invoice_date']);
		$id = $this->bill->save('tbl_bill_details',$data);

        $companyName = $this->session->userdata('userCompanyName');


		if( $id ) {

		    $fileName = $this->mpdf($id, 'save');
		    $fileName = 'PDFBill/'.$fileName.'.pdf';
		    $billdata = $this->bill->get_email_name_by_id($id);
            
            if($this->session->userdata('regType') == 'Business') {
                
                $sms['name'] = $billdata->party_name;
                $sms['mobno'] = $billdata->mobileno;
                $sms['downlink'] = 'https://localhost/vyaparbill.com/r/BIZT'.$id.'DOWN';
                $smsMsg = sendSms($sms); 	           	
            }

		    $form = $this->session->userdata('email');
            $to = $billdata->email;

		    $this->cisendmail("bill@vyaparbill.com", $to , $fileName, $billdata->party_name, $companyName); 
    		redirect(base_url('user/dashboard'));
		
		} else {

			$this->proforma_invoice();	
		}
	}



	public function edit_proforma_bill($id = null){

		$action = $this->input->post('action');


		$data = $this->input->post();
		$data = array_diff_key($data, array('files'=>''));
		if($action == 'save') {
		    //$data['invoice_date'] = toMySQLDate($data['invoice_date']);
		    //echo $data['invoice_date'];
		    //die;
			
			$data['particulars'] = json_encode($data['particulars']);
			$data1 = array_diff($data, array('save'));
			$id = $this->bill->save('tbl_bill_details',$data1, array('id'=>$id));
			redirect(base_url('bill/edit_proforma_bill/'.$id));
		} 

		$data['script'] = array('assets/admin/dist/js/common.js', 'assets/admin/dist/js/proforma.js', 'assets/admin/plugins/select2/js/select2.full.min.js');

		$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');

		$data['billData'] = $this->bill->get_invoice_by_id(array('id'=> $id));
		$this->load->view('admin/edit-proforma-invoice', $data);

	}


    public function tax_invoice(){
 		isValidUserSession();
        $id = $this->session->userdata('userID');
    	if(!isFreeRegistered()){

    		$noOfBills = billCountForFree();
    		$years     =  yearsCountforFree();
    		

    		if($noOfBills > 50 && $years == 0){

				$data['script'] = array('assets/admin/dist/js/common.js','assets/admin/dist/js/taxinvoice.js',  'assets/admin/plugins/select2/js/select2.full.min.js');
				$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');		
				$data['partydata'] = $this->bill->get_customer_gst_mobile();
				$data['bankdetails'] = $this->bill->get_bank_details($id);
				$this->load->view('admin/exceed-limit', $data);    

    		} else {
				$data['script'] = array('assets/admin/dist/js/common.js','assets/admin/dist/js/taxinvoice.js',  'assets/admin/plugins/select2/js/select2.full.min.js');
				$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');		
				$data['partydata'] = $this->bill->get_customer_gst_mobile();
				$data['bankdetails'] = $this->bill->get_bank_details($id);
				$this->load->view('admin/tax-invoice', $data);    
    		}

    	} else {
			$data['script'] = array('assets/admin/dist/js/common.js','assets/admin/dist/js/taxinvoice.js',  'assets/admin/plugins/select2/js/select2.full.min.js');
			$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');		
			$data['partydata'] = $this->bill->get_customer_gst_mobile();
			$data['bankdetails'] = $this->bill->get_bank_details($id);
			$this->load->view('admin/tax-invoice', $data);
	  }
	}
 
  	public function create_tax_bill(){
		$data = $this->input->post();
		$data = array_diff_key($data, array('files'=>''));
		$data['particulars'] = json_encode($data['particulars']);
		$data['payment_details'] = json_encode($data['taxpay']);
		unset($data['taxpay']);
		$data['pid'] = $this->session->userdata('userID');
		
		$companyName = $this->session->userdata('userCompanyName');
		$id = $this->bill->save('tbl_bill_details',$data);

		if( $id ) {

		    $fileName = $this->mpdf($id, 'save');
		    $fileName = 'PDFBill/'.$fileName.'.pdf';
		    $billdata = $this->bill->get_email_name_by_id($id);
            
            if($this->session->userdata('regType') == 'Business') {
                
                $sms['name'] = $billdata->party_name;
                $sms['mobno'] = $billdata->mobileno;
                $sms['downlink'] = 'https://localhost/vyaparbill.com/r/BIZT'.$id.'DOWN';
                $smsMsg = sendSms($sms); 	           	
            }
 
            $to = $billdata->email;
		    $form = $this->session->userdata('email');
		    $this->cisendmail("bill@vyaparbill.com", $to , $fileName, $billdata->party_name, $companyName); 
        	redirect(base_url('user/dashboard'));
		
		} else {

			$this->tax_invoice();	
		}
	}


	public function edit_tax_bill($id = null){

		$action = $this->input->post('action');
		if($action == 'save') {
			$data = $this->input->post();


			$data['payment_details'] = json_encode($data['taxpay']);
			unset($data['taxpay']);
			

			$data = array_diff_key($data, array('files'=>''));

			$data['particulars'] = json_encode($data['particulars']);
			$data1 = array_diff($data, array('save'));
			$id = $this->bill->save('tbl_bill_details',$data1, array('id'=>$id));
			redirect(base_url('user/bill/tax/edit/'.$id));
		} 

		$data['script'] = array('assets/admin/dist/js/taxinvoice.js', 'assets/admin/dist/js/common.js', 'assets/admin/plugins/select2/js/select2.full.min.js');

		$data['css'] = array('assets/admin/plugins/select2/css/select2.min.css', 'assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');

		$data['billData'] = $this->bill->get_invoice_by_id(array('id'=> $id));
		$this->load->view('admin/edit-tax-invoice', $data);
		
	}

	public function challan(){
		$this->load->view('admin/challan');
	}

	public function get_party_name(){

		$name = $this->input->post('name');
		$userID = $this->session->userdata('userID');
		$nameSuggest = $this->bill->get_party_name($name, $userID);
		echo $nameSuggest;
	}


	public function get_party_details_by_id(){

		$id = $this->input->post('id');
		$partyDetails = $this->bill->get_party_details_by_id($id);
		if($partyDetails) {
			echo json_encode($partyDetails);
		} else {
			echo "No records found";
		}

	}

	public function getdetailsbygst(){

		$data = $this->input->post('gst');

		$customer_details = $this->bill->searchgst($data);
		$list = "";

		foreach($customer_details as $key => $value)
		 {
			$list .= '<li onclick="fill('. $value['gst'] .')"><a>'.$value['gst'].'</a></li>';
    	 }

		echo '<ul>'.$list.'</ul>';
	}




	public function previewinvoice(){
		$row = '';
		$cgstOuter='';
		$sr = 1;
		$data = $this->input->post();
		$totalQty=0;
	    $grandTotal=0;
		$particulars = $data['particulars'];
		$partystateCode = $data['state_code'];

		$cgst = $sgst =0;
		foreach ($particulars as $key => $value) {
			$totalV =  $value['rate'] * $value['qty'];
			$totalV = $totalV - ($totalV*$value['disc']/100);  
			$row .= '<tr><td>'.$sr.'</td><td>'.$value['desc'].'</td><td>'.$value['hsn'].'</td><td>'.$value['rate'].'</td><td>'.$value['qty'].'</td><td>'.$value['disc'].'</td><td>'.$totalV.'</td></tr>';
			$totalQty   += $value['qty'];
			$grandTotal += $totalV;	

		if($value['gst'] != '' && $value['gst'] > 0) {
			$amount = $value['rate'] * $value['qty'];
			$cgst += (($amount * ($value['gst']/2))/100);
			$sgst += (($amount * ($value['gst']/2))/100);
     		$cgstOuter = (($amount * $value['gst'])/100);
		  }
		  $sr++;
		}

      // $cgst = $sgst = (($grandTotal * 9)/100);
      // $cgstOuter = (($grandTotal * 18)/100);

		$grandTotal1 = ($grandTotal + $cgst +  $sgst);

		if($this->session->userdata('userCompanyStateCode') != $partystateCode) {
			$foot = '<tr><th colspan="3" class="center//"><p>Total</p></th><th class="center" ><p></p></th><th class="center" ><p>'.$totalQty.'</p></th> <th class="center" ><p></p></th> <th><p>'.$grandTotal.'</p></th></tr>
			<tr><th colspan="3" class="center"><p>Total Amount in Words. (INR)</p></th><th colspan="3" class="center" ><p>CGST</p></th><th><p>'.$cgstOuter.'</p></th></tr>
			<tr><td colspan="3" class="center" > <p>('.ucwords(no_to_words($grandTotal1)).' Only)</p></td><th colspan="3" class="center" ><p>TOTAL AMOUNT</p></th><th><p>'.$grandTotal1.'</p></th></tr>';
		} else {
		$foot = '<tr><th colspan="3" class="center"><p>Total</p></th><th class="center" ><p></p></th><th class="center" ><p>'.$totalQty.'</p></th> <th class="center" ><p></p></th> <th><p>'.$grandTotal.'</p></th></tr>
			<tr><th colspan="3" class="center"><p>Total Amount in Words. (INR)</p></th><th colspan="3" class="center" ><p>CGST</p></th><th><p>'.$cgst.'</p></th></tr>
			<tr><td colspan="3" rowspan="2" class="center" > <p>('.ucwords(no_to_words($grandTotal1)).' Only)</p></td><th colspan="3" class="center" > <p>SGST</p></th><th><p>'.$sgst.'</p></th></tr>
			<tr><th colspan="3" class="center" ><p>TOTAL AMOUNT</p></th><th><p>'.$grandTotal1.'</p></th></tr>';			
		}

		echo $row.$foot;
	}
    
 
 
 	public function setting_back(){
		$sessionID = $this->session->userdata('userID');
		$data['companyInfo'] = $this->company->get_company_details(array('user_id'=>$sessionID));
		$setData = $this->input->post();
		if($this->input->post('submit') == 'save') {
		  if ( ! empty($_FILES['logoname']['name'])) {
			$ext = explode('.',$_FILES['logoname']['name']);
			$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '','_compnay_'.$sessionID.'_logo.'.end($ext)); 
	    	 $config['upload_path']   = './uploads/'; 
	         $config['allowed_types'] = 'gif|jpg|png'; 
	         $config['file_name']     = $new_image_name;
	         $config['max_size']      = 100; 
	         $config['max_width']     = 1024; 
	         $config['max_height']    = 768;  
	         $this->load->library('upload', $config);
				
	         if ( ! $this->upload->do_upload('logoname')) {
	              $this->session->set_flashdata('settingUpdate', '<div class="alert alert-danger"><strong>Warning! </strong>Error with uploading Graphics</div>');	
	         }
				
	         else {
	         	
                if(file_exists('./uploads/'.$data['companyInfo']->logoname)){
	            	unlink('./uploads/'.$data['companyInfo']->logoname);
	            } 
	         	$wh = array('user_id'   => $sessionID, 'email' => $this->session->userdata('email'));
	            $updateData['mobileno'] = $setData['mobileno'];
	            $updateData['email']    = $setData['email'];
	            $updateData['logoname'] = $new_image_name;

	            $updateData['signature'] = $setData['signature'];
	            $updateData['acc_name']  = $setData['acc_name'];
	            $updateData['acc_number']= $setData['acc_number'];
	            $updateData['ifsc']      = $setData['ifsc'];
	            $updateData['bank_name'] = $setData['bank_name'];
				$updateData['branch']    = $setData['branch'];	            
	            $updateData['upi']       = $setData['upi'];	            

	            $sucess = $this->company->updateProfile($updateData, $wh);
	            if($sucess){
	              $this->session->set_flashdata('settingUpdate', '<div class="alert alert-success"><strong>Success! </strong>Logo and Data updated sucessfully</div>');	
	              redirect(base_url('bill/setting'));	
	            }
	         } 
	         } else {
	         	$wh = array('user_id' => $sessionID, 'email' => $this->session->userdata('email'));
	            $updateData['mobileno'] = $setData['mobileno'];
	            $updateData['email'] = $setData['email'];
	            $sucess = $this->company->updateProfile($updateData, $wh);
	            if($sucess){
     	          $this->session->set_flashdata('settingUpdate', '<div class="alert alert-info"><strong>Info! </strong> Only Data Uploaded Sucessfully</div>');	
	              redirect(base_url('bill/setting'));	
	            }
	         }
	        } 

		$this->load->view('admin/setting',$data);
	} 


// SPECIAL CODE GOES BELOW 	***************
	
// Send mail with attachment throuth SMTP

    public function cisendmail($from, $to, $fileName, $partyname, $compName){
      $this->load->library('parser');
      $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'senderdigi@gmail.com', 
      'smtp_pass' => '9711770903', 
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );
        $fromemail =$from;
        $subject = "Bill by Vyaparbill";
        $body = "Thank for making a bill via Vyapar Bill Pvt. Ltd.";
        $toemail = $to;
        $message ="Dear ".$partyname."\nThank you for shoping with ". $compName."\nFind your attached bill below:\n\nCheers\nTeam VyaparBill";
        $attachedfile=$fileName;

	  $this->load->library('email', $config);
	  $this->email->set_newline("\r\n");
	  $this->email->from($fromemail,"Vyapar Bill");
	  $this->email->to($toemail);
	  $this->email->subject($subject);
	  $this->email->message($message);
	  $this->email->attach($attachedfile);

	  if($this->email->send())
		 {
		  $this->session->set_flashdata(array('billmail'=> 'Bill Send Sucessfully'));
		 }
		 else
		{
		  $this->session->set_flashdata(array('billmail'=> 'Unable to send bill mail'));
		}
    }
    
// Create PDF from Database table for Invoice   

  public function mpdf($billID, $action='preview'){

    $compID = $this->session->userdata('userID');
	$data['data'] = $data1 = $this->bill->get_invoice_by_id(array('id'=>$billID));
	$html = $this->load->view('admin/print-proforma', $data, true);
	$pdfFilePath = 'CompID_'.$compID.'BillNo_'.$billID.'Mobno_'.$data1->mobileno;
 	
 	require_once APPPATH . 'third_party/mpdf/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf(array(
		"mode" => "UTF-8"
		)
	);

		$mpdf->WriteHTML($html);
		if($action == "download"){
			$mpdf->Output('PDFBill/'.$pdfFilePath.'.pdf',\Mpdf\Output\Destination::DOWNLOAD);
		}
		if($action == "save"){
			$mpdf->Output('PDFBill/'.$pdfFilePath.'.pdf',\Mpdf\Output\Destination::FILE);
			return $pdfFilePath;
		}
		if($action == "preview"){
			$mpdf->Output();
		}		
   }
    
    
    // Download Invoice
	public function download($id){
	 $action ='download';
	 $this->mpdf($id, $action);	
	}

    // Preview Invoice
	public function preview($id){
		$data['data'] = $this->bill->get_invoice_by_id(array('id'=>$id));
		 $this->load->view('admin/print-proforma', $data);
	}
	
	// Download Invoice in Excel
	public function excel(){
		$wh = array('pid' => $this->session->userdata('userID'));
		$excelData =  $this->bill->get_invoice_excel($wh);
		$filename = "Invoice.csv";
		$fp = fopen('php://output', 'w');
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		header('Pragma: no-cache');
		header('Expires: 0');
		foreach($excelData as $key => $value){
			fputcsv($fp, $value);	
		} 	
	}	

  // Download Invoice through SMS	
  public function smsbilldownload($billid){
     preg_match("/([a-zA-Z]+)(\\d+)([a-zA-Z]+)/", $billid, $matches);
     $action ='download';
	 $this->mpdf($matches[2], $action);
  }	
 // END ********************** 


// ADMIN AREA CODE BELOW ******************

	// mkuk 03.12.2020

	public function admindashboard(){	
		 isValidUserSession();
    	 $this->load->view('admin/admindashboard');
	}

	public function invoicebill(){	
		 isValidUserSession();
		 $wh = array('pid' => $this->session->userdata('userID'));
		 $data['userlist'] = $this->user->get_user_details($wh);
		 $this->load->view('admin/invoicebill');

	}

	public function partytable(){	
		// isValidUserSession();
		// $wh = array('pid' => $this->session->userdata('userID'));
		// $data['userlist'] = $this->user->get_user_details($wh);
		$this->load->view('admin/partytable');

	}
	
	public function user(){	
		// isValidUserSession();
		// $wh = array('pid' => $this->session->userdata('userID'));
		// $data['userlist'] = $this->user->get_user_details($wh);
		$this->load->view('admin/user');

	}

	public function adduser(){
		isValidUserSession();
		$submit = $this->input->post('submit');
		if($submit == 'submit'){
			$data = $this->input->post();
			$data1 = array_diff_key($data, array('submit'=>"submit"));
			$email = $this->user->isEmailExists($data['email']);

			if($email) {
                $this->session->set_flashdata('useremaierror', '<div class="alert alert-danger"><strong>Warning! </strong>Email already exits with us</div>');
			 	   $this->load->view('admin/adduser');				
			} else{

				$data1['pid'] = $this->session->userdata('userID');
				$id = $this->user->save($data1);
                $this->session->set_flashdata('useremaierror', '<div class="alert alert-info"><strong>Warning! </strong> User added sucessfully</div>');
				redirect(base_url('bill/edituser/'.$id));
			}
		}
		$data['script'] = array('assets/admin/dist/js/proforma.js');
		$this->load->view('admin/adduser',$data);
	}


	public function edituser($id = null) {

		isValidUserSession();
		$dataIns = $this->input->post();

		if(isset($dataIns['submit'])){
			$data1 = array_diff_key($dataIns, array('submit'=>"submit"));
			$wh = array('pid'=>$this->session->userdata('userID'), 'id'=> $id);

			$email = $this->user->isEmailExistsExcept($data1['email'], $id);
			if($email) {
				$data['userDetails'] = $this->user->get_user_by_id($wh);
				$data['erromail'] = 'Email already exits with us';
				$this->load->view('admin/edituser', $data);
			 } else {
				$id = $this->user->save($data1, $wh);
				redirect(base_url('bill/edituser/'.$id));			
			 } 	
		} else {
			
			$wh = array('pid'=>$this->session->userdata('userID'), 'id'=> $id);
		    $data['script'] = array('assets/admin/dist/js/proforma.js');			
			$data['userDetails'] = $this->user->get_user_by_id($wh);
			$this->load->view('admin/edituser', $data);
		}	
	}


	public function emailVerificationOtp(){

		$ret = array('retur'=>'testing');
		echo json_encode($ret); 
	}




 	public function setting(){
		$sessionID = $this->session->userdata('userID');
		$data['companyInfo'] = $this->company->get_company_details(array('user_id'=>$sessionID));
		$setData = $this->input->post();
		$val = true;
		if($this->input->post('submit') == 'save') {

		  if ( ! empty($_FILES['logoname']['name'])) {
			$ext = explode('.',$_FILES['logoname']['name']);
			$new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '','_compnay_'.$sessionID.'_logo.'.end($ext)); 
				$val = $this->uploadlogosig('logoname', $new_image_name, $setData, $data, 'logo');
		    } 

		  if ( ! empty($_FILES['signature']['name'])) {
		    	
				$ext = explode('.',$_FILES['signature']['name']);

				$new_image_name1 = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '','_compnay_'.$sessionID.'_sig.'.end($ext)); 
				//$new_image_name1 = end($ext); 				
					$val = $this->uploadlogosig('signature', $new_image_name1, $setData, $data, 'sig');
	         }

	         if($val) {
	         	$wh = array('user_id'    => $sessionID, 'email' => $this->session->userdata('email'));
	            $updateData['mobileno']  = $setData['mobileno'];
	            $updateData['email']     = $setData['email'];
	            $updateData['acc_name']  = $setData['acc_name'];
	            $updateData['acc_number']= $setData['acc_number'];
	            $updateData['ifsc']      = $setData['ifsc'];
	            $updateData['bank_name'] = $setData['bank_name'];
				$updateData['branch']    = $setData['branch'];	            
	            $updateData['upi']       = $setData['upi'];	            


	            $sucess = $this->company->updateProfile($updateData, $wh);
	            if($sucess){
     	          $this->session->set_flashdata('settingUpdate', '<div class="alert alert-info"><strong>Info! </strong> Only Data Uploaded Sucessfully</div>');	
	             
	            }
	         }
	          redirect(base_url('user/setting'));
	        } 
		$this->load->view('admin/setting',$data);
	} 




	public function uploadlogosig($basename, $img, $setData, $data, $type=null){
			
			//echo $basename; die;
			$sessionID = $this->session->userdata('userID');

	    	 $config['upload_path']   = './uploads/'; 
	         $config['allowed_types'] = 'gif|jpg|png|PNG'; 
	         $config['file_name']     = $img;
	         $config['max_size']      = 100; 
	         $config['max_width']     = 1024; 
	         $config['max_height']    = 768;  
	         $this->load->library('upload', $config);
				
	         if ( ! $this->upload->do_upload($basename)) {
	              $this->session->set_flashdata('settingUpdate', '<div class="alert alert-danger"><strong>Warning! </strong>Error with uploading Graphics</div>');	
	         } else {

                if(file_exists('./uploads/'.$data['companyInfo']->logoname)){
	            	unlink('./uploads/'.$data['companyInfo']->logoname);
	            } 
	         	$wh = array('user_id'   =>$sessionID, 'email' => $this->session->userdata('email'));
	            $updateData['mobileno'] = $setData['mobileno'];
	            $updateData['email']    = $setData['email'];

	            if($type == 'logo'){
			      $updateData['logoname'] = $img;
	            }

	            if($type == 'sig'){
		            $updateData['signature'] = $img;	            
	            }

	            $updateData['acc_name']  = $setData['acc_name'];
	            $updateData['acc_number']= $setData['acc_number'];
	            $updateData['ifsc']      = $setData['ifsc'];
	            $updateData['bank_name'] = $setData['bank_name'];
				$updateData['branch']    = $setData['branch'];	            
	            $updateData['upi']       = $setData['upi'];	            

	            $sucess = $this->company->updateProfile($updateData, $wh);
	            if($sucess){
	              $this->session->set_flashdata('settingUpdate', '<div class="alert alert-success"><strong>Success! </strong>Images and Data updated sucessfully</div>');	
	             // redirect(base_url('bill/setting'));
	        	 }
			}
	            return false;  
 	}

}