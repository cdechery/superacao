<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $params = array();
	protected $is_user_logged_in = FALSE;

	public function __construct() {

		parent::__construct();

		$request_headers = $this->input->request_headers();
		if( array_key_exists('Origin', $request_headers) ) {
			$origin = $request_headers['Origin'];
			$allowed_urls = $this->allowed_urls();
			if( in_array($origin, $allowed_urls) ) {
				header('Access-Control-Allow-Origin: '.$origin );
			}
		}

		if( !$this->check_referer() ) {
			echo "Access denied!"; die;
		}
		
		// params settings available to all Controllers
		$this->params = $this->config->item('site_params');
		
		// integracao com sessao do site principal (admin)

		$admin_token = $this->input->get('admin_token');
		$this->is_user_logged_in = in_array($admin_token, $this->params['admin_tokens']);

		// load 'login_status' to the views
		$this->load->vars( array('params'=>$this->params) );
		
		header('Content-type: text/html; charset='.$this->config->item('charset'));
	}

	private function check_referer() {
		return $_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR'];
	}

	protected function redirect_login( $redir_to ) {
		redirect('../admin/login.php?campanhas='.$redir_to);
	}
	
	private function allowed_urls() {
		$alurls = array( rtrim( base_url(), '/') );
		$custom_urls = $this->config->item('allowed_urls');
		if( !empty($custom_urls) ) {
			$alurls = array_merge( $alurls, $this->config->item('allowed_urls') );
		}
		return $alurls;
	}
}