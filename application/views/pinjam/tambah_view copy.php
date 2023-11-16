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
	
	<?php  $nowDate = date("Y-m-d h:i:sa");
            $start = '07:00:00';
            $end   = '17:00:00';
            $time = date("H:i:s", strtotime($nowDate));
	?>
	<?php if(($time >= $start)&& ($time <= $end)):?>
	

  	<section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
				<?php if($this->session->userdata('level') == 'Mahasiswa'){ ?>
				<ul class="nav nav-tabs">
					<li class="<?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi/pinjam");?>" class="cursor" style="color:black">Formulir Peminjaman</a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi");?>" class="cursor" style="color:black">Riwayat Peminjaman</a>
                    </li>
                </ul>
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
								<!-- <div class="form-group">
                                    <label>Kode Ruangan</label>
									<input type="text" required placeholder="Mata Kuliah" name="matkul" class="form-control">
                                </div> -->
								<div class="form-group">
									<label>Kode Ruangan</label>
									<select class="form-control select2"  name="ruangan">
										<option disabled selected value> -- Pilih Ruangan -- </option>
										<?php foreach($ruang->result_array() as $isi):?>
											<option value="<?= $isi['id_ruangan'];?>"><?= $isi['kode_ruangan'];?></option>
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
									<input type="number" required placeholder="Lama Pinjam Contoh : 2 Jam (2)" name="lama" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Kode Infocus</label>
									<!-- <div class="input-group"> -->
									<!-- <input type="text" class="form-control"  name="buku_id" id="buku-search" readonly type="text" value="<?=$_GET['title']?>"> -->
									<input type="text" class="form-control" name="title" id="buku-search" readonly placeholder="Contoh Kode infocus : FST 01 2020" value="<?=$_GET['title']?>">
											<!-- <span class="input-group-btn">
												<a data-toggle="modal" data-target="#Tablebuku" class="btn btn-primary"><i class="fa fa-search"> Pilih Infocus</i></a>
											</span> -->
									<!-- </div> -->
	                            </div>
									<label>Data Infocus</label>
										<div  id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
										<div id="result_buku">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Kode Infocus</th>
													<th>Merek Infocus</th>
													<th>Tahun Infocus</th>
													<!-- <th>Kondisi Infocus</th> -->
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php $no= 1; foreach($infocus->result_array() as $items){?>
												<tr>
													<td><?= $no;?></td>
													<td><?= $items['title'];?></td>
													<td><?= $items['penerbit'];?></td>
													<td><?= $items['thn_buku'];?></td>
													<td style="width:17%">
													<a href="javascript:void(0)"  id="delete_buku<?=$no;?>" data_<?=$no;?>="<?= $items['title'];?>" class="btn btn-danger btn-sm">
														<i class="fa fa-trash"></i></a>
													</td>
												</tr>
											<?php }?>
											</tbody>
										</table>
										</div>
	                            </div>
							</div>
                        <div class="pull-right">
							<input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-primary btn-md">Kirim</button> 
                    </form>
							<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
						</div>
						</div>
		        </div>
	        </div>
	    </div>
    </div>

<?php endif?>
	<?php  $nowDate = date("Y-m-d h:i:sa");
            $start = '17:00:01';
            $end   = '23:59:59';
            $time = date("H:i:s", strtotime($nowDate));
	?>

  	<?php if(($time >= $start)&& ($time <= $end)):?>
	<div>
		<br>
		<br>
		<br>
		<h1 style="margin-left:23%">WAKTU PEMINJAMAN BELUM DIBUKA</h1>
	</div>
	<?php endif?>
	<?php  $nowDate = date("Y-m-d h:i:sa");
            $start = '00:00:00';
            $end   = '06:59:59';
            $time = date("H:i:s", strtotime($nowDate));
	?>
  	<?php if(($time >= $start)&& ($time <= $end)):?>
	<div>
		<h1>WAKTU PEMINJAMAN BELUM DIBUKA </h1>
	</div>
	<?php endif?>
	
</section>
</div>
<!--modal import -->
<div class="modal fade" id="Tablebuku">
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
		<?php $no=1;foreach($buku->result_array() as $isi){?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['title'];?></td>
				<td><?= $isi['penerbit'];?></td>
				<td><?= $isi['thn_buku'];?></td>
				<td>
					<?php
					$id = $isi['title'];
					$dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE title= '$id' AND status = 'Dipinjam'");
					if($dd->num_rows() > 0 )
					{
						// echo $dd->num_rows();
						echo "Dipinjam";
					}else{
						// echo '0';
						echo 'Tersedia';
					}
					?>
				</td>
				<!-- <td><?= $isi['jml'];?></td> -->
				<td style="width:17%">
				<button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['title'];?>">
					<i class="fa fa-check"> </i> Pilih
				</button>
				<a href="<?= base_url('data/bukudetail/'.$isi['id_infocus']);?>" target="_blank">
					<button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
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
		document.getElementsByName('title')[0].value = $(this).attr("data_id");
		$('#Tablebuku').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/buku');?>",
			data:'kode_buku='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
				$("#result_tunggu_buku").html('');
			}
		});
	});
</script>
	  
<script>
	// AJAX call for autocomplete
	
	// var exist = document.getElementById('buku-search');
	$("#buku-search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/buku');?>",
				data:'kode_buku='+$(this).val(),
				beforeSend: function(){
					$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
					$("#result_tunggu_buku").html('');
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
