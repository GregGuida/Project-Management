<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HtmlBuilder {

    function makeHeadJS($j = array()) {

        $result = '';

        if (!is_array($j)) {
            $result .= self::buildJS($j);
        } else {
            foreach ($j as $jF) {
                $result .= self::buildJS($jF);
            }
        }
        return $result;
    }

    function buildJS($j) {

        if (file_exists('js/' . $j)) {
            return '<script src="/js/' . $j . '"></script>';
        } else {
            return '<script src="' . $j . '"></script>';
        }
    }

    function makeHeadCSS($c = array()) {

        $result = '';

        if (!is_array($c)) {
            $result .= self::buildCSS($c);
        } else {
            foreach ($c as $cF) {
                $result .= self::buildCSS($cF);
            }
        }
        return $result;
    }

    function buildCSS($c) {

        return '<link href="/css/' . $c . '" rel="stylesheet" type="text/css" />';
    }
}

?>
