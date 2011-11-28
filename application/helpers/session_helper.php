<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


// returns the current user
if (!function_exists('set_session_stuff')) {

    function set_session_stuff($name, $data) {

        $CI = & get_instance();
        return $CI->session->set_userdata($name, $data);
    }

}

// returns the current user
if (!function_exists('get_session_stuff')) {

    function get_session_stuff($name) {

        $CI = & get_instance();
        return $CI->session->userdata($name);
    }

}

// returns the current user
if (!function_exists('current_user')) {

    function current_user() {

        $CI = & get_instance();
        return $CI->session->userdata('user');
    }

}

// returns the current user
if (!function_exists('set_current_user')) {

    function set_current_user($user) {

        $CI = & get_instance();
        return $CI->session->set_userdata('user', $user);
    }

}


// returns the current user
if (!function_exists('set_current_user_stuff')) {

    function set_current_user_stuff($name, $stuff) {

        $CI = & get_instance();

        $current_user = current_user();
        $current_user[$name] = $stuff;
        return $CI->session->set_userdata('user', $current_user);
    }

}


// returns a current user's variable
if (!function_exists('get_current_user_stuff')) {

    function get_current_user_stuff($name) {

        $CI = & get_instance();
        $current_user = current_user();
        return isset($current_user[$name]) ? $current_user[$name] : '';
    }

}


// Returns true if a user is logged in
if (!function_exists('is_logged')) {

    function is_logged() {

        $CI = & get_instance();
        $current_user = current_user();

        return isset($current_user['uid']) && $current_user['uid'] > 0;
    }

}


// Returns true if a user is an employee
if (!function_exists('is_employee')) {

    function is_employee() {

        $CI = & get_instance();
        $current_user = current_user();

        return is_logged() && $current_user['Employee'] == 1;
    }

}


// accepts a message string
// and a status in the set (success, error, info) to the session,
// where it can then be displayed as a responsive message
if (!function_exists('set_message')) {

    function set_message($message, $status = 'info') {

        $CI = & get_instance();
        $CI->session->set_flashdata('response', array('status' => $status, 'message' => $message));
    }

}

// where it can then be displayed as a responsive message
if (!function_exists('get_message')) {

    function get_message() {

        $CI = & get_instance();
        return $CI->session->flashdata('response');
    }

}

?>
