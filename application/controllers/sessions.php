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

    $this->load->model('Users');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->Users->authenticate($email, $password);

    if($user) {
      set_current_user($user);
      header('Location: /'); // redirecting home so that the customer can start purchasing things
    } else {
      header('Location: /customers/login'); // failed auth return to the login form
    }
  }

  // POST - 302 redirect
  function employee_auth_handle() {

    $this->load->model('Users');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->Users->authenticate($username, $password);

    if($user && $user['Employee']) {
      set_current_user($user);
      header('Location: /statics/admin'); // redirecting to admin panel so employee can see updates
    } else {
      header('Location: /employees/login'); // failed auth return to the login form
    }
  }

  // GET - 302 redirect
  function logout() {
    set_current_user(''); // destroy the user's session
    header('Location: /'); // redirect to the homepage
  }
}

