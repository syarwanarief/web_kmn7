<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h4>
			TAMBAH DATA TENAGA kERJA

		</h4>

		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li><a href="<?php echo base_url('JumlahTK') ?>">Tenaga Kerja Total</a></li>
			<li>Tambah</li>
		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->

		<form action="<?php echo base_url('JumlahTK/SaveTkTotal') ?>" method="post">

			<?php foreach ($tampil as $data): ?>
				<input type="hidden" name="id_total" value="<?php echo $data->id ?>">
				<input type="hidden" name="kar_tetap" value="<?php echo $data->karyawan_tetap ?>">
				<input type="hidden" name="kar_tidak_tetap" value="<?php echo $data->karyawan_tidak_tetap ?>">
				<input type="hidden" name="thn" value="<?php echo $data->tahun ?>">
			<?php endforeach; ?>
			<div class="col-md-6">
				<div class="form-group">
					<label>Karyawan Tetap</label>
					<input type="number" class="form-control" name="tetap" required="" placeholder="Masukan Satuan">
				</div>
				<div class="form-group">
					<label>Karyawan Tidak Tetap</label>
					<input type="number" class="form-control" id="tidak_tetap" name="tidak_tetap" required=""
						   placeholder="Masukan Satuan">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control"  min="1900" max="2099" step="1" name="tahun" value="<?php echo date('Y')?>">
				</div>
			</div>
			<button type="submit" id="submit" class="btn btn-primary pull-right" style="margin-right: 15px">
				Tambah</i></button>
		</form>
	</section>
</div>
