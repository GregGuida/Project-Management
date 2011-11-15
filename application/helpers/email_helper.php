<?php

function send_mail($to, $subject, $message) {
  $CI = & get_instance();
  $CI->load->library('email');
  $CI->email->set_newline("\r\n");
  $CI->email->from('tfmcommerce@gmail.com');
  $CI->email->to($to);
  $CI->email->subject($subject);
  $CI->email->message($message);
 
  return $CI->email->send();
  //return !!show_error($this->email->print_debugger());
}

?>
