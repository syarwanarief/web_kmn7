<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				KELOLA PERTANYAAN
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('Survey') ?>">Kelola Survey </a></li>

		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>
	<section class="content">
		<div class="box" style="padding: 15px">

			<b><H3>Survey yang telah dibuat</H3></b>
			<br>
			<br>
				<div class="table-responsive table-wrap">
					<table class="table table-striped" style="border-top: 1px solid;">
						<thead>
						<tr>
							<th>No</th>
							<th>Pertanyaan</th>
							<th>Jenis Jawaban</th>
							<th>Status</th>
							<th colspan="3"><div align="center"> Opsi</div></th>
						</tr>
						</thead>

						<tbody>
						<?php
						$no = 1;
						if ($eva == null) {
						?>
						<tr>
							<td>Belum ada pertanyaan yang dibuat</td>
						</tr>
						<?php } else {
						foreach ($eva as $data):

						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data->pertanyaan ?></td>
							<td><?php echo $data->jenis_skor ?></td>
							<td><?php echo $data->status ?></td>
							<form action="<?php echo base_url('Survey/editPertanyaan') ?>" method="post">
							<input type="text" name="id_pertanyaan" style="display: none" value="<?php echo $data->id_pertanyaan ?>">
							<td>
								<button type="submit" class="btn btn-success">Ubah</button>
							</td>
							</form>
							<?php if ($data->status == "Non Aktif"): ?>
							<form action="<?php echo base_url('Survey/enablePertanyaan') ?>" method="post">
								<input type="text" name="id_pertanyaan" style="display: none" value="<?php echo $data->id_pertanyaan ?>">
								<td>
									<button type="submit" class="btn btn-warning">Aktifkan</button>
								</td>
							</form>
							<?php elseif ($data->status == "Aktif"): ?>
								<form action="<?php echo base_url('Survey/disablePertanyaan') ?>" method="post">
									<input type="text" name="id_pertanyaan" style="display: none" value="<?php echo $data->id_pertanyaan ?>">
									<td>
										<button type="submit" class="btn btn-warning">Non Aktifkan</button>
									</td>
								</form>
							<?php endif; ?>
							<form action="<?php echo base_url('Survey/deletePertanyaan') ?>" method="post">
								<input type="text" name="id_pertanyaan" style="display: none" value="<?php echo $data->id_pertanyaan ?>">
								<td>
									<button type="submit" class="btn btn-danger">Hapus</button>
								</td>
							</form>
						</tr>
						<?php endforeach;?>
						<input type="hidden" name="id" value="<?php echo $data->id_pertanyaan ?>">
						<?php } ?>
						</tbody>
					</table>
				</div>
			<a href="<?php echo base_url('Survey/create') ?>">
				<button type="button" class="btn btn-primary pull-right">
					<i class="glyphicon glyphicon-edit"></i>
					Buat Pertanyaan Baru
				</button>
			</a>
	</section>
</div>
