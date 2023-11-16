<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
	parent::__construct();
	 	//validasi jika user belum login
		$this->data['CI'] =& get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		$this->load->library(array('cart'));
			if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				$url=base_url('login');
				redirect($url);
		}
	}
	 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		$this->data['title_web'] = 'Data Peminjaman Infocus ';
		$this->data['idbo'] = $this->session->userdata('ses_id');
		
		if($this->session->userdata('level') == 'Mahasiswa'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `nama`, `nama_dosen`,  `kode_ruangan`,
				`mata_kuliah`, `kode_infocus`, `status`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
				FROM tbl_pinjam WHERE status = 'Dipinjam' 
				AND nama = ? ORDER BY pinjam_id DESC", 
				array($this->session->userdata('nama')));
		}else{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `nama`,  `nama_dosen`,  `kode_ruangan`,
				`mata_kuliah`, `kode_infocus`, `status`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
				FROM tbl_pinjam WHERE status = 'Dipinjam' ORDER BY pinjam_id DESC");
		}
		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/pinjam_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function kembali()
	{	
		$this->data['title_web'] = 'Data Pengembalian Infocus ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if($this->session->userdata('level') == 'Mahasiswa'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `nama`, `nama_dosen`, `kode_ruangan`,
				`mata_kuliah`, `kode_infocus`, `status`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
				FROM tbl_pinjam WHERE nama = ? AND status = 'Dikembalikan' 
				ORDER BY id_pinjam DESC",array($this->session->userdata('nama')));
		}else{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `nama`, `nama_dosen`, `kode_ruangan`,
				`mata_kuliah`, `kode_infocus`, `status`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
				FROM tbl_pinjam WHERE status = 'Dikembalikan' ORDER BY id_pinjam DESC");
		}
		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('kembali/home',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function pinjam()
	{	

		$this->data['nop'] = $this->M_Admin->buat_kode('tbl_pinjam','PJ','id_pinjam','ORDER BY id_pinjam DESC LIMIT 1'); 
		$this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Admin->get_table('tbl_login');
		$this->data['infocus'] =  $this->db->query("SELECT * FROM tbl_infocus ORDER BY kode_infocus DESC");
		$this->data['ruang'] =  $this->db->query("SELECT * FROM tbl_ruangan");

		$kode_infocus = $_GET['kode_infocus'];
		$this->data['infocus'] = $this->db->query("SELECT * FROM tbl_infocus WHERE kode_infocus = '$kode_infocus'");

		$this->data['title_web'] = 'Pinjam Infocus';
		$this->data['nama'] = 	$this->session->userdata('nama');
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/tambah_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function detailpinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');		
		$kode_infocus = $this->uri->segment('3');
		if($this->session->userdata('level') == 'Mahasiswa'){
			$count = $this->db->get_where('tbl_pinjam',[
				'pinjam_id' => $kode_infocus, 
			])->num_rows();
			if($count > 0)
			{
				$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`nama`, `nama_dosen`, `mata_kuliah`, `status`, `kode_infocus`,
				`kode_ruangan`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
				FROM tbl_pinjam WHERE pinjam_id = ? 
				AND nama =?", 
				array($kode_infocus,$this->session->userdata('nama')))->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}
		}else{
			$count = $this->M_Admin->CountTableId('tbl_pinjam','pinjam_id',$kode_infocus);
			if($count > 0)
			{
				$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`nama`, `nama_dosen`, `mata_kuliah`, `status`, `kode_infocus`,
				`kode_ruangan`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
				FROM tbl_pinjam WHERE pinjam_id = '$kode_infocus'")->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}
		}

		$this->data['sidebar'] = 'kembali';
		$this->data['title_web'] = 'Detail Pinjam Infocus ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/detail',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function kembalipinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');		
		$kode_infocus = $this->uri->segment('3');
		$count = $this->M_Admin->CountTableId('tbl_pinjam','pinjam_id',$kode_infocus);
		if($count > 0)
		{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
			`nama`, `nama_dosen`, `mata_kuliah`, `status`, `kode_infocus`,
			`kode_ruangan`, `tgl_pinjam`, `jam_pinjam`, `lama_pinjam`, `tgl_kembali` 
			FROM tbl_pinjam WHERE pinjam_id = '$kode_infocus'")->row();
		}else{
			echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
		}

		$this->data['title_web'] = 'Kembali Pinjam Infocus ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/kembali',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function prosespinjam()
	{

		if($_POST['nopinjam'] !== null){
		$data[] = array(
			'pinjam_id'=>htmlentities($_POST['nopinjam']), 
			'nama'=>htmlentities($_POST['nama']), 
			'nama_dosen'=>htmlentities($_POST['dosen']),
			'mata_kuliah'=>htmlentities($_POST['matkul']),
			'kode_ruangan'=>htmlentities($_POST['ruangan']), 
			'kode_infocus'=>htmlentities($_POST['kode_infocus']),
			'status' => 'Dipinjam', 
			'tgl_pinjam' => htmlentities($_POST['tgl']),
			'jam_pinjam' => htmlentities($_POST['jam']),
			'lama_pinjam' => htmlentities($_POST['lama']), 
			'tgl_kembali'  => '0',
		);
		
		$total_array = count($data);
		if($total_array != 0)
		{
			$this->db->insert_batch('tbl_pinjam',$data);

			$cart = array_values(unserialize($this->session->userdata('cart')));
			for ($i = 0; $i < count($cart); $i++){
			  unset($cart[$i]);
			}
			
			$this->db->set('status', 'Dipinjam');
			$this->db->where('kode_infocus', $_POST['kode_infocus']);
			$this->db->update('tbl_infocus');
	
		}

		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
		<p> Pinjam Infocus Sukses !</p>
		</div></div>');
		redirect(base_url('transaksi')); 
	}

		if($this->input->get('pinjam_id'))
		{
			$this->M_Admin->delete_table('tbl_pinjam','pinjam_id',$this->input->get('pinjam_id'));
			// $this->M_Admin->delete_table('pinjam_id',$this->input->get('pinjam_id'));

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Transaksi Pinjam Infocus Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}

		if($this->input->get('kembali'))
		{
			$kode_infocus = $this->input->get('kembali');
			$infocus = $this->input->get('infocus');
			$pinjam = $this->db->query("SELECT  * FROM tbl_pinjam WHERE pinjam_id = '$kode_infocus'");

			$data = array(
				'status' => 'Dikembalikan', 
				'tgl_kembali'  => date('Y-m-d H:i:s'),
			);

			$total_array = count($data);
			if($total_array != 0)
			{	
				$this->db->where('pinjam_id',$this->input->get('kembali'));
				$this->db->update('tbl_pinjam',$data);
			}

			// Setting status menjadi tersedia pada table infocus
			$this->db->set('status', 'Tersedia');
			$this->db->where('kode_infocus', $infocus);
			$this->db->update('tbl_infocus');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Pengembalian Pinjam Infocus Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}
	}

	public function infocus()
    {	
		$kode_infocus = $this->input->post('kode_infocus');
		$row = $this->db->query("SELECT * FROM tbl_infocus WHERE kode_infocus ='$kode_infocus'");
		
		if($row->num_rows() > 0)
		{
			$tes = $row->row();
			$item = array(
				'kode_infocus'   => $kode_infocus,
				'qty'     => 1,
                'price'   => '1000',
				'options' => array('thn' => $tes->thn_infocus,'merek' => $tes->merek)
			);
			if(!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
				$index = $this->exists($kode_infocus);
				$cart = array_values(unserialize($this->session->userdata('cart')));
				if($index == -1) {
					array_push($cart, $item);
					$this->session->set_userdata('cart', serialize($cart));	
				} else {
					$cart[$index]['quantity']++;
					$this->session->set_userdata('cart', serialize($cart));
				}
			}
		}else{

		}
        
	}

	public function infocus_list()
	{
	?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Infocus</th>
					<th>Merek Infocus</th>
					<th>Tahun Infocus</th>
					<th>Kondisi Infocus</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1;
				foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
				<tr>
					<td><?= $no;?></td>
					<td><?= $items['kode_infocus'];?></td>
					<td><?= $items['options']['merek'];?></td>
					<td><?= $items['options']['thn'];?></td>
					<td style="width:17%">
					<a href="javascript:void(0)"  id="delete_infocus<?=$no;?>" data_<?=$no;?>="<?= $items['kode_infocus'];?>" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<script>
					$(document).ready(function(){
						$("#delete_infocus<?=$no;?>").click(function (e) {
							$.ajax({
								type: "POST",
								url: "<?php echo base_url('transaksi/del_cart');?>",
								data:'kode_infocus='+$(this).attr("data_<?=$no;?>"),
								beforeSend: function(){
								},
								success: function(html){
									$("#tampil").html(html);
								}
							});
						});
					});
				</script>
			<?php $no++;}?>
			</tbody>
		</table>
		<?php foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
			<input type="hidden" value="<?= $items['kode_infocus'];?>" name="idinfocus[]">
		<?php }?>
		<div title="tampil"></div>
	<?php
	}

	public function del_cart()
    {
		error_reporting(0);
        $kode_infocus = $this->input->post('kode_infocus');
        $index = $this->exists($kode_infocus);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
		echo '<script>$("#result_infocus").load("'.base_url('transaksi/infocus_list').'");</script>';
    }

    private function exists($kode_infocus)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['kode_infocus'] == $kode_infocus) {
                return $i;
            }
        }
        return -1;
    }

}
