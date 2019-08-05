
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               Laporan Knowledge Management
               </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Laporan KM</font></li>
        </ol>
        <div role="alert" class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>



    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a data-toggle="modal" data-target="#riwayat" class="btn btn-primary btn-block margin-bottom">Lihat Riwayat</a>

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="?page=KnowledgeSharing"><i class="fa fa-share-alt-square"></i> KnowledgeSharing
                                    <span class="label label-primary pull-right"><?php echo $notif -> ks; ?></span></a></li>
                            <li class="active"><a href="?page=TransferKnowledge"><i class="fa fa-exchange"></i> Transfer Knowledge<span class="label label-success pull-right"><?php echo $notif -> tk; ?></span></a></li>
                            <li class="active"><a href="?page=KaryaTulis"><i class="fa fa-file-text-o"></i> Karya Tulis <span class="label label-warning pull-right"><?php echo$notif -> kt; ?></span></a>
                            </li>
                            <li class="active"><a href="?page=PengalamanNarasumber"><i class="fa fa-user-circle"></i> Pengalaman Narasumber<span class="label label-danger pull-right"><?php echo $notif -> pn; ?></span></a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Inbox  --  <?php
                            error_reporting(0);
                            $page=$_GET['page'];
                            if($page == "KaryaTulis")
                            {
                               echo "Karya Tulis";
                            }
                            else if($page == "KnowledgeSharing")
                            {
                                echo "Knowledge Sharing";
                            }
                            else if($page == "TransferKnowledge")
                            {
                                echo "Transfer Knowledge";
                            }
                            else if($page == "PengalamanNarasumber")
                            {
                                echo "Pengalaman Narasumber";
                            }
                            else if($page == null){
                                echo "Knowledge Sharing";
                            }
                            ?></h3>

                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">





                            <?php
                           error_reporting(0);
                            $page=$_GET['page'];
                            if($page == "KaryaTulis")
                            {
                                $this->load->view('MasukKaryaTulis');
                            }
                            else if($page == "KnowledgeSharing")
                            {
                                $this->load->view('MasukKnowledgeSharing');
                            }
                            else if($page == "TransferKnowledge")
                            {
                                $this->load->view('MasukTransferKnowledge');
                            }
                            else if($page == "PengalamanNarasumber")
                            {
                                $this->load->view('MasukPengalamanNarasumber');
                            }
                            else if($page == null){
                                $this->load->view('MasukKnowledgeSharing');
                            }
                            ?>



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






        <div class="modal fade" id="riwayat" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Lihat Riwayat Laporan</h4>
                    </div>
                    <div class="modal-body">


                        <form role="form" method="post" action="<?php echo base_url('RiwayatLaporan') ?>">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="kriteria"><font face="Book Antiqua">Kriteria</font></label>
                                        <select class="form-control" required="" id="kriteria" name="kriteria">
                                            <option value="">- Pilih Kriteria -</option>
                                            <?php foreach ($kriteria as $mkriteria): ?>
                                                <option value="<?php echo $mkriteria->kode_kriteria ?>"><?php echo $mkriteria->kriteria ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <br />
                                <div class="form-group pull-right">
                                    <button type="submit" name="submit" class="btn btn-primary">Lihat</button>
                                </div>

                            </div>
                        </form>



                    </div>

                </div>
            </div>
        </div>









    </section>


    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
