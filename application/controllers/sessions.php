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

    $this->load->model('User');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->User->authenticate($email, $password);

    if($user && $user['Active']) {
      set_current_user($user);
      set_message('Successfully logged in', 'success');
      header('Location: /'); // redirecting home so that the customer can start purchasing things
    } else {
      set_message('Error logging in. Customer not found with given credentials', 'error');
      header('Location: /customers/login'); // failed auth return to the login form
    }
  }

  // POST - 302 redirect
  function employee_auth_handle() {

    $this->load->model('User');

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->User->authenticate($username, $password);

    if($user && $user['Employee'] && $user['Active']) {
      set_current_user($user);
      set_message('Successfully logged in', 'success');
      header('Location: /employees/dashboard'); // redirecting to admin panel so employee can see updates
    } else {
      set_message('Error logging in. Employee not found with given credentials', 'error');
      header('Location: /employees/login'); // failed auth return to the login form
    }
  }

  // GET - 302 redirect
  function logout() {
    set_current_user(''); // destroy the user's session
    set_message('Successfully logged out', 'success');
    header('Location: /'); // redirect to the homepage
  }
}

