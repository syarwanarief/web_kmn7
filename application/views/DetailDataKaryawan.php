
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               DETAIL DATA KARYAWAN
              </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('DataKaryawan')?>"> <font face="Book Antiqua">Data Karyawan</font></a></li>
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


        <div class="row">
        <div class="col-md-4">
            <div  class="box box-primary">

                <!-- /.box-header -->
                <div class="box-body">



                <div class="table-responsive">

                    <table id="example" class="table table-bordered table-striped">


                        <tr>
                            <td><b>Nopek</b></td>
                            <td><?php echo $lihat->nopek ?> </td>
                        </tr>
                        <tr>
                            <td><b>Nama</b></td>
                            <td><?php echo $lihat->nama ?></td>
                        </tr>
                        <tr>
                            <td><b>Jabatan</b></td>
                            <td><?php echo $lihat->jabatan ?></td>
                        </tr>
                        <tr>
                            <td><b>Unit Kerja</b></td>
                            <td><?php echo $lihat->unit ?></td>
                        </tr>

                    </table>

                </div>
                </div>
            </div>
        </div>
        </div>

    </section>




    <section class="content">
        <!-- SELECT2 EXAMPLE -->



        <div class="box">

            <!-- /.box-header -->


            <div  class="box-body">



                <div class="table-responsive">

                    <table  id="example1" class="table table-bordered">
                        <thead>
                        <tr class="success">
                            <th colspan="2"><div align="center">Nomor </div> </th>
                            <th rowspan="2"><div align="center">Nama/Jenis Pelatihan</div></th>
                            <th colspan="3"><div align="center">Tanggal Pelaksanaan</div></th>
                            <th rowspan="2"><div align="center">Tempat</div></th>
                            <th colspan="2"><div align="center">Biaya</div></th>
                            <th rowspan="2"><div align="center">Jumlah</div></th>
                            <th rowspan="2"><div align="center">Laporan</div></th>

                        </tr>
                        <tr class="success">
                            <td><div align="center">Urut</div></td>
                            <td><div align="center">Surat Tugas</div></td>
                            <td><div align="center">Mulai</div></td>
                            <td><div align="center">Akhir</div></td>
                            <td><div align="center">Hari</div></td>
                            <td><div align="center">Kursus</div></td>
                            <td><div align="center">BPD</div></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach($pelatihan as $data):
                        ?>
                        <tr>

                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->no_tugas  ?></td>
                            <td><?php echo $data->k_pelatihan  ?></td>
                            <td><?php echo $data->t_mulai  ?></td>
                            <td><?php echo $data->t_akhir  ?></td>
                            <td><?php echo $data->jumlah_hari  ?></td>
                            <td><?php echo $data->lokasi  ?></td>
                            <td><?php echo $data->b_kepesertaan ?></td>
                            <td><?php echo $data->b_sppd+$data->b_tiket+$data->b_kepenginapan+$data->b_lain  ?></td>
                            <td><?php echo $data->b_jumlah ?></td>
                            <td>
                                <form role="form" method="get" enctype="multipart/form-data" action="<?php echo base_url('CekLaporan/')?>">


                                    <input type="hidden" class="form-control" id="no_tugas" value="<?php echo $data->no_tugas ?>" placeholder="no_tugas" required="" name="no_tugas">
                                    <input type="hidden" class="form-control" id="nopek" value="<?php echo $data->nopek ?>" placeholder="nopek" required="" name="nopek">

                                    <button  type="submit" class="btn btn-xs btn-success" name="submitReset">

                                        Cek Laporan
                                    </button>


                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <!-- /
        <?php
        //  $no = 1;
        //foreach($table as $data):
        //$id = $data->nopek;
        //$nama = $data->nama;
        //$level = $data->level;
        //$status = $data->status;

        ?>
 -->


    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
