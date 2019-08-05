
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               UBAH DAFTAR KOMPOSISI KARYAWAN
             </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Ubah Data Karyawan</font></li>
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

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah" name="tambah">
                    <i class="glyphicon glyphicon-plus"></i>
                    TAMBAH DATA
                </button>
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
                                <th>Opsi</th>

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

                                        <a href="<?php echo base_url('DataKaryawan/ViewDetail/').base64_encode($data->nopek."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-success" target="_blank" >
                                            Detail
                                        </a>
                                        <a href="<?php echo base_url('DataKaryawan/Edit/').base64_encode($data->nopek."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary" target="_blank">
                                            Edit
                                        </a>
                                        <a href="<?php echo base_url('DataKaryawan/Delete/').base64_encode($data->nopek."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-danger" onClick="return confirm('Hapus Akun ?');">
                                            Hapus
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>


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
                                <th>Opsi</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>




</section>

    <section>


        <!-- MODAL Tambah -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">




            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">TAMBAH DATA KARYAWAN</h4>
                    </div>
                    <div class="modal-body">



                        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('DataKaryawan/ADD/') ?>">

                        <div class="box-body">


                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Nopek</font></label>
                                            <input type="text" class="form-control"  id="nopek7" placeholder="Masukan Nopek" required="" name="nopek7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">No SAP</font></label>
                                            <input type="text" class="form-control"  id="sap7" placeholder="Masukan SAP" required="" name="sap7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Lokasi Unit Kerja</font></label>
                                            <input type="text" class="form-control"  id="lokunit7" placeholder="Masukan Lokasi Unit Kerja" required="" name="lokunit7">
                                        </div>


                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Strata</font></label>
                                            <input type="text" class="form-control"  id="Strata7" placeholder="Strata" required="" name="strata7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Golongan</font></label>
                                            <input type="text" class="form-control"  id="gol7" placeholder="Golongan" required="" name="gol7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">MKG</font></label>
                                            <input type="text" class="form-control"  id="mkg7" placeholder="MKG" required="" name="mkg7">
                                        </div>


                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Kode CC</font></label>
                                            <input type="text"  class="form-control"  id="kodecc7" placeholder="Kode CC" required="" name="kodecc7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">CC</font></label>
                                            <input type="text" class="form-control"  id="cc7" placeholder="CC" required="" name="cc7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Agama</font></label>
                                            <input type="text" class="form-control"  id="agama7" placeholder="Masukan Agama" required="" name="agama7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Gol Darah</font></label>
                                            <input type="text" class="form-control"  id="darah7" placeholder="Gol. Darah" required="" name="darah7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Suku</font></label>
                                            <input type="text" class="form-control"  id="suku7" placeholder="Suku" required="" name="suku7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Jenis Kelamin</font></label>
                                            <input type="text" class="form-control"  id="jk7" placeholder="Jenis Kelamin" required="" name="jk7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Tgl Lahir</font></label>
                                            <input type="text" class="form-control"  id="lahir7" placeholder="Tgl Lahir" required="" name="lahir7">
                                        </div>


                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Nama Lengkap</font></label>
                                            <input type="text" class="form-control"  id="nama7" placeholder="Nama Lengkap" required="" name="nama7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Status</font></label>
                                            <input type="text" class="form-control"  id="status7" placeholder="Masukan Status" required="" name="status7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Unit</font></label>
                                            <input type="text" class="form-control"  id="unit7" placeholder="Masukan Unit Kerja" required="" name="unit7">
                                        </div>


                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Position</font></label>
                                            <input type="text" class="form-control"  id="position7" placeholder="Masukan Position" required="" name="position7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">JABATAN</font></label>
                                            <input type="text" class="form-control"  id="jabatan7a" placeholder="Masukan Jabatan" required="" name="jabatan7a">
                                        </div>


                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Bidang Tugas</font></label>
                                            <input type="text" class="form-control"  id="btugas7" placeholder="Bidang Tugas" required="" name="btugas7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Tgl Cuti Tahunan</font></label>
                                            <input type="text" class="form-control"  id="tctahunan7" placeholder="Tgl Cuti Tahunan" required="" name="tctahunan7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Leaving</font></label>
                                            <input type="text" class="form-control"  id="leaving7" placeholder="LEAVING" required="" name="leaving7">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Tgl Cuti Panjang</font></label>
                                            <input type="text" class="form-control"  id="tcpanjang7" placeholder="Tgl Cuti Panjang" required="" name="tcpanjang7">
                                        </div>


                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Tgl Pensiun</font></label>
                                            <input type="text" class="form-control"  id="pensiun7" placeholder="Tgl Pensiun" required="" name="pensiun7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">TGL_MBT</font></label>
                                            <input type="text" class="form-control"  id="mbt7" placeholder="Tgl MBT" required="" name="mbt7">
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Tgl Masuk Kerja</font></label>
                                            <input type="text" class="form-control"  id="tmkerja7" placeholder="Tgl Masuk Kerja" required="" name="tmkerja7">
                                        </div>



                                    </div>
                                    <!-- /.col -->
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                                    <button  type="submit" class="btn btn-info" id="submit" name="submit">Simpan</button>
                                </div>


                        </form>






                    </div>

                </div>
            </div>






        </div>
        <!--END MODAL tambah-->



    </section>


<!-- right col (We are only adding the ID to make the widgets sortable)-->

<!-- right col -->
</div>
<!-- /.row (main row) -->


