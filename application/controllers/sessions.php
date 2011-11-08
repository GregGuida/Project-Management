<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
  public $layout = 'main';
  public $auth = array();

  public function __construct() {
    parent::__construct();
    // Your own constructor code
  }

  // POST - 302 redirect
  function customer_auth_handle() {

    $this->load->model('users');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $chkAuth = $this->login->checkAuth($email, $password);
    if($chkAuth) {
      redirect('/'); // redirecting home so that the customer can start purchasing things
    } else {
      redirect('/customers/login'); // failed auth return to the login form
    }
  }

  // POST - 302 redirect
  function employee_auth_handle() {

    $this->load->model('users');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->users->authenticate($username, $password);

    if($user) {
      // TODO: add user to the session
      redirect('/statics/admin'); // redirecting to admin panel so employee can see updates
    } else {
      redirect('/employees/login'); // failed auth return to the login form
    }
  }

  // GET - 302 redirect
  function logout() {
    set_current_user(''); // destroy the user's session
    redirect('/'); // redirect to the homepage
  }
}

