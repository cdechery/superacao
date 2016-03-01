<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	SuperaAÇÃO Admin Helper - Custom Helper
*/
	function super_admin_url( $url ) {
		$CI =& get_instance();
		$params = $CI->config->item('site_params');
		$tokens = $params['admin_tokens'];
		$idx = rand(0, 2);
		$token = $tokens[ $idx ];


		return base_url( '../admin/index.php?campanhas='.$url.'?admin_token=' . $token);
	}
?>