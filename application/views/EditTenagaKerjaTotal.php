<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h4>
			UBAH DATA TENAGA kERJA

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
				<form action="<?php echo base_url('JumlahTK/filterEditTotalTK') ?>" method="get">
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
			<h3 class="card-header text-center font-weight-bold text-uppercase py-4">ubah data jumlah tenaga kerja total
				Tahun <?php foreach ($tampil as $data) {
					echo $data->tahun;
				} ?></h3>
			<form action="<?php echo base_url('JumlahTK/SimpanPerubahanTotalTK') ?>" method="post">

				<div class="table-wrapper-scroll-y my-custom-scrollbar">
					<table class="table table-bordered table-striped mb-0" id="table">
						<thead>
						<tr>
							<th>Karyawan Tetap</th>
							<th>Karyawan Tidak Tetap</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<?php
							foreach ($tampil

							as $data):

							$k_tetap = $data->karyawan_tetap;
							$k_tidak_tetap = $data->karyawan_tidak_tetap;
							$id[] = $data->id;
							?>
							<input type="hidden" name="id" value="<?php echo $data->id ?>">
							<td>
								<label for="tetap">
								<input id="tetap" name="tetap" value="<?php echo $data->karyawan_tetap ?>">
								</label>
							</td>
							<td>
								<label for="tidak_tetap">
								<input id="tidak_tetap" name="tidak_tetap" value="<?php echo $data->karyawan_tidak_tetap ?>">
								</label>
							</td>
							<td>
								<button class="btn btn-danger btn-rounded btn-sm my-0" id="btnTetap"
										onclick="karTetap()">
									Ubah
								</button>
							</td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
		<!-- Editable table -->
	</section>

	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript">
        $(document).ready(function () {
            var table = document.getElementById('table');
            var id = <?php echo $idTetap; ?>;
            var tetap = table.rows[1].cells[1].innerHTML;
            var tidak_tetap = table.rows[2].cells[1].innerHTML;

            $('#btnTetap').onclick(function () {
                var id = $(this).val(id);
                var tetap = $(this).val(tetap);
                var tidak_tetap = $(this).val(tidak_tetap);
                $.ajax({
                    url: '<?php echo base_url();?>index.php/JumlahTK/SimpanPerubahan',
                    method: 'POST',
                    data: {id: id, tetap: tetap, tidak_tetap: tidak_tetap},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        alert("Berhasil Menyimpan Perubahan");
                        console.log(tetap);
                        console.log(tidak_tetap);
                        console.log(id);
                    }
                    error: function () {
                        alert("Gagal Melakukan Perubahan");
                    }

                });
            });

        }

	</script>
</div>
