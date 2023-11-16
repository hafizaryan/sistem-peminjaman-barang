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
	        <div class="box box-primary">
                <div class="box-header with-border">
					<?php if($this->session->userdata('level') == 'Admin'){?>
                    <a href="data/infocustambah"><button class="btn btn-primary">
						<i class="fa fa-plus"> </i> Tambah Infocus</button></a>
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
                                <!-- <th>Sampul</th> -->
                                <th>Kode Infocus</th>
                                <th>Merek Infocus</th>
                                <th>Tahun Infocus</th>
                                <th>Kondisi Infocus</th>
                                <th>Rak Infocus</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach($infocus->result_array() as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <!-- <td>
                                    <center>
                                        <?php if(!empty($isi['sampul'] !== "0")){?>
                                        <img src="<?php echo base_url();?>assets_style/image/infocus/<?php echo $isi['sampul'];?>" alt="#" 
                                        class="img-responsive" style="height:auto;width:100px;"/>
                                        <?php }else{?>
											<i class="fa fa-book fa-3x" style="color:#333;"></i> <br/><br/>
											Tidak Ada Sampul
                                        <?php }?>
                                    </center>
                                </td> -->
                                <td><?= $isi['kode_infocus'];?></td>
                                <td><?= $isi['merek'];?></td>
                                <td><?= $isi['thn_infocus'];?></td>
                                <td><?= $isi['kondisi_infocus'];?></td>
                                <td><?= $isi['rak'];?></td>
                                <td><?= $isi['status'];?></td>
								<td <?php if($this->session->userdata('level') == 'Admin'){?>style="width:15%;"<?php }?>>
									
                                    <?php if($this->session->userdata('level') == 'Admin'){?>
									<a href="<?= base_url('data/infocusedit/'.$isi['id_infocus']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
									<a href="<?= base_url('data/infocusdetail/'.$isi['id_infocus']);?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> </button></a>
                                    <a href="<?= base_url('data/prosesinfocus?kode_infocus='.$isi['id_infocus']);?>" onclick="return confirm('Anda yakin infocus ini akan dihapus ?');"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
									
                                    <?php }else{?>
										<a href="<?= base_url('data/infocusdetail/'.$isi['id_infocus']);?>"><button class="btn btn-primary"><i class="fa fa-eye "></i></button></a>
                                        <?php if($isi['status'] === "Tersedia"){
                                            $disable = "";
                                            $url ="href=\"".base_url("transaksi/pinjam?kode_infocus=").$isi['kode_infocus']."\"";
                                            // $url = "";
                                            }
                                            else{
                                            $disable = "disabled";
                                            $url = "";
                                            }
                                        ?>
                                        <a <?=  $url ;?> class="cursor"><button class="btn btn-success" <?= $disable?>><i class="fa fa-sign-out" ></i><span>Pinjam</span></button></a>
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
