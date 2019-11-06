<div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                JUMLAH TENAGA KERJA TOTAL
             </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('JumlahTK') ?>">Jumlah Tenaga Kerja </a></li>
            <li class="active"><font face="Book Antiqua">Jumlah TK total</font></li>

        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
</div>
<!-- message end -->
</section>
    <div  class="box-body">
        <div class="col-md-6">
            <form  action="<?php echo base_url('JumlahTK/filterTotalTK') ?>" method="get">
                <div class="input-group">
                    <select class="form-control" required="" id="thn" name="thn">
                        <option value="">--Pilih Tampilan--</option>
						<option value="5tahun">5 Tahun Terakhir</option>
                        <?php foreach ($tahun as $data): ?>
                            <option value="<?php echo$data->tahun ?>"><?php echo $data->tahun?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success" value="Get Selected Values"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
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

    <form method="post">

        <div  class="box-body">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Jumlah Total Tenaga Kerja 5 Tahun Terakhir</h3>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped" border="2">

						<thead>
						<tr class="success">
							<th rowspan="2"><center>Uraian</center></th>
							<th colspan="6"><center>Tahun</center></th>
						</tr>

						<tr class="success">
							<?php
							foreach ($tampil as $data):

								?>
								<th><?php echo $data->tahun ?></th>
							<?php endforeach; ?>
						</tr>

						</thead>

                        <tbody>
                        <?php
                        foreach ($tampil as $data):

                        $k_tetap[] = $data->karyawan_tetap;
                        $k_tidak_tetap[] = $data->karyawan_tidak_tetap;

						endforeach; ?>
                        <tr>
                            <td><?php echo "Karyawan Tetap" ?></td>
                            <td><?php echo $k_tetap[0] ?></td>
                            <td><?php echo $k_tetap[1] ?></td>
							<td><?php echo $k_tetap[2] ?></td>
							<td><?php echo $k_tetap[3] ?></td>
							<td><?php echo $k_tetap[4] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Karyawan Tidak Tetap" ?></td>
                            <td><?php echo $k_tidak_tetap[0] ?></td>
							<td><?php echo $k_tidak_tetap[1] ?></td>
							<td><?php echo $k_tidak_tetap[2] ?></td>
							<td><?php echo $k_tidak_tetap[3] ?></td>
							<td><?php echo $k_tidak_tetap[4] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "Total Karyawan" ?></td>
                            <td><?php echo $k_tetap[0]+$k_tidak_tetap[0] ?></td>
							<td><?php echo $k_tetap[1]+$k_tidak_tetap[1] ?></td>
							<td><?php echo $k_tetap[2]+$k_tidak_tetap[2] ?></td>
							<td><?php echo $k_tetap[3]+$k_tidak_tetap[3] ?></td>
							<td><?php echo $k_tetap[4]+$k_tidak_tetap[4] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box">
                    <div class="box-header">
                        <a  href="<?php echo base_url('JumlahTK/tambah_total') ?>">
                            <button  type="button" class="btn btn-primary pull-right">
                                <i class="glyphicon glyphicon-edit"></i>
                                Tambah Data
                            </button>
                        </a>
						<p style="margin-right: 15px">Info : <br>Klik
							<a href="<?php echo base_url('JumlahTK/editTKtotal') ?>"><b>Disini</b></a> untuk melakukan perubahan
							data</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
</div>
