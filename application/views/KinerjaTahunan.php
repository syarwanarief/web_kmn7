
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                KINERJA TAHUNAN
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Kinerja Tahunan</font></li>
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
            <div class="box-header">
                <h3 class="box-title">Kinerja Tahunan</h3>

                <a  href="<?php echo base_url('KinerjaTahunan/Tambah') ?>">
                    <button  type="button" class="btn btn-primary pull-right">
                        <i class="glyphicon glyphicon-edit"></i>
                        Tambah Data
                    </button>
                </a>

            </div>
            <!-- /.box-header -->
            <div  class="box-body">
                <div class="col-md-6">
                    <form  action="<?php echo base_url('KinerjaTahunan/Uraian') ?>" method="get">


                        <div class="input-group">
                            <select class="form-control" required="" id="ur" onChange="changeTextBox();" name="ur">
                                <option value="">- Pilih Uraian -</option>
                                <?php foreach ($ur as $data): ?>
                                    <option value="<?php echo base64_encode($data->id_uraian) ?>"><?php echo $data->uraian ?></option>
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






</section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
