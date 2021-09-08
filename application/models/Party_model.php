<?php

class Party_Model extends CI_Model 
{
	public function get_party_by_id($cond){

    	return $this->db->where($cond)
    			 ->get('tbl_party_details')
    			 ->row();	
	}


    public function get_party_details($cond){

    	return $this->db->where($cond)
    			 ->get('tbl_party_details')
    			 ->result();	
    }


    public function save($data, $cond = NULL){

	    if($cond != NULL){
	      $this->db->where($cond)
	               ->update('tbl_party_details', $data);
	        return $cond['id'];

	    } else {

	      $this->db->insert('tbl_party_details', $data);
	      return $this->db->insert_id();

	    }
    }

   public function isEmailExists($email){
	    $this->db->where('email',$email);
	    $q = $this->db->get('tbl_party_details');
	    if($q->num_rows() > 0){
	       return true;
	     }    
    }

   public function isEmailExistsExcept($email, $row){
	    $this->db->where('id !=', $row);
	    $this->db->where('email',$email);
	    $q = $this->db->get('tbl_party_details');
	    if($q->num_rows() > 0){
	       return true;
	     }    
    }

}