<?php
/**
 * Groups configuration for default Minify implementation
 * @package Minify
 */

/** 
 * You may wish to use the Minify URI Builder app to suggest
 * changes. http://yourdomain/min/builder/
 *
 * See http://code.google.com/p/minify/wiki/CustomSource for other ideas
 **/

return array(
	'image_upload_js' => array('//js/ajaxfileupload.js', '//js/messi.min.js', '//js/site.js'),
	'image_upload_css' => array('//css/messi.min.css'),
	'image_view_js' => array('//js/site.js'),
	'image_view_css' => array('//css/messi.min.css'),
	'basic_js' => array('//js/messi.min.js', '//js/site.js'),
	'basic_css' => array('//css/messi.min.css')
);