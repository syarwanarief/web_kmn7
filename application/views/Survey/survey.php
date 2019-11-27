<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				BUAT EVALUASI
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('pelatihan/user') ?>">Evaluasi Pasca Pelatihan</a></li>
			<li>Buat Evaluasi</li>

		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

	<section class="content">

		<div class="preloader">
			<div class="loading">
				<div align="center">

					<img src="<?php echo base_url('assets/images/Loading1.GIF') ?>" width="20%">
					<p></p>
					<p><strong>Harap Tunggu, Sedang Memuat Halaman.</strong></p>
				</div>
			</div>
		</div>

		<form action="<?php echo base_url('Pelatihan/simpanSurvey') ?>" method="post">
			<div class="box" style="padding: 20px">
				<div class="row" style="padding: 10px">
					<center><h3>EVALUASI PASCA PELATIHAN</h3></center>
					<div class="table" style="padding-left: 40px; border-top: 1px solid;margin-top: 20px">
						<br>
						<table>
							<thead>
							<tr>
								<th>Nama Atasan</th>
								<td> : <?php foreach ($tampil as $data): echo $data->nama_penilai; endforeach; ?> </td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<td>
									: <?php foreach ($tampil as $data): echo $data->jabatan_penilai; endforeach; ?> </td>
							</tr>
							<tr>
								<th><br></th>
							</tr>
							<tr>
								<th>Nama Peserta Pelatihan</th>
								<td> : <?php foreach ($tampil as $data): echo $data->nama_peserta; endforeach; ?> </td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<td>
									: <?php foreach ($tampil as $data): echo $data->jabatan_peserta; endforeach; ?> </td>
							</tr>
							<tr>
								<th>Unit Kerja</th>
								<td> : <?php foreach ($tampil as $data): echo $data->unit_peserta; endforeach; ?> </td>
							</tr>
							<tr>
								<th><br></th>
							</tr>
							<tr>
								<th>Judul Pelatihan</th>
								<td> : <?php foreach ($tampil as $data): echo $data->judul_nama; endforeach; ?></td>
							</tr>
							<tr>
								<th>Tanggal Mulai</th>
								<td> : <?php foreach ($tampil as $data): echo $data->tgl_mulai; endforeach; ?> </td>
							</tr>
							<tr>
								<th>Tanggal Selesai</th>
								<td> : <?php foreach ($tampil as $data): echo $data->tgl_selesai; endforeach; ?> </td>
							</tr>
							<tr>
								<th>Lama Pelatihan (Durasi)</th>
								<td> : <?php
									$mulai = date_create($data->tgl_mulai);
									$selesai = date_create($data->tgl_selesai);
									echo date_diff($mulai, $selesai)->format("%a Hari") ?> </td>
							</tr>
							<tr>
							</tr>

							</thead>
							<tr>

							</tr>
						</table>
					</div>
					<br>
					<input type="hidden" name="no_tugas"
						   value="<?php foreach ($tampil as $data): echo $data->no_tugas; endforeach; ?>">

					<div style="padding-left: 40px">
						<label><u>Petunjuk:</u></label>
						<p>
							Pilihlah skor dari setiap pernyataan di bawah ini dengan mengklik pada kolom
							skor. Pilihan skor terdiri dari angka 1 s.d. 5. Besaran angka yang Anda pilih menunjukkan
							derajat (tingkat) persetujuan Anda: 1 = Sangat tidak setuju, 2 = Tidak Setuju, 3 = Cukup
							Setuju,
							4 = Setuju, 5 = Sangat Setuju.
						</p>
						<br>
						<h4>PILIHLAH SKOR TERSEBUT APA ADANYA SESUAI DENGAN REALISASI</h4>
						<br>
						<p><b>I. Peningkatan Kompetensi</b></p>
						<div class="table-responsive">
							<table class="table" style="width: 98%; border: 1px solid">
								<thead>
								<tr style="background-color: #9d9d9d; border: 1px solid">
									<th>
										<div align="center">No</div>
									</th>
									<th>
										<div align="center">Pertanyaan</div>
									</th>
									<th colspan="5">
										<div align="center">Skor</div>
									</th>
								</tr>
								</thead>
								<?php $no = 1;
								foreach ($pertanyaan1 as $data):
									$id1[] = $data->id_pertanyaan;
									$soal1[] = $data->pertanyaan;
								endforeach; ?>

								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan1sub1"
											   value="<?php echo $soal1[0]; ?>">
									</th>
									<th>
										<?php echo $soal1[0] ?>
									</th>
									<th>
										<input type="radio" name="jawaban1Soal1" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban1Soal1" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban1Soal1" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban1Soal1" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban1Soal1" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan2sub1"
											   value="<?php echo $soal1[1]; ?>">
									</th>
									<th>
										<?php echo $soal1[1] ?>
									</th>
									<th>
										<input type="radio" name="jawaban1Soal2" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban1Soal2" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban1Soal2" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban1Soal2" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban1Soal2" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan3sub1"
											   value="<?php echo $soal1[2]; ?>">
									</th>
									<th>
										<?php echo $soal1[2] ?>
									</th>
									<th>
										<input type="radio" name="jawaban1Soal3" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban1Soal3" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban1Soal3" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban1Soal3" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban1Soal3" value="5"> 5
									</th>
								</tr>
							</table>
						</div>

						<p><b>II. Peningkatan Kinerja</b></p>
						<div class="table-responsive">
							<table class="table" style="width: 98%; border: 1px solid">
								<thead>
								<tr style="background-color: #9d9d9d; border: 1px solid">
									<th>
										<div align="center">No</div>
									</th>
									<th>
										<div align="center">Pertanyaan</div>
									</th>
									<th colspan="5">
										<div align="center">Skor</div>
									</th>
								</tr>
								</thead>
								<?php $no = 1;
								foreach ($pertanyaan2 as $data):
									$id2[] = $data->id_pertanyaan;
									$soal2[] = $data->pertanyaan;
								endforeach; ?>

								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan1sub2"
											   value="<?php echo $soal2[0]; ?>">
									</th>
									<th>
										<?php echo $soal2[0] ?>
									</th>
									<th>
										<input type="radio" name="jawaban2Soal1" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban2Soal1" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban2Soal1" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban2Soal1" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban2Soal1" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan2sub2"
											   value="<?php echo $soal2[1]; ?>">
									</th>
									<th>
										<?php echo $soal2[1] ?>
									</th>
									<th>
										<input type="radio" name="jawaban2Soal2" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban2Soal2" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban2Soal2" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban2Soal2" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban2Soal2" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan3sub2"
											   value="<?php echo $soal2[2]; ?>">
									</th>
									<th>
										<?php echo $soal2[2] ?>
									</th>
									<th>
										<input type="radio" name="jawaban2Soal3" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban2Soal3" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban2Soal3" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban2Soal3" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban2Soal3" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan4sub2"
											   value="<?php echo $soal2[3]; ?>">
									</th>
									<th>
										<?php echo $soal2[3] ?>
									</th>
									<th>
										<input type="radio" name="jawaban2Soal4" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban2Soal4" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban2Soal4" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban2Soal4" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban2Soal4" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan5sub2"
											   value="<?php echo $soal2[4]; ?>">
									</th>
									<th>
										<?php echo $soal2[4] ?>
									</th>
									<th>
										<input type="radio" name="jawaban2Soal5" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban2Soal5" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban2Soal5" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban2Soal5" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban2Soal5" value="5"> 5
									</th>
								</tr>
							</table>
						</div>

						<p><b>III. Implementasi Hasil Pelatihan</b></p>
						<div class="table-responsive">
							<table class="table" style="width: 98%; border: 1px solid">
								<thead>
								<tr style="background-color: #9d9d9d; border: 1px solid">
									<th>
										<div align="center">No</div>
									</th>
									<th>
										<div align="center">Pertanyaan</div>
									</th>
									<th colspan="5">
										<div align="center">Skor</div>
									</th>
								</tr>
								</thead>
								<?php $no = 1;
								foreach ($pertanyaan3 as $data):
									$id3[] = $data->id_pertanyaan;
									$soal3[] = $data->pertanyaan;
								endforeach; ?>

								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan1sub3"
											   value="<?php echo $soal3[0]; ?>">
									</th>
									<th>
										<?php echo $soal3[0] ?>
									</th>
									<th>
										<input type="radio" name="jawaban3Soal1" value="1" onchange="hide3();"> 1
									</th>
									<th>
										<input type="radio" name="jawaban3Soal1" value="2" onchange="hide3();"> 2
									</th>
									<th>
										<input type="radio" name="jawaban3Soal1" value="3" onchange="hide3();"> 3
									</th>
									<th>
										<input type="radio" name="jawaban3Soal1" value="4" onchange="show3();"> 4
									</th>
									<th>
										<input type="radio" name="jawaban3Soal1" value="5" onchange="show3();"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan2sub3"
											   value="<?php echo $soal3[1]; ?>">
									</th>
									<th>
										<?php echo $soal3[1] ?>
									</th>
									<th>
										<input type="radio" name="jawaban3Soal2" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban3Soal2" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban3Soal2" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban3Soal2" value="4" onclick="hide3();"> 4
									</th>
									<th>
										<input type="radio" name="jawaban3Soal2" value="5" onclick="hide3();"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan3sub3"
											   value="<?php echo $soal3[2]; ?>">
									</th>
									<th>
										<?php echo $soal3[2] ?>
									</th>
									<th>
										<input type="radio" name="jawaban3Soal3" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban3Soal3" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban3Soal3" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban3Soal3" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban3Soal3" value="5"> 5
									</th>
								</tr>

								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan4sub3"
											   value="<?php echo $soal3[3]; ?>">
									</th>
									<th>
										<?php echo $soal3[3] ?>
									</th>
									<th>
										<input type="radio" name="jawaban3Soal4" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban3Soal4" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban3Soal4" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban3Soal4" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban3Soal4" value="5"> 5
									</th>
								</tr>
							</table>
						</div>

						<div name="div1" id="div1" style="display: none">
							<?php foreach ($pertanyaan as $key => $data):
								$idText[] = $data->id_pertanyaan;
								$text[] = $data->pertanyaan;
							endforeach; ?>

							<input type="text" name="text0"
								   value="<?php echo $text[0]; ?>" style="display: none">
							<p><b>* <?php echo $text[0] ?><br>
									(Wajib diisi bila pada point III.1 Anda memilih skor 4 atau 5)</b></p>
							<div class="table-responsive">
								<table style="width: 98%; border: 1px solid">
									<thead>
									<tr style="background-color: #9d9d9d; border: 1px solid">
										<th>
											<div align="center">No</div>
										</th>
										<th>
											<div align="center">Program</div>
										</th>
										<th>
											<div align="center">Sasaran</div>
										</th>
										<th>
											<div align="center">Waktu Pelaksanaan</div>
										</th>
										<th>
											<div align="center">Hasil yang Dicapai</div>
										</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>
											<div align="center">1</div>
										</td>
										<Td>
											<input class="form-control"  name="program1">
										</Td>
										<Td>
											<input class="form-control"  name="sasaran1">
										</Td>
										<Td>
											<input class="form-control"  name="waktu_pelatihan1">
										</Td>
										<Td>
											<input class="form-control"  name="hasil_dicapai1">
										</Td>
									</tr>
									</tbody>
								</table>
							</div>
							<br><br>
						</div>

						<p><b>IV. Knowledge Sharing</b></p>
						<div class="table-responsive">
							<table class="table" style="width: 98%; border: 1px solid">
								<thead>
								<tr style="background-color: #9d9d9d; border: 1px solid">
									<th>
										<div align="center">No</div>
									</th>
									<th>
										<div align="center">Pertanyaan</div>
									</th>
									<th colspan="5">
										<div align="center">Skor</div>
									</th>
								</tr>
								</thead>
								<?php $no = 1;
								foreach ($pertanyaan4 as $data): $id4[] = $data->id_pertanyaan;
									$soal4[] = $data->pertanyaan;
								endforeach; ?>

								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan1sub4"
											   value="<?php echo $soal4[0]; ?>">
									</th>
									<th>
										<?php echo $soal4[0] ?>
									</th>
									<th>
										<input type="radio" name="jawaban4Soal1" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban4Soal1" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban4Soal1" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban4Soal1" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban4Soal1" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan2sub4"
											   value="<?php echo $soal4[1]; ?>">
									</th>
									<th>
										<?php echo $soal4[1] ?>
									</th>
									<th>
										<input type="radio" name="jawaban4Soal2" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban4Soal2" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban4Soal2" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban4Soal2" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban4Soal2" value="5"> 5
									</th>
								</tr>
							</table>
						</div>

						<p><b>V. Peran Atasan</b></p>
						<div class="table-responsive">
							<table class="table" style="width: 98%; border: 1px solid">
								<thead>
								<tr style="background-color: #9d9d9d; border: 1px solid">
									<th>
										<div align="center">No</div>
									</th>
									<th>
										<div align="center">Pertanyaan</div>
									</th>
									<th colspan="5">
										<div align="center">Skor</div>
									</th>
								</tr>
								</thead>
								<?php $no = 1;
								foreach ($pertanyaan5 as $data): $id5[] = $data->id_pertanyaan;
									$soal5[] = $data->pertanyaan;
								endforeach; ?>

								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan1sub5"
											   value="<?php echo $soal5[0]; ?>">
									</th>
									<th>
										<?php echo $soal5[0] ?>
									</th>
									<th>
										<input type="radio" name="jawaban5Soal1" value="1" onchange="hide5();"> 1
									</th>
									<th>
										<input type="radio" name="jawaban5Soal1" value="2" onchange="hide5();"> 2
									</th>
									<th>
										<input type="radio" name="jawaban5Soal1" value="3" onchange="hide5();"> 3
									</th>
									<th>
										<input type="radio" name="jawaban5Soal1" value="4" onchange="show5();"> 4
									</th>
									<th>
										<input type="radio" name="jawaban5Soal1" value="5" onchange="show5();"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan2sub5"
											   value="<?php echo $soal5[1]; ?>">
									</th>
									<th>
										<?php echo $soal5[1] ?>
									</th>
									<th>
										<input type="radio" name="jawaban5Soal2" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban5Soal2" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban5Soal2" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban5Soal2" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban5Soal2" value="5"> 5
									</th>
								</tr>
								<tr>
									<th>
										<?php echo $no++ ?>
										<input type="hidden" name="pertanyaan3sub5"
											   value="<?php echo $soal5[2]; ?>">
									</th>
									<th>
										<?php echo $soal5[2] ?>
									</th>
									<th>
										<input type="radio" name="jawaban5Soal3" value="1"> 1
									</th>
									<th>
										<input type="radio" name="jawaban5Soal3" value="2"> 2
									</th>
									<th>
										<input type="radio" name="jawaban5Soal3" value="3"> 3
									</th>
									<th>
										<input type="radio" name="jawaban5Soal3" value="4"> 4
									</th>
									<th>
										<input type="radio" name="jawaban5Soal3" value="5"> 5
									</th>
								</tr>
							</table>
						</div>
						<br>

						<script>
                            function show3() {
                                document.getElementById('div1').style.display = "block";
                            }
                            function show5() {
                                document.getElementById('div2').style.display = "block";
                            }
                            function hide3() {
                                document.getElementById('div1').style.display = "none";
                            }
                            function hide5() {
                                document.getElementById('div2').style.display = "none";
                            }
						</script>

						<div name="div2" id="div2" style="display: none">
							<label>* Upaya Pembimbingan Atasan Terhadap Peserta<br>
								(Wajib diisi bila pada point V.1 Anda memilih skor 4 atau 5)</label>

							<div class="form-group">
								<p><?php echo $text[1] ?></p>
								<input type="text" name="text1"
									   value="<?php echo $text[1]; ?>" style="display: none">
								<textarea class="form-control" rows="5" id="text1" name="jwbText1"
										  style="width: 98%;"></textarea>
							</div>
							<br>
						</div>

					</div>

					<div class="form-group" style="padding-left: 40px">
						<?php foreach ($pertanyaan as $key => $data):
							$idText[] = $data->id_pertanyaan;
							$text[] = $data->pertanyaan;
						endforeach; ?>

						<label>VI. <?php echo $text[3] ?> (Minimal 15 Karakter)</label><br>
						<input type="text" name="text3"
							   value="<?php echo $text[3]; ?>" style="display: none">
						<div class="form-group">
							<label for="comment"></label>
							<textarea class="form-control" rows="5" id="comment" name="comment" style="width: 98%;"
									  onkeypress="kritik();"></textarea>
						</div>

						<script>
                            function kritik() {
                                var kritik = document.getElementById('comment').value;
                                if (kritik.length <= 13) {
                                    var submit = document.getElementById('submit').disabled = true;
                                } else {
                                    var submit = document.getElementById('submit').disabled = false;
                                }
                            }
						</script>


						<label>VII. Penelusuran Kebutuhan Pelatihan</label>
						<p><?php echo $text[2] ?> </p>
						<input type="text" name="text2"
							   value="<?php echo $text[2]; ?>" style="display: none">
						<div class="table-responsive">
							<table style="width: 98%; border: 1px solid">
								<thead>
								<tr style="background-color: #9d9d9d; border: 1px solid">
									<th>
										<div align="center">No</div>
									</th>
									<th>
										<div align="center">Jabatan</div>
									</th>
									<th>
										<div align="center">Pelatihan Yang Diperlukan</div>
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										<div align="center">1</div>
									</td>
									<Td>
										<input class="form-control" required="" name="jabatan1">
									</Td>
									<Td>
										<input class="form-control" required="" name="pelatihan1">
									</Td>
								</tr>
								<tr>
									<td>
										<div align="center">2</div>
									</td>
									<Td>
										<input class="form-control" required="" name="jabatan2">
									</Td>
									<Td>
										<input class="form-control" required="" name="pelatihan2">
									</Td>
								</tr>
								<tr>
									<td>
										<div align="center">3</div>
									</td>
									<Td>
										<input class="form-control" required="" name="jabatan3">
									</Td>
									<Td>
										<input class="form-control" required="" name="pelatihan3">
									</Td>
								</tr>
								</tbody>
							</table>
						</div>
						<br><br>

						<button style="margin-right: 20px" type="submit" name="submit" id="submit"
								class="btn btn-primary pull-right" required="" disabled>
							submit
						</button>
					</div>
				</div>
			</div>
		</form>

	</section>
</div>
