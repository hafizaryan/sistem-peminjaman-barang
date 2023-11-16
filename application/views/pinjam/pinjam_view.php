<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
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
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
					<?php if($this->session->userdata('level') == 'Mahasiswa'){ ?>
					<?php }?>
                </div>
				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>Nama Mahasiswa</th>
								<th>Nama Dosen</th>
								<th>Mata Kuliah</th>
								<!-- <th>Kode Ruangan</th> -->
								<th>Kode Infocus</th>
                                <th>Tanggal Pinjam</th>
								<th>Jam Pinjam</th>
                                <th>Lama Pinjam</th>
                                <th >Status</th>
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
								<!-- <td><?= $isi['kode_ruangan'];?></td> -->
								<td><?= $isi['kode_infocus'];?></td>
                                <td><?= $isi['tgl_pinjam'];?></td>
								<td><?= $isi['jam_pinjam'];?></td>
                                <td><?= $isi['lama_pinjam'];?> Jam</td>
                                <td><?= $isi['status'];?></td>
								<td style="text-align:center;width:20%;">
									<?php if($this->session->userdata('level') == 'Admin'){ ?>
										<?php if($isi['tgl_kembali'] == '0') {?>
											<a href="<?= base_url('transaksi/kembalipinjam/'.$isi['pinjam_id']);?>" class="btn btn-warning btn-sm" title="pengembalian infocus">
											<i class="fa fa-sign-out"></i> Kembalikan</a>
										<?php }else{ ?>
											<a href="javascript:void(0)" class="btn btn-success btn-sm" title="pengembalian infocus">
											<i class="fa fa-check"></i> Dikembalikan</a>
										<?php }?>
											<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id'].'?pinjam=yes');?>" class="btn btn-primary btn-sm" title="detail pinjam"><i class="fa fa-eye"></i></button></a>
											<!-- <a href="<?= base_url('transaksi/prosespinjam?pinjam_id='.$isi['pinjam_id']);?>" onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');" class="btn btn-danger btn-sm" title="hapus pinjam">
											<i class="fa fa-trash"></i></a> -->
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
