<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
      <i class="fa fa-sign-out" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
		<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li class="active"><i class="fa fa-sign-out"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
</section>
<section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
						<div class="row">
							<div class="col-sm-6">
								<table class="table table-striped">
									<tr style="background:yellowgreen">
										<td colspan="3">Data Transaksi</td>
									</tr>
									<tr>
										<td>No Pinjam</td>
										<td>:</td>
										<td>
											<?= $pinjam->pinjam_id;?>
										</td>
									</tr>
									<tr>
										<td>Nama Mahasiswa</td>
										<td>:</td>
										<td>
											<?= $pinjam->nama;?>
										</td>
									</tr>
									<tr>
										<td>Nama Dosen</td>
										<td>:</td>
										<td>
											<?= $pinjam->nama_dosen;?>
										</td>
									</tr>
									<tr>
										<td>Mata Kuliah</td>
										<td>:</td>
										<td>
											<?= $pinjam->mata_kuliah;?>
										</td>
									</tr>
									<tr>
										<td>Tanggal Pinjam</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_pinjam;?>
										</td>
									</tr>
									<tr>
										<td>Jam Pinjam</td>
										<td>:</td>
										<td>
											<?= $pinjam->jam_pinjam;?>
										</td>
									</tr>
									<tr>
										<td>Lama Pinjam</td>
										<td>:</td>
										<td>
											<?= $pinjam->lama_pinjam;?> Jam
										</td>
									</tr>
								</table>
							</div>
							<div class="col-sm-6">
								<table class="table table-striped">
									<tr style="background:yellowgreen">
										<td colspan="3">Pinjam Infocus</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td>
											<?= $pinjam->status;?>
										</td>
									</tr>
									<tr>
										<td>Tanggal Kembali</td>
										<td>:</td>
										<td>
											<?php 
												if($pinjam->tgl_kembali == '0')
												{
													echo '<p style="color:red;">belum dikembalikan</p>';
												}else{
													echo $pinjam->tgl_kembali;
												}
											
											?>
										</td>
									</tr>
									
									<tr>
										<td>Kode Infocus</td>
										<td>:</td>
										<td>
										<?php
											$pin = $this->M_Admin->get_tableid('tbl_pinjam','pinjam_id',$pinjam->pinjam_id);
											$no =1;
											foreach($pin as $isi)
											{
												$infocus = $this->M_Admin->get_tableid_edit('tbl_infocus','kode_infocus',$isi['kode_infocus']);
												echo $no.'. '.$infocus->kode_infocus.'<br/>';
											$no++;}
										?>
										</td>
									</tr>
									<tr>
										<td>Data Infocus</td>
										<td>:</td>
										<td>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Kode Infocus</th>
														<th>Merek Infocus</th>
														<th>Tahun Infocus</th>
													</tr>
												</thead>
												<tbody>
												<?php 
													$no=1;
													foreach($pin as $isi)
													{
														$infocus = $this->M_Admin->get_tableid_edit('tbl_infocus','kode_infocus',$isi['kode_infocus']);
												?>
													<tr>
														<td><?= $no;?></td>
														<td><?= $infocus->kode_infocus;?></td>
														<td><?= $infocus->merek;?></td>
														<td><?= $infocus->thn_infocus;?></td>
													</tr>
												<?php $no++;}?>
												</tbody>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</div>
                        <div class="pull-right">
							<a data-toggle="modal" data-target="#TableDenda" class="btn btn-primary btn-md" style="margin-left:1pc;">
								<i class="fa fa-sign-in"></i> Kembalikan</a>
							<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
						</div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>

 <!--modal import -->
<div class="modal fade" id="TableDenda">
<div class="modal-dialog" style="width:70%">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"> Pengembalian Infocus</h4>
</div>
<div id="modal_body" class="modal-body fileSelection1">
	<table class="table table-striped">
		<tr style="background:yellowgreen">
			<td colspan="3">Data Peminjaman Infocus</td>
		</tr>
		<tr>
			<td>No Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->pinjam_id;?>
			</td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>:</td>
			<td>
				<?= $pinjam->nama;?>
			</td>
		</tr>
		<tr>
			<td>Nama Dosen</td>
			<td>:</td>
			<td>
				<?= $pinjam->nama_dosen;?>
			</td>
		</tr>
		<tr>
			<td>Mata Kuliah</td>
			<td>:</td>
			<td>
				<?= $pinjam->mata_kuliah;?>
			</td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<td>:</td>
			<td>
				<?= $pinjam->tgl_pinjam;?>
			</td>
		</tr>
		<tr>
			<td>Jam Pinjam</td>
			<td>:</td>
			<td>
				<?= $pinjam->jam_pinjam;?>
			</td>
		</tr>
		<tr>
			<td>Lama Pinjam</td>
			<td>:</td>
			<td>
				<?= $pinjam->lama_pinjam;?> Jam
			</td>
		</tr>
		<tr>
			<td>Tanggal Kembali</td>
			<td>:</td>
			<td>
				<?= date('Y-m-d H:i:s');?> ( Sekarang )
			</td>
		</tr>
		<tr>
			<td>Detail Infocus</td>
			<td>:</td>
			<td>
			<?php
				$pin = $this->M_Admin->get_tableid('tbl_pinjam','pinjam_id',$pinjam->pinjam_id);
				$no =1;
				foreach($pin as $isi)
				{
					$infocus = $this->M_Admin->get_tableid_edit('tbl_infocus','kode_infocus',$isi['kode_infocus']);
					echo $no.'. '.$infocus->kode_infocus.'<br/>';
				$no++;}

			?>
			</td>
		</tr>
	</table>
</div>
<div class="modal-footer">
	<div class="pull-right">
		<a href="<?= base_url('transaksi/prosespinjam?kembali='.$pinjam->pinjam_id)."&infocus=".$pinjam->kode_infocus;?>">
		<button class="btn btn-primary">Kembalikan</button></a>
		<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	</div>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
