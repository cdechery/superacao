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

		$this->db->select('c.id, c.titulo, c.texto_curto, c.texto_longo, 
			date_format(c.ini_vigencia, \'%d/%m/%Y\') as ini_vigencia, 
			date_format(c.fim_vigencia, \'%d/%m/%Y\') as fim_vigencia,
			c.status, c.foto, truncate(c.valor, 2) as valor', FALSE);
		$this->db->from('cmp_campanha c');		
		
		return $this->db->get_where($this->table,
			array('c.id'=>$id))->row_array();
	}

	public function get_all() {
		return $this->get_filtered(NULL, NULL);
	}

	public function get_filtered( $txt, $status ) {
		$this->db->select('id, titulo, texto_curto, 
			date_format(ini_vigencia, \'%d/%m/%Y\') as ini_vigencia, 
			date_format(fim_vigencia, \'%d/%m/%Y\') as fim_vigencia,
			status, truncate(valor, 2) as valor', FALSE);
		$this->db->from('cmp_campanha c');

		if( !empty($status) ) {
			$this->db->where('status',$status);
		}

		if( !empty($txt) ) {
			$this->db->like('titulo', $txt);
			$this->db->or_like('texto_curto', $txt);
			$this->db->or_like('texto_longo', $txt);
		}

		$this->db->order_by('dt_inclusao', 'desc');
		return $this->db->get();
	}


	public function insert( $cmp_data ) {

		$insert_data = array(
			'titulo' => $cmp_data['titulo'],
			'texto_curto' => $cmp_data['texto_curto'],
			'texto_longo' => $cmp_data['texto_longo'],
			'valor' => $cmp_data['valor'],
			'status' => 'I'
		);

		$dt_parts = explode('/', $cmp_data['ini_vigencia'] );
		$data = $dt_parts[2]."-".$dt_parts[1]."-".$dt_parts[0];
		$insert_data['ini_vigencia'] = $data;

		$dt_parts = explode('/', $cmp_data['fim_vigencia'] );
		$data = $dt_parts[2]."-".$dt_parts[1]."-".$dt_parts[0];
		$insert_data['fim_vigencia'] = $data;

		$this->db->set('dt_inclusao', 'NOW()', false);

		if( $this->db->insert($this->table, $insert_data ) ) {
			return $this->db->insert_id();
		} else {
			return 0;
		}
	}

	public function update( $cmp_data ) {

		if( empty($cmp_data['id']) ) {
			return false;
		}

		$upd_data = array(
			'titulo' => $cmp_data['titulo'],
			'texto_curto' => $cmp_data['texto_curto'],
			'texto_longo' => $cmp_data['texto_longo'],
			'valor' => $cmp_data['valor']
		);

		$dt_parts = explode('/', $cmp_data['ini_vigencia'] );
		$data = $dt_parts[2]."-".$dt_parts[1]."-".$dt_parts[0];
		$upd_data['ini_vigencia'] = $data;

		$dt_parts = explode('/', $cmp_data['fim_vigencia'] );
		$data = $dt_parts[2]."-".$dt_parts[1]."-".$dt_parts[0];
		$upd_data['fim_vigencia'] = $data;

		return( $this->db->update($this->table, 
			$upd_data, array('id' => $cmp_data['id']) ) );
	}

	public function update_status( $cmp_id, $status ) {
		if( empty($cmp_id) ) {
			return FALSE;
		}

		$upd_data = array('status' => $status );
		$where = array('id'=>$cmp_id );

		return( $this->db->update($this->table, $upd_data, $where) );
	}

	public function update_pagseguro( $cmp_id, $nome, $email ) {
		if( empty($cmp_id) ) {
			return FALSE;
		}

		$upd_data = array(
			'nome' => $nome,
			'email' => $email
			'status' => 'C',
			'dt_comprado' => 'NOW()'
		);

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
		$data_location .= "?email=".$this->params['pagseguro_email'];
		$data_location .= "&token=".$this->params['pagseguro_token'];

		$ctx = stream_context_create(array( 
   				 'http' => array( 
        			'timeout' => 5
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
			// var_dump($xml_data); die;
		}

		return array("status"=>$status, "data"=>$xml_data);
	}
}
?>
