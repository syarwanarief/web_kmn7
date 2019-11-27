<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				TAMBAH TENAGA KERJA PERUNIT KERJA
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('JumlahTK') ?>">Jumlah Tenaga Kerja </a></li>
			<li class="active"><font face="Book Antiqua">Jumlah TK Perunit Kerja</font></li>

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

		<form action="<?php echo base_url('JumlahTK/SaveTkPerunit') ?>" method="post">

			<div class="col-md-6">
				<div class="form-group">
					<label for="pil">Pilih Unit Kerja</label>
					<select class="form-control" id="pil" name="pil">
						<option value="">--Pilih Unit Kerja--</option>
						<?php foreach ($tampil
									   as $data): ?>
							<option value="<?php echo $data->unit ?>"><?php echo $data->unit ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<?php foreach ($tampil as $data): ?>
					<input type="hidden" name="id_total" value="<?php echo $data->id ?>">
					<input type="hidden" name="kar_tetap" value="<?php echo $data->karyawan_tetap ?>">
					<input type="hidden" name="kar_tidak_tetap" value="<?php echo $data->karyawan_honor ?>">
					<input type="hidden" name="thn" value="<?php echo $data->tahun ?>">
				<?php endforeach; ?>

				<div class="form-group">
					<label>Tahun</label>
					<input type="number" class="form-control"  min="1900" max="2099" step="1" name="tahun" value="<?php echo date('Y')?>">
				</div>

				<div class="form-group">
					<label>Karyawan Tetap</label>
					<input type="number" class="form-control" name="tetap" required=""
						   placeholder="Masukan Satuan">
				</div>
				<div class="form-group">
					<label>Honor</label>
					<input type="number" class="form-control" id="honor" name="honor" required=""
						   placeholder="Masukan Satuan">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label>ILA</label>
					<input type="number" class="form-control" name="ila" required=""
						   placeholder="Masukan Satuan">
				</div>
				<div class="form-group">
					<label>OS</label>
					<input type="number" class="form-control" id="os" name="os" required=""
						   placeholder="Masukan Satuan">
				</div>
				<div class="form-group">
					<label>Kamp</label>
					<input type="number" class="form-control" id="kamp" name="kamp" required=""
						   placeholder="Masukan Satuan">
				</div>
				<div class="form-group">
					<label>Biaya</label>
					<input type="text" class="form-control" id="biaya" name="biaya" required=""
						   placeholder="Masukan Satuan">
				</div>
			</div>
			<button type="submit" id="submit" class="btn btn-primary pull-right" style="margin-right: 15px">
				Tambah</i></button>
		</form>

		<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
		<script type="text/javascript">
            $(document).ready(function () {
                $('#pil').change(function () {
                    //alert('Sukses! value is : ' + $(this).val());
                    var unit = $(this).val();
                    $.ajax({
                        url: '<?php echo base_url();?>index.php/JumlahTK/loadPilihanUnit',
                        method: 'POST',
                        data: {unit: unit},
                        async: false,
                        dataType: 'json',
                        success: function (data) {
                            var html = '';
                            var html2 = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html = data[i].karyawan_tetap;
                                html2 = data[i].karyawan_tidak_tetap;
                            }
                            console.log(html);
                            document.getElementById('kar_tetap').value = html;
                            document.getElementById('kar_tidak_tetap').value = html2;
                        }
                    });
                });
            });

            var rupiah = document.getElementById('biaya');
            rupiah.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split   		= number_string.split(','),
                    sisa     		= split[0].length % 3,
                    rupiah     		= split[0].substr(0, sisa),
                    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
		</script>
	</section>
</div>


