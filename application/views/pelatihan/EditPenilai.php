<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				EDIT DAFTAR PENILAIAN
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li><a href="<?php echo base_url("pelatihan") ?>"><font face="Book Antiqua">Daftar
						Penilai</font></a>
			</li>
			<li class="active"><font face="back"> Edit Daftar Penilai</font></li>
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
						<h3 class="panel-title">Daftar Penilaian</h3>
					</div>
					<br/>

					<div class="table-responsive">

						<table id="examplesdm" class="table table-bordered">
							<thead>
							<tr class="success filters">
								<th rowspan="2">
									<div align="top">No</div>
								</th>
								<th colspan="3">
									<div align="center">Penilai</div>
								</th>
								<th colspan="5">
									<div align="center">Peserta Pelatihan</div>
								</th>
								<th colspan="4">
									<div align="center">Pelaksana Pelatihan</div>
								</th>
								<th rowspan="2">
									<div align="top">Status</div>
								</th>
								<th rowspan="2">
									<div align="top">Ubah Data</div>
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
									<div align="center">Unit Saat Pelatihan</div>
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
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($tampil as $data):
								$id = $data->no_tugas;
								?>
								<tr>

									<input class="form-control" id="nopek_penilai<?php echo $data->id ?>"
										   name="nopek_penilai" value="<?php echo $data->nopek_penilai ?>" disabled style="display: none">

									<input class="form-control" id="nama_penilai<?php echo $data->id ?>"
										   name="nama_penilai" value="<?php echo $data->nama_penilai ?>" disabled style="display: none">

									<input class="form-control" id="jabatan_penilai<?php echo $data->id ?>"
										   name="jabatan_penilai" value="<?php echo $data->jabatan_penilai ?>"
										   disabled style="display: none">
									<input class="form-control" id="nopek_peserta<?php echo $data->id ?>"
										   name="nopek_peserta" value="<?php echo $data->nopek_peserta ?>" disabled style="display: none">

									<input class="form-control" id="nama_peserta<?php echo $data->id ?>"
										   name="nama_peserta" value="<?php echo $data->nama_peserta ?>" disabled style="display: none">

									<input class="form-control" id="jabatan_peserta<?php echo $data->id ?>"
										   name="jabatan_peserta" value="<?php echo $data->jabatan_peserta ?>"
										   disabled style="display: none">

									<input class="form-control" id="unit_peserta<?php echo $data->id ?>"
										   name="unit_peserta" value="<?php echo $data->unit_peserta ?>" disabled style="display: none">

									<input class="form-control" id="unit_saat_pelatihan<?php echo $data->id ?>"
										   name="unit_saat_pelatihan"
										   value="<?php echo $data->unit_saat_pelatihan ?>" disabled style="display: none">

									<input class="form-control" id="no_tugas<?php echo $data->id ?>"
										   name="no_tugas" value="<?php echo $data->no_tugas ?>" disabled style="display: none">

									<input class="form-control" id="judul_nama<?php echo $data->id ?>"
										   name="judul_nama" value="<?php echo $data->judul_nama ?>" disabled style="display: none">

									<input class="form-control" id="tgl_mulai<?php echo $data->id ?>"
										   name="tgl_mulai" value="<?php echo $data->tgl_mulai ?>" disabled style="display: none">

									<input class="form-control" id="tgl_selesai<?php echo $data->id ?>"
										   name="tgl_selesai" value="<?php echo $data->tgl_mulai ?>" disabled style="display: none">

									<input class="form-control" id="status<?php echo $data->id ?>" name="status"
										   value="<?php echo $data->status ?>" disabled style="display: none">


									<input type="text" value="<?php echo $data->id ?>" style="display: none"
										   name="id" id="id_<?php echo $data->id ?>">
									<td><?php echo $no++ ?></td>
									<td><input class="form-control" id="nopek_penilai_<?php echo $data->id ?>"
											   name="nopek_penilai" value="<?php echo $data->nopek_penilai ?>" disabled>
									</td>
									<td><input class="form-control" id="nama_penilai_<?php echo $data->id ?>"
											   name="nama_penilai" value="<?php echo $data->nama_penilai ?>" disabled>
									</td>
									<td><input class="form-control" id="jabatan_penilai_<?php echo $data->id ?>"
											   name="jabatan_penilai" value="<?php echo $data->jabatan_penilai ?>"
											   disabled></td>
									<td><input class="form-control" id="nopek_peserta_<?php echo $data->id ?>"
											   name="nopek_peserta" value="<?php echo $data->nopek_peserta ?>" disabled>
									</td>
									<td><input class="form-control" id="nama_peserta_<?php echo $data->id ?>"
											   name="nama_peserta" value="<?php echo $data->nama_peserta ?>" disabled>
									</td>
									<td><input class="form-control" id="jabatan_peserta_<?php echo $data->id ?>"
											   name="jabatan_peserta" value="<?php echo $data->jabatan_peserta ?>"
											   disabled></td>
									<td><input class="form-control" id="unit_peserta_<?php echo $data->id ?>"
											   name="unit_peserta" value="<?php echo $data->unit_peserta ?>" disabled>
									</td>
									<td><input class="form-control" id="unit_saat_pelatihan_<?php echo $data->id ?>"
											   name="unit_saat_pelatihan"
											   value="<?php echo $data->unit_saat_pelatihan ?>" disabled></td>
									<td><input class="form-control" id="no_tugas_<?php echo $data->id ?>"
											   name="no_tugas" value="<?php echo $data->no_tugas ?>" disabled></td>
									<td><input class="form-control" id="judul_nama_<?php echo $data->id ?>"
											   name="judul_nama" value="<?php echo $data->judul_nama ?>" disabled></td>
									<td><input class="form-control" id="tgl_mulai_<?php echo $data->id ?>"
											   name="tgl_mulai" value="<?php echo $data->tgl_mulai ?>" disabled></td>
									<td><input class="form-control" id="tgl_selesai_<?php echo $data->id ?>"
											   name="tgl_selesai" value="<?php echo $data->tgl_selesai ?>" disabled></td>

									<td><input class="form-control" id="status_<?php echo $data->id ?>" name="status"
											   value="<?php echo $data->status ?>" disabled></td>
									<td>

										<button type="submit" class="btn btn-xs btn-success"
												id="edit_<?php echo $data->id ?>" name="edit"
												onclick="edit(<?php echo $data->id ?>);">Ubah
										</button>

										<button type="submit" class="btn btn-xs btn-success"
												id="save_<?php echo $data->id ?>" name="save"
												onclick="save(<?php echo $data->id ?>);" style="display: none">Simpan
										</button>

										<script type="text/javascript"
												src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
										<script type="text/javascript"
												src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
										<script type="text/javascript">

                                            function edit(id) {

                                                document.getElementById("save_" + id).style.display = "block";
                                                document.getElementById("edit_" + id).style.display = "none";

                                                document.getElementById("nopek_penilai_" + id).disabled = false;
                                                document.getElementById("nama_penilai_" + id).disabled = false;
                                                document.getElementById("jabatan_penilai_" + id).disabled = false;
                                                document.getElementById("nopek_peserta_" + id).disabled = false;
                                                document.getElementById("nama_peserta_" + id).disabled = false;
                                                document.getElementById("jabatan_peserta_" + id).disabled = false;
                                                document.getElementById("unit_peserta_" + id).disabled = false;
                                                document.getElementById("unit_saat_pelatihan_" + id).disabled = false;
                                                document.getElementById("no_tugas_" + id).disabled = false;
                                                document.getElementById("judul_nama_" + id).disabled = false;
                                                document.getElementById("tgl_mulai_" + id).disabled = false;
                                                document.getElementById("tgl_selesai_" + id).disabled = false;
                                                document.getElementById("status_" + id).disabled = false;

                                                return false;
                                            }

                                            function save(id) {

                                                document.getElementById("edit_" + id).style.display = "block";
                                                document.getElementById("save_" + id).style.display = "none";

                                                document.getElementById("nopek_penilai_" + id).disabled = true;
                                                document.getElementById("nama_penilai_" + id).disabled = true;
                                                document.getElementById("jabatan_penilai_" + id).disabled = true;
                                                document.getElementById("nopek_peserta_" + id).disabled = true;
                                                document.getElementById("nama_peserta_" + id).disabled = true;
                                                document.getElementById("jabatan_peserta_" + id).disabled = true;
                                                document.getElementById("unit_peserta_" + id).disabled = true;
                                                document.getElementById("unit_saat_pelatihan_" + id).disabled = true;
                                                document.getElementById("no_tugas_" + id).disabled = true;
                                                document.getElementById("judul_nama_" + id).disabled = true;
                                                document.getElementById("tgl_mulai_" + id).disabled = true;
                                                document.getElementById("tgl_selesai_" + id).disabled = true;
                                                document.getElementById("status_" + id).disabled = true;

                                                var idPenilai = document.getElementById("id_" + id).value;

                                                var nopek_penilaiOld = document.getElementById("nopek_penilai" + id).value;
                                                var nama_penilaiOld = document.getElementById("nama_penilai" + id).value;
                                                var jabatan_penilaiOld = document.getElementById("jabatan_penilai" + id).value;
                                                var nopek_pesertaOld = document.getElementById("nopek_peserta" + id).value;
                                                var nama_pesertaOld = document.getElementById("nama_peserta" + id).value;
                                                var jabatan_pesertaOld = document.getElementById("jabatan_peserta" + id).value;
                                                var unit_pesertaOld = document.getElementById("unit_peserta" + id).value;
                                                var unit_saat_pelatihanOld = document.getElementById("unit_saat_pelatihan" + id).value;
                                                var no_tugasOld = document.getElementById("no_tugas" + id).value;
                                                var judul_namaOld = document.getElementById("judul_nama" + id).value;
                                                var tgl_mulaiOld = document.getElementById("tgl_mulai" + id).value;
                                                var tgl_selesaiOld = document.getElementById("tgl_selesai" + id).value;
                                                var statusOld = document.getElementById("status" + id).value;

                                                var nopek_penilai = document.getElementById("nopek_penilai_" + id).value;
                                                var nama_penilai = document.getElementById("nama_penilai_" + id).value;
                                                var jabatan_penilai = document.getElementById("jabatan_penilai_" + id).value;
                                                var nopek_peserta = document.getElementById("nopek_peserta_" + id).value;
                                                var nama_peserta = document.getElementById("nama_peserta_" + id).value;
                                                var jabatan_peserta = document.getElementById("jabatan_peserta_" + id).value;
                                                var unit_peserta = document.getElementById("unit_peserta_" + id).value;
                                                var unit_saat_pelatihan = document.getElementById("unit_saat_pelatihan_" + id).value;
                                                var no_tugas = document.getElementById("no_tugas_" + id).value;
                                                var judul_nama = document.getElementById("judul_nama_" + id).value;
                                                var tgl_mulai = document.getElementById("tgl_mulai_" + id).value;
                                                var tgl_selesai = document.getElementById("tgl_selesai_" + id).value;
                                                var status = document.getElementById("status_" + id).value;

                                                if (nopek_penilai !== nopek_penilaiOld || nama_penilai !== nama_penilaiOld || jabatan_penilaiOld !== jabatan_penilai
													|| nopek_peserta !== nopek_pesertaOld || nama_peserta !== nama_pesertaOld || jabatan_peserta !== jabatan_pesertaOld
													|| unit_peserta !== unit_pesertaOld || unit_saat_pelatihan !== unit_saat_pelatihanOld || judul_nama !== judul_namaOld
													|| tgl_mulai !== tgl_mulaiOld || tgl_selesai !== tgl_selesaiOld || status !== statusOld) {

                                                    $.ajax({
                                                        url: '<?php echo base_url();?>index.php/Pelatihan/SimpanPerubahanPenilai',
                                                        method: 'POST',
                                                        data: {
                                                            id: idPenilai,
                                                            nopek_penilai: nopek_penilai,
                                                            nama_penilai: nama_penilai,
                                                            jabatan_penilai: jabatan_penilai,
                                                            nopek_peserta: nopek_peserta,
                                                            nama_peserta: nama_peserta,
                                                            jabatan_peserta: jabatan_peserta,
                                                            unit_peserta: unit_peserta,
                                                            unit_saat_pelatihan,
                                                            no_tugas: no_tugas,
                                                            judul_nama: judul_nama,
                                                            tgl_mulai: tgl_mulai,
                                                            tgl_selesai: tgl_selesai,
                                                            status: status
                                                        },
                                                        async: false,
                                                        dataType: 'json',
                                                        success: function (data) {
                                                            alert("Berhasil Menyimpan Perubahan");
                                                        },
                                                        error: function () {
                                                            alert("Gagal Melakukan Perubahan");
                                                            window.location.href = "BukaEditPenilai";
                                                        }

                                                    });
                                                    return false;
                                                } else {
                                                    alert("Belum ada Perubahan yang dilakukan, Tidak ada data yang diubah")
                                                }
                                            }
										</script>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>

	</section>
	<!-- right col (We are only adding the ID to make the widgets sortable)-->

	<!-- right col -->
</div>
<!-- /.row (main row) -->
