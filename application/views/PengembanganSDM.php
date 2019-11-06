
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
             PENGEMBANGAN SDM
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Pengembangan SDM</font></li>
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
                        <h3 class="box-title"><font face="Book Antiqua">&emsp; Pilih Periode</font></h3>
                        <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            KEMBALI
                        </button>
                        <p class="pull-right">&emsp;</p>
                        <a  href="<?php echo base_url('PengembanganSDM/Tambah') ?>">
                            <button  type="button" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-plus"></i>
                                Tambah Data
                            </button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div  class="box-body">
                        <div class="col-md-6">
                            <form  action="#" method="get">

                                <div class="form-group">
                                    <select class="form-control" id="kriteria" onChange="changeTextBox();" name="kriteria">
                                        <option value="">- Pilih Periode -</option>
                                        <option value="Semua">Tampilkan Semua Periode</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <script>
            function changeTextBox()
            {
                var val=$('#kriteria').val();

                if(val==='Januari')
                {
                    window.location = 'PengembanganSDM/Januari';

                }else  if(val==='Februari')
                {
                    window.location = 'PengembanganSDM/Februari';

                }else  if(val==='Maret')
                {
                    window.location = 'PengembanganSDM/Maret';

                }else  if(val==='April')
                {
                    window.location = 'PengembanganSDM/April';

                }else  if(val==='Mei')
                {
                    window.location = 'PengembanganSDM/Mei';

                }else  if(val==='Juni')
                {
                    window.location = 'PengembanganSDM/Juni';

                }else  if(val==='Juli')
                {
                    window.location = 'PengembanganSDM/Juli';

                }else  if(val==='Agustus')
                {
                    window.location = 'PengembanganSDM/Agustus';

                }else  if(val==='September')
                {
                    window.location = 'PengembanganSDM/September';

                }else  if(val==='Oktober')
                {
                    window.location = 'PengembanganSDM/Oktober';

                }else  if(val==='November')
                {
                    window.location = 'PengembanganSDM/November';

                }else  if(val==='Desember')
                {
                    window.location = 'PengembanganSDM/Desember';

                }else  if(val==='Semua')
                {
                    window.location = 'PengembanganSDM/All';

                }

            }
        </script>








    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
