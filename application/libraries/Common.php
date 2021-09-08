<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Common 
{
    public function send_email($subject, $body, $emailt, $headers=array(), $debug=0) 
    {
        $CI =& get_instance();
        
        $CI->load->library('email');

        $CI->email->from('rk.webdev2007@gmail.com', 'BulkByapar');
        $CI->email->to($emailt);

        $CI->email->subject($subject);
        $CI->email->message($body);


        if($CI->email->send()) {
            $this->session->set_flashdata('emailmsg','Bill Send Sucessfully');
        } else {
            $this->session->set_flashdata('emailmsg',show_error($this->email->print_debugger()));
        }
    
    }
}
?>