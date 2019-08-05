<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               DETAIL KARYAWAN
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('DataKaryawan/Ubah')?>"> <font face="Book Antiqua">Ubah Data Karyawan</font></a></li>
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

                <b><H4>Detail Karyawan</H4></b>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div>




                <div class="box-body">


                    <div class="row">

                        <div class="col-md-6">


                            <div class="form-group">
                                <label><font face="Book Antiqua">Nopek</font></label>
                                <input type="text" disabled="disabled" class="form-control"  value="<?php echo $data->nopek ?>" id="NOPEK" placeholder="NOPEK" required="" name="NOPEK">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">No SAP</font></label>
                                <input type="text" class="form-control" value="<?php echo $data->No_SAP ?>"  id="SAP2" placeholder="SAP" required="" name="SAP">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Lokasi Unit Kerja</font></label>
                                <input type="text" class="form-control"  value="<?php echo $data->unit ?>" id="LOKUNIT2" placeholder="Lokasi Unit Kerja" required="" name="LOKUNIT">
                            </div>


                            <div class="form-group">
                                <label><font face="Book Antiqua">Strata</font></label>
                                <input type="text" class="form-control"  value="<?php echo $data->Strata ?>" id="STRATA2" placeholder="STRATA" required="" name="STRATA">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Golongan</font></label>
                                <input type="text" class="form-control" value="<?php echo $data->Gol ?>" id="GOL2" placeholder="GOL" required="" name="GOL">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">MKG</font></label>
                                <input type="text" class="form-control"  id="MKG2" value="<?php echo $data->MKG ?>" placeholder="MKG" required="" name="MKG">
                            </div>


                            <div class="form-group">
                                <label><font face="Book Antiqua">Kode CC</font></label>
                                <input type="text"  class="form-control"  id="KODECC2" value="<?php echo $data->Kode_CC ?>" placeholder="KODECC" required="" name="KODECC">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">CC</font></label>
                                <input type="text" class="form-control"  id="CC2" placeholder="CC" value="<?php echo $data->CC ?>" required="" name="CC">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Agama</font></label>
                                <input type="text" class="form-control"  id="AGAMA2" placeholder="AGAMA" value="<?php echo $data->Agama ?>" required="" name="AGAMA">
                            </div>


                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label><font face="Book Antiqua">Nama Lengkap</font></label>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $data->nama ?>"  id="NAMA" placeholder="Nama Lengkap" required="" name="NAMA">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Status</font></label>
                                <input type="text" class="form-control"  id="STATUS2" placeholder="STATUS" required="" value="<?php echo $data->Status ?>" name="STATUS">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Unit</font></label>
                                <input type="text" class="form-control"  id="UNIT2" placeholder="UNIT" required="" value="<?php echo $data->unit ?>" name="UNIT">
                            </div>


                            <div class="form-group">
                                <label><font face="Book Antiqua">Position</font></label>
                                <input type="text" class="form-control"  id="POSITION2" placeholder="POSITION" required="" value="<?php echo $data->Position ?>" name="POSITION">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">JABATAN</font></label>
                                <input type="text" class="form-control"  id="JABATAN2" placeholder="JABATAN" required="" value="<?php echo $data->jabatan ?>" name="JABATAN">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Bidang Tugas</font></label>
                                <input type="text" class="form-control"  id="BTUGAS2" placeholder="BIDANG TUGAS" required="" value="<?php echo $data->Bidang_Tugas ?>" name="BTUGAS">
                            </div>

                            <div class="form-group">
                                <label><font face="Book Antiqua">Tgl Cuti Tahunan</font></label>
                                <input type="text" class="form-control"  id="TCTAHUNAN2" placeholder="TCTAHUNAN" value="<?php echo $data->Tgl_Cuti_Tahunan ?>" required="" name="TCTAHUNAN">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Leaving</font></label>
                                <input type="text" class="form-control"  value="<?php echo $data->Leaving ?>" id="LEAVING2" placeholder="LEAVING" required="" name="LEAVING">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Tgl Cuti Panjang</font></label>
                                <input type="text" class="form-control"  id="TCPANJANG2" placeholder="TCPANJANG" value="<?php echo $data->Tgl_Cuti_Panjang ?>" required="" name="TCPANJANG">
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>


        </div>
    </section>


    <!-- /.box-body -->



    <!-- /.row (main row) -->
</div>