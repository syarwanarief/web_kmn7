<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               TAMBAH DATA PENGEMBANGAN SDM
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('PengembanganSDM')?>"> <font face="Book Antiqua">Pengembangan SDM</font></a></li>
            <li class="active"><font face="Book Antiqua">Tambah</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section class="content">




        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <h3 class="box-title"><font face="Book Antiqua">&emsp; Cari No. Pekerja</font></h3>
                        <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            KEMBALI
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div  class="box-body">
                        <div class="col-md-6">
                    <form  action="#" method="get">
                        <div class="input-group">
                            <input type="text" name="np" required="" class="form-control" placeholder="Masukan Nopek">
                            <span class="input-group-btn">
                <button type="submit"  name="cari" id="search-btn" class="btn btn-success"><i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                    </form>
                        </div>

                    </div>
                </div>
            </div>
</div>



        <?php
        error_reporting(0);
        $page=$_GET['np'];
        if($page == !null)
        {

        ?>


                <?php if ($dataK == !0){?>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">


                    <a  href="<?php echo base_url('EditMaster') ?>">
                        <button  type="button" class="btn btn-primary pull-right">
                            <i class="glyphicon glyphicon-edit"></i>
                            Edit Master
                        </button>
                    </a>

				<p class="pull-right">&ensp;</p>


					<button data-toggle="modal" data-target="#tambahKPelatihan"  type="button" class="btn btn-primary pull-right">
						Tambah Kriteria Pelatihan
					</button>





            </div>
            <!-- /.box-header -->
            <!-- /.box-header -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('PengembanganSDM/Simpan') ?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><font face="Book Antiqua">Periode<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  placeholder="Periode" required="" name="periode">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Tanggal Penugasan (Tgl - Bulan -Tahun)<font size="4" class="merah"> *</font></font></label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text"  name="tpenugasan" required="" class="form-control pull-right" id="datepicker3">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Mulai Pelaksanaan (Tahun - Bulan -Tgl)<font size="4" class="merah"> *</font></label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text"  name="tmulai" required="" class="form-control datepicker pull-right" id="datepicker2">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Lokasi<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  required="" placeholder="Lokasi" required="" name="lokasi">
                            </div>

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Penyelenggara<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  placeholder="Penyelenggara" required="" name="penyelenggara">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Jumlah Peserta Dari PTPN7<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  placeholder="Jumlah Peserta Dari PTPN7" required="" name="jpeserta">
                            </div>


                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Daftar Peserta<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  placeholder="Masukan Daftar Peserta" required="" name="dpeserta">
                            </div>



                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Kepesertaan<font size="4" class="merah"> *</font></font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>

                                <input type="text" class="form-control" value=""  placeholder="Biaya Kepesertaan (Contoh : 10000 , 250000)" required="" name="kepesertaan">
                            </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">SPPD<font size="4" class="merah"> *</font></font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                <input type="text" class="form-control" value=""  placeholder="Biaya SPPD (Contoh : 10000 , 250000)" required="" name="sppd">
                            </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Tiket<font size="4" class="merah"> *</font></font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                <input type="text" class="form-control" value=""  placeholder="Biaya Tiket (Contoh : 10000 , 250000)" required="" name="tiket">
                            </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Penginapan<font size="4" class="merah"> *</font></font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                <input type="text" class="form-control" value=""  placeholder="Biaya Penginapan (Contoh : 10000 , 250000)" required="" name="penginapan">
                            </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><font face="Book Antiqua">Nomor Penugasan<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  placeholder="Nomor Penugasan" required="" name="npenugasan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Uraian<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value=""  placeholder="Uraian" required="" name="uraian">
                            </div>
                            <!-- /.form-group -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Tanggal Selesai Pelaksanaan (Tahun - Bulan -Tgl)<font size="4" class="merah"> *</font></label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" required="" name="takhir" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label><font face="Book Antiqua">Kriteria Pelatihan<font size="4" class="merah"> *</font></font></label>

                                <select class="form-control" name="kpelatihan" required="">
                                    <option value="">- Pilih Kriteria -</option>
                                   <?php foreach ($kpelatihan as $data): ?>
                                       <option value="<?php echo $data -> kode_pelatihan ?>"><?php echo $data->k_pelatihan ?></option>

                                <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Nopek<font size="4" class="merah"> *</font></font></label>
                                <input type="text" class="form-control" value="<?php echo $dataK->nopek ?>"  placeholder="Nopek" required="" name="nopek">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Nama</font></label>
                                <input type="text" class="form-control" value="<?php echo $dataK->nama ?>"  placeholder="Nama"  name="nama">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Jabatan</font></label>
                                <input type="text" class="form-control" value="<?php echo $dataK->jabatan ?>"  placeholder="Jabatan" name="jabatan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Golongan</font></label>
                                <input type="text" class="form-control" value="<?php echo $dataK->Gol ?>"  placeholder="Golongan" name="golongan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label><font face="Book Antiqua">Kandir/Distrik/Unit</font></label>
                                <input type="text" class="form-control" value="<?php echo $dataK->unit ?>"  placeholder="Unit"  name="unit">
                            </div>
                            <div class="form-group">
                                <label><font face="Book Antiqua">Lain-lain<font size="4" class="merah"> *</font></font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <b>Rp</b>
                                    </div>
                                <input type="text" class="form-control" value=""  placeholder="Biaya Lain-lain (Contoh : 10000 , 250000)" required="" name="lain">
                            </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <p class="help-block">Catatan : <font size="4" class="merah"> *</font> Wajib Diisi</p>



                    <button type="submit" class="btn btn-success" name="submit">
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                      TAMBAH
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
                    <?php } else {?>

            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Perigatan!</strong> <br/>No. Pekerja Tidak Ditemukan !
            </div>

                    <?php } ?>

        <?php  } ?>






		<div class="modal fade" id="tambahKPelatihan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Tambah Kriteria Pelatihan</h4>
					</div>
					<div class="modal-body">



						<form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('EditMaster/TambahKriteriaPelatihan/') ?>">



							<label><font face="Book Antiqua">Kriteria Pelatihan</font></label>
							<input type="text" class="form-control" id="tkp" placeholder="Kriteria Pelatihan" value="" required="" name="tkp" >


							<P></P>
							<button type="submit" class="btn btn-success" name="submitReset">
								<i class="glyphicon glyphicon-floppy-saved"></i>
								SIMPAN
							</button>

							<button type="button" data-dismiss="modal" class="btn btn-warning pull-right">
								<i class="glyphicon glyphicon-remove-circle"></i>
								BATAL
							</button>
						</form>


					</div>

				</div>
			</div>
		</div>




	</section>


    <!-- /.box-body -->



    <!-- /.row (main row) -->
</div>
