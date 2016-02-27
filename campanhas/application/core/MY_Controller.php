<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $login_data = array('logged_in'=>FALSE);
	protected $params = array();
	protected $is_user_logged_in = FALSE;

	public function __construct() {

		parent::__construct();
		$this->load->helper('cookie');

		$request_headers = $this->input->request_headers();
		if( array_key_exists('Origin', $request_headers) ) {
			$origin = $request_headers['Origin'];
			$allowed_urls = $this->allowed_urls();
			if( in_array($origin, $allowed_urls) ) {
				header('Access-Control-Allow-Origin: '.$origin );
			}
		}
		
		// params settings available to all Controllers
		$this->params = $this->config->item('site_params');
		
		// integracao com sessao do site principal (admin)
		$this->is_user_logged_in = isset($_SESSION["Usuario_Logado"]);

		// load 'login_status' to the views
		$this->load->vars( array('params'=>$this->params) );
		
		header('Content-type: text/html; charset='.$this->config->item('charset'));
	}

	protected function redirect_login() {
		echo "TEI!";
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

