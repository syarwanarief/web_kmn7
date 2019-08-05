<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                INPUT LAPORAN
               </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Input Laporan</font></li>
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
            <p class="pull-right">&emsp;</p>
            <?php if($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){ ?>


                <a  href="<?php echo base_url('EditMaster') ?>">
                    <button  type="button" class="btn btn-primary pull-right">
                        <i class="glyphicon glyphicon-edit"></i>
                        Edit Master
                    </button>
                </a>


            <?php } ?>

        </div>
        <!-- /.box-header -->
        <!-- /.box-header -->
            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('LaporanUser/do_upload') ?>">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><font face="Book Antiqua">Nopek <font size="4" class="merah"> *</font></font></label>
                        <input type="text" class="form-control" value="<?php echo $input->nopek?>" id="nopek" placeholder="nopek" required="" name="nopek">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label><font face="Book Antiqua">Nama Lengkap</font></label>
                        <input type="text" class="form-control" value="<?php echo $input->nama?>" id="nama" placeholder="Nama Lengkap" required="" name="nama">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label><font face="Book Antiqua">Jabatan</font></label>
                        <input type="text" class="form-control" value="<?php echo $input->jabatan?>" id="jabatan" placeholder="jabatan" required="" name="jabatan">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label><font face="Book Antiqua">Unit Kerja</font></label>
                        <input type="text" class="form-control" value="<?php echo $input->unit?>" id="unit" placeholder="unit" required="" name="unit">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group">
                <label>Kata Kunci<font size="4" class="merah"> *</font></label>
                <textarea class="form-control" rows="3" required="" placeholder="Masukan Kata Kunci" name="katakunci"></textarea>
                </select>
            </div>


            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label><font face="Book Antiqua">Bidang <font size="4" class="merah"> *</font></font></label>
                        <select class="form-control" name="bidang">
                            <option value="">- Pilih Bidang -</option>
                            <?php foreach ($bidang as $mbidang): ?>
                            <option value="<?php echo $mbidang->kode_bidang ?>"><?php echo $mbidang->bidang ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label><font face="Book Antiqua">Judul <font size="4" class="merah"> *</font></font></label>
                        <input type="text" class="form-control" id="judul" placeholder="Masukan Judul"  required="" name="judul">
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="kriteria"><font face="Book Antiqua">Kriteria <font size="4" class="merah"> *</font></font></label>
                        <select class="form-control" id="kriteria" onChange="changeTextBox();" name="kriteria">
                            <option value="">- Pilih Kriteria -</option>
                            <?php foreach ($kriteria as $mkriteria): ?>
                                <option value="<?php echo $mkriteria->kode_kriteria ?>"><?php echo $mkriteria->kriteria ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="surat"><font face="Book Antiqua">Surat Penugasan</font></label>
                        <input type="text" disabled="disabled" class="form-control" id="surat" required="" placeholder="Masukan No Surat Penugasan (Jika Ada)" name="surat">
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <div class="form-group">
                <label for="exampleInputFile"><font face="Book Antiqua">File input <font size="4" class="merah"> *</font></font></label>
                <input name="word" type="file" required="" accept=".doc ,.docx" class="form-control" placeholder="upload file ..">

                <p class="help-block"><font face="Book Antiqua">Input File Berformat Word(doc/docx).</font></p>
              <p></p>
                <p class="help-block">Catatan : <font size="4" class="merah"> *</font> Wajib Diisi</p>
            </div>


                <button type="submit" class="btn btn-success" name="submit">
                    <i class="glyphicon glyphicon-floppy-saved"></i>
                   UPLOAD
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

        <script>
            function changeTextBox()
            {
                var val=$('#kriteria').val();

               // $('#surat').prop('disabled', true);

                if(val==='1' || val==='2')
                {
                    $('#surat').removeAttr("disabled");
                }
                else{$('#surat').prop('disabled', true);}
            }
        </script>








    </section>


        <!-- /.box-body -->



<!-- /.row (main row) -->
</div>