<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') !== 'login' ) {
			redirect('/');
		}
		$this->load->model('pengguna_model');
	}

	public function index()
	{
		$contents['data_user']	= $this->pengguna_model->getAllDataPengguna();
		$this->load->view('pengguna', $contents);
	}

	public function add()
	{
		
		$config['upload_path']		= 'assets/image/photo_user';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']			= '3000';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo_user');
		$file_name = $this->upload->data();
		$data = array(
			'username' 		=> $this->input->post('username'),
			'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'nama' 			=> $this->input->post('nama'),
			'photo_user' 	=> $file_name['file_name'],
			'role' 			=> '2'
		);
		$query = $this->pengguna_model->create($data);
		if ($query = TRUE) {
			$this->session->set_flashdata('simpan', 'Data Berhasil Dibuat');
			redirect('pengguna');
		}
	}

	public function delete()
	{
		$id			= $this->uri->segment(3);
		$query 		= $this->pengguna_model->delete($id);
		if ($query = TRUE) {
			$this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
			redirect('pengguna');
		}
	}

	public function edit()
	{
		$config['upload_path']		= 'assets/image/photo_user';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']			= '3000';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo_user');
		$file_name = $this->upload->data();
		$id = $this->input->post('id');
		$data = array(
			'username' 		=> $this->input->post('username'),
			'password' 		=> $this->input->post('password'),
			'nama' 			=> $this->input->post('nama'),
			'photo_user' 	=> $file_name['file_name']
		);
		$query = $this->pengguna_model->update($id, $data);
		if ($query = TRUE) {
			$this->session->set_flashdata('update', 'Data Berhasil Diupdate');
			redirect('pengguna');
		}
	}

	public function get_pengguna()
	{
		$id = $this->input->post('id');
		$pengguna = $this->pengguna_model->getPengguna($id);
		if ($pengguna->row()) {
			echo json_encode($pengguna->row());
		}
	}

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */