
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                KRITIK & SARAN
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Kritik & Saran</font></li>
        </ol>

        <!-- message end -->
    </section>




    <section class="content">
        <!-- SELECT2 EXAMPLE -->

<style>
    .btn-grey{
        background-color:#D8D8D8;
        color:#FFF;
    }
    .rating-block{
        background-color:#FAFAFA;
        border:1px solid #EFEFEF;
        padding:15px 15px 20px 15px;
        border-radius:3px;
    }
    .bold{
        font-weight:700;
    }
    .padding-bottom-7{
        padding-bottom:7px;
    }

    .review-block{
        background-color:#FAFAFA;
        border:1px solid #EFEFEF;
        padding:15px;
        border-radius:3px;
        margin-bottom:15px;
    }
    .review-block-name{
        font-size:12px;
        margin:10px 0;
    }
    .review-block-date{
        font-size:12px;
    }
    .review-block-rate{
        font-size:13px;
        margin-bottom:15px;
    }
    .review-block-title{
        font-size:15px;
        font-weight:700;
        margin-bottom:10px;
    }
    .review-block-description{
        font-size:13px;
    }</style>

        <div class="row">

            <!-- /.col -->
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">


                        <!-- /.box-tools -->
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

                                            <h5><b><?php echo $TRate->Total ?> Ulasan</b></h5>


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

                            <div class="row">
                                <div class="col-sm-7">
                                    <hr/>


                                    <table id="kv" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Tanggapan</th>


                                        </tr>
                                        </thead>
                                        <?php

                                        foreach($viewrate as $viewrate2):
                                            ?>
                                        <tr>
                                            <td>



                                                <div class="review-block">

                                                        <div class="row">

                                                            <div class="col-sm-3">
                                                                <img src="<?php echo base_url('assets/images/chat.png')?>" width="30%" class="img-rounded">
                                                                <div class="review-block-name"><b><?php echo $viewrate2->nama; ?> <br /> <?php echo $viewrate2->nopek; ?></b></div>
                                                                <div class="review-block-date"><b><?php echo $viewrate2->waktu; ?></b></div>

                                                            </div>

                                                            <div class="col-sm-9">
                                                                <div class="review-block-rate">
                                                                    <?php if($viewrate2->star == 5){ ?>
                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=5){
                                                                            echo "  <button type=\"button\" class=\"btn btn-warning btn-xs\" aria-label=\"Left Align\">
                                                        <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                    </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>


                                                                    <?php } else if($viewrate2->star == 4){ ?>
                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=4){
                                                                            echo "  <button type=\"button\" class=\"btn btn-warning btn-xs\" aria-label=\"Left Align\">
                                                        <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                    </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>
                                                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        </button>


                                                                    <?php } else if($viewrate2->star == 3){ ?>



                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=3){
                                                                            echo "  <button type=\"button\" class=\"btn btn-warning btn-xs\" aria-label=\"Left Align\">
                                                        <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                    </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=2){
                                                                            echo "  <button type=\"button\" class=\"btn btn-default btn-grey btn-xs\" aria-label=\"Left Align\">
                                                            <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                        </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>

                                                                    <?php } else if($viewrate2->star == 2){ ?>



                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=2){
                                                                            echo "  <button type=\"button\" class=\"btn btn-warning btn-xs\" aria-label=\"Left Align\">
                                                        <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                    </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=3){
                                                                            echo "  <button type=\"button\" class=\"btn btn-default btn-grey btn-xs\" aria-label=\"Left Align\">
                                                            <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                        </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>


                                                                    <?php } else if($viewrate2->star == 1){ ?>

                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=1){
                                                                            echo "  <button type=\"button\" class=\"btn btn-warning btn-xs\" aria-label=\"Left Align\">
                                                        <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                    </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>
                                                                        <?php
                                                                        $i = 1;
                                                                        while ($i<=4){
                                                                            echo "  <button type=\"button\" class=\"btn btn-default btn-grey btn-xs\" aria-label=\"Left Align\">
                                                            <span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>
                                                        </button>";
                                                                            $i++;
                                                                        }
                                                                        ?>
                                                                    <?php }else{ ?>


                                                                    <?php } ?>
                                                                </div>
                                                                <!--    <div class="review-block-title">this was nice in buy</div> -->
                                                                <div class="review-block-description"><b><?php echo $viewrate2->kritik; ?></b></div>
                                                            </div>
                                                        </div>




                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>



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
                <!-- /.box-body -->



            </div>
            <!-- /. box -->
        </div>
        <!-- /.col -->




        <!-- /.row -->



    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
