<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h4>
			UBAH DATA BIAYA TENAGA kERJA

		</h4>

		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li><a href="<?php echo base_url('BiayaTK') ?>">Biaya Tenaga Kerja</a></li>
			<li>Ubah Data</li>
		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
		<div class="box-body">
			<div class="col-md-6">
				<form action="<?php echo base_url('BiayaTK/filterBiayaTK') ?>" method="get">
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
				</form>
			</div>

		</div>
		<br>
		<br>
		<!-- Editable table -->

		<div style="margin-left: 20px">
			<h3 class="card-header text-center font-weight-bold text-uppercase py-4">ubah data jumlah biaya tenaga kerja
				Tahun <?php foreach ($tampil as $data) {
					$thn[] = $data->tahun;
				}
				echo $thn[0];
				?></h3>

			<div class="table-wrapper-scroll-y my-custom-scrollbar" style="overflow-x:auto;">
				<table class="table table-bordered table-striped mb-0" id="table">
					<thead>
					<tr>
						<th>Uraian</th>
						<th>RKAP Tahun</th>
						<th>RKAP SDBI</th>
						<th>Realisasi</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($tampil
							 as $key => $data):
						?>
						<form action="<?php echo base_url('BiayaTK/SimpanPerubahanBiayaTK') ?>" method="post">
							<tr>
								<td><?php echo $data->uraian ?></td>
								<td>
									<label for="rkap1">
										<input id="rkap1" name="rkap1" value="<?php echo $data->rkap_tahun ?>">
									</label>
								</td>
								<td>
									<label for="rkap2">
										<input id="rkap2" name="rkap2"
											   value="<?php echo $data->rkap_sdbi ?>">
									</label>
								</td>
								<td>
									<label for="realisasi">
										<input id="realisasi" name="realisasi" value="<?php echo $data->realisasi ?>">
									</label>
								</td>
								<td>
									<button class="btn btn-danger btn-rounded btn-sm my-0" id="btnTetap">
										Ubah
									</button>
								</td>
							</tr>
							<input type="hidden" name="id" value="<?php echo $data->id ?>">
						</form>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Editable table -->
	</section>
</div>
