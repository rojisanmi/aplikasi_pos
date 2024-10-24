<?php

class Store Extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_store');
	}

	public function index()
	{
		$contents['content']	= 'store/v_store_management';
		$contents['data_toko']	= $this->m_store->getAllDataToko();
		$this->load->view('v_menu_dashboard', $contents);
	}

	public function simpan()
	{
		$config['upload_path']		= 'assets/image/logo_toko';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']			= '3000';
		$this->load->library('upload', $config);
		$this->upload->do_upload('logo_toko');
		$file_name = $this->upload->data();

		$data['nama_toko']			= $this->input->post('nama_toko');
		$data['alamat_toko']		= $this->input->post('alamat_toko');
		$data['telepon_toko']		= $this->input->post('telepon_toko');
		$data['email_toko']			= $this->input->post('email_toko');
		$data['level_toko']			= $this->input->post('level_toko');
		$data['logo_toko']			= $file_name['file_name'];

		$query = $this->m_store->simpan($data);
		if ($query = TRUE) {
			$this->session->set_flashdata('simpan', 'Data Berhasil Disimpan');
			redirect('store');
		}
	}

	public function update()
	{
		$config['upload_path']		= 'assets/image/logo_toko';
		$config['allowed_types']	= 'jpg|jpeg|png';
		$config['max_size']			= '3000';
		$this->load->library('upload', $config);
		$this->upload->do_upload('logo_toko');
		$file_name = $this->upload->data();

		$id_toko					= $this->input->post('id_toko');
		$data['id_toko']			= $this->input->post('id_toko');
		$data['nama_toko']			= $this->input->post('nama_toko');
		$data['alamat_toko']		= $this->input->post('alamat_toko');
		$data['telepon_toko']		= $this->input->post('telepon_toko');
		$data['email_toko']			= $this->input->post('email_toko');
		$data['level_toko']			= $this->input->post('level_toko');
		$data['logo_toko']			= $file_name['file_name'];

		$query = $this->m_store->update($id_toko, $data);
		if ($query = TRUE) {
			$this->session->set_flashdata('update', 'Data Berhasil Diperbaharui');
			redirect('store');
		}
	}

	public function delete()
	{
		$id_toko	= $this->uri->segment(3);
		$query 		= $this->m_store->delete($id_toko);
		if ($query = TRUE) {
			$this->session->set_flashdata('delete', 'Data Berhasil Dihapus');
			redirect('store');
		}
	}
}