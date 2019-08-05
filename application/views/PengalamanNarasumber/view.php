
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
              PENGALAMAN NARASUMBER
              </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Pengalaman Narasumber</font></li>
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
            <div class="box-header">
                <button type="reset" class="btn btn-warning  btn-lg pull-left" data-toggle="modal" data-target="#topreview">
                    <i class="glyphicon glyphicon-star"></i>
                    Lihat Top 10 Review
                </button>
                <p class="pull-left">&ensp;</p>
                <button type="reset" class="btn btn-warning  btn-lg pull-left" data-toggle="modal" data-target="#toplike">
                    <i class="glyphicon glyphicon-star"></i>
                    Lihat Top 10 MVP
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pengalaman Narasumber</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                    <br />

                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                            <tr class="filters">
                                <th style="display:none;">ID</th>
                                <th><input type="text" class="form-control" placeholder="No" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Judul" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Nama" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Sub Bidang Karya Tulis" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Unit Kerja" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Keyword" disabled></th>
                                <th>Dilihat</th>
                                <th>Suka</th>
                                <th>Tidak Suka</th>
                                <th>Komentar</th>
                                <th>Detail</th>
                            </tr>
                            </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($getlike2 as $data):
                        ?>

                        <tr>
                            <td style="display:none;"><?php echo $data->id_post ?></td>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->judul ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->bidang ?></td>
                            <td><?php echo $data->unit?></td>
                            <td><?php echo $data->kata_kunci ?></td>
                            <td><?php echo $data->kunjungan ?></td>
                            <td><?php echo $data->suka ?></td>
                            <td><?php echo $data->taksuka ?></td>
                            <th><?php echo $data->JumlahKomen ?></th>
                            <td>  <a href="<?php echo base_url('PengalamanNarasumber/Viewer/').base64_encode($data->id."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                    Lihat
                                </a>
                            </td>

                        </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Nama</th>
                        <th>Sub Bidang Karya Tulis</th>
                        <th>UnitKerja</th>
                        <th>Key Word</th>
                        <th>Dilihat</th>
                        <th>Suka</th>
                        <th>Tidak Suka</th>
                        <th>Komentar</th>
                        <th>Detail</th>
                    </tr>
                    </tfoot>
                </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>




        <div class="modal fade" id="toplike" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">TOP 10 MVP</h4>
                    </div>
                    <div class="modal-body">

                        <table id="example" class="table table-striped">
                            <thead>
                            <tr class="success">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jumlah Suka</th>
                                <th>Detail</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $a = 0;
                            foreach($getlike2 as $data):
                                if ($a == 10){ break; }
                                ?>

                                <tr >
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->judul ?></td>
                                    <td><?php echo $data->suka ?></td>
                                    <td>  <a href="<?php echo base_url('PengalamanNarasumber/View/').base64_encode($data->id."-".base64_encode("PTPN7J@Y@"))  ?>" class="btn btn-xs btn-primary">
                                            Lihat
                                        </a>
                                    </td>

                                </tr>
                                <?php
                                $a++;
                            endforeach;
                            ?>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jumlah Suka</th>
                                <th>Detail</th>


                            </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>
        </div>




        <div class="modal fade" id="topreview" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">TOP 10 REVIEW</h4>
                    </div>
                    <div class="modal-body">

                        <table id="example" class="table table-striped">
                            <thead>
                            <tr class="success">

                                <th>Judul</th>
                                <th>Nama Penulis</th>
                                <th>Jumlah Review</th>
                                <th>Detail</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $a = 0;
                            foreach($getlike2 as $data):
                                if ($a == 10){ break; }
                                ?>

                                <tr >

                                    <td><?php echo $data->judul ?></td>
                                    <td><?php echo $data->nama ?></td>
                                    <td><?php echo $data->JumlahKomen ?></td>
                                    <td>  <a href="<?php echo base_url('PengalamanNarasumber/View/').base64_encode($data->id."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                            Lihat
                                        </a>
                                    </td>

                                </tr>
                                <?php
                                $a++;
                            endforeach;
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>

                                <th>Judul</th>
                                <th>Nama Penulis</th>
                                <th>Jumlah Review</th>
                                <th>Detail</th>

                            </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>
        </div>





    </section>
<!-- right col (We are only adding the ID to make the widgets sortable)-->

<!-- right col -->
</div>
<!-- /.row (main row) -->
