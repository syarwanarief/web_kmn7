<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				TAMBAH DATA
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li class="active"><a href="<?php echo base_url('Pelatihan') ?>"> <font
						face="Book Antiqua">DaftarPenilai</font></a></li>
			<li class="active"><font face="Book Antiqua">Tambah</font></li>
		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

	<section class="content">

		<!-- SELECT2 EXAMPLE -->

		<!-- /.box-header -->
		<!-- /.box-header -->
		<div class="box box-default">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<script type="text/javascript"
								src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
						<script type="text/javascript"
								src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
						<script type="text/javascript">

                            function penilai() {
                                var nopek = document.getElementById('nopekPenilai').value;
                                $.ajax({
                                    url: '<?php echo base_url();?>index.php/Pelatihan/getNopek',
                                    method: 'POST',
                                    data: {nopek: nopek},
                                    async: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        var nama = '';
                                        var jabatan = '';
                                        for (i = 0; i < data.length; i++) {
                                            nama = data[i].nama;
                                            jabatan = data[i].jabatan;
                                        }
                                        if (nama === '') {
                                            alert('Data karyawan tidak ditemukan untuk : ' + nopek)
                                        } else {
                                            document.getElementById('namaPenilai').value = nama;
                                            document.getElementById('jabatanPenilai').value = jabatan;

                                            document.getElementById('nopekPen').value = nopek;
                                            document.getElementById('jabatanPen').value = jabatan;
                                            document.getElementById('namaPen').value = nama;
                                        }
                                    },
                                    error: function (exception) {
                                        alert('Exeption:' + exception);
                                    }
                                });
                            }
						</script>
						<label>Penilai</label>
						<br>
						<label><font face="Book Antiqua">Nopek<font class="merah"> *</font></font></label>
						<div class="input-group">
							<input type="text" class="form-control" value="" placeholder="Nopek"
								   name="nopekPenilai" id="nopekPenilai">
							<span class="input-group-btn">
                <button type="submit" id="btnPenilai" class="btn btn-success" name="btnPenilai"><i
						class="fa fa-search" onclick="penilai();"></i>
                </button>
              </span>
						</div>
						<!-- /.form group -->
						<!-- /.form-group -->
						<div class="form-group">
							<label><font face="Book Antiqua">Nama<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Nama"
								   name="namaPenilai" id="namaPenilai" disabled>
						</div>

						<!-- /.form-group -->
						<div class="form-group">
							<label><font face="Book Antiqua">Jabatan<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Jabatan"
								   name="jabatanPenilai" id="jabatanPenilai" disabled>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box box-default">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<script type="text/javascript"
								src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
						<script type="text/javascript"
								src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
						<script type="text/javascript">

                            function peserta() {
                                var nopek = document.getElementById('nopekPeserta').value;
                                $.ajax({
                                    url: '<?php echo base_url();?>index.php/Pelatihan/getNopek',
                                    method: 'POST',
                                    data: {nopek: nopek},
                                    async: false,
                                    dataType: 'json',
                                    success: function (data) {
                                        var nama = '';
                                        var jabatan = '';
                                        var unit = '';
                                        for (i = 0; i < data.length; i++) {
                                            nama = data[i].nama;
                                            jabatan = data[i].jabatan;
                                            strata = data[i].Strata;
                                            unit = data[i].unit;
                                        }
                                        if (nama === '') {
                                            alert('Data karyawan tidak ditemukan untuk : ' + nopek)
                                        } else {
                                            document.getElementById('namaPeserta').value = nama;
                                            document.getElementById('jabatanPeserta').value = jabatan;
                                            document.getElementById('strata').value = strata;
                                            document.getElementById('unitKerja').value = unit;

                                            document.getElementById('nopekPes').value = nopek;
                                            document.getElementById('namaPes').value = nama;
                                            document.getElementById('jabatanPes').value = jabatan;
                                            document.getElementById('unit').value = unit;
                                        }
                                    },
                                    error: function (exception) {
                                        alert('Exeption:' + exception);
                                    }
                                });
                            }
						</script>
						<label>Peserta Pelatihan</label>
						<br>
						<label><font face="Book Antiqua">Nopek<font class="merah"> *</font></font></label>
						<div class="input-group">
							<input type="text" class="form-control" value="" placeholder="Nopek"
								   name="nopekPeserta" id="nopekPeserta">
							<span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success" onclick="peserta()"><i
						class="fa fa-search"></i>
                </button>
              </span>
						</div>

						<!-- /.form-group -->
						<div class="form-group">
							<label><font face="Book Antiqua">Nama<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Nama"
								   name="namaPeserta" id="namaPeserta" disabled>
						</div>
						<!-- /.row -->
						<div class="form-group">
							<label><font face="Book Antiqua">Jabatan<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Jabatan"
								   name="jabatanPeserta" id="jabatanPeserta" disabled>
						</div>
						<div class="form-group">
							<label><font face="Book Antiqua">Strata<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Strata"
								   name="strata" id="strata" disabled>
						</div>
						<div class="form-group">
							<label><font face="Book Antiqua">Unit Kerja<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Unit Kerja"
								   name="unitKerja" id="unitKerja" disabled>
						</div>
						<div class="form-group">
							<label><font face="Book Antiqua">Unit Kerja Saat Pelatihan<font class="merah"> *</font></font></label>
							<input type="text" class="form-control" value="" placeholder="Unit Kerja"
								   name="unitSaatPelatihan" id="unitSaatPelatihan">
						</div>
					</div>
				</div>
			</div>
		</div>

		<form role="form" method="post" enctype="multipart/form-data"
			  action="<?php echo base_url('Pelatihan/simpanPenilai') ?>">
			<div class="box box-default">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<label>Pelaksanaan Pelatihan</label>
							<!-- /.form-group -->
							<div class="form-group">
								<label><font face="Book Antiqua">No. Surat Tugas<font class="merah">
											*</font></font></label>
								<input type="text" class="form-control" value="" required=""
									   placeholder="No Surat Tugas"

									   name="noSurat">
							</div>
							<div class="form-group">
								<label><font face="Book Antiqua">Judul/Nama<font class="merah"> *</font></font></label>
								<input type="text" class="form-control" value="" required="" placeholder="judul/nama"
									   name="judul">
							</div>
							<div class="form-group">
								<label>Tanggal Mulai (TTTT/BB/TT)<font class="merah"> *</font></label>

								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="tglMulai"
										   class="datepicker" required="" placeholder="Contoh (Tahun/Bln/Tgl)">
								</div>
								<!-- /.input group -->
							</div>
							<!-- /.form-group -->
							<!-- Date -->
							<div class="form-group">
								<label>Tanggal Selesai (TTTT/BB/TT)<font class="merah"> *</font></label>

								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="tglSelesai"
										   class="datepicker" required="" placeholder="Contoh (Tahun/Bln/Tgl)" >
								</div>
								<!-- /.input group -->
							</div>
						</div>
					</div>
				</div>
			</div>

		<!-- tampung nilai -->
			<div style="display: none">
				<input type="text" id="nopekPen" name="nopekPen">
				<input type="text" id="namaPen" name="namaPen">
				<input type="text" id="jabatanPen" name="jabatanPen">
				<input type="text" id="nopekPes" name="nopekPes">
				<input type="text" id="namaPes" name="namaPes">
				<input type="text" id="jabatanPes" name="jabatanPes">
				<input type="text" id="unit" name="unit">
				<input type="text" id="unit" name="unitPel">
			</div>

			<button type="submit" class="btn btn-primary pull-right" name="submit">
				<i class="glyphicon glyphicon-floppy-saved"></i>
				Simpan
			</button>

			<p class="help-block">Catatan : <font class="merah"> *</font> Wajib Diisi</p>

		</form>
		<!-- /.form-group -->

		<!-- /.form-group -->
	</section>
</div>
