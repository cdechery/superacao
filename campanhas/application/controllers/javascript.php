<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Javascript extends CI_Controller {
	
	public function __construct() {
		parent::__construct();	
		header('Content-type: application/javascript; charset='.$this->config->item('charset'));
	}

	public function index() {
		$lang_js = $this->lang->language;
		$params = $this->config->item('site_params');

		$output_js =  "var site_root='".base_url()."';\n";
		$output_js .= "var site_charset='".$this->config->item('charset')."';\n";

		$i = rand(0, 2); $tokens = $params['admin_tokens'];
		$admin_token = $tokens[$i];
		$output_js .= 'var admin_token = \''.$admin_token.'\';';

		$output_js .= "var lang = Array();\n";
		foreach( $lang_js as $idx => $line ) {
			$output_js .= "lang['".$idx."'] = '".addslashes($line)."';\n";
		}


		echo $output_js;
	}
}