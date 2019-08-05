
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               CEK LAPORAN USER
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('PengembanganSDM')?>"> <font face="Book Antiqua">Pengembangan SDM</font></a></li>
            <li class="active"><font face="Book Antiqua">Laporan</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section  class="content">

        <!-- SELECT2 EXAMPLE -->

        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            KEMBALI
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        error_reporting(0);
                        if($cek-> status == 'Tidak_Layak'){ ?>


                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Perhatian!</strong> <br/>Laporan Tidak Layak!
                            </div>


                        <?php }else if($cek == null){

                            ?>

                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Perigatan!</strong> <br/>Laporan Tidak Ditemukan !
                            </div>

                        <?php }else{ ?>

                            <div>
                                <embed src="<?php echo base_url('LaporanPdf/'). $cek->file_pdf ?>" type='application/pdf' width='100%' height='400px'/>
                            </div>
                        <?php } ?>




                    </div>
                </div>
            </div>


            <?php if($cek == !null){ ?>

                <div class="col-md-3">
                    <div  class="box box-primary">
                        <div class="box-header with-border">

                            <h5>Keterangan</h5>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <tr style="display:none;">
                                    <td><b>ID</b></td>
                                    <td><?php echo $cek->id ?></td>
                                </tr>

                                <tr>
                                    <td><b>Nopek</b></td>
                                    <td><?php echo $cek->nopek ?></td>
                                </tr>
                                <tr>
                                    <td><b>Judul</b></td>
                                    <td><?php echo $cek->judul ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kriteria</b></td>
                                    <td><?php echo $cek->kriteria ?></td>
                                </tr>
                                <tr>
                                    <td><b>Bidang</b></td>
                                    <td><?php echo $cek->bidang ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kata kunci</b></td>
                                    <td><?php echo $cek->kata_kunci ?></td>
                                </tr>
                            </table>




                        </div>
                    </div>
                </div>

            <?php } ?>






        </div>

    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
