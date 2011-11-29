<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 */
class TFMSession {

    function loadCategories() {

        $CI = & get_instance();

	//echo print_r($CI->session->all_userdata());

	$session = $CI->session->all_userdata();
//	$CI->session->set_userdata('categories', '');
	$categories = $session['categories'];
	//$categories = false;
       /* if (!$categories) {
		$CI->load->model('Category');
		$new_categories = $CI->Category->all(8);
		if (!$new_categories) {
			$new_categories = array();
		}
		for($i =0; $i < count($new_categories); $i++) {
			foreach($new_categories[$i] as $key => $field) {
				if ($key == 'Description') {
					$new_categories[$i][$key] = substr($field, 0, 50);
				} else if ($key == 'Name') {
					$new_categories[$i][$key] = substr($field, 0, 50);
				}
			}
		}

		$session['categories'] = $new_categories;
		$CI->session->set_userdata($session);//set_session_stuff('categories', $new_categories);
	//}*/
	//echo print_r($CI->session->all_userdata());
    }

}

?>
