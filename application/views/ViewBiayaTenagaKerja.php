<div class="content-wrapper">


	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				BIAYA TENAGA KERJA
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('BiayaTK') ?>">Biaya Tenaga Kerja </a></li>

		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>

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
					</div>
				</form>
			</div>

		</div>

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
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i
								class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="panel panel-primary filterable">
						<div class="panel-heading">
							<h3 class="panel-title">Biaya Tenaga Kerja</h3>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-striped" border="2">
								<thead>
								<tr class="primary filters">
									<th><input type="text" class="form-control" placeholder="Uraian" disabled></th>
									<th><input type="text" class="form-control" placeholder="RKAP Tahun Ini" disabled>
									</th>
									<th><input type="text" class="form-control" placeholder="RKAP SDBI" disabled></th>
									<th><input type="text" class="form-control" placeholder="Realisasi" disabled></th>
									<th><input type="text" class="form-control" placeholder="%" disabled></th>
									<th><input type="text" class="form-control" placeholder="%" disabled></th>

								</tr>
								</thead>
								<tbody>
								<?php
								foreach ($tampil as $data):
									$uraian[] = $data->uraian;
									$rkap[] = $data->rkap_tahun;
									$rkap2[] = $data->rkap_sdbi;
									$realisasi[] = $data->realisasi;

								endforeach;

								if (count($uraian)==8){
								function rupiah($angka)
								{

									$hasil_rupiah = "Rp." . number_format($angka, 0, ',', '.');
									return $hasil_rupiah;

								}

								for ($i = 0; $i < count($uraian); $i++) {
									//$total[] = $k_tetap[$i] + $k_honor[$i] + $OS[$i] +$ila[$i] + $kamp[$i];
									?>
									<tr>
										<td><?php echo $uraian[$i] ?></td>
										<td><?php echo rupiah($rkap[$i]) ?></td>
										<td><?php echo rupiah($rkap2[$i]) ?></td>
										<td><?php echo rupiah($realisasi[$i]) ?></td>
										<td><?php if ($rkap[$i] && $realisasi[$i] != 0) {
												echo round($realisasi[$i] / $rkap2[$i] * 100);
											} else {
												echo "0";
											} ?>%
										</td>
										<td><?php if ($rkap2[$i] && $realisasi[$i] != 0) {
												echo round($realisasi[$i] / $rkap[$i] * 100);
											} else {
												echo "0";
											} ?>%
										</td>
									</tr>
								<?php } ?>
								<?php $hitungRkap = $rkap[3] + $rkap[4] + $rkap[5] + $rkap[6];
								$hitungRkap2 = $rkap2[3] + $rkap2[4] + $rkap2[5] + $rkap2[6];
								$hitung_realis = $realisasi[3] + $realisasi[4] + $realisasi[5] + $realisasi[6];
								$hitungRkapTotal = $rkap[2] + $hitungRkap;
								$hitungRkap2Total = $rkap2[2] + $hitungRkap2;
								$hitung_realisTotal = $realisasi[2] + $hitung_realis;
								?>
								<tr>
									<td>Include Premi</td>
									<td><?php echo rupiah($hitungRkapTotal); ?></td>
									<td><?php echo rupiah($hitungRkap2Total); ?></td>
									<td><?php echo rupiah($hitung_realisTotal); ?></td>
									<td><?php echo round($hitung_realisTotal / $hitungRkap2Total * 100); ?>%</td>
									<td><?php echo round($hitung_realisTotal / $hitungRkapTotal * 100); ?>%</td>
								</tr>
								<tr>
									<td>Exclude Premi</td>
									<td><?php $exPremi = $hitungRkapTotal - $rkap[7];
										echo rupiah($exPremi); ?></td>
									<td><?php $exPremi2 = $hitungRkap2Total - $rkap2[7];
										echo rupiah($exPremi2); ?></td>
									<td><?php $exPremi3 = $hitung_realisTotal - $realisasi[7];
										echo rupiah($exPremi3); ?></td>
									<td><?php echo round($exPremi3 / $exPremi2 * 100) ?>%</td>
									<td><?php echo round($exPremi3 / $exPremi * 100) ?>%</td>
								</tr>
								<tr>
									<td><b>Karyawan Tidak Tetap</b></td>
									<td><?php echo rupiah($hitungRkap); ?></td>
									<td><?php echo rupiah($hitungRkap2); ?></td>
									<td><?php echo rupiah($hitung_realis); ?></td>
									<td><?php echo round($hitung_realis / $hitungRkap2 * 100); ?>%</td>
									<td><?php echo round($hitung_realis / $hitungRkap * 100); ?>%</td>
								</tr>

								<tr>
									<td><b>Total Karyawan</b></td>
									<td><?php echo rupiah($hitungRkapTotal); ?></td>
									<td><?php echo rupiah($hitungRkap2Total); ?></td>
									<td><?php echo rupiah($hitung_realisTotal); ?></td>
									<td><?php echo round($hitung_realisTotal / $hitungRkap2Total * 100); ?>%</td>
									<td><?php echo round($hitung_realisTotal / $hitungRkapTotal * 100); ?>%</td>
								</tr>

								</tbody>
								<?php
								} else {
									echo "Data Masih Belum Lengkap, Silahkan Lengkapi Terlebih Dahulu";
								}
								?>

							</table>
						</div>
					</div>
					<a href="<?php echo base_url('BiayaTK/tambah_biayaTK') ?>">
						<button type="button" class="btn btn-primary pull-right">
							<i class="glyphicon glyphicon-edit"></i>
							Tambah Data
						</button>
					</a>
					<p style="margin-right: 15px">Info : <br>Klik
						<a href="<?php echo base_url('BiayaTK/editBiayaTK') ?>"><b>Disini</b></a> untuk
						melakukan perubahan
						data</p>
				</div>
		</section>
		<div style="background: #f9f9f9; margin-left: 15px;margin-right: 15px;padding: 10px">

			<canvas id="myChart" width="500" height="150"></canvas>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
			<script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["<?php echo $uraian[0]?>", "<?php echo $uraian[1]?>", "<?php echo $uraian[2]?>", "<?php echo $uraian[3]?>",
                            "<?php echo $uraian[4]?>", "<?php echo $uraian[5]?>", "<?php echo $uraian[6]?>", "Karyawan Tidak Tetap", "Total Karyawan",
                            "Include Premi", "<?php echo $uraian[7]?>", "Exclude Premi"],
                        datasets: [{
                            label: ' RKAP Tahun',
                            data: ["<?php echo $rkap[0]?>", "<?php echo $rkap[1]?>", "<?php echo $rkap[2]?>", "<?php echo $rkap[3]?>",
                                "<?php echo $rkap[4]?>", "<?php echo $rkap[5]?>", "<?php echo $rkap[6]?>",
                                "<?php echo $hitungRkap?>", "<?php echo $hitungRkapTotal?>", "<?php echo $hitungRkapTotal; ?>",
                                "<?php echo $rkap[7]; ?>", "<?php echo $exPremi; ?>"],
                            backgroundColor: [
                                'rgba(255, 99, 132,1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        },
                            {
                                label: 'RKAP SDBI',
                                data: ["<?php echo $rkap2[0]?>", "<?php echo $rkap2[1]?>", "<?php echo $rkap2[2]?>", "<?php echo $rkap2[3]?>",
                                    "<?php echo $rkap2[4]?>", "<?php echo $rkap2[5]?>", "<?php echo $rkap2[6]?>",
                                    "<?php echo $hitungRkap2?>", "<?php echo $hitungRkap2Total?>", "<?php echo $hitungRkap2Total; ?>",
                                    "<?php echo $rkap2[7]; ?>", "<?php echo $exPremi2; ?>"],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',

                                ],
                                borderWidth: 1
                            },
                            {
                                label: 'Realisasi',
                                data: ["<?php echo $realisasi[0]?>", "<?php echo $realisasi[1]?>", "<?php echo $realisasi[2]?>", "<?php echo $realisasi[3]?>",
                                    "<?php echo $realisasi[4]?>", "<?php echo $realisasi[5]?>", "<?php echo $realisasi[6]?>",
                                    "<?php echo $hitung_realis?>", "<?php echo $hitung_realisTotal?>", "<?php echo $hitung_realisTotal; ?>",
                                    "<?php echo $realisasi[7]; ?>", "<?php echo $exPremi3; ?>"],
                                backgroundColor: [
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                ],
                                borderWidth: 1
                            },
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    },
                });
                document.getElementById("myChart").onclick = function (evt) {
                    var activePoints = myChart.getElementsAtEventForMode(evt, 'point', myChart.options);
                    var firstPoint = activePoints[0];
                    var label = myChart.data.labels[firstPoint._index];
                    var value = myChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
                    document.getElementById("tampil").innerHTML = label + " : " + value;
                };
			</script>
			<p id="tampil"></p>
		</div>
</div>
