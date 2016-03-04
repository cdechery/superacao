<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmp extends MY_Controller { 

	public function __construct() {
		parent::__construct();
		$this->load->model('campanha_model');
	}

	public function index() {
		redirect('../');
	}

	public function visualizar( $cmp_id ) {
		$cmp_data = $this->campanha_model->get( $cmp_id );
		$img_data = $this->get_images( $cmp_id );

		$this->load->view('campanha', array('data'=>$cmp_data) );
	}

	public function listar() {
		if( !$this->is_user_logged_in ) {
			$this->redirect_login('listar');
			return;
		}

		$this->basic_js_css();

		$campanhas = $this->campanha_model->get_all(NULL, NULL);

		$this->load->view('campanhas_listar', array('campanhas'=>$campanhas));
    }

	public function buscar() {
		if( !$this->is_user_logged_in ) {
			$this->redirect_login('listar');
			return;
		}

		$status = $this->input->get('status');
		$texto = $this->input->get('texto');

		$this->basic_js_css();

		$campanhas = $this->campanha_model->get_filtered( $texto, $status );

		$this->load->view('campanhas_listar', array('campanhas'=>$campanhas) );
    }


	public function novo() {
		if( !$this->is_user_logged_in ) {
			$this->redirect_login('novo');
		}
		
		$this->basic_js_css('image_upload');

		$data = array('action' => 'inserir', 'titulo'=>'Nova Campanha');
		$this->load->view('campanha_form', array('data'=>$data) );
	}

	public function modificar( $cmp_id ) {
		if( !$this->is_user_logged_in ) {
			$this->redirect_login('/admin/campanha/modificar/'.$cmp_id);
		}

		$this->basic_js_css('image_upload');

		$cmp_data = $this->campanha_model->get_data( $cmp_id );
		$cmp_data['action'] = 'atualizar';

		$this->load->view('campanha_form', array('data'=>$cmp_data) );
	}

	// public function apagar($item_id) {
	// 	if( $this->item_model->delete( $item_id ) ) {
	// 		$status = "OK";
	// 		$msg = 'O Item foi removido com sucesso';
	// 	} else {
	// 		$status = "ERROR";
	// 		$msg = 'Não foi possível remover o Item';
	// 	}
	// 	echo json_encode(array('status' => $status, 'msg' => $msg) );
	// }

	public function inserir() {
		if( !$this->is_user_logged_in ) {
			$this->redirect_login('novo');
		}

		$status = "";
		$msg = "";
		$new_id = 0;

		$input = $this->input->post(NULL, TRUE);

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('','</br>');

		$this->form_validation->set_rules('titulo', 'Título',
			'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('texto_curto', 'Texto Curto',
			'required|min_length[50]|max_length[200]');
		$this->form_validation->set_rules('texto_longo', 'Texto Longo',
			'required|min_length[50]|max_length[2000]');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		$this->form_validation->set_rules('ini_vigencia', 'Início da Vigência', 'required');
		$this->form_validation->set_rules('fim_vigencia', 'Fim da Vigência', 'required');

		if ($this->form_validation->run() == FALSE) {
			$status = "ERROR";
			$msg = validation_errors();
		} else {
			$new_id = $this->campanha_model->insert( $input );
			if( $new_id ) {
				$status = "OK";
				$msg = 'A Campanha foi incluída com sucesso';
			} else {
				$status = "ERROR";
				$msg = 'Não foi possível incluir a Campanha';
			}
		}

		echo json_encode( array('status'=>$status, 
			'msg'=>$msg, 'cmp_id' => $new_id) );
	}

	public function atualizar() {
		if( !$this->is_user_logged_in ) {
			$this->redirect_login('/admin/campanha/modificar/'.$cmp_id);
		}

		$status = "";
		$msg = "";

		$input = $this->input->post(NULL, TRUE);

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('','</br>');

		$this->form_validation->set_rules('titulo', 'Título',
			'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('texto_curto', 'Texto Curto',
			'required|min_length[50]|max_length[200]');
		$this->form_validation->set_rules('texto_longo', 'Texto Longo',
			'required|min_length[50]|max_length[2000]');
		$this->form_validation->set_rules('valor', 'Valor', 'required');
		$this->form_validation->set_rules('ini_vigencia', 'Início da Vigência', 'required');
		$this->form_validation->set_rules('fim_vigencia', 'Fim da Vigência', 'required');

		if ($this->form_validation->run() == FALSE) {
			$status = "ERROR";
			$msg = validation_errors();
		} else {
			if( $this->campanha_model->update( $input ) ) {
				$status = "OK";
				$msg = 'A Campanha foi atualizada com sucesso';
			} else {
				$status = "ERROR";
				$msg = 'Não foi possível atualizar a Campanha';
			}
		}

		echo json_encode( array('status'=>$status, 'msg'=>$msg ) );
	}

	public function changestatus( $id, $status ) {
		// if( !$this->is_user_logged_in ) {
		// 	$this->redirect_login('/admin/campanha/listar');
		// }

		$result = $msg = "";

		$statusname = ($status === 'A') ? 'ativada' : 'desativada';
		if( $this->campanha_model->update_status($id, $status) ) {
			$result = "OK";
			$statusvalue = $status;
			$msg = 'A Campanha foi '.$statusname.' com sucesso!';
		} else {
			$result = "ERROR";
			$msg = 'Não foi possível ativar/desativar a Campanha';
		}

		echo json_encode( array('result'=>$result, 'msg'=>$msg ) );
	}

	public function comprado( $transaction_id ) {
		$trans_data = $this->campanha_model->get_pagseguro_trans( $transaction_id );

		// TODO faz alguma coisa aqui e pega o Item ID (Campanha ID)
		$this->campanha_model->update_status( $cmp_id, 'C' );
		$titulo = "";

		$this->load->view('obrigado_campanha', array('titulo'=>$titulo) );
	}

	// public function get_images( $item_id ) {
	// 	$this->load->model('image_model');
	// 	return $this->image_model->get_item_images( $item_id );
	// }
}