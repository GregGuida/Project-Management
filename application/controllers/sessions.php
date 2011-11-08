<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword...
  public function login() {
    $this->load->view('sessions/new');
  }

  public function customer_auth_handle() {
    // TODO: log in the user with passed in email address and password
    redirect('/'); // redirecting home so that the customer can start purchasing things
  }

  public function employee_auth_handle() {
    // TODO: log in the user with passed in email address and password
    redirect('/statics/admin'); // redirecting to admin panel so employee can see updates
  }

  public function index() {
    /*check whether the user is already logged in or not */
    if($this->login->check_session()) {
       redirect('some_page');
    }

    /*validating the username and password field */

    $this->load->library('validation');

    $rules['username'] = "required";
    $rules['password'] = "required";
    $this->validation->set_rules($rules);

    $fields['username'] = 'Username';
    $fields['password'] = 'Password';
    $this->validation->set_fields($fields);

    /* check all fields are validated correctly */
    if($this->validation->run() == FALSE) {
      $this->load->view('login_view');
    } else {
      $userName = $this->input->post('username');
      $password = $this->input->post('password');

      $chkAuth = $this->login->checkAuth($userName,$password);
      if($chkAuth) {
        redirect('/'); 
      } else {
        redirect('/login/invalid'); //failed auth – return to the login form
      }
    }
  }
}

