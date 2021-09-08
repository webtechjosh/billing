<?php

class Bill_Model extends CI_Model 
{

  public function save($tblname, $data, $update = NULL ){


    if($update != NULL){
      $this->db->where($update)
               ->update($tblname, $data);
        return $update['id'];

    } else {

      $this->db->insert($tblname, $data);
      return $this->db->insert_id();

    }
  }


    public function get_invoice( $cond = NULL ){

    	if( $cond != NULL ){

			$this->db->where($cond);
			$this->db->order_by('billno', 'desc');
			return $this->db->get('tbl_bill_details')->result();

    	} else {

    		return false;
    	}

    	
    }	

    public function get_invoice_by_id($billID){

      $this->db->where($billID);      
      return $this->db->get('tbl_bill_details')->row();

    } 

    public function get_customer_gst_mobile($cond = NULL){

        if($cond != NULL){
         return  $this->db->select('gst, mobileno')  
                 ->where($cond)
                 ->get('tbl_party_details')
                 ->result();    

        } else {

         return  $this->db->select('gst, mobileno')  
                 ->get('tbl_party_details')
                 ->result();    
        }
       } 

    public function searchgst($like){

        $data = $this->db->like('gst', $like)
                        ->get('tbl_party_details')->result_array();

       return $data; 
    }


    public function get_party_name($name,$compID){

      $suggest = '';
      
      $this->db->like('LOWER(company_name)', strtolower($name));
      $this->db->where('pid', $compID);
      $result = $this->db->get('tbl_party_details');

      if($result->num_rows()>0){
         $resultSet = $result->result();
          foreach($resultSet as $key => $value) {
            $suggest .= '<li id="name'.$value->id.'" onClick="selectParty(\''. $value->id. '\');">'.$value->company_name.'</li>';
          } 
         return  '<ul id="partyname">'.$suggest. '</ul>';

      } else {
        return 'nof';
      }
    }



    public function get_party_details_by_id($id){

      $this->db->where('id', $id);
      $result = $this->db->get('tbl_party_details');

      if($result->num_rows()>0){
         $resultSet = $result->result();
         return  $resultSet;

      } else {
        return false;
      }
    }


   public function isEmailExists($tbl, $email){
      $this->db->where('email',$email);
      $q = $this->db->get($tbl);
      if($q->num_rows() > 0){
         return true;
       }    
    }
    
    public function get_email_name_by_id($id){
        $this->db->select('party_name, email, mobileno');
        $this->db->where('id', $id);
        return $this->db->get('tbl_bill_details')->row();
        
    }
    
/*    public function get_invoice_excel($cond){
      $this->db->where($cond);
      return $this->db->get('tbl_bill_details')->result_array();
    }    */
    
    public function get_invoice_excel($cond){
      $this->db->where($cond);

      $tblData = $this->db->get('tbl_bill_details')->result_array();

      $prepareData = array();
      $prepareData[] = array('Party Name', 'GST No.', 'Mobile No.', 'Address', 'Invoice No.', 'State', 'GST Amount', 'Total Amount', 'Narration');
      foreach ($tblData as $key => $value) {
          $discValue= json_decode($value['particulars']); 
          $gstAmount = 0;
          $totAmount = 0;          
          foreach($discValue as $key1 => $value1){
           $totAmount += $value1->mrpgst * $value1->qty;
             if($value1->gst >0){
               $gstAmount +=  ($totAmount * $value1->gst) / 100; 
             }
            }
          $prepareData[] = array('party_name' => $value['party_name'], 'gstno' => $value['gstno'], 'mobileno' => $value['mobileno'], 'address' => $value['address'], 'billno' => $value['prefix'] . ' - '.$value['billno'], 'state' => $value['state'], 'gstamount' => $gstAmount, 'total_amount' => $totAmount, 'narration' => $value['narration']);  
        }
      return $prepareData;  
    } 


    public function get_bank_details($id){
     $result =  $this->db->where('user_id', $id)
                 ->get('tbl_company');
                 
     if($result->num_rows() > 0 ){
         
         return $result->row();
     }

  }
}
