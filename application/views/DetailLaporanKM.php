<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                DETAIL <?php echo $ksdet->kriteria ?>
               </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('LaporanDataKM')?>"> <font face="Book Antiqua">Laporan Data KM</font></a></li>
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
    <div class="box box-default">
        <div class="box-header with-border">


            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>

            <br />
            <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                <i class="glyphicon glyphicon-chevron-left"></i>
                KEMBALI
            </button>
        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('LaporanDataKM/Download') ?>">
        <div class="box-body">

            <input type="hidden"   class="form-control" value="<?php echo $ksdet ->id ?>" id="id" placeholder="id" required="" name="id">

            <input  type="hidden" class="form-control" value="<?php echo $ksdet ->kode_kriteria ?>" id="kriteria" placeholder="kriteria" required="" name="kriteria">

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label><font face="Book Antiqua">Nopek</font></label>
                        <input type="text" disabled="disabled"  class="form-control" value="<?php echo $ksdet ->nopek ?>" id="nopek" placeholder="nopek" required="" name="nopek">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label><font face="Book Antiqua">Nama Lengkap</font></label>
                        <input type="text" disabled="disabled"  class="form-control" value="<?php echo $ksdet ->nama ?>" id="nama" placeholder="Nama Lengkap" required="" name="nama">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label><font face="Book Antiqua">Jabatan</font></label>
                        <select class="form-control" disabled="disabled"  name="jabatan">
                            <option value="<?php echo $ksdet ->jabatan ?>"><?php echo $ksdet ->jabatan ?></option>

                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label><font face="Book Antiqua">Unit Kerja</font></label>
                        <select disabled="disabled"  class="form-control" name="unit">
                            <option value="<?php echo $ksdet ->unit ?>"><?php echo $ksdet ->unit ?></option>

                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group">
                <label><font face="Book Antiqua">Kata Kunci</font></label>
                <textarea disabled="disabled"  class="form-control" rows="3" required=""  placeholder="Masukan Kata Kunci" name="katakunci"><?php echo $ksdet ->kata_kunci ?></textarea>

            </div>


            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label><font face="Book Antiqua">Bidang</font></label>
                        <select disabled="disabled" class="form-control" name="bidang">
                            <option value="<?php echo $ksdet ->bidang ?>"><?php echo $ksdet ->bidang ?></option>
                            <option value="">- Pilih Bidang -</option>
                            <option value="Tanaman">Tanaman</option>
                            <option value="Teknik Dan Pengolahan">Teknik Dan Pengolahan</option>
                            <option value="Administrasi Keuangan">Administrasi Keuangan</option>
                            <option value="SDM Dan Umum">SDM Dan Umum</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><font face="Book Antiqua">Judul</font></label>
                        <input disabled="disabled"  type="text" value="<?php echo $ksdet ->judul ?>" class="form-control" id="judul" placeholder="Masukan Judul"  required="" name="judul">
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">





                        <div class="form-group">
                            <label for="kriteria"><font face="Book Antiqua">Kriteria</font></label>
                            <select class="form-control" disabled="disabled" id="kriteria2" onChange="changeTextBox();" name="kriteria2">
                                <option value="<?php echo $ksdet ->kriteria ?>"><?php echo $ksdet ->kriteria ?></option>
                                <option value="Knowledge Sharing">Knowledge Sharing</option>
                                <option value="Transfer Knowledge">Transfer Knowledge</option>
                                <option value="Karya Tulis Umum">Karya Tulis Umum</option>
                                <option value="Pengalaman Narasumber">Pengalaman Narasumber</option>
                            </select>
                        </div>





                    <?php
                    if($ksdet ->kode_kriteria == '1' or $ksdet ->kode_kriteria == '2' ){  //foto= dashboard
                    ?>
                    <div class="form-group">
                        <label for="surat"><font face="Book Antiqua">Surat Penugasan</font></label>
                        <input disabled="disabled"  type="text" value="<?php echo $ksdet ->surat_penugasan ?>" class="form-control" id="surat" placeholder="Masukan No Surat Penugasan (Jika Ada)" name="surat">
                    </div>
                    <?php } else {?>

                        <div class="form-group">
                            <label for="surat"><font face="Book Antiqua">Surat Penugasan</font></label>
                            <input type="text" value="KOSONG" disabled="disabled" class="form-control" id="surat" placeholder="Masukan No Surat Penugasan (Jika Ada)" name="surat">
                        </div>
                    <?php } ?>

                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <div class="form-group pull-left"">
                <button type="submit" name="submit" class="btn1"><i class="fa fa-download"></i> Download File</button><small>&emsp;<b><?php echo $ksdet ->file_word ?></b></small>
            </div>


            <div class="form-group pull-right">
                <button type="reset"  data-toggle="modal" data-target="#upl" name="upl" class="btn1"><i class="fa fa-upload"></i> Upload File</button><p>&emsp;<b>*Upload File PDF.</b></p>
            </div>

                <a class="pull-right">&ensp;</a>



            </form>



        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('LaporanDataKM/Reject') ?>">
            <div class="box-body">

                <input type="hidden"   class="form-control" value="<?php echo $ksdet ->id ?>" id="idq" placeholder="id" required="" name="idq">

                <input  type="hidden" class="form-control" value="<?php echo $ksdet ->kode_kriteria ?>" id="kriteriaq" placeholder="kriteria" required="" name="kriteriaq">


                <div class="form-group pull-right">
                    <button name="del"  class="btn2" role="button" ><i class="fa fa-exclamation-triangle"></i> Tidak Layak Publikasi </button>

                </div>
            </div></form>

                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>

        <script>
            function changeTextBox()
            {
                var val=$('#kriteria').val();

               // $('#surat').prop('disabled', true);

                if(val==='Knowledge Sharing' || val==='Transfer Knowledge')
                {
                    $('#surat').removeAttr("disabled");
                }
                else{$('#surat').prop('disabled', true);}
            }
        </script>






        <div class="modal fade" id="upl" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">UPLOAD FILE</h4>
                    </div>
                    <div class="modal-body">



                        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('LaporanDataKM/do_upload') ?>">
                            <div class="box-body">

                                <input type="hidden"   class="form-control" value="<?php echo $ksdet ->id ?>" id="idword" placeholder="idword" required="" name="idword">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Nopek</font></label>
                                            <input type="text" class="form-control" value="<?php echo $ksdet ->nopek ?>" id="nopek" placeholder="nopek" required="" name="nopek">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Nama Lengkap</font></label>
                                            <input type="text" class="form-control" value="<?php echo $ksdet ->nama ?>" id="nama" placeholder="Nama Lengkap" required="" name="nama">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Jabatan</font></label>
                                            <select class="form-control"  name="jabatan">
                                                <option value="<?php echo $ksdet ->jabatan ?>"><?php echo $ksdet ->jabatan ?></option>

                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Unit Kerja</font></label>
                                            <select class="form-control" name="unit">
                                                <option value="<?php echo $ksdet ->unit ?>"><?php echo $ksdet ->unit ?></option>

                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <div class="form-group">
                                    <label><font face="Book Antiqua">Kata Kunci</font></label>
                                    <textarea  class="form-control" rows="3" required=""  placeholder="Masukan Kata Kunci" name="katakunci"><?php echo $ksdet ->kata_kunci ?></textarea>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Bidang</font></label>
                                            <select class="form-control" name="bidang">
                                                <option value="<?php echo $ksdet ->kode_bidang ?>"><?php echo $ksdet ->bidang ?></option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label><font face="Book Antiqua">Judul</font></label>
                                            <input  type="text" value="<?php echo $ksdet ->judul ?>" class="form-control" id="judul" placeholder="Masukan Judul"  required="" name="judul">
                                        </div>
                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">





                                        <div class="form-group">
                                            <label for="kriteria"><font face="Book Antiqua">Kriteria</font></label>
                                            <select class="form-control"  id="kriteria2" onChange="changeTextBox();" name="kriteria2">
                                                <option value="<?php echo $ksdet ->kode_kriteria ?>"><?php echo $ksdet ->kriteria ?></option>

                                            </select>
                                        </div>





                                        <?php
                                        if($ksdet ->kode_kriteria == '1' or $ksdet ->kode_kriteria == '2' ){  //foto= dashboard
                                            ?>
                                            <div class="form-group">
                                                <label for="surat"><font face="Book Antiqua">Surat Penugasan</font></label>
                                                <input   type="text" value="<?php echo $ksdet ->surat_penugasan ?>" class="form-control" id="surat" placeholder="Masukan No Surat Penugasan (Jika Ada)" name="surat">
                                            </div>
                                        <?php } else {?>


                                        <?php } ?>

                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile"><font face="Book Antiqua">File input</font></label>
                                    <input name="pdf" type="file" required="" accept="application/pdf" class="form-control" placeholder="upload file ..">

                                    <p class="help-block"><font face="Book Antiqua">Input File Berformat PDF.</font></p>
                                </div>


                            <div class="form-group pull-right">
                                <button type="submit" name="submit" class="btn1"><i class="fa fa-upload"></i> Upload File</button><p>&emsp;<b>*Upload File PDF.</b></p>
                            </div>


                        </form>






                    </div>

                </div>
            </div>
        </div>




    </section>


        <!-- /.box-body -->



<!-- /.row (main row) -->
</div>