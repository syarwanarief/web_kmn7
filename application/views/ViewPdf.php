
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                <?php echo $ksdet->kriteria ?>
               </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Pdf</font></li>
        </ol>

        <!-- message end -->
    </section>




    <section  class="content">


        <style>
            .posts-wrapper1 {
                width: 50%;
                margin: 20px auto;
                border: 1px solid #eee;
            }
            .post1 {
                width: 90%;
                margin: 20px auto;
                padding: 10px 5px 0px 5px;
                border: 1px solid green;
            }
            .post-info1 {
                margin: 10px auto 0px;
                padding: 5px;
            }

            .fa-thumbs-down, .fa-thumbs-o-down {
                transform:rotateY(180deg);
            }
            .logged_in_user1 {
                padding: 10px 30px 0px;
            }
            i2 {
                color: blue;
            }
        </style>

        <!-- SELECT2 EXAMPLE -->

        <div class="row">
            <div class="col-md-9">
                <div  class="box box-primary">
                    <div class="box-header with-border">
                        <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            KEMBALI
                        </button>
                        <h4>Judul : <?php echo $ksdet->judul ?></h4>


                    </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div>
                    <embed src="<?php echo base_url('LaporanPdf/'). $ksdet->file_pdf ?>" type='application/pdf' width='100%' height='400px'/>
                </div>
                            <p><hr width="100%"> </p>

                <?php if($ksdet->kode_kriteria == '1'){ ?>

                <!-- KS -->

                    <?php

                    if($countlike){?>


                        <a href="<?php echo base_url('KnowledgeSharing/unLike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-up fa-lg like-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('KnowledgeSharing/Like/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-o-up fa-lg like-btn"> </i2></a>

                    <?php } ?> &nbsp;
                    <b><?php echo $getlike->num_rows() ?> Suka</b>


                    &emsp;&nbsp;&emsp;&nbsp;
                    &emsp;&nbsp;
                    <?php if($countdislike){?>


                        <a href="<?php echo base_url('KnowledgeSharing/unDislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-down fa-lg dislike-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('KnowledgeSharing/Dislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-o-down fa-lg dislike-btn"> </i2></a>

                    <?php } ?>
                    &emsp;<b><?php echo $getdislike->num_rows() ?> Tidak Suka</b>



                    <span class="pull-right text-muted"> <?php echo  $Jkomen->num_rows(); ?> Komentar</span>




            <?php }if($ksdet->kode_kriteria == '2'){ ?>
                <!-- TK-->


                    <?php

                    if($countlike){?>


                        <a href="<?php echo base_url('TransferKnowledge/unLike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-up fa-lg like-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('TransferKnowledge/Like/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-o-up fa-lg like-btn"> </i2></a>

                    <?php } ?> &nbsp;
                    <b><?php echo $getlike->num_rows() ?> Suka</b>


                    &emsp;&nbsp;&emsp;&nbsp;
                    &emsp;&nbsp;
                    <?php if($countdislike){?>


                        <a href="<?php echo base_url('TransferKnowledge/unDislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-down fa-lg dislike-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('TransferKnowledge/Dislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-o-down fa-lg dislike-btn"> </i2></a>

                    <?php } ?>
                    &emsp;<b><?php echo $getdislike->num_rows() ?> Tidak Suka</b>



                    <span class="pull-right text-muted"> <?php echo  $Jkomen->num_rows(); ?> Komentar</span>



            <?php } else if($ksdet->kode_kriteria == '3'){ ?>
                <!-- KT -->


                    <?php
                    echo "<b style='display:none;'>$ksdet->id</b> ";
                    if($countlike){?>


                        <a href="<?php echo base_url('KaryaTulis/unLike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-up fa-lg like-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('KaryaTulis/Like/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-o-up fa-lg like-btn"> </i2></a>

                    <?php } ?> &nbsp;
                    <b><?php echo $getlike->num_rows() ?> Suka</b>


                    &emsp;&nbsp;&emsp;&nbsp;
                    &emsp;&nbsp;
                    <?php if($countdislike){?>


                        <a href="<?php echo base_url('KaryaTulis/unDislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-down fa-lg dislike-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('KaryaTulis/Dislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-o-down fa-lg dislike-btn"> </i2></a>

                    <?php } ?>
                    &emsp;<b><?php echo $getdislike->num_rows() ?> Tidak Suka</b>



                    <span class="pull-right text-muted"> <?php echo  $Jkomen->num_rows(); ?> Komentar</span>



                <?php } else if($ksdet->kode_kriteria == '4'){ ?>

                <!-- PN -->


                    <?php
                    echo "<b style='display:none;'>$ksdet->id</b> ";
                    if($countlike){?>


                        <a href="<?php echo base_url('PengalamanNarasumber/unLike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))  ?>"><i2  class="fa fa-thumbs-up fa-lg like-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('PengalamanNarasumber/Like/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-o-up fa-lg like-btn"> </i2></a>

                    <?php } ?> &nbsp;
                    <b><?php echo $getlike->num_rows() ?> Suka</b>

                    &emsp;&nbsp;&emsp;&nbsp;
                    &emsp;&nbsp;
                    <?php if($countdislike){?>


                        <a href="<?php echo base_url('PengalamanNarasumber/unDislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-down fa-lg dislike-btn"> </i2></a>
                    <?php }else {?>
                        <a href="<?php echo base_url('PengalamanNarasumber/Dislike/').base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@")) ?>"><i2  class="fa fa-thumbs-o-down fa-lg dislike-btn"> </i2></a>

                    <?php } ?>
                    &emsp;<b><?php echo $getdislike->num_rows() ?> Tidak Suka</b>



                    <span class="pull-right text-muted"> <?php echo  $Jkomen->num_rows(); ?> Komentar</span>

                <?php } ?>

            </div>
                    <!-- KS---------KOMENTAR------------------------------------------------------------ -->

                    <?php if($ksdet->kode_kriteria == '1'){ ?>

                        <div class="box-footer">
                            <div>

                                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="img-responsive img-circle img-sm" alt="Alt Text">

                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('KnowledgeSharing/Komentar') ?>">
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value="<?php echo base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))?>" id="idpost" placeholder="idpost" required="" name="idpost">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value=" <?php echo $user['inisial']?>" id="inisial" placeholder="inisial" required="" name="inisial">
                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" required="" name="komen" rows="1" placeholder="Masukan Komentar"></textarea>
                                            <span class="input-group-btn">
                                            <button type="submit"  name="cari" id="search-btn" class="pull-right btn btn-success"><i class="fa fa-send"></i> Kirim
                                            </button>
                                          </span>

                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                    <div class="box-footer box-comments">
                        <?php
                        $i = 0;
                        foreach($komen as $komentar):


                            error_reporting(0);
                            $page=$_GET['page'];
                            if($page == null)
                            {
                                if ($i >= 10){ break; }
                            }else if($page == null){

                            }

                        ?>

                        <div class="box-comment">
                            <!-- User image -->
                                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                            <div class="comment-text">
                      <span class="username">
                 <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?> <?php echo $komentar ->nama ?> a.k.a<?php }?>      <?php echo $komentar ->inisial ?>

                        <span class="text-muted pull-right"><?php echo $komentar ->jam ?></span>

                      </span><!-- /.username -->
                                <?php echo nl2br($komentar ->komentar); ?>

                                <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?>
                                    <a href="<?php echo base_url('KnowledgeSharing/DelKomentar/'). $komentar->id_komentar ?>" class="text-muted pull-right">Hapus </a>
                                        <?php } ?>
                            </div>
                            <!-- /.comment-text -->
                        </div>
                            <?php
                            $i++;
                        endforeach; ?>


                        <!-- /.box-comment -->
                    </div>
                     <?php   if ($i == 10){ echo "<p align='center'><a href='?page=showall'>Tampilkan Semua</a></p>";} ?>


                    <?php } if($ksdet->kode_kriteria == '2'){ ?>


                        <div class="box-footer">
                            <div>

                                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="img-responsive img-circle img-sm" alt="Alt Text">

                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('TransferKnowledge/Komentar') ?>">
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value="<?php echo base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))?>" id="idpost" placeholder="idpost" required="" name="idpost">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value=" <?php echo $user['inisial']?>" id="inisial" placeholder="inisial" required="" name="inisial">
                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" required="" name="komen" rows="1" placeholder="Masukan Komentar"></textarea>
                                            <span class="input-group-btn">
                                            <button type="submit"  name="cari" id="search-btn" class="pull-right btn btn-success"><i class="fa fa-send"></i> Kirim
                                            </button>
                                          </span>

                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>




                        <div class="box-footer box-comments">
                            <?php
                            $b = 0;
                            foreach($komen as $komentar):


                                error_reporting(0);
                                $page=$_GET['page'];
                                if($page == null)
                                {
                                    if ($b >= 10){ break; }
                                }else if($page == null){

                                }
                                ?>

                                <div class="box-comment">
                                    <!-- User image -->
                                    <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                                    <div class="comment-text">
                      <span class="username">
                 <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?> <?php echo $komentar ->nama ?> a.k.a<?php }?>      <?php echo $komentar ->inisial ?>

                        <span class="text-muted pull-right"><?php echo $komentar ->jam ?></span>

                      </span><!-- /.username -->
                                        <?php echo nl2br($komentar ->komentar); ?>

                                        <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?>
                                            <a href="<?php echo base_url('TransferKnowledge/DelKomentar/'). $komentar->id_komentar ?>" class="text-muted pull-right">Hapus </a>
                                        <?php } ?>
                                    </div>
                                    <!-- /.comment-text -->
                                </div>
                            <?php
                                $b++;
                            endforeach; ?>
                            <!-- /.box-comment -->
                        </div>
                        <?php   if ($b == 10){ echo "<p align='center'><a href='?page=showall'>Tampilkan Semua</a></p>";} ?>

                    <?php }else if($ksdet->kode_kriteria == '3'){ ?>


                        <div class="box-footer">
                            <div>

                                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="img-responsive img-circle img-sm" alt="Alt Text">

                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('KaryaTulis/Komentar') ?>">
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value="<?php echo base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))?>" id="idpost" placeholder="idpost" required="" name="idpost">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value=" <?php echo $user['inisial']?>" id="inisial" placeholder="inisial" required="" name="inisial">
                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" required="" name="komen" rows="1" placeholder="Masukan Komentar"></textarea>
                                            <span class="input-group-btn">
                                            <button type="submit"  name="cari" id="search-btn" class="pull-right btn btn-success"><i class="fa fa-send"></i> Kirim
                                            </button>
                                          </span>

                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>




                        <div class="box-footer box-comments">
                            <?php

                            $i = 0;
                            foreach($komen as $komentar):


                                error_reporting(0);
                                $page=$_GET['page'];
                                if($page == null)
                                {
                                    if ($i >= 10){ break; }
                                }else if($page == null){

                                }
                                ?>

                                <div class="box-comment">
                                    <!-- User image -->
                                    <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                                    <div class="comment-text">
                      <span class="username">
                 <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?> <?php echo $komentar ->nama ?> a.k.a<?php }?>      <?php echo $komentar ->inisial ?>

                        <span class="text-muted pull-right"><?php echo $komentar ->jam ?></span>

                      </span><!-- /.username -->
                                        <?php echo nl2br($komentar ->komentar); ?>

                                        <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?>
                                            <a href="<?php echo base_url('KaryaTulis/DelKomentar/'). $komentar->id_komentar ?>" class="text-muted pull-right">Hapus </a>
                                        <?php } ?>
                                    </div>
                                    <!-- /.comment-text -->
                                </div>
                            <?php
                                $i++;
                            endforeach; ?>
                            <!-- /.box-comment -->
                        </div>
                        <?php   if ($i == 10){ echo "<p align='center'><a href='?page=showall'>Tampilkan Semua</a></p>";} ?>

                    <?php }  else if($ksdet->kode_kriteria == '4'){?>


                        <div class="box-footer">
                            <div>

                                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="img-responsive img-circle img-sm" alt="Alt Text">

                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('PengalamanNarasumber/Komentar') ?>">
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value="<?php echo base64_encode($ksdet->id."-".base64_encode("PTPN7J@Y@"))?>" id="idpost" placeholder="idpost" required="" name="idpost">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden"   class="form-control input-sm" value=" <?php echo $user['inisial']?>" id="inisial" placeholder="inisial" required="" name="inisial">
                                        </div>

                                        <div class="form-group">

                                            <textarea class="form-control" required="" name="komen" rows="1" placeholder="Masukan Komentar"></textarea>
                                            <span class="input-group-btn">
                                            <button type="submit"  name="cari" id="search-btn" class="pull-right btn btn-success"><i class="fa fa-send"></i> Kirim
                                            </button>
                                          </span>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>





                        <div class="box-footer box-comments">
                            <?php
                            $i = 0;
                            foreach($komen as $komentar):


                                error_reporting(0);
                                $page=$_GET['page'];
                                if($page == null)
                                {
                                    if ($i >= 10){ break; }
                                }else if($page == null){

                                }

                                ?>

                                <div class="box-comment">
                                    <!-- User image -->
                                    <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                                    <div class="comment-text">
                      <span class="username">
                 <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?> <?php echo $komentar ->nama ?> a.k.a<?php }?>      <?php echo $komentar ->inisial ?>

                        <span class="text-muted pull-right"><?php echo $komentar ->jam ?></span>

                      </span><!-- /.username -->
                                        <?php echo nl2br($komentar ->komentar); ?>

                                        <?php if ($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){?>
                                            <a href="<?php echo base_url('PengalamanNarasumber/DelKomentar/'). $komentar->id_komentar ?>" class="text-muted pull-right">Hapus </a>
                                        <?php } ?>
                                    </div>
                                    <!-- /.comment-text -->
                                </div>
                                <?php
                                $i++;
                            endforeach; ?>


                            <!-- /.box-comment -->
                        </div>
                        <?php   if ($i == 10){ echo "<p align='center'><a href='?page=showall'>Tampilkan Semua</a></p>";} ?>


                    <?php } ?>

        </div>
            </div>





            <div class="col-md-3">
                <div  class="box box-primary">
                    <div class="box-header with-border">

                        <h5>Keterangan</h5>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <tr style="display:none;">
                                <td><b>ID</b></td>
                                <td><?php echo $ksdet->id ?></td>
                            </tr>

                            <tr>
                                <td><b>Nopek</b></td>
                                <td><?php echo $ksdet->nopek ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                    <td><?php echo $ksdet->nama ?></td>
                            </tr>
                            <tr>
                                <td><b>Judul</b></td>
                                <td><?php echo $ksdet->judul ?></td>
                            </tr>
                            <tr>
                                <td><b>Kriteria</b></td>
                                <td><?php echo $ksdet->kriteria ?></td>
                            </tr>
                            <tr>
                                <td><b>Bidang</b></td>
                                <td><?php echo $ksdet->bidang ?></td>
                            </tr>
                            <tr>
                                <td><b>Kata kunci</b></td>
                                <td><?php echo $ksdet->kata_kunci ?></td>
                            </tr>
                        </table>




                    </div>
                </div>
            </div>

        </div>

    </section>
<!-- right col (We are only adding the ID to make the widgets sortable)
    <script type="text/javascript">


        $(document).ready(function(){

// if the user clicks on the like button ...
            $('.like-btn').on('click', function(){
                var post_id = $(this).data('id');
                $clicked_btn = $(this);
                if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
                    action = 'like';
                } else if($clicked_btn.hasClass('fa-thumbs-up')){
                    action = 'unlike';
                }
                $.ajax({
                    url: "",
                    type: 'post',
                    data: {
                        'action': action,

                    },
                    success: function(data){
                        res = JSON.parse(data);
                        if (action == "like") {
                            $clicked_btn.removeClass('fa-thumbs-o-up');
                            $clicked_btn.addClass('fa-thumbs-up');
                        } else if(action == "unlike") {
                            $clicked_btn.removeClass('fa-thumbs-up');
                            $clicked_btn.addClass('fa-thumbs-o-up');
                        }
                        // display the number of likes and dislikes
                        $clicked_btn.siblings('span.likes').text(res.likes);
                        $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                        // change button styling of the other button if user is reacting the second time to post
                        $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
                    }
                });

            });


    </script>   -->
<!-- right col -->
</div>
<!-- /.row (main row) -->
