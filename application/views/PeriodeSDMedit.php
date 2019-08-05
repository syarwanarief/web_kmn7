<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                EDIT DATA PENGEMBANGAN SDM
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('PengembanganSDM')?>"> <font face="Book Antiqua">Pengembangan SDM</font></a></li>
            <li class="active"><font face="Book Antiqua">Edit</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section class="content">


        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    KEMBALI
                </button>

            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('PengembanganSDM/Update') ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><font face="Book Antiqua">Periode</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->periode ?>"  placeholder="Periode" required="" name="periode">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Tanggal Penugasan (Tgl - Bulan -Tahun)</font></label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="<?php echo $EditSDM->t_tugas ?>"  name="tpenugasan" required="" class="form-control pull-right" id="tgl3">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Mulai Pelaksanaan (Tahun - Bulan -Tgl)</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="<?php echo $EditSDM->t_mulai ?>" name="tmulai" required="" class="form-control pull-right" id="tgl2">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Lokasi</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->lokasi ?>"   required="" placeholder="Lokasi" required="" name="lokasi">
                            </div>

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Penyelenggara</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->penyelenggara ?>"   placeholder="Penyelenggara" required="" name="penyelenggara">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Jumlah Peserta</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->j_peserta ?>"   placeholder="Jumlah Peserta" required="" name="jpeserta">
                            </div>


                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Daftar Peserta</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->dpeserta ?>"  placeholder="Masukan Daftar Peserta" required="" name="dpeserta">
                            </div>



                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Kepesertaan</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>

                                    <input type="text" class="form-control" value="<?php echo $EditSDM->b_kepesertaan ?>"   placeholder="Biaya Kepesertaan (Contoh : 10000 , 250000)" required="" name="kepesertaan">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">SPPD</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $EditSDM->b_sppd ?>"   placeholder="Biaya SPPD (Contoh : 10000 , 250000)" required="" name="sppd">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Tiket</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $EditSDM->b_tiket ?>"   placeholder="Biaya Tiket (Contoh : 10000 , 250000)" required="" name="tiket">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Penginapan</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $EditSDM->b_kepenginapan ?>"   placeholder="Biaya Penginapan (Contoh : 10000 , 250000)" required="" name="penginapan">
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><font face="Book Antiqua">Nomor Penugasan</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->no_tugas ?>"   placeholder="Nomor Penugasan" required="" name="npenugasan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Uraian</font></label>
                                <input type="text" class="form-control" value="<?php echo $EditSDM->uraian ?>"   placeholder="Uraian" required="" name="uraian">
                            </div>
                            <!-- /.form-group -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Selesai Pelaksanaan (Tahun - Bulan -Tgl)</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" required="" value="<?php echo $EditSDM->t_akhir ?>"  name="takhir" class="form-control pull-right" id="tgl">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label><font face="Book Antiqua">Kriteria Pelatihan</font></label>

                                <select class="form-control" name="kpelatihan" required="">

                                    <option value="<?php echo $EditSDM -> kode_pelatihan ?>"><?php echo $EditSDM->k_pelatihan ?></option>
                                    <option value="">- Pilih Kriteria -</option>
                                    <?php foreach ($kpelatihan as $data): ?>
                                        <option value="<?php echo $data -> kode_pelatihan ?>"><?php echo $data->k_pelatihan ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Nopek</font></label>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $EditSDM->nopek ?>"  placeholder="Nopek" required="" name="nopek2">
                                <input type="hidden" class="form-control" value="<?php echo $EditSDM->nopek ?>"  placeholder="Nopek" required="" name="nopek">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Nama</font></label>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $EditSDM->nama ?>"  placeholder="Nama" required="" name="nama">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Jabatan</font></label>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $EditSDM->jabatan ?>"  placeholder="Jabatan" required="" name="jabatan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Golongan</font></label>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $EditSDM->Gol ?>"  placeholder="Golongan" required="" name="golongan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Kandir/Distrik/Unit</font></label>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $EditSDM->unit ?>"  placeholder="Unit" required="" name="unit">
                            </div>
                            <div class="form-group">
                                <label><font face="Book Antiqua">Lain-lain</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo $EditSDM->b_lain ?>"   placeholder="Biaya Lain-lain (Contoh : 10000 , 250000)" required="" name="lain">
                                </div>
                            </div>

                            <input type="hidden" class="form-control" value="<?php echo $EditSDM->id_laporan ?>"   placeholder="id" required="" name="id">
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->




                    <button type="submit" class="btn btn-success" name="submit">
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                        SIMPAN
                    </button>

                    <button type="reset" class="btn btn-warning">
                        <i class="glyphicon glyphicon-repeat"></i>
                        RESET
                    </button>



                </div>
            </form>
            <!-- /.form-group -->

            <!-- /.form-group -->
        </div>

    </section>


    <!-- /.box-body -->



    <!-- /.row (main row) -->
</div>