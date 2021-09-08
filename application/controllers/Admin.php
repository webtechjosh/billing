<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model("Admin_model","admin");
		$this->load->helper('vyaparbill');
		$this->load->helper(array('cookie', 'url'));
	}

	public function index() {

	  $this->dashboard();

	}


	public function dashboard(){	

		 isValidUserSession();
		 $this->load->view('admin/super/admindashboard');

	}


	public function freecompanylist(){

		 isValidUserSession();
		 $data['set_action'] = 'free';
		 $data['pg_title']	="Free";	
		 $data['comp_list'] = $this->admin->get_comp_list('Free');
		 $this->load->view('admin/super/companylist', $data);

	}

	public function paidcompanylist(){
		 
		 isValidUserSession();		
		 $data['pg_title']	="Paid";			 
		 $data['comp_list'] = $this->admin->get_comp_list('Business', 'Approved');
     	 $data['script'] = array('assets/admin/dist/js/superadmin.js');
		 $this->load->view('admin/super/companylist', $data);

	}


	public function companydetails($id){

		 isValidUserSession();
		 $data['com_details'] = $this->admin->get_comp_deiais_by_id($id);
		 $this->load->view('admin/super/companyprofile', $data);

	}


	public function getinvoice(){

		 isValidUserSession();		
		 $data['bills'] = $this->admin->get_invoice();
		 $this->load->view('admin/super/invoicelist', $data);

	}


	public function pendingapproval(){

		 $data['pg_title']	="Pending Approval";			 
		 $data['comp_list'] = $this->admin->get_comp_list('Business', 'Pending');
		 $data['script'] = array('assets/admin/dist/js/superadmin.js');
		 $this->load->view('admin/super/companylist', $data);

	}

	public function approved(){

		$data = $this->input->post();
		$status = $this->admin->get_approval($data['id'], 'Pending');
		if($status){
			$data = array(
				'status' => 1,
				'msg'    => 'Unpproced sucessfully'
			);
		   } else {
			$data = array(
				'status' => 0,
				'msg'    => 'Unable to Unpproced'
			);			
		}
		echo json_encode($data);
	}

	public function unapproved(){

		$data = $this->input->post();
		$status = $this->admin->get_approval($data['id'], 'Approved');
		
		if($status){
			//$com_details = $this->admin->get_company_details(array('user_id'=>$data['id']));
			//$this->cisendmail("bill@vyaparbill.com", $com_details-> , $billdata->party_name, $companyName); 
			$data = array(
				'status' => 1,
				'msg'    => 'Approved sucessfully'
			);
		} else {
			$data = array(
				'status' => 0,
				'msg'    => 'Unable to approved'
			);			
		}
		echo json_encode($data);
	}

/*

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


	public function prepageHTML($result){
			$htmldata = '';
			$sr= 0;
			foreach($result as $key => $value){
			  $sr++;

			$htmldata .= "<tr><td>".$sr."</td><td>". $value->org_name."</td><td>". $value->owner_name."</td><td>". $value->mobileno ."</td><td>". $value->phone_no ."</td><td>". $value->address. "</td>";
			  $htmldata .= "<td>";
			    if($value->status == 'Approved'){
			      $htmldata .= '<button type="button" class="btn btn-primary btn-sm approved" data-id="'.$value->user_id.'">Approved</button>';
			  }
			  if($value->status == 'Pending'){
			       $htmldata .= '<button type="button" class="btn btn-danger btn-sm  pending" data-id="'.$value->user_id.'">Pending</button>';
			      }
			   }
			   $htmldata .= '</td></tr>';
			  return $htmldata;
		}
*/

/*
    public function cisendmail($from, $to, $partyname, $updown){
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

        if($updown == 'up'){
	        $msg = 'Your account is Upgraded from Free to Bussiness plan, enjoy unlimited bill creation with full facilities.'; 
        }

        if($updown == 'down'){
	        $msg = 'Your account is Degraded from Business to Free plan, you are bounded with some facilitis.'; 
        }

        $fromemail =$from;
        $subject = "Bill by Vyaparbill";
        $body = "Thank for making a bill via Vyapar Bill Pvt. Ltd.";
        $toemail = $to;

        $message ="Dear ".$partyname."\n". $msg."\n\nCheers\nTeam VyaparBill";

	  $this->load->library('email', $config);
	  $this->email->set_newline("\r\n");
	  $this->email->from($fromemail,"Vyapar Bill");
	  $this->email->to($toemail);
	  $this->email->subject($subject);
	  $this->email->message($message);

	  if($this->email->send())
		 {
		  $this->session->set_flashdata(array('billmail'=> 'Bill Send Sucessfully'));
		 }
		 else
		{
		  $this->session->set_flashdata(array('billmail'=> 'Unable to send bill mail'));
		}
    }*/


}