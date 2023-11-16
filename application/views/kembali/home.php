<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<?php 
	$bulan_tes =array(
		'01'=>"Januari",
		'02'=>"Februari",
		'03'=>"Maret",
		'04'=>"April",
		'05'=>"Mei",
		'06'=>"Juni",
		'07'=>"Juli",
		'08'=>"Agustus",
		'09'=>"September",
		'10'=>"Oktober",
		'11'=>"November",
		'12'=>"Desember"
	);
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
		<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
</section>
<section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Dosen</th>
								<th>Mata Kuliah</th>
								<th>Kode Infocus</th>
                                <th>Lama Pinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th style="width:10%">Aksi</th>
                            </tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($pinjam->result_array() as $isi){
                                $nama = $isi['nama'];
                                $pinjam_id = $isi['pinjam_id'];   
						?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['pinjam_id'];?></td>
                                <td><?= $isi['nama'];?></td>
                                <td><?= $isi['nama_dosen'];?></td>
								<td><?= $isi['mata_kuliah'];?></td>
								<td><?= $isi['kode_infocus'];?></td>
                                <td><?= $isi['lama_pinjam'];?> Jam</td>
                                <td><?= $isi['tgl_pinjam'];?></td>
								<td>
									<?php 
										if($isi['tgl_kembali'] == '0')
										{
											echo '<p style="color:red;">Belum Dikembalikan</p>';
										}else{
											echo $isi['tgl_kembali'];
										}
									?>
								</td>
                                <td><?= $isi['status'];?></td>
                                <td>
                                    <?php if($this->session->userdata('level') == 'Admin'){ ?>
                                        <a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id']);?>" class="btn btn-primary btn-sm" title="detail pinjam">
                                        <i class="fa fa-eye"></i></button></a>
                                        <a href="<?= base_url('transaksi/prosespinjam?pinjam_id='.$isi['pinjam_id']);?>" onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');" class="btn btn-danger btn-sm" title="hapus pinjam">
                                        <i class="fa fa-trash"></i></a>      
                                    <?php }else{?>
                                        <a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id']);?>" class="btn btn-primary btn-sm" title="detail pinjam">
                                        <i class="fa fa-eye"></i> Detail Pinjam</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php $no++;}?>
                        </tbody>
					</table>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>
