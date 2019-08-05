<div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                JUMLAH TENAGA KERJA PER UNIT KERJA
             </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('JumlahTK') ?>">Jumlah Tenaga Kerja</a></li>
            <li class="active"><font face="Book Antiqua">Jumlah TK per Unit Kerja</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
</div>
<!-- message end -->
</section>




<section class="content">
    <!-- SELECT2 EXAMPLE -->




    <div class="preloader">
        <div class="loading">
            <div align="center">

                <img  src="<?php echo base_url('assets/images/Loading1.GIF') ?>" width="20%">
                <p></p>
                <p ><strong>Harap Tunggu, Sedang Memuat Halaman.</strong></p>
            </div>
        </div>
    </div>








    <div class="box">
        <div class="box-header">

        </div>
        <!-- /.box-header -->
        <div  class="box-body">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Jumlah Tenaga Kerja per Unit Kerja</h3>
                </div>
                <br />
                <div class="table-responsive">

                    <table>

                        <thead>
                        <tr class="primary filters">
                            <th><input type="text" class="form-control" placeholder="1" disabled></th>
                            <th><input type="text" class="form-control" placeholder="2" disabled></th>
                            <th><input type="text" class="form-control" placeholder="3" disabled></th>
                            <th><input type="text" class="form-control" placeholder="4" disabled></th>
                            <th><input type="text" class="form-control" placeholder="5" disabled></th>
                            <th><input type="text" class="form-control" placeholder="6" disabled></th>
                            <th><input type="text" class="form-control" placeholder="7" disabled></th>
                            <th><input type="text" class="form-control" placeholder="8" disabled></th>
                            <th><input type="text" class="form-control" placeholder="9" disabled></th>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>