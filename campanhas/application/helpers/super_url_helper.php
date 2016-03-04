<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	SuperaAÇÃO Admin Helper - Custom Helper
*/
	function cmp_base_url( $url ) {
		$CI =& get_instance();
		$params = $CI->config->item('site_params');
		$tokens = $params['admin_tokens'];
		$idx = rand(0, 2);
		$token = $tokens[ $idx ];

		return base_url( 'cmp/'.$url.'?admin_token=' . $token);
	}

	function super_admin_url( $url ) {
		$CI =& get_instance();
		$params = $CI->config->item('site_params');
		$tokens = $params['admin_tokens'];
		$idx = rand(0, 2);
		$token = $tokens[ $idx ];

		$param_sep = "?";
		if( strstr($url, "?")!=FALSE ) {
			$param_sep = "&";
		}

		$url = 'index.php?campanhas='.urlencode($url.$param_sep.'admin_token=' . $token);
		return $url;
	}
?>