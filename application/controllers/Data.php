<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	function __construct(){
	parent::__construct();
		//validasi jika user belum login
    	$this->data['CI'] =& get_instance();
     	$this->load->helper(array('form', 'url'));
     	$this->load->model('M_Admin');
			if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				$url=base_url('login');
				redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['infocus'] =  $this->db->query("SELECT * FROM tbl_infocus ORDER BY id_infocus DESC");
        $this->data['title_web'] = 'Data Infocus';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('infocus/infocus_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function infocusdetail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_infocus','id_infocus',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['infocus'] = $this->M_Admin->get_tableid_edit('tbl_infocus','id_infocus',$this->uri->segment('3'));
		}else{
			echo '<script>alert("INFOCUS TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Detail Data Infocus';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('infocus/detail',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function infocusedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_infocus','id_infocus',$this->uri->segment('3'));
		if($count > 0)
		{
			
			$this->data['infocus'] = $this->M_Admin->get_tableid_edit('tbl_infocus','id_infocus',$this->uri->segment('3'));
			
		}else{
			echo '<script>alert("INFOCUS TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Edit Data Infocus';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('infocus/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function infocustambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['title_web'] = 'Tambah Infocus';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('infocus/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function prosesinfocus()
	{
		if(!empty($this->input->get('kode_infocus')))
		{
			$infocus = $this->M_Admin->get_tableid_edit('tbl_infocus','id_infocus',htmlentities($this->input->get('kode_infocus')));
			
			$this->M_Admin->delete_table('tbl_infocus','id_infocus',$this->input->get('kode_infocus'));
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Hapus Infocus !</p>
			</div></div>');
			redirect(base_url('data'));  
		}

		if(!empty($this->input->post('tambah')))
		{

			$post= $this->input->post();
			$this->load->library('upload',$config);

			// upload gambar 1
			if(!empty($_FILES['gambar']['name']))
			{

				$this->upload->initialize($config);
				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}
				
				$data = array(
					'kode_infocus'  => htmlentities($post['kode_infocus']), 
					'merek'=> htmlentities($post['merek']),  
					'thn_infocus' => htmlentities($post['thn']), 
					'kondisi_infocus' => htmlentities($post['kondisi']),
					'status' => 'Tersedia',
					'rak'=> htmlentities($post['rak']),
				);	

			}elseif(!empty($_FILES['gambar']['name'])){
				
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				$data = array(
					'kode_infocus'  => htmlentities($post['kode_infocus']), 
					'merek'=> htmlentities($post['merek']),  
					'thn_infocus' => htmlentities($post['thn']), 
					'kondisi_infocus' => htmlentities($post['kondisi']),
					'status' => 'Tersedia',   
					'rak'=> htmlentities($post['rak']), 
				);
				
			}else{

				$data = array(
					'kode_infocus'  => htmlentities($post['kode_infocus']), 
					'merek'=> htmlentities($post['merek']),    
					'thn_infocus' => htmlentities($post['thn']), 
					'kondisi_infocus' => htmlentities($post['kondisi']),    
					'status' => 'Tersedia',
					'rak'=> htmlentities($post['rak']),
				);
				
			}

			$this->db->insert('tbl_infocus', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Infocus Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();

        	$this->load->library('upload',$config);
			// upload gambar 1
			if(!empty($_FILES['gambar']['name']))
			{

				$this->upload->initialize($config);
				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				$gambar = './assets_style/image/infocus/'.htmlentities($post['gmbr']);
				if(file_exists($gambar))
				{
					unlink($gambar);
				}

				$data = array(
					'kode_infocus'  => htmlentities($post['kode_infocus']),
					'merek'=> htmlentities($post['merek']),  
					'thn_infocus' => htmlentities($post['thn']), 
					'kondisi_infocus' => htmlentities($post['kondisi']), 
					'status' => 'Tersedia', 
					'rak'=> htmlentities($post['rak']),  
				);

			}elseif(!empty($_FILES['gambar']['name'])){
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				$gambar = './assets_style/image/infocus/'.htmlentities($post['gmbr']);
				if(file_exists($gambar))
				{
					unlink($gambar);
				}

				$data = array(
					'kode_infocus'  => htmlentities($post['kode_infocus']),
					'merek'=> htmlentities($post['merek']),  
					'thn_infocus' => htmlentities($post['thn']),
					'kondisi_infocus' => htmlentities($post['kondisi']),  
					'status' => 'Tersedia',  
					'rak'=> htmlentities($post['rak']), 
				);

			}else{
				$data = array(
					'kode_infocus'  => htmlentities($post['kode_infocus']), 
					'merek'=> htmlentities($post['merek']),    
					'thn_infocus' => htmlentities($post['thn']), 
					'kondisi_infocus' => htmlentities($post['kondisi']),    
					'status' => 'Tersedia',
					'rak'=> htmlentities($post['rak']),
				);
			}

			$this->db->where('id_infocus',htmlentities($post['edit']));
			$this->db->update('tbl_infocus', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Infocus Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}
		
	}

	public function ruangan()
	{
		
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['ruangan'] =  $this->db->query("SELECT * FROM tbl_ruangan ORDER BY kode_ruangan DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_ruangan','kode_ruangan',$id);
			if($count > 0)
			{			
				$this->data['ruang'] = $this->db->query("SELECT *FROM tbl_ruangan WHERE kode_ruangan='$id'")->row();
			}else{
				echo '<script>alert("RUANGAN TIDAK DITEMUKAN");window.location="'.base_url('data/ruangan').'"</script>';
			}
		}

		$this->data['title_web'] = 'Data Ruangan ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('kategori/kat_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function ruangproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'kode_ruangan'=>htmlentities($post['kode']),
				'lokasi_ruangan'=>htmlentities($post['lokasi']),
				'lantai_ruangan'=>htmlentities($post['lantai']),
				'nomor_ruangan'=>htmlentities($post['nomor']),
			);

			$this->db->insert('tbl_ruangan', $data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('data/ruangan'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'kode_ruangan'=>htmlentities($post['kode']),
				'lokasi_ruangan'=>htmlentities($post['lokasi']),
				'lantai_ruangan'=>htmlentities($post['lantai']),
				'nomor_ruangan'=>htmlentities($post['nomor']),
			);
			$this->db->where('kode_ruangan',htmlentities($post['edit']));
			$this->db->update('tbl_ruangan', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('data/Ruangan')); 		
		}

		if(!empty($this->input->get('kode_ruangan')))
		{
			$this->db->where('kode_ruangan',$this->input->get('kode_ruangan'));
			$this->db->delete('tbl_ruangan');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('data/ruangan')); 
		}
	}
}
