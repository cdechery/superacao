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
			c.nome_comprador, c.email_comprador, 
			date_format(c.data_compra, \'%d/%m/%Y\') as data_compra,
			date_format(c.ini_vigencia, \'%d/%m/%Y\') as ini_vigencia, 
			date_format(c.fim_vigencia, \'%d/%m/%Y\') as fim_vigencia,
			c.status, c.foto, truncate(c.valor, 2) as valor', FALSE);
		$this->db->from('cmp_campanha c');		
		
		return $this->db->get_where($this->table,
			array('c.id'=>$id))->row_array();
	}

	public function get_active() {
		$this->db->select('c.id, c.titulo, c.texto_curto,
			c.foto, truncate(c.valor, 2) as valor', FALSE);
		$this->db->from('cmp_campanha c');		

		$this->db->where('c.status', 'A');
		$this->db->where('c.ini_vigencia <=', 'CURDATE()', FALSE);
		$this->db->where('c.fim_vigencia >=', 'CURDATE()', FALSE);

		return $this->db->get();
	}

	public function get_all() {
		return $this->get_filtered(NULL, NULL);
	}

	public function get_filtered( $txt, $status ) {
		$this->db->select('id, titulo, texto_curto, 
			nome_comprador, email_comprador, 
			date_format(data_compra, \'%d/%m/%Y\') as data_compra,
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

	public function update_compra( $cmp_id, $nome, $email, $id_trans ) {
		if( empty($cmp_id) ) {
			return FALSE;
		}

		$upd_data = array(
			'nome_comprador' => (string)$nome,
			'email_comprador' => (string)$email,
			'status' => 'C',
			'id_trans_pagseguro' => (string)$id_trans
		);

		$this->db->set('data_compra', 'NOW()', false);

		$where = array('id'=>$cmp_id );

		return( $this->db->update($this->table, $upd_data, $where) );
	}

	public function update_foto( $cmp_id, $upload ) {

		if( empty($upload) || $cmp_id==0 ) {
			return false;
		}

		$upd_data = array(
			'foto' => $upload['file_name']
		);

		$this->load->helper('image_helper');
		$thumbs = $this->params['image_settings']['thumbs'];
		foreach( $thumbs as $type => $size ) {
			@create_thumb( $upload['full_path'], $type, $size );
		}

		return( $this->db->update($this->table, 
			$upd_data, array('id' => $cmp_id) ) );
	}
}
?>
