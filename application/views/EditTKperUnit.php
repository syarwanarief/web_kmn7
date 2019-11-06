<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h4>
			UBAH DATA TENAGA kERJA PER UNIT KERJA

		</h4>

		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li><a href="<?php echo base_url('JumlahTK') ?>">Tenaga Kerja Total</a></li>
			<li>Ubah Data</li>
		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
		<div class="box-body">
			<div class="col-md-6">
				<form action="<?php echo base_url('JumlahTK/filterEditTKunit') ?>" method="get">
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
		<!-- Editable table -->

		<div style="margin-left: 20px">
			<h3 class="card-header text-center font-weight-bold text-uppercase py-4">ubah data jumlah tenaga kerja
				perunit kerja
				Tahun <?php foreach ($tampil as $data) {
					$thn[] = $data->tahun;
				}
				echo $thn[0];
				?></h3>

			<div class="table-wrapper-scroll-y my-custom-scrollbar" style="overflow-x:auto;">
				<table class="table table-bordered table-striped mb-0" id="table">
					<thead>
					<tr>
						<th>Unit</th>
						<th>Karyawan Tetap</th>
						<th>Honor</th>
						<th>ILA</th>
						<th>OS</th>
						<th>Kamp</th>
						<th>Biaya</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($tampil
							 as $key => $data):
						?>
						<form action="<?php echo base_url('JumlahTK/SimpanPerubahanTKperUnit') ?>" method="post">
							<tr>
								<td><?php echo $data->unit ?></td>
								<td>
									<label for="tetap">
										<input id="tetap" name="tetap" value="<?php echo $data->karyawan_tetap ?>">
									</label>
								</td>
								<td>
									<label for="tidak_tetap">
										<input id="tidak_tetap" name="honor"
											   value="<?php echo $data->karyawan_honor ?>">
									</label>
								</td>
								<td>
									<label for="tetap">
										<input id="tetap" name="ila" value="<?php echo $data->ILA ?>">
									</label>
								</td>
								<td>
									<label for="tidak_tetap">
										<input id="tidak_tetap" name="os"
											   value="<?php echo $data->OS ?>">
									</label>
								</td>
								<td>
									<label for="tetap">
										<input id="tetap" name="kamp" value="<?php echo $data->Kamp ?>">
									</label>
								</td>
								<td>
									<label for="tidak_tetap">
										<input id="tidak_tetap" name="biaya"
											   value="<?php echo $data->Biaya ?>">
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
