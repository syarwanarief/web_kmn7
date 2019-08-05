
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Ubah Data Karyawan</font></li>
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
                        <h3 class="box-title"><font face="Book Antiqua">&emsp; Pilih Unit</font></h3>
                        <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            KEMBALI
                        </button>

                    </div>
                    <!-- /.box-header -->
                    <div  class="box-body">
                        <div class="col-md-6">
                            <form  action="<?php echo base_url('DataKaryawan/Ubah') ?>" method="get">


                                <div class="input-group">
                                    <select class="form-control" required="" id="un" onChange="changeTextBox();" name="un">
                                        <option value="">- Pilih Unit -</option>
                                        <option value="<?php echo base64_encode('semua') ?>">Tampilkan Semua</option>
                                        <?php foreach ($ft as $data): ?>
                                            <option value="<?php echo base64_encode($data->unit) ?>"><?php echo $data->unit ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success"><i class="fa fa-search"></i>
                </button>
              </span>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>





    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
