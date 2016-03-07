<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagseguro extends MY_Controller { 

	public function __construct() {
		parent::__construct();
		$this->load->model('campanha_model');
	}

	public function index() {
		redirect('../');
	}

	public function finalizar() {
		$id_trans = $this->input->get('id_trans_ps');

		$ps_data = $this->campanha_model->get_pagseguro_trans( $id_trans );
		// var_dump( $ps_data['data'] ); die;

		echo "Nome: ".$ps_data['data']->sender->name;
		echo "Email: ".$ps_data['data']->sender->email;
		echo "Item ID: ".$ps_data['data']->items->item->id;
	}
}