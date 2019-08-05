<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
            UPDATE PROFIL
               </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Dashboard</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>


    <section class="content">
        <div class="row">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border" align="center">
                <h3 class="box-title"><font face="Book Antiqua">Update Foto</font></h3>
            </div>
            <!-- /.box-header -->

                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/do_upload') ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="nopek" placeholder="No. Induk Karyawan" required="" name="nopek" value="<?php echo $edit->nopek?>" >
                        </div>

                        <div class="col-xs-6 col-md-12">
                            <a class="thumbnail">
                                <?php
                                if($user['foto'] == 'fotoDefault'){  //foto= dashboard
                                    ?>
                                    <img width="150px" height="150px" src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" >
                                <?php } else { ?>
                                    <img width="150px" height="150px" src="<?php echo base_url('fotoProfil/') . $this->session->userdata('foto'); ; ?>" >

                                <?php } ?>
                            </a>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile"><font face="Book Antiqua">Ganti Foto</font></label>
                            <input name="photo" required="" accept="image/jpeg, image/jpg, image/png" type="file" class="form-control" placeholder="foto Lama ..">

                            <p class="help-block"><font face="Book Antiqua">Format Foto : PNG Dan JPG.</font></p>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" name="submit">
                            <i class="glyphicon glyphicon-floppy-saved"></i>
                            SIMPAN
                        </button>

                        <button type="reset" class="btn btn-warning">
                            <i class="glyphicon glyphicon-repeat"></i>
                            RESET
                        </button>
                        <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            KEMBALI
                        </button>

                    </div>
                </form>

        </div>
    </div>


    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border" align="center">
                <h3 class="box-title"><font face="Book Antiqua">Update Data</font></h3>
            </div>
            <!-- /.box-header -->
            <!-- message -->

            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('profile/update') ?>">
                <div class="box-body">


                    <div class="form-group">
                        <label for="inisial"><font face="Book Antiqua">Inisial</font></label>
                        <input type="text" class="form-control" id="inisial" placeholder="Inisial" required="" name="inisial" value="<?php echo $edit->inisial?>" >
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer">
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


            <form role="form" method="post" action="<?php echo base_url('profile/updatePassword') ?>">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="nopek" placeholder="No. Induk Karyawan" required="" name="nopek" value="<?php echo $edit->nopek?>" >
                    </div>
                    <div class="form-group">
                        <label for="password"><font face="Book Antiqua">Password Baru</font></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required="">
                    </div>

                    <div class="form-group">
                        <label for="password"><font face="Book Antiqua">Konfirmasi Password Baru</font></label>
                        <input type="password" class="form-control" id="passwordb" name="passwordb" placeholder="Password" value="" required="">
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success" name="submit">
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                     UBAH PASSWORD
                    </button>

                    <button type="reset" class="btn btn-warning">
                        <i class="glyphicon glyphicon-repeat"></i>
                        RESET
                    </button>


                </div>
            </form>



        </div>
    </div>
        </div>


        <script type="text/javascript">
            window.onload = function () {
                document.getElementById("password").onchange = validatePassword;
                document.getElementById("passwordb").onchange = validatePassword;
            }

            function validatePassword(){
                var pass1=document.getElementById("password").value;
                var pass2=document.getElementById("passwordb").value;

                if(pass1 != pass2)

                    document.getElementById("passwordb").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                else
                    document.getElementById("passwordb").setCustomValidity('');

            }
        </script>

</section>

    <!-- right col (We are only adding the ID to make the widgets sortable)-->

</div>
<!-- /.row (main row) -->
