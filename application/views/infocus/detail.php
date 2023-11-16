<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<?php
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-book" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-list"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
					<h4><?= $infocus->kode_infocus;?></h4>
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
					<table class="table table-striped table-bordered">
						<!-- <tr>
							<td>Foto Infocus</td>
							<td><?php if(!empty($infocus->sampul !== "0")){?>
									<a href="<?= base_url('assets_style/image/infocus/'.$infocus->sampul);?>" target="_blank">
										<img src="<?= base_url('assets_style/image/infocus/'.$infocus->sampul);?>" style="width:170px;height:170px;" class="img-responsive">
									</a>
									<?php }else{ echo '<br/><p style="color:red">* Tidak ada Sampul</p>';}?>
								</td>
						</tr> -->
						<tr>
							<td>Kode Infocus</td>
							<td><?= $infocus->kode_infocus;?></td>
						</tr>
						<tr>
							<td>Merek Infocus</td>
							<td><?= $infocus->merek;?></td>
						</tr>
						<tr>
							<td>Tahun Infocus</td>
							<td><?= $infocus->thn_infocus;?></td>
						</tr>
						<tr>
							<td>Kondisi Infocus</td>
							<td><?= $infocus->kondisi_infocus;?></td>
						</tr>
						<tr>
							<td>Rak Infocus</td>
							<td><?= $infocus->rak;?></td>
						</tr>
						<tr>
							<td>Status Infocus</td>
							<td><?= $infocus->status;?></td>
						</tr>
						<!-- <tr>
							<td>Keterangan Lainnya</td>
							<td><?= $infocus->isi;?></td>
						</tr> -->
					</table>
					<div class="pull-right">
							<a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
					</div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
