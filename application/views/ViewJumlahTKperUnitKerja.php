<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                JUMLAH TENAGA KERJA PERUNIT KERJA
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('JumlahTK') ?>">Jumlah Tenaga Kerja </a></li>
            <li class="active"><font face="Book Antiqua">Jumlah TK Per Unit Kerja</font></li>
        </ol>
        <div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
            <h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>
    <div class="box-body">
        <div class="col-md-6">
            <form action="<?php echo base_url('JumlahTK/filterTKunit') ?>" method="get">
                <div class="input-group">
                    <select class="form-control" required="" id="thn" name="thn">
                        <option value="">--Pilih Tahun--</option>
                        <?php foreach ($tahun as $data): ?>
                            <option value="<?php echo $data->tahun ?>"><?php echo $data->tahun ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success" value="Get Selected Values"><i
                            class="fa fa-search"></i>
                </button>
              </span>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $selected_val = $_POST['ur'];  // Storing Selected Value In Variable
                    echo "You have selected :" . $selected_val;  // Displaying Selected Value
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
                        <h3 class="panel-title">Jumlah Tenaga Kerja Per Unit Kerja </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" border="2">
                            <thead>
                            <tr class="primary filters">
                                <th><input type="text" class="form-control" placeholder="Unit Kerja" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tetap" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Honor" disabled></th>
                                <th><input type="text" class="form-control" placeholder="ILA" disabled></th>
                                <th><input type="text" class="form-control" placeholder="OS" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Kamp" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Jumlah" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Biaya" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Rp/org" disabled></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tampil as $data):
                                $unit[] = $data->unit;
                                $k_tetap[] = $data->karyawan_tetap;
                                $k_honor[] = $data->karyawan_honor;
                                $ila[] = $data->ILA;
                                $OS[] = $data->OS;
                                $kamp[] = $data->Kamp;
                                $biaya[] = (int)$data->Biaya;

                                $jumlahTotal[] = $data->karyawan_tetap + $data->karyawan_honor;
                            endforeach;

                            if (!empty($unit)){

                            ?>

                            <?php
                            $totalNilai = array_sum($jumlahTotal);
                            function rupiah($angka)
                            {

                                $hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
                                return $hasil_rupiah;

                            }

                            for ($i = 0; $i < count($k_tetap); $i++) {
                                $total[] = $k_tetap[$i] + $k_honor[$i] + $OS[$i] + $ila[$i] + $kamp[$i];
                                ?>
                                <tr>
                                    <td><?php echo $unit[$i] ?></td>
                                    <td><?php echo $k_tetap[$i] ?></td>
                                    <td><?php echo $k_honor[$i] ?></td>
                                    <td><?php echo $ila[$i] ?></td>
                                    <td><?php echo $OS[$i] ?></td>
                                    <td><?php echo $kamp[$i] ?></td>
                                    <td><?php echo $total[$i] ?></td>
                                    <td><?php echo rupiah($biaya[$i]) ?></td>
                                    <td><?php echo rupiah($biaya[$i] / $total[$i] / 5) ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
						<?php }else{
							echo "Data tahun ini belum tersedia ";
						} ?>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <a href="<?php echo base_url('JumlahTK/tambah_perUnitKerja') ?>">
                                <button type="button" class="btn btn-primary pull-right">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    Tambah Data
                                </button>
                            </a>
							<p style="margin-right: 15px">Info : <br>Klik
								<a href="<?php echo base_url('JumlahTK/EditTkperUnit') ?>"><b>Disini</b></a> untuk melakukan perubahan
								data</p>
                        </div>
                    </div>
                </div>
        </section>
</div>
