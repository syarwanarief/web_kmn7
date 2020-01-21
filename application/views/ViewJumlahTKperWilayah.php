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
        <div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
            <h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>
    <div class="box-body">
        <div class="col-md-6">
            <form  action="<?php echo base_url('JumlahTK/filterTKwilayah') ?>" method="get">
                <div class="input-group">
                    <select class="form-control" required="" id="thn" name="thn">
                        <option value="">--Pilih Tahun--</option>
                        <?php foreach ($tahun as $data): ?>
                            <option value="<?php echo $data->tahun ?>"><?php
                                echo $data->tahun?></option>
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

                    <img src="<?php echo base_url('assets/images/Loading1.GIF') ?>" width="20%">
                    <p></p>
                    <p><strong>Harap Tunggu, Sedang Memuat Halaman.</strong></p>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Jumlah Tenaga Kerja Perwilayah </h3>
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
                        foreach ($tampil as $data):
                            $wilayah[] = $data->wilayah;
                            $k_tetap[] = $data->karyawan_tetap;
                            $k_tidak_tetap[] = $data->karyawan_tidak_tetap;

                            $jumlah = 0;
                            $jumlahTotal[] = $data->karyawan_tetap+$data->karyawan_tidak_tetap;
                        endforeach;

                        if (!empty($wilayah)){

                        ?>

                        <?php
                        $totalNilai = array_sum($jumlahTotal);

                        for ($i = 0; $i<count($k_tetap); $i++){
                            $total[] = $k_tetap[$i] + $k_tidak_tetap[$i];
                        ?>
                        <tr>
                            <td><?php echo $wilayah[$i] ?></td>
                            <td><?php echo $k_tetap[$i] ?></td>
                            <td><?php echo $k_tidak_tetap[$i] ?></td>
                            <td><?php echo $total[$i] ?></td>
                            <td><?php echo round($total[$i]/$totalNilai*100) ?>%</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td><b>Jumlah</b></td>
                            <td><?php echo array_sum($k_tetap) ?></td>
                            <td><?php echo array_sum($k_tidak_tetap) ?></td>
                            <td><?php echo $totalNilai ?></td>
                            <td><?php echo 100 ?>%</td>
                        </tr>
                        </tbody>
                    </table>
					<?php }else{
						echo "Data tahun ini belum tersedia ";
					} ?>
                </div>
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url('JumlahTK/tambah_perWilayah') ?>">
                            <button type="button" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-edit"></i>
                                Tambah Data
                            </button>
                        </a>
						<p style="margin-right: 15px">Info : <br>Klik
							<a href="<?php echo base_url('JumlahTK/EditTKperWilayah') ?>"><b>Disini</b></a> untuk melakukan perubahan
							data</p>
                    </div>
                </div>
            </div>
    </section>
</div>
