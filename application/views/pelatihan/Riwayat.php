<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				RIWAYAT PELATIHAN ANDA
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li class="active"><font face="Book Antiqua">Riwayat Pelatihan</font></li>
		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

	<section class="content">


		<!-- SELECT2 EXAMPLE -->
		<div class="box">
			<div class="box-header">


				<a href="<?php echo base_url('PengembanganSDM') ?>">
					<button type="button" class="btn btn-xs btn-default pull-right">
						<i class="glyphicon glyphicon-chevron-left"></i>
						KEMBALI
					</button>
				</a>

			</div>

			<!-- /.box-header -->
			<div class="box-body">

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pelatihan</h3>

					</div>
					<br/>
					<form action="<?php echo base_url('Pelatihan/userBuatEvaluasi') ?>" method="post">
						<div class="table-responsive">

							<table id="examplesdm" class="table table-bordered">
								<thead>
								<tr class="success filters">
									<th>No</th>
									<th>Periode</th>
									<th>Uraian</th>
									<th>Kriteria Pelatihan</th>
									<th>Penyelenggara</th>
									<th>Tanggal</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Lokasi</th>
									<th>Status</th>
								</tr>
								</thead>

								<?php
								$no = 1;
								foreach ($tampil as $data):
									$id = $data->no_tugas;
									?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $data->periode ?></td>
										<td><?php echo $data->uraian ?></td>
										<td><?php echo $data->k_pelatihan ?></td>
										<td><?php echo $data->penyelenggara ?></td>
										<td><?php echo $data->t_tugas ?></td>
										<td><?php echo $data->t_mulai ?></td>
										<td><?php echo $data->t_akhir ?></td>
										<td><?php echo $data->lokasi ?></td>
										<td><?php echo $data->status ?></td>

										<input type="hidden" name="id" value="<?php echo $data->id_laporan ?>">
								<?php endforeach; ?>
							</table>
						</div>
					</form>
				</div>
			</div>
			<!-- /.box-body -->
		</div>

	</section>
	<!-- right col (We are only adding the ID to make the widgets sortable)-->

	<!-- right col -->
</div>
<!-- /.row (main row) -->
