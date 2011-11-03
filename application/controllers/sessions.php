<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword...
  public function login() {
    $this->load->view('sessions/new');
  }
}

  public function index()
   {
       /*check whether the user is already logged in or not */
         if($this->login->check_session())
         {
         redirect(‘some_page’);
         }
   /*validating the username and password field */

   $this->load->library(‘validation’);

   $rules['username'] = “required”;
   $rules['password'] = “required”;
   $this->validation->set_rules($rules);

   $fields['username'] = ‘Username’;
   $fields['password'] = ‘Password’;
   $this->validation->set_fields($fields);

   /* check all fields are validated correctly */
      if($this->validation->run() == FALSE)
      {
          $this->load->view(‘login_view’);
      }
      else{
          $userName = $this->input->post(‘username’);
          $password = $this->input->post(‘password’);

          $chkAuth = $this->login->checkAuth($userName,$password);
            if($chkAuth)
            {
                redirect('some_page’); //Enter the page name
            }
            else
            {
               redirect(‘/login/invalid’); //failed auth – return to the login form
            }
          }
      }
}

?>

