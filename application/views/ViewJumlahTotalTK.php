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
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>
	<div class="box-body">
		<div class="col-md-6">
			<form action="<?php echo base_url('JumlahTK/filterTotalTK') ?>" method="get">
				<div class="input-group">
					<select class="form-control" required="" id="thn" name="thn">
						<option value="">--Pilih Tampilan--</option>
						<?php foreach ($tahun as $data):
							$pilTahun[] = $data->tahun;
						endforeach; ?>

						<?php
						$hArr = count($pilTahun);
						if ($hArr >= 5) {
							?>
							<option value="5tahun">5 Tahun Terakhir</option>
							<?php
							for ($i = 0; $i < $hArr; $i++) { ?>
								<option value="<?php echo $pilTahun[$i] ?>"><?php echo $pilTahun[$i] ?></option>
								<?php
							}
						} else {
							for ($i = 0; $i < $hArr; $i++) { ?>
								<option value="<?php echo $pilTahun[$i] ?>"><?php echo $pilTahun[$i] ?></option><?php
							}
						}
						?>
					</select>
					<span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success" value="Get Selected Values"><i
						class="fa fa-search"></i>
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

					<img src="<?php echo base_url('assets/images/Loading1.GIF') ?>" width="20%">
					<p></p>
					<p><strong>Harap Tunggu, Sedang Memuat Halaman.</strong></p>
				</div>
			</div>
		</div>
		<!-- /.box-header -->

		<form method="post">

			<div class="box-body">
				<div class="panel panel-primary filterable">
					<div class="panel-heading">
						<h3 class="panel-title">Jumlah Total Tenaga Kerja Pada Tahun <?php foreach ($tampil as $data) {
								$thn[] = $data->tahun;
							}
							echo $thn[0]; ?></h3>
					</div>
					<div class="table-responsive">

						<table class="table table-bordered table-striped" border="2">

							<thead>
							<tr class="primary filters">
								<th><input type="text" class="form-control" placeholder="Uraian" disabled></th>
								<th><input type="text" class="form-control" placeholder="Orang" disabled></th>
								<th><input type="text" class="form-control" placeholder="% (Persen)" disabled></th>
							</tr>
							</thead>

							<tbody>
							<?php
							foreach ($tampil as $data):

								$k_tetap = $data->karyawan_tetap;
								$k_tidak_tetap = $data->karyawan_tidak_tetap;

							endforeach; ?>
							<tr>
								<td><?php echo "Karyawan Tetap" ?></td>
								<td><?php echo $k_tetap ?></td>
								<td><?php echo round($k_tetap / ($k_tetap + $k_tidak_tetap) * 100) ?>%</td>
							</tr>
							<tr>
								<td><?php echo "Karyawan Tidak Tetap" ?></td>
								<td><?php echo $k_tidak_tetap ?></td>
								<td><?php echo round($k_tidak_tetap / ($k_tetap + $k_tidak_tetap) * 100) ?>%</td>
							</tr>
							<tr>
								<td><?php echo "Total Karyawan" ?></td>
								<td><?php echo $k_tetap + $k_tidak_tetap ?></td>
								<td>100%</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="box">
						<div class="box-header">
							<a href="<?php echo base_url('JumlahTK/tambah_total') ?>">
								<button type="button" class="btn btn-primary pull-right">
									<i class="glyphicon glyphicon-edit"></i>
									Tambah Data
								</button>
							</a>
							<p style="margin-right: 15px">Info : <br>Klik
								<a href="<?php echo base_url('JumlahTK/editTKtotal') ?>"><b>Disini</b></a> untuk
								melakukan perubahan
								data</p>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
