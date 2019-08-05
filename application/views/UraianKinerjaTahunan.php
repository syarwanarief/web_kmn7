
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                KINERJA TAHUNAN
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Kinerja Tahunan</font></li>
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
                <form action="<?php echo base_url('KinerjaTahunan/RangeTahun') ?>" method="post">
                <div class="input-group">
                    <input type="hidden" class="form-control" value="<?php echo $all->id_uraian?>" name="idUra" required="" placeholder="Masukan Uraian">

                    <select class="form-control" name="tahun" required="">
                        <option value="">- Tampilkan Range Tahun -</option>

                        <?php foreach ($th as $data): ?>
                            <option value="<?php echo $data -> tahun ?>">Dari Tahun <?php echo $data->tahun ?></option>

                        <?php endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success"><i class="fa fa-search"></i>
                </button>
              </span>





                <a  href="<?php echo base_url('KinerjaTahunan/Tambah') ?>">
                    <button  type="button" class="btn btn-primary pull-right">
                        <i class="glyphicon glyphicon-edit"></i>
                        Tambah Data
                    </button>
                </a>
                </div>
                </form>

            </div>
            <!-- /.box-header -->
            <div  class="box-body">

                <div class="table-responsive">

                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr class="success">
                            <th rowspan="2"><center>NO</center></th>
                            <th rowspan="2"><center>URAIAN</center></th>
                            <th rowspan="2"><center>SATUAN</center></th>
                            <th rowspan="2"><center>KET</center></th>
                            <th colspan="6"><center>Tahun</center></th>
                        </tr>

                        <tr class="success">
                            <?php
                            foreach ($thn as $data):

                                ?>
                                <th><?php echo $data->tahun ?></th>
                            <?php endforeach; ?>
                        </tr>

                        </thead>
                        <?php
                        $no = 1;
                        foreach ($k as $kn):

                            ?>
                            <tr>
                                <td rowspan="3"><div align="center"><?php echo $no++ ?></div></td>
                                <td rowspan="3"><div align="center"><?php echo $kn->uraian ?></div></td>
                                <td rowspan="3"><center><?php echo $kn->satuan ?></center></td>
                                <td>RKAP</td>
                                <?php
                                foreach ($rkap as $data):

                                    ?>
                                    <td><?php echo $data->rkap ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td>REAL</td>
                                <?php
                                foreach ($real as $data):

                                    ?>
                                    <td><?php echo $data->real2 ?></td>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <td>%</td>
                                <?php
                                foreach ($persen as $data):

                                    ?>
                                    <td><?php echo $data->persen ?></td>
                                <?php endforeach; ?>
                            </tr>


                        <?php endforeach; ?>


                    </table>


                    <br/>

                    <div class="box-footer">
                        Pilih  <a href="#" data-toggle="modal" data-target="#editD<?php echo $all->id_uraian ?>"> ubah </a> untuk mengubah data <br /> atau pilih <a href="#" data-toggle="modal" data-target="#Hapus<?php echo $all->id_uraian ?>">hapus</a> untuk mengahpus data.
                    </div>



                </div>

            </div>
            <!-- /.box-body -->


        </div>



    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#fa-icons" data-toggle="tab">Grafik</a></li>
                    <li><a href="#glyphicons" data-toggle="tab">Keterangan</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Font Awesome Icons -->
                    <div class="tab-pane active" id="fa-icons">
                        <section id="new">

                            <div id="graph"></div>

                        </section>
                    </div>
                    <!-- /#fa-icons -->

                    <!-- glyphicons-->
                    <div class="tab-pane" id="glyphicons">
                        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('KinerjaTahunan/Keterangan') ?>">
                            <input type="hidden" class="form-control" value="<?php echo $all->id_uraian?>" id="id" placeholder="id" required="" name="id">

                            <div class="form-group">

                                <textarea class="form-control" rows="3" required="" placeholder="Masukan Keterangan" name="keterangan"><?php echo $kett->keterangan?></textarea>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success" name="submit">
                                <i class="glyphicon glyphicon-floppy-saved"></i>
                                SIMPAN
                            </button>

                        </form>

                    </div>
                    <!-- /#ion-icons -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- right col -->




    <section>


        <div class="modal fade" id="Hapus<?php echo $all->id_uraian ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pilih Data Yang Akan Di Hapus</h4>
                    </div>
                    <div class="modal-body">


                        <form  action="<?php echo base_url('KinerjaTahunan/HapusDataTahun') ?>" method="post">




                                <input type="hidden" class="form-control" value="<?php echo $all->id_uraian?>" name="hidUra" required="" placeholder="Masukan Uraian">


                            <div class="form-group">
                                <label><font face="Book Antiqua">Pilih Tahun</font></label>

                                <select class="form-control" name="hthUra" required="">
                                    <option value="">- Pilih Tahun -</option>
                                    <?php foreach ($th as $data): ?>
                                        <option value="<?php echo $data -> tahun ?>"><?php echo $data->tahun ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- /.form-group -->
                            <button type="submit" id="submit" class="btn btn-success">Hapus</i></button>

                            <!-- /.col -->


                            <!-- /.col -->
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </section>



    <section>


        <div class="modal fade" id="editD<?php echo $all->id_uraian ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Pilih Data Yang Akan Di Edit</h4>
                    </div>
                    <div class="modal-body">


                        <form  action="<?php echo base_url('KinerjaTahunan/Edit') ?>" method="post">




                            <input type="hidden" class="form-control" value="<?php echo $all->id_uraian?>" name="idUra" required="" placeholder="Masukan Uraian">


                            <div class="form-group">
                                <label><font face="Book Antiqua">Pilih Tahun</font></label>

                                <select class="form-control" name="thUra" required="">
                                    <option value="">- Pilih Tahun -</option>
                                    <?php foreach ($th as $data): ?>
                                        <option value="<?php echo $data -> tahun ?>"><?php echo $data->tahun ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- /.form-group -->
                            <button type="submit" id="submit" class="btn btn-success">Cari</i></button>

                            <!-- /.col -->


                            <!-- /.col -->
                        </form>


                    </div>

                </div>
            </div>
        </div>

    </section>



</div>
<!-- /.row (main row) -->

