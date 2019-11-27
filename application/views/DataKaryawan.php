
<div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                DAFTAR KOMPOSISI KARYAWAN
             </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Data Karyawan</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section class="content">
        <!-- SELECT2 EXAMPLE -->




        <div class="preloader">
            <div class="loading">
                <div align="center">

                    <img  src="<?php echo base_url('assets/images/Loading1.GIF') ?>" width="20%">
                    <p></p>
                    <p ><strong>Harap Tunggu, Sedang Memuat Halaman.</strong></p>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div  class="box-body">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Karyawan</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                    <br />
                <div class="table-responsive">

                <table id="exampleFt" class="table table-bordered table-striped">

                    <thead>
                    <tr class="primary filters">
                        <th><input type="text" class="form-control" placeholder="No" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nopek" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nama Karyawan" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Gol" disabled></th>
                        <th><input type="text" class="form-control" placeholder="MKG" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Jabatan" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Bag./Unit Kerja" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Agama" disabled></th>
                        <th><input type="text" class="form-control" placeholder="T. Lahir" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tgl Masuk Kerja" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tgl MBT" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Tgl Pensiun" disabled></th>
                        <th>Kartu Pelatihan</th>

                    </tr>
                    </thead>
                    <tbody>


                    <?php
                    $no = 1;
                    foreach($k as $data):
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->nopek ?></td>
                            <td><?php echo $data->nama ?>
                            <td><?php echo $data-> Gol ?></td>
                            <td><?php echo $data->MKG ?></td>
                            <td><?php echo $data->jabatan ?>
                            <td><?php echo $data->unit ?></td>
                            <td><?php echo $data->Agama ?></td>
                            <td><?php echo $data->Tgl_Lahir ?>
                            <td><?php echo $data-> Tgl_Masuk_Kerja ?></td>
                            <td><?php echo $data->Tgl_MBT ?></td>
                            <td><?php echo $data->Tgl_Pensiun ?>
                            <td>

                                <a href="<?php echo base_url('DataKaryawan/detail/').base64_encode($data->nopek."-".base64_encode("PTPN7J@Y@")) ?>" target="blank" class="btn btn-xs btn-primary">
                                    Lihat
                                </a>
                            </td>

                        </tr>
                    <?php endforeach ?>


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nopek</th>
                        <th>Nama Karyawan</th>
                        <th>Gol</th>
                        <th>MKG</th>
                        <th>Jabatan</th>
                        <th>Bag./UNIT Kerja</th>
                        <th>Agama</th>
                        <th>T. Lahir</th>
                        <th>Tgl Masuk Kerja</th>
                        <th>Tgl MBT</th>
                        <th>Tgl Pensiun</th>
                        <th>Kartu Pelatihan</th>

                    </tr>
                    </tfoot>
                </table>
                </div>
                </div>
            </div>
        </div>

            </div>
            <!-- /.box-body -->
        </div>

</section>
<!-- right col (We are only adding the ID to make the widgets sortable)-->

<!-- right col -->
</div>
<!-- /.row (main row) -->
