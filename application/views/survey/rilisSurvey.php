<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				UBAH STATUS EVALUASI
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li class="active"><font face="Book Antiqua">Daftar Penilaian</font></li>
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

			<!-- /.box-header -->
			<div class="box-body">

				<div class="panel panel-primary filterable">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Pelatihan</h3>
					</div>
					<br/>

					<div class="table-wrapper-scroll-y my-custom-scrollbar" style="overflow-x:auto;">
						<table class="table table-bordered table-striped mb-0" id="table">
							<thead>
							<tr class="success filters">
								<th rowspan="2">
									<div align="top">No</div>
								</th>
								<th colspan="3">
									<div align="center">Penilai</div>
								</th>
								<th colspan="4">
									<div align="center">Peserta Pelatihan</div>
								</th>
								<th colspan="5">
									<div align="center">Pelaksana Pelatihan</div>
								</th>
								<th rowspan="2">
									<div align="top">Status</div>
								</th>
								<th rowspan="2">
									<div align="top">Ubah</div>
								</th>
							</tr>
							<tr class="success filters">
								<th>
									<div align="center">Nopek</div>
								</th>
								<th>
									<div align="center">Nama</div>
								</th>
								<th>
									<div align="center">Jabatan</div>
								</th>
								<th>
									<div align="center">Nopek</div>
								</th>
								<th>
									<div align="center">Nama</div>
								</th>
								<th>
									<div align="center">Jabatan</div>
								</th>
								<th>
									<div align="center">Unit Kerja</div>
								</th>
								<th>
									<div align="center">No. Surat Tugas</div>
								</th>
								<th>
									<div align="center">Judul/Nama</div>
								</th>
								<th>
									<div align="center">Mulai Tgl</div>
								</th>
								<th>
									<div align="center">s.d Tgl</div>
								</th>
								<th>
									<div align="center">Durasi</div>
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($tampil as $data):
								$id = $data->no_tugas;
								?>
								<form action="<?php echo base_url('survey/rilis') ?>" method="post">
									<tr>

										<input type="text" value="<?php echo $data->id ?>" style="display: none"
											   name="id" id="id">
										<td><?php echo $no++ ?></td>
										<td><?php echo $data->nopek_penilai ?></td>
										<td><?php echo $data->nama_penilai ?></td>
										<td><?php echo $data->jabatan_penilai ?></td>
										<td><?php echo $data->nopek_peserta ?></td>
										<td><?php echo $data->nama_peserta ?></td>
										<td><?php echo $data->jabatan_peserta ?></td>
										<td><?php echo $data->unit_peserta ?></td>
										<td><input name="no_tugas" id="no_tugas" value="<?php echo $data->no_tugas ?>"
												   style="display: none">
											<?php echo $data->no_tugas ?></td>
										<td><?php echo $data->judul_nama ?></td>
										<td><?php echo $data->tgl_mulai ?></td>
										<td><?php echo $data->tgl_selesai ?></td>
										<td><?php
											$mulai = date_create($data->tgl_mulai);
											$selesai = date_create($data->tgl_selesai);
											echo date_diff($mulai, $selesai)->format("%a Hari") ?></td>
										<td><?php echo $data->status ?></td>

										<?php if ($data->status == "Selesai"): ?>
										<td>
											<button type="submit" class="btn btn-xs btn-success" id="btnDetail" disabled>Selesai
											</button>
										</td>
										<?php else: ?>
										<td>
											<button type="submit" class="btn btn-xs btn-success" id="btnDetail" >Selesai
											</button>
										</td>
										<?php endif; ?>
									</tr>
								</form>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>

	</section>

	<script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
	</script>
</div>
<!-- /.row (main row) -->
