<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Auth :: HOOKS
 */
class Auth {

    private $UNAUTHED_PATH_REDIRECT = '/';

    function authenticate() {

        $CI = & get_instance();
        $action = $CI->router->fetch_method();
        $auth = isset($CI->auth) ? $CI->auth : array();
        $admin = isset($CI->admin) ? $CI->admin: array();

        if ($action) {
            if ((in_array($action, $auth) && !is_logged()) || 
                (in_array($action, $admin) && !is_employee())) {

                header('Location:' . $this->UNAUTHED_PATH_REDIRECT);
            }
        }
    }

}

?>
