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
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
                    <form action="<?php echo base_url('data/prosesinfocus');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kode Infocus</label>
                                    <input type="text" class="form-control" name="kode_infocus" required="required" placeholder="Masukan Kode Infocus">
                                </div>
                                <div class="form-group">
                                    <label>Merek Infocus</label>
                                    <input type="text" class="form-control" name="merek" required="required" placeholder="Masukan Merek Infocus">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Infocus</label>
                                    <input type="number" min="2000" max="2030" class="form-control" name="thn" required="required" placeholder="Masukan Tahun Infocus (Contoh : 2020)">
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Infocus</label>
                                    <select name="kondisi" class="form-control">
                                    <option disabled selected>-- Harap Pilih Kondisi Infocus --</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Buruk">Buruk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rak Infocus</label>
                                    <select name="rak" class="form-control">
                                    <option disabled selected>-- Harap Pilih Rak Infocus --</option>
                                    <option value="Rak 1">Rak 1</option>
                                    <option value="Rak 2">Rak 2</option>
                                    <option value="Rak 3">Rak 3</option>
                                    <option value="Rak 4">Rak 4</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Sampul <small style="color:green">(gambar) * opsional</small></label>
                                    <input type="file" accept="image/*" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan Lainnya</label>
                                    <textarea class="form-control" name="ket" id="summernotehal" style="height:120px"></textarea>
                                </div> -->
                            </div>
                        </div>
                        <div class="pull-right">
							<input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-primary btn-md">Kirim</button> 
                            <a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                    </form>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
