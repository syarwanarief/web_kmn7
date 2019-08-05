<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">

		<ol class="breadcrumb">

		</ol>
	</section>

	<!-- Main content -->
	<section data-width="50%" class="content">



        <div  class="box box-primary">
            <div class="box-header with-border">


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                </div>
            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
            <div class="box-body">

                <div style="width:100%;height:250px;border:1px solid #ccc;font:16px/26px Book Antiqua, Serif;overflow:auto;">
                    <?php include "Awal.php"; ?>
                </div>

                <p><br /></p>
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <!-- small box -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4><?php echo $dashboard->ks ?></h4>

                        <p><h4>Knowledge<br /> Sharing</h4></p>
                    </div>
                    <div class="icon">
                        <IMG src="<?php echo base_url('assets')?>/images/ico4.png">
                    </div>
                    <a href="<?php echo base_url('KnowledgeSharing') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h4><?php echo $dashboard->tk ?></h4>

                        <p><h4>Transfer <br />Knowledge</h4></p>
                    </div>
                    <div class="icon">
                        <IMG src="<?php echo base_url('assets')?>/images/ico4.png">
                    </div>
                    <a href="<?php echo base_url('TransferKnowledge') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4><?php echo $dashboard->kt ?></h4>

                        <p><h4>Karya<br /> Tulis</h4></p>
                    </div>
                    <div class="icon">
                        <IMG src="<?php echo base_url('assets')?>/images/ico4.png">
                    </div>
                    <a href="<?php echo base_url('KaryaTulis') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h4><?php echo $dashboard->pn ?></h4>

                        <p><h4>Pengalaman <br />Narasumber</h4></p>
                    </div>
                    <div class="icon">
                        <IMG src="<?php echo base_url('assets')?>/images/ico4.png">
                    </div>
                    <a href="<?php echo base_url('PengalamanNarasumber') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

            </div>

        </div>

	</section>





	<!-- /.content -->
</div>
