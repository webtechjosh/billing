<?php

class Admin_Model extends CI_Model 
{

  public function login($data){

    $confLogin = false;

    $q = $this->db->where($data)
                  ->where('status', 'Approved')
                  ->get('tbl_company');
  
        if($q->num_rows() > 0){
           $rs = $q->row();
           $this->setUserSession($rs);                 
           $confLogin = true;
        }  else {
            $confLogin = false;
        }
    return $confLogin;
  }


	public function login_back($data){

    $confLogin = false;

	  $q = $this->db->where($data)
                  ->where('status', 'Approved')
                  ->get('tbl_company');
  
        if($q->num_rows() > 0){
           $rs = $q->row();
           $this->setUserSession($rs);                 
           $confLogin = true;
           $this->session->set_userdata('role', 'admin');
        }  else {
              $q = $this->db->where($data)
                            ->get('tbl_users');
            
                  if($q->num_rows() > 0){

                     $userdata = $q->row();
                     $rs = $this->db->where('user_id', $userdata->pid)
                                    ->get('tbl_company')->row_array();

                     $rs['empID']    =  $userdata->id;
                     $rs['empName']  =  $userdata->name;
                     $rs['empEmail'] =  $userdata->email;                                    
                     $this->setUserSession1($rs);
                     $this->session->set_userdata('role', 'user');                     
                     $confLogin = true;
                  }  
        }
    return $confLogin;
	}

	public function resetUserSession($data){
      $q = $this->db->where($data)
                    ->where('status', 'Approved')
                    ->get('tbl_company');

	    if ( $q->num_rows() > 0){
	       $rs = $q->row();
	       $this->setUserSession1($rs);                 
	       $confLogin = true;
	    }
	}

	public function register($data, $update = NULL ){

	    if($update != NULL){
	        $this->db->where($update)
	                 ->update('tbl_company', $data);
	          return $update[$key[0]];
	    } else {
	      $data['password'] = md5($data['password']);
	      $data['login_name	'] = $data['email'];
	      $this->db->insert('tbl_company', $data);
	      return $this->db->insert_id();
	     }    
	}

   public function isEmailExists($tbl, $email){
	    $this->db->where('email',$email);
	    $q = $this->db->get($tbl);
	    if($q->num_rows() > 0){
	       return true;
	     }    
    }

   public function setUserSession($rs){

       $this->session->set_userdata('role',$rs->role);

       $this->session->set_userdata('userID',$rs->user_id);

       $fn = isset($rs->owner_name)?$rs->owner_name:$rs->email;

       $companyName = isset($rs->org_name)?$rs->org_name:$rs->email;

       $companyAddress = isset($rs->address)?'Address: '. $rs->address .', '. $rs->city .', '. $rs->state .', '. $rs->zip .'<br>GST: '. $rs->gst:'';  

       $stateCode = $rs->state_code;

       $this->session->set_userdata('userName', $fn);
       $this->session->set_userdata('userCompanyName', $companyName);
       $this->session->set_userdata('userCompanyAddress', $companyAddress);
       $this->session->set_userdata('userCompanyStateCode', $stateCode);       
       $this->session->set_userdata('email', $rs->email);
       $this->session->set_userdata('passw', $rs->password);
       
       // Set information for determined registration type, id, and registration date.

       $this->session->set_userdata('regType', $rs->package_name);
       $this->session->set_userdata('regId', $rs->user_id);
/*       $this->session->set_userdata('regDate', $rs->created_at);*/

    }


   public function setUserSession1($rs){
    print_r($rs);
       $this->session->set_userdata('userID',$rs['user_id']);
       $this->session->set_userdata('empID',$rs['empID']); 
             

       $fn = isset($rs['owner_name'])?$rs['empName']:$rs['email'];

       $companyName = isset($rs['org_name'])?$rs['org_name']:$rs['email'];

       $companyAddress = isset($rs['address'])?'Address: '. $rs['address'] .', '. $rs['city'] .', '. $rs['state'] .', '. $rs['zip'] .'<br>GST: '. $rs['gst']:'';  

       $stateCode = $rs['state_code'];

       $this->session->set_userdata('userName', $fn);
       $this->session->set_userdata('userCompanyName', $companyName);
       $this->session->set_userdata('userCompanyAddress', $companyAddress);
       $this->session->set_userdata('userCompanyStateCode', $stateCode);       
       $this->session->set_userdata('email', $rs['email']);
       $this->session->set_userdata('passw', $rs['password']);

       // Set information for determined registration type, id, and registration date.

       $this->session->set_userdata('regType', $rs['package_name']);
       $this->session->set_userdata('regId', $rs['user_id']);
       $this->session->set_userdata('regDate', $rs['created_at']);

    }


    public function get_company_details($cond){

        return $this->db->where($cond)
                 ->get('tbl_company')->row();
    }


    public function updateProfile($data, $cond){
    	return $this->db->where($cond)
               ->update('tbl_company', $data);
    }

   public function changepass($data, $cond){

      $this->db->where($cond);
      $this->db->update('tbl_company', $data);
      if($this->db->affected_rows()){
          return true;
      }  else {
          return false;
      }  
   } 



   public function get_comp_list($mode = '', $status=''){

     if(!empty($mode)){

        $this->db->where('package_name', $mode);

     }

     if(!empty($status)){

      $this->db->where('status', $status);

     }

      return $this->db->get('tbl_company')->result();

   }

   public function get_comp_deiais_by_id($id){

      $this->db->where('user_di', $id);

      return $this->db->get('tbl_company')->result();

   }



    public function get_invoice(){

      return $this->db->get('tbl_bill_details')->result();
    }


    public function get_approval($id, $status){

      $data = array('status' => $status);

      $this->db->where('user_id', $id);

      $this->db->update('tbl_company', $data);

      return $id;
    }
}
?>