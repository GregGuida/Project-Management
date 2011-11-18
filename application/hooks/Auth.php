<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Auth :: HOOKS
 */
class Auth {

    private $UNAUTHED_PATH_REDIRECT = '/';
    private $ADMIN_PATH_REDIRECT = '/employees/login';

    function authenticate() {

        $CI = & get_instance();
        $action = $CI->router->fetch_method();
        $auth = isset($CI->auth) ? $CI->auth : array();
        $admin = isset($CI->admin) ? $CI->admin: array();

        // only if there is actually an action
        // when wouldn't there be an action? hah
        if ($action) {
            // check for authed authorization first
            if (isset($auth[$action]) && !is_logged()) {

                if (array_key_exists('message', $auth[$admin])) {
                  set_message($auth[$action]['message'], 'error');
                }

                if (array_key_exists('redirect', $auth[$action])) {
                  header('Location:' . $auth[$action]['redirect']);
                } else {
                  header('Location:' . $this->UNAUTHED_PATH_REDIRECT);
                }
            } 
            // check for admin authorization next
            else if(array_key_exists($action, $admin) && !is_employee()) {

                if (array_key_exists('message', $admin[$action])) {
                  set_message($admin[$action]['message'], 'error');
                }

                if (array_key_exists('redirect', $admin[$action])) {
                  header('Location:' . $admin[$action]['redirect']);
                } else {
                  header('Location:' . $this->ADMIN_PATH_REDIRECT);
                }
            }
        }
    }

}

?>
