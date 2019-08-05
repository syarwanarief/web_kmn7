<div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                JUMLAH TENAGA KERJA PERWILAYAH
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('JumlahTK') ?>">Jumlah Tenaga Kerja </a></li>
            <li class="active"><font face="Book Antiqua">Jumlah TK Perwilayah</font></li>

        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>
    <div  class="box-body">
        <div class="col-md-6">
            <form  action="<?php echo base_url('JumlahTK/tampil') ?>" method="get">
                <div class="input-group">
                    <select class="form-control" required="" id="ur" onChange="changeTextBox();" name="kat">
                        <option value="">--Pilihan--</option>
                        <?php foreach ($kat as $data): ?>
                            <option value="<?php echo base64_encode($data->id_jumlah_tk) ?>"><?php echo $data->kategori_laporan_tk?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success" value="Get Selected Values"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
                <?php
                if(isset($_POST['submit'])){
                    $selected_val = $_POST['ur'];  // Storing Selected Value In Variable
                    echo "You have selected :" .$selected_val;  // Displaying Selected Value
                }
                ?>

            </form>
        </div>

    </div>

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
        <!-- /.box-header -->
        <div  class="box-body">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Jumlah enaga Kerja Perwilayah</h3>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped" border="2">

                        <thead>
                        <tr class="primary filters">
                            <th><input type="text" class="form-control" placeholder="Per Wilayah" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Tetap" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Tidak Tetap" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Total" disabled></th>
                            <th><input type="text" class="form-control" placeholder="% (Persen)" disabled></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        foreach ($tampil as $data){
                            $jumlah = round($data->karyawan_tetap+$data->karyawan_tidak_tetap);
                            ?>
                            <tr>
                                <td><?php echo $data->wilayah ?></td>
                                <td><?php echo $data->karyawan_tetap ?></td>
                                <td><?php echo $data->karyawan_tidak_tetap ?></td>
                                <td><?php echo $data->total ?></td>
                                <td><?php echo $data->persen?>%</td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box">
                    <div class="box-header">
                        <a  href="<?php echo base_url('Tambah') ?>">
                            <button  type="button" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-edit"></i>
                                Tambah Data
                            </button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
</div>