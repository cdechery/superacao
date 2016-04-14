<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagseguro_model extends MY_Model {

	public function get_trans_data( $id_pagseguro_trans ) {
		$status = "";

		$sandbox = "";
		if( ENVIRONMENT != "production" ) {
			$sandbox = "sandbox.";
		}

		$data_location = "https://ws.".$sandbox."pagseguro.uol.com.br/v3/transactions/";
		$data_location .= $id_pagseguro_trans;
		$data_location .= "?email=".$this->params['pagseguro_email'];
		$data_location .= "&token=".$this->params['pagseguro_token'];

		$ctx = stream_context_create(array( 
   				 'http' => array( 
        			'timeout' => 5
        	 	) 
			) 
		); 

		$data = @file_get_contents($data_location, 0, $ctx);
		$xml_data = NULL;

		if( !$data ) {
			$status = "ERROR";
		} else {
			$xml_data = simplexml_load_string($data);
			$sender = $xml_data->sender; 
			if( !empty($sender) ) {
				$email = $sender->email;
				$status = "OK";
			} else {
				$status = "ERROR";
			}
		}

		return array("status"=>$status, "data"=>$xml_data);
	}

}
?>
