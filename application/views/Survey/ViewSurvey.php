<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				KELOLA SURVEYS
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
						<th>Kode Survey</th>
						<th>Judul Survey</th>
						<th>Deskripsi</th>
						<th>Ubah</th>
						<th>Hapus</th>
					</tr>
					</thead>

					<tbody>
					<tr>
						<td>Belum ada survey yang dibuat</td>
					</tr>
					</tbody>
				</table>
			</div>
			<a href="<?php echo base_url('Survey/create') ?>">
				<button type="button" class="btn btn-primary pull-right">
					<i class="glyphicon glyphicon-edit"></i>
					Buat Survey Baru
				</button>
			</a>
	</section>
</div>
