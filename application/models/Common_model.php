<?php

class Common_Model extends CI_Model 
{

	public function email_otp($email){
		$rs = array();
		$found = false;
		$q = $this->db->where('email', $email)
						->get('tbl_company');
		if($q->num_rows() > 0 ) {
			$rv = $q->row();
			$found = true;
		}

		if( $found ){
			$rs['email']  =  $rv->email;
			$rs['userid'] =  $rv->user_id;
		}
		return $rs;
	}


	public function resetpass($password, $id) {

		$data = array('password'=> md5($password));
		$this->db->where('user_id', $id)
				 ->update('tbl_company', $data);
		return $id;
	}


	public function otp_save($otp, $id=0) {
		$data['otp'] = $otp;
		$data['otp_expiry'] = 0;
		$data['passreset_id'] = $id;
		$data['created_at'] = date("Y-m-d H:i:s");
		$this->db->insert("tbl_otp_expiry", $data);
		return $this->db->insert_id();
	}

	public function otp_verify($otp) {

	$sql = "SELECT * FROM tbl_otp_expiry WHERE otp = $otp AND otp_expiry != 1 AND NOW() <= DATE_ADD(created_at, INtERVAL 24 HOUR)";
	$query = $this->db->query($sql);

		if($query->num_rows()>0){
            return true;
		} else {
			return false;
		}
	}
	
	public function otp_verify1($otp) {

    $rs = array();
	$sql = "SELECT * FROM tbl_otp_expiry WHERE otp = $otp AND otp_expiry != 1 AND NOW() <= DATE_ADD(created_at, INtERVAL 24 HOUR)";
	$result = $this->db->query($sql)->row();
    if(isset($result)){
        $rs['uid'] = $result->passreset_id;         
    }
        return $rs;
 }



////////// DON'T TOUCH BELOW CODE ///////////////

/*	public function email_otp_mulilevel($email){
		$rv = '';
		$found = false;
		$q = $this->db->where('email', $email)
						->get('tbl_company');
		if($q->num_rows() > 0 ) {
			$rs = $q->row();
			$found = true;
			$this->session->set_userdata('tblNameforreset', 'tbl_company');
			$this->session->set_userdata('uid', $rs->id);			
		} else {
			$q = $this->db->where('email', $email)
							->get('tbl_users');
			if($q->num_rows() > 0 ) {
			  $rs = $q->row();
			  $found = true;
			$this->session->set_userdata('tblNameforreset', 'tbl_users');
			$this->session->set_userdata('uid', $rs->id);									  
		    }
		}

		if( $found ){
			$vcode = rand(10000, 99999);
			$this->session->set_userdata('evcode', $vcode);
			$rv =  $rs->email;			
		}
		return $rv;
	}

	public function resetpass($tblname, $password, $id) {

		$data = array('password'=> md5($password));
		$this->db->where('id', $id)
				 ->update($tblname, $data);
		return $id;
	}


	*/

}