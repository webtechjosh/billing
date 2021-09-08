<?php

class User_Model extends CI_Model 
{
	public function get_user_by_id($cond){

    	return $this->db->where($cond)
    			 ->get('tbl_users')
    			 ->row();	
	}

    public function get_user($cond){

    	return $this->db->where($cond)
    			 ->get('tbl_users')
    			 ->result();	
    }

    public function save($data, $cond = NULL){

	    if($cond != NULL){
	      $this->db->where($cond)
	               ->update('tbl_users', $data);
	        return $cond['id'];

	    } else {

	      $this->db->insert('tbl_users', $data);
	      return $this->db->insert_id();

	    }
    }

   public function isEmailExists($email){
	    $this->db->where('email',$email);
	    $q = $this->db->get('tbl_users');
	    if($q->num_rows() > 0){
	       return true;
	     }    
    }

   public function isEmailExistsExcept($email, $row){
	    $this->db->where('id !=', $row);
	    $this->db->where('email',$email);
	    $q = $this->db->get('tbl_users');
	    if($q->num_rows() > 0){
	       return true;
	     }    
    }

}