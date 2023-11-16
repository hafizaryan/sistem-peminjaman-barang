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
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<?php if(!empty($this->input->get('id'))){?>
							<h4> Edit Ruangan</h4>
							<?php }else{?>
							<h4> Tambah Ruangan</h4>
							<?php }?>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<?php if(!empty($this->input->get('id'))){?>
							<form method="post" action="<?= base_url('data/ruangproses');?>">
								<div class="form-group">
									<label for="">Kode Ruangan</label>
									<input type="text" name="kode"  value="<?=$ruang->kode_ruangan;?>" id="ruangan" class="form-control"  placeholder="Masukan Kode Ruangan" >
									<br>
									<label for="">Nama Gedung</label>
									<input type="text" name="lokasi"  value="<?=$ruang->lokasi_ruangan;?>" id="ruangan" class="form-control"  placeholder="Masukan Lokasi Ruangan" >
									<!-- <label for="">Lantai Ruangan</label>
									<input type="text" min="1" max="5" name="lantai"  value="<?=$ruang->lantai_ruangan;?>" id="ruangan" class="form-control"  placeholder="Masukan Lantai Ruangan" >
									<label for="">Nomor Ruangan</label>
									<input type="text" name="nomor"  value="<?=$ruang->nomor_ruangan;?>" id="ruangan" class="form-control"  placeholder="Masukan Nomor Ruangan" > -->
								</div>
								<br/>
								<input type="hidden" name="edit" value="<?=$ruang->kode_ruangan;?>">
								<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Ruangan</button>
							</form>
							<?php }else{?>

							<form method="post" action="<?= base_url('data/ruangproses');?>">
								<div class="form-group">
									<label for="">Kode Ruangan</label>
									<input type="text" name="kode" id="ruangan" class="form-control" placeholder="Masukan Kode Ruangan" required>
									<br>
									<label for="">Nama Gedung</label>
									<input type="text" name="lokasi" id="ruangan" class="form-control" placeholder="Masukan Lokasi Ruangan" required>
									<br>
									<!-- <label for="">Lantai Ruangan</label>
									<input type="number" min="1" max="5" name="lantai" id="ruangan" class="form-control" placeholder="Masukan Lantai Ruangan" >
									<br>
									<label for="">Nomor Ruangan</label>
									<input type="number" name="nomor" id="ruangan" class="form-control" placeholder="Masukan Nomor Ruangan" >	 -->
								</div>
								<br/>
								<input type="hidden" name="tambah" value="tambah">
								<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Ruangan</button>
							</form>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
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
										<th>Kode Ruangan</th>
										<th>Nama Gedung</th>
										<!-- <th>Lantai Ruangan</th>
										<th>Nomor Ruangan</th> -->
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php $no=1;foreach($ruangan->result_array() as $isi){?>
									<tr>
										<td style="width:5%;"><?= $no;?></td>
										<td style="width:25%;"><?= $isi['kode_ruangan'];?></td>
										<td style="width:25%;"><?= $isi['lokasi_ruangan'];?></td>
										<!-- <td style="width:15%;"><?= $isi['lantai_ruangan'];?></td>
										<td style="width:15%;"><?= $isi['nomor_ruangan'];?></td> -->
										<td style="width:10%;">
											<a href="<?= base_url('data/ruangan?id='.$isi['kode_ruangan']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
											<a href="<?= base_url('data/ruangproses?kode_ruangan='.$isi['kode_ruangan']);?>" onclick="return confirm('Anda yakin Ruangan ini akan dihapus ?');">
											<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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
    	</div>
    </div>
</section>
</div>
