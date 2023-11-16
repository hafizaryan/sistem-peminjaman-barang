<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
        <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
		<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
		<li class="active"><i class="fa fa-edit"></i>&nbsp;  <?= $title_web;?></li>
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
                    <form action="<?php echo base_url('data/prosesbuku');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kode Infocus</label>
                                    <input type="text" class="form-control" value="<?= $infocus->kode_infocus;?>" name="kode_infocus" placeholder="Masukan Kode Infocus ">
                                </div>
                                <div class="form-group">
                                    <label>Merek Infocus</label>
                                    <input type="text" class="form-control" value="<?= $infocus->merek;?>" name="merek" placeholder="Masukan Merek Infocus ">
                                </div>
                                <div class="form-group">
                                    <label>Tahun Infocus</label>
                                    <input type="number" class="form-control" value="<?= $infocus->thn_infocus;?>" name="thn" placeholder="Masukan Tahun Infocus (Contoh : 2020)">
                                </div>
                                <div class="form-group">
                                    <label>Kondisi Infocus</label>
                                    <select name="kondisi" class="form-control">
                                        <option <?php if($infocus->kondisi_infocus == 'Baik'){ echo 'selected';}?>>Baik</option>
										<option <?php if($infocus->kondisi_infocus == 'Buruk'){ echo 'selected';}?>>Buruk</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rak Infocus</label>
                                    <select name="rak" class="form-control">
                                        <option <?php if($infocus->rak == 'Rak 1'){ echo 'selected';}?>>Rak 1</option>
										<option <?php if($infocus->rak == 'Rak 2'){ echo 'selected';}?>>Rak 2</option>
                                        <option <?php if($infocus->rak == 'Rak 3'){ echo 'selected';}?>>Rak 3</option>
										<option <?php if($infocus->rak == 'Rak 4'){ echo 'selected';}?>>Rak 4</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
								<label>Sampul <small style="color:green">(gambar) * opsional</small></label>
									<input type="file" accept="image/*" name="gambar">

									<?php if(!empty($infocus->sampul !== "0")){?>
									<br/>
									<a href="<?= base_url('assets_style/image/infocus/'.$infocus->sampul);?>" target="_blank">
										<img src="<?= base_url('assets_style/image/infocus/'.$infocus->sampul);?>" style="width:70px;height:70px;" class="img-responsive">
									</a>
									<?php }else{ echo '<br/><p style="color:red">* Tidak ada Sampul</p>';}?>
								</div> -->
                                <!-- <div class="form-group">
                                    <label>Keterangan Lainnya</label>
                                    <textarea class="form-control" name="ket" id="summernotehal" style="height:120px"><?= $buku->isi;?></textarea>
                                </div> -->
                            </div>
                        </div>
                        <div class="pull-right">
							<!-- <input type="hidden" name="gmbr" value="<?= $infocus->sampul;?>"> -->
							<input type="hidden" name="edit" value="<?= $infocus->kode_infocus;?>">
                            <button type="submit" class="btn btn-primary btn-md">Kirim</button> 
                    </form>
                            <a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
