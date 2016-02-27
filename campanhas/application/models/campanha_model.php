<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campanha_model extends MY_Model {

	public function __construct() 	{
		parent::__construct();
		$this->table = "cmp_campanha";
	}
	
	public function get_data( $id ) {
		if(empty($id) || $id==0) {
			return false;
		}
		
		return $this->db->get_where($this->table,
			array('id'=>$id))->row_array();
	}

	public function get_filtered( $txt, $status ) {
		if( !empty($txt) ) {
			$this->db->like('titulo', $txt);
			$this->db->or_like('texto_curto', $txt);
			$this->db->or_like('texto_longo', $txt);
		}

		if( !empty($status) ) {
			$this->db->where('status', $status);
		}

		return $this->db->get($this->table);
	}


	public function insert($cmp_data) {

		$insert_data = array(
			'titulo' => $cmp_data['titulo'],
			'texto_curto' => $cmp_data['texto_curto'],
			'texto_longo' => $cmp_data['texto_longo'],
			'valor' => $cmp_data['valor'],
			'status' => 'I',
			'ini_vigencia' => $cmp_data['ini_vigencia'],
			'fim_vigencia' => $cmp_data['fim_vigencia'],
		);


		$this->db->set('dt_inclusao', 'NOW()', false);

		if( $this->db->insert($this->table, $insert_data ) ) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}

	public function update($cmp_data, $id) {

		if( empty($id) || $id==0 ) {
			return false;
		}

		$upd_data = array(
			'titulo' => $cmp_data['titulo'],
			'texto_curto' => $cmp_data['texto_curto'],
			'texto_longo' => $cmp_data['texto_longo'],
			'valor' => $cmp_data['valor'],
			'status' => $cmp_data['status'],
			'ini_vigencia' => $cmp_data['ini_vigencia'],
			'fim_vigencia' => $cmp_data['fim_vigencia'],
		);

		return( $this->db->update($this->table, 
			$upd_data, array('id' => $id) ) );
	}

	public function update_status( $cmp_id, $status ) {
		if( empty($cmp_id) ) {
			return FALSE;
		}

		$upd_data = array('status' => $status );
		$where = array('id'=>$cmp_id );

		return( $this->db->update($this->table, $upd_data, $where) );
	}

	public function update_foto($img_data, $cmp_id, $thumb_sizes = array() ) {
		if( empty($img_data) || $cmp_id==0 ) {
			return false;
		}

		$upd_data = array(
			'foto' => $img_data['file_name']
		);

		$this->load->helper('image_helper');
		if( count($thumb_sizes) ) {
			foreach( $thumb_sizes as $size ) {
				create_square_cropped_thumb( $img_data['full_path'], $size );
			}
		}

		return( $this->db->update($this->table, $upd_data, array('id' => $user_id)) );
	}

	public function get_pagseguro_trans( $id_pagseguro_trans ) {
		$status = "";

		$sandbox = "";
		if( ENVIRONMENT != "production" ) {
			$sandbox = "sandbox.";
		}

		$data_location = "https://ws.".$sandbox."pagseguro.uol.com.br/v3/transactions/";
		$data_location .= $id_pagseguro_trans;
		$data_location .= "?email=".$params['pagseguro_email'];
		$data_location .= "&token=".$params['pagseguro_token'];

		$ctx = stream_context_create(array( 
   				 'http' => array( 
        			'timeout' => 1 
        	 	) 
			) 
		); 

		$data = @file_get_contents($data_location, 0, $ctx);
		$json_data = NULL;
		if( !$data ) {
			$status = "TIMEOUT";
		} else {
			$status = "OK";
			$xml_data = simplexml_load_string($data);
			$json_data = json_encode($xml_data);
		}

		return array("status"=>$status, "data"=>$json_data);
	}
}
?>
