<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagseguro extends MY_Controller { 

	public function __construct() {
		parent::__construct();
		$this->load->model('pagseguro_model');
		$this->load->model('campanha_model');
	}

	public function index() {
		redirect('../');
	}

	public function finalizar() {
		$id_trans = $this->input->get('id_trans_ps');
		if( empty($id_trans) ) {
			redirect('../');
		}

		$ps_data = $this->pagseguro_model->get_trans_data( $id_trans );

		if( $ps_data['status']=="OK" ) {
			$ret = $this->campanha_model->update_compra(
				$ps_data['data']->items->item->id,
				$ps_data['data']->sender->name,
				$ps_data['data']->sender->email,
				$id_trans );

			if( $ret ) {
				echo "Obrigado!!";
				// TODO (view de sucesso)
			}
		} else {
			echo "ERRO no PagSeguro (TODO: view de erro)";
		}
	}
}