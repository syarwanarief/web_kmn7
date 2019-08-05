<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                MANAJEMEN USER
             </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('ResetPassword')?>"> <font face="Book Antiqua">Reset Password</font></a></li>
            <li class="active"><font face="Book Antiqua">Detail</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box">
            <div class="box-header with-border">

                <b><H4>Detail User</H4></b>
                <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    KEMBALI
                </button>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
        <table id="example1" class="table table-bordered table-striped">
            <tr>
                <td><b>Nopek</b></td>
                <td><?php echo $detail->nopek ?></td>
            </tr>
            <tr>
                <td><b>Nama</b></td>
                <td><?php echo $detail->nama ?></td>
            </tr>
            <tr>
                <td><b>Level</b></td>
                <td><?php echo $detail->level ?></td>
            </tr>
            <tr>
                <td><b>Foto</b></td>
                <td>
                    <div class="col-xs-6 col-md-12">
                        <?php
                        if($detail->foto == 'fotoDefault'){  //foto= dashboard
                            ?>
                        <a class="thumbnail">
                            <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                        </a>
                            <?php } else { ?>
                            <a class="thumbnail">
                                <img width="200px" height="200px"  src="<?php echo base_url('fotoProfil/') . $detail->foto ?>">
                            </a>
                        <?php } ?>

                    </div>


                </td>
            </tr>
            <tr>
                <td><b>Inisial</b></td>
                <td><?php echo $detail->inisial ?></td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td><?php echo $detail->status ?></td>
            </tr>



        </table>



        </div>
    </section>


    <!-- /.box-body -->



    <!-- /.row (main row) -->
</div>