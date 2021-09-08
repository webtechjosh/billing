<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function toMySQLDate($date) {

    return date("Y-m-d", strtotime($date));
}

function convertToMySQLDateTime($date) {
    //str_replace('/','-',$date);
    //return date_create(date('Y-m-d', strtotime($date)));
    return date("Y-m-d", strtotime($date));
}
function isValidUserSession($redirect = false){ 
	$CI =& get_instance();
	$userID = $CI->session->userdata('userID');
	if(!$userID){redirect(base_url('bill'),'refresh'); exit;}
}

function isLoggedIn(){ 
	$CI =& get_instance();
	$userID = $CI->session->userdata('userID');
	if ( $userID ) return true;
	return false;
}


function convertToHumanDate($date) {
    if ($date != '01-01-1970' && $date != '0000-00-00' && $date != '' && $date != null) {
        return date("d/m/Y", strtotime($date));
    } else {
        return '';
    }
}

function convertToHumanDate1($date) {
    if ($date != '01-01-1970' && $date != '0000-00-00' && $date != '' && $date != null) {
        return date("m/d/Y", strtotime($date));
    } else {
        return '';
    }
}

function date_only_format($date) {
    $date = strtotime($date);
    return date('d-M-Y', $date);
}


function no_to_words($no) {
    $words = array('0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten', '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty', '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy', '80' => 'eighty', '90' => 'ninty', '100' => 'hundred ', '1000' => 'thousand', '100000' => 'lakh', '10000000' => 'crore');
    if ($no == 0)
        return ' ';
    else {
        $novalue = '';
        $highno = $no;
        $remainno = 0;
        $value = 100;
        $value1 = 1000;
        while ($no >= 100) {
            if (($value <= $no) && ($no < $value1)) {
                $novalue = $words["$value"];
                $highno = (int) ($no / $value);
                $remainno = $no % $value;
                break;
            }
            $value = $value1;
            $value1 = $value * 100;
        }
        if (array_key_exists("$highno", $words))
            return $words["$highno"] . " " . $novalue . " " . no_to_words($remainno);
        else {
            $unit = $highno % 10;
            $ten = (int) ($highno / 10) * 10;
            return $words["$ten"] . " " . $words["$unit"] . " " . $novalue . " " . no_to_words($remainno);
        }
    }
}

function nextbillno($billtype){
    $CI =& get_instance();
    $CI->load->database();
    $userID = $CI->session->userdata('userID');    
    $CI->db->select_max('billno');
    $CI->db->where('pid', $userID);
    $CI->db->where('bill_type', $billtype);
    $q = $CI->db->get('tbl_bill_details');
    if( $q->num_rows() > 0){
        $rs = $q->row();
        $rs = $rs->billno + 1;
    } else {
        $rs = 1;
    }
    return $rs;
}


function sendSms($msg){
$CI =& get_instance();
    $apiKey = urlencode('IlWImwm11Cs-RegI5HJUuQlPPRGlGqKwbNh1eWjlMt');
    // Message details

    $compName = $CI->session->userdata('userCompanyName');
    $name = $msg['name'];
    $mobno = $msg['mobno'];
    $link = $msg['downlink'];
    $msg = 'Dear '.$name.', Thanks for shoping with '.$compName."\nBill link ".$link."\n Cheers,\n Vyaparbill"; 

    $numbers = array($mobno);
    $sender  = urlencode('TXTLCL');
    $message = rawurlencode($msg);
    $numbers = implode(',', $numbers);
     
    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function billCountForFree(){
    $CI =& get_instance();
    $comId = $CI->session->userdata('regId');
    $sqlStatement = "SELECT COUNT(created_at) AS 'noOfRows' FROM `tbl_bill_details` WHERE pid = $comId AND MONTH(CURDATE()) = DATE_FORMAT(created_at, '%m')";
    $result = $CI->db->query($sqlStatement)->result();
    return $result[0]->noOfRows;
}

function isFreeRegistered(){
    $CI =& get_instance();
    $regType = $CI->session->userdata('regType');

    if($regType != 'Free'){
       return true;
    }
 }

 function yearsCountforFree(){
    $CI =& get_instance();
    $comId = $CI->session->userdata('regId');
    
    $sqlStatement = "SELECT * FROM `tbl_company` WHERE user_id = $comId AND YEAR(CURDATE()) = DATE_FORMAT(created_at, '%Y')";
    $result = $CI->db->query($sqlStatement)->result();
    return count($result);
  }



  function insert_logo_on_bill($pid){
    $CI =& get_instance();
    $imgName = $CI->db->select('logoname')->where('user_id', $pid)->get('tbl_company')->row();

    return $imgName->logoname;
  }


  function insert_signature($pid) {

    $CI =& get_instance();

    $imgName = $CI->db->select('signature')->where('user_id', $pid)->get('tbl_company')->row();

    return $imgName->signature;

  }
  
  
  function bill_count(){

    $CI =& get_instance();

    return $CI->db->get('tbl_bill_details')->num_rows();    
  }
  
  
  function business_company($btype='', $approval=''){

    $CI =& get_instance();
    if(!empty($btype) && !empty($approval)){
      $wh = array('package_name' => $btype, 'status' => $approval);
      $CI->db->where($wh);
    }
    if(!empty($btype)){
      $wh = array('package_name' => $btype);
      $CI->db->where($wh);
    }

    if(!empty($approval)){
      $wh = array('status' => $approval);
      $CI->db->where($wh);
    }
    return $CI->db->get('tbl_company')->num_rows();    
  }

  
  function bill_company(){

    $CI =& get_instance();
    $CI->db->where('role', 'user');    
    return $CI->db->get('tbl_company')->num_rows();    
  }
  
  
  function days_count(){
      $date1 = date_create('2020-12-19');
      $date2 = date_create(date('Y-m-d'));
      $diff = date_diff($date1, $date2);
      $diff = $diff->format("%a");
      return $diff+1;
  }
  
  
  function count_visitors(){
         $CI =& get_instance();
         
          $CI->db->where('id', 1);
          $rs = $CI->db->get('tbl_visitors');
         
          if($rs->num_rows()<1){
              $data = array('count'=>1);
                $CI->db->insert('tbl_visitors',$data);
           }
         
         $CI->db->set('count', 'count+1', FALSE);
         $CI->db->where('id', 1);
         $CI->db->update('tbl_visitors');
         
         
         $CI->db->where('id', 1);
         $rs = $CI->db->get('tbl_visitors')->row();
         
         
         return $rs->count;
         
      
  }