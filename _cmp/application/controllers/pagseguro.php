<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagseguro extends MY_Controller { 

	public function __construct() {
		parent::__construct();
		$this->load->model('pagseguro_model');
		$this->load->model('campanha_model');

		$this->load->library('email');
		$this->load->helper('email');
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

				$params = array(
					'to_email'=> $ps_data['data']->sender->email,
					'from_email'=>'noreply@institutosuperacao.org',
					'from_name'=> 'Instituto SuperaAÇÃO',
					'subject'=> 'Muito obrigado!',
					'body' => ''
				);

				send_email( $params );

			if( $ret ) {
				$this->load->view('pagseguro-ok');
			}
		} else {
				$this->load->view('pagseguro-fail');
		}
	}
}