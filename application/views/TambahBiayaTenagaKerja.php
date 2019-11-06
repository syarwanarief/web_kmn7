<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				TAMBAH BIAYA TENAGA KERJA
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('BiayaTK') ?>">Biaya Tenaga Kerja </a></li>
			<li class="active"><font face="Book Antiqua">Tambah Biaya Tenaga Kerja</font></li>

		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

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

		<form action="<?php echo base_url('BiayaTK/saveBiayaTK') ?>" method="post">

			<div class="col-md-6">
				<div class="form-group">
					<label for="pil">Pilih Uraian</label>
					<select class="form-control" id="pil" name="pil">
						<option value="">--Pilih Uraian--</option>
						<?php foreach ($tampil
									   as $data): ?>
							<option value="<?php echo $data->uraian ?>"><?php echo $data->uraian ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<?php foreach ($tampil
							   as $data): ?>
					<input type="hidden" name="thn" value="<?php echo $data->tahun ?>">
				<?php endforeach; ?>
				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control" min="1900" max="2099" step="1" name="tahun"
						   value="<?php echo date('Y') ?>">
				</div>

				<div class="form-group">
					<label>RKAP Tahun</label>
					<input type="number" class="form-control" name="rkap_tahun" required=""
						   placeholder="Masukan Satuan">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>RKAP SDBI</label>
					<input type="number" class="form-control" id="rkap_sdbi" name="rkap_sdbi" required=""
						   placeholder="Masukan Satuan">
				</div>
				<div class="form-group">
					<label>Realisasi</label>
					<input type="number" class="form-control" id="realisasi" name="realisasi" required=""
						   placeholder="Masukan Satuan">
				</div>
			</div>

			<button type="submit" id="submit" class="btn btn-primary pull-right" style="margin-right: 15px">
				Tambah</i></button>
		</form>
	</section>
</div>


