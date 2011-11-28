<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Auth :: HOOKS
 */
class TFMSession {

    function loadCategories() {

        $CI = & get_instance();

	$categories = get_session_stuff('categories');
        if (!$categories) {
		$CI->load->model('Category');
		$new_categories = $CI->Category->all(8);
		if (!$new_categories) {
			$new_categories = array();
		}
		set_session_stuff('categories', $new_categories);
	}
    }

}

?>
