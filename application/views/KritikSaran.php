<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               KRITIK & SARAN
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Kritik & Saran</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>

    <!-- Main content -->
    <section  class="content">

        <div class="row">
            <div class="col-md-5">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><font face="Book Antiqua">Masukan Kritik & Saran</font></h3>
                    </div>
                    <!-- /.box-header -->


                            <?php if($rate){ ?>
                                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('KritikSaran/UpdateKritik') ?>">
                                    <div class="box-body">




                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                            <input type="text" disabled="disabled" class="form-control" value="<?php echo $input->nopek?>" name="nopek" placeholder="Nopek">
                                        </div>
                                        <br />
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                            <input type="text" disabled="disabled" class="form-control" value="<?php echo $input->nama?>" name="nama" placeholder="Nama" placeholder="Nama">
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <textarea class="form-control" required="" rows="9" required="" placeholder="Masukan Kritik & Saran" name="kritik"></textarea>
                                            </select>
                                        </div>
                                        <br />
                                        <center>
                                            <div class="form-group">
                                                <!-- /.   <img src="img/codeigniter.png" height="180"> -->
                                                <input value="<?php echo $rate->star ?>" type="number" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" name="star">
                                            </div>
                                        </center>

                                        <br />
                                        <button type="submit" class="btn btn-success" name="submit">
                                            <i class="glyphicon glyphicon-floppy-saved"></i>
                                            KIRIM
                                        </button>
                                    </div>
                                </form>

                            <?php } else { ?>
                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('KritikSaran/InputKritik') ?>">
                        <div class="box-body">




                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $input->nopek?>" name="nopek" placeholder="Nopek">
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $input->nama?>" name="nama" placeholder="Nama" placeholder="Nama">
                            </div>
                            <br />
                            <div class="form-group">
                                <textarea class="form-control" rows="9" required="" placeholder="Masukan Kritik & Saran" name="kritik"></textarea>
                                </select>
                            </div>
                            <br />
                            <center>
                                <div class="form-group">
                                    <!-- /.   <img src="img/codeigniter.png" height="180"> -->
                                    <input  type="number" required="" class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" name="star">
                                </div>
                            </center>

                            <br />
                            <button type="submit" class="btn btn-success" name="submit">
                                <i class="glyphicon glyphicon-floppy-saved"></i>
                                KIRIM
                            </button>
                        </div>
                    </form>
                            <?php } ?>





                </div>


            </div>



            <div class="col-md-7">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><font face="Book Antiqua">AVERAGE</font></h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">


                        <div class="container">

                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="rating-block">
                                        <h4>Peringkat Pengguna Rata-rata</h4>
                                        <center>
                                            <h2 class="bold padding-bottom-7"><?php echo number_format( $rataRata->rating ,1)?><small>/ 5</small></h2>


                                            <!-- /.   <img src="img/codeigniter.png" height="180"> -->
                                            <input value="<?php echo$rataRata->rating ?>" disabled="disabled" type="number" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5">

                                        </center>

                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <h4>Rincian Peringkat</h4>
                                    <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo  $lima->num_rows() / $TRate->Total *100 ; ?>%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo $lima->num_rows(); ?></div>
                                    </div>
                                    <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo  $empat->num_rows() / $TRate->Total *100 ; ?>%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo $empat->num_rows(); ?></div>
                                    </div>
                                    <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo  $tiga->num_rows() / $TRate->Total *100 ; ?>%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo $tiga->num_rows(); ?></div>
                                    </div>
                                    <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo  $dua->num_rows() / $TRate->Total *100 ; ?>%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo $dua->num_rows(); ?></div>
                                    </div>
                                    <div class="pull-left">
                                        <div class="pull-left" style="width:35px; line-height:1;">
                                            <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo  $satu->num_rows() / $TRate->Total *100 ; ?>%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo $satu->num_rows(); ?></div>
                                    </div>
                                </div>
                            </div>


                        </div> <!-- /container -->


                        <!-- Bootstrap core JavaScript
                        ================================================== -->
                        <!-- Placed at the end of the document so the pages load faster -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
                        <script src="js/bootstrap.min.js"></script>
                        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                        <script src="js/ie10-viewport-bug-workaround.js"></script>



                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>


                </div>


            </div>



    </section>

    <!-- /.content -->
</div>
