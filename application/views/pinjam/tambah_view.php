<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
	<section class="content-header">
    <h1>
    	<i class="fa fa-plus" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
		<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li class="active"><i class="fa fa-plus"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
	</section>

	
	
  	<section class="content">
	  <?php 
		$dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE nama= '$nama' AND status = 'Dipinjam'");
		if($dd ):?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
					<?php if($this->session->userdata('level') == 'Mahasiswa'){ ?>
					<?php }?>
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
                    <form action="<?php echo base_url('transaksi/prosespinjam');?>" method="POST" enctype="multipart/form-data">	
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
                                    <label>No Peminjaman</label>
									<input type="text" name="nopinjam" value="<?= $nop;?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
									<input type="text" name="nama" value="<?= $nama;?>" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Dosen</label>
									<input type="text" required placeholder="Nama Dosen" name="dosen" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Mata Kuliah</label>
									<input type="text" required placeholder="Mata Kuliah" name="matkul" class="form-control">
                                </div>
								<div class="form-group">
									<label>Kode Ruangan</label>
									<select class="form-control select2"  name="ruangan">
										<option disabled selected value> -- Pilih Ruangan -- </option>
										<?php foreach($ruang->result_array() as $isi):?>
											<option value="<?= $isi['kode_ruangan'];?>"><?= $isi['kode_ruangan'];?></option>
										<?php endforeach?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
                                    <label>Tanggal Peminjaman</label>
									<input type="date" value="<?= date('Y-m-d');?>" name="tgl" readonly class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Jam Peminjaman</label>
									<input type="time" value="<?= date('H:i:s');?>" name="jam" readonly class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Lama Peminjaman</label>
									<input type="number" min="1" max="24" required placeholder="Lama Pinjam Contoh : 2 Jam (2)" name="lama" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Kode Infocus</label>
									<input type="text" class="form-control" name="kode_infocus" id="infocus-search" readonly placeholder="Contoh Kode infocus : FST 01 2020" value="<?=$_GET['kode_infocus']?>">
	                            </div>
									<label>Data Infocus</label>
									<div id="result_infocus">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Kode Infocus</th>
													<th>Merek Infocus</th>
													<th>Tahun Infocus</th>
													<th>Kondisi Infocus</th>
												</tr>
											</thead>
											<tbody>
											<?php $no= 1; foreach($infocus->result_array() as $items){?>
												<tr>
													<td><?= $no;?></td>
													<td><?= $items['kode_infocus'];?></td>
													<td><?= $items['merek'];?></td>
													<td><?= $items['thn_infocus'];?></td>
													<td><?= $items['kondisi_infocus'];?></td>
												</tr>
											<?php }?>
											</tbody>
										</table>
									</div>
	                            </div>
							</div>
                        <div class="pull-right">
							<input type="hidden" name="tambah" value="tambah"><button type="submit" class="btn btn-primary btn-md">Kirim</button> 
							<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
						</div>
						</form>
					</div>
		        </div>
	        </div>
	    </div>
    </div>
	<?php endif?>
	</section>
</div>
<!--modal import -->
<div class="modal fade" id="Tableinfocus">
<div class="modal-dialog" style="width:80%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Pilih Infocus</h4>
</div>
<div id="modal_body" class="modal-body fileSelection1">
<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Infocus</th>
				<th>Merek Infocus</th>
				<th>Tahun Infocus</th>
				<th>Status Infocus</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;foreach($infocus->result_array() as $isi){?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['kode_infocus'];?></td>
				<td><?= $isi['merek'];?></td>
				<td><?= $isi['thn_infocus'];?></td>
				<td>
					<?php
					$id = $isi['kode_infocus'];
					$dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE kode_infocus= '$id' AND status = 'Dipinjam'");
					if($dd->num_rows() > 0 )
					{
						echo "Dipinjam";
					}else{
						echo 'Tersedia';
					}
					?>
				</td>
				<td style="width:17%">
				<button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['kode_infocus'];?>"><i class="fa fa-check"> </i> Pilih</button>
				<a href="<?= base_url('data/infocusdetail/'.$isi['kode_infocus']);?>" target="_blank"><button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
				</td>
			</tr>
		<?php $no++;}?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File2").click(function (e) {
		document.getElementsByName('kode_infocus')[0].value = $(this).attr("data_id");
		$('#Tableinfocus').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/infocus');?>",
			data:'kode_infocus='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_infocus").html("");
				$("#result_tunggu_infocus").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_infocus").load("<?= base_url('transaksi/infocus_list');?>");
				$("#result_tunggu_infocus").html('');
			}
		});
	});
</script>
	  
<script>
	// AJAX call for autocomplete
	
	// var exist = document.getElementById('infocus-search');
	$("#infocus-search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/infocus');?>",
				data:'kode_infocus='+$(this).val(),
				beforeSend: function(){
					$("#result_tunggu_infocus").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result_infocus").load("<?= base_url('transaksi/infocus_list');?>");
					$("#result_tunggu_infocus").html('');
				}
			});
		});
	</script>

 <!--modal import -->
 
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
