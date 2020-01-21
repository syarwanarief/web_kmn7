<div class="content-wrapper">
	<style>
		.chartContainer {
			position: relative;
			margin: auto;
			height: 70vh;
			width: 70vh;
			 
		}
	</style>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				HASIL EVALUASI PASCA PELATIHAN
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('pelatihan') ?>">Daftar Penilai</a></li>
			<li>Hasil Evaluasi</li>

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

		<form action="" method="post">

			<?php

			$skorAspek1 = array();
			$skorAspek2 = array();
			$skorAspek3 = array();
			$skorAspek4 = array();
			$skorAspek5 = array();

			foreach ($aspek1 as $data):

				if ($data->pertanyaan != null) {
					$skorAspek1[] = $data->jawaban;
				}
			endforeach;

			foreach ($aspek2 as $data):

				if ($data->pertanyaan != null) {
					$skorAspek2[] = $data->jawaban;
				}
			endforeach;

			foreach ($aspek3 as $data):

				if ($data->pertanyaan != null) {
					$skorAspek3[] = $data->jawaban;
				}
			endforeach;

			foreach ($aspek4 as $data):

				if ($data->pertanyaan != null) {
					$skorAspek4[] = $data->jawaban;
				}
			endforeach;

			foreach ($aspek5 as $data):

				if ($data->pertanyaan != null) {
					$skorAspek5[] = $data->jawaban;
				}
			endforeach;

			$hitungAspek1 = round(array_sum($skorAspek1) * 20 / count($skorAspek1));
			$hitungAspek2 = round(array_sum($skorAspek2) * 20 / count($skorAspek2));
			$hitungAspek3 = round(array_sum($skorAspek3) * 20 / count($skorAspek3));
			$hitungAspek4 = round(array_sum($skorAspek4) * 20 / count($skorAspek4));
			$hitungAspek5 = round(array_sum($skorAspek5) * 20 / count($skorAspek5));

			$jumlahsoal = count($skorAspek1)+count($skorAspek2)+count($skorAspek3)+count($skorAspek4)+count($skorAspek5);

			$jumlahAspek =  array_sum($skorAspek1) + array_sum($skorAspek2) + array_sum($skorAspek3)
				+ array_sum($skorAspek4) + array_sum($skorAspek5);

			$totalAspek = round($jumlahAspek* 20 / $jumlahsoal);

			?>

			<div class="box">
				<div class="row">
					<!---->
					<h3 style="padding-left: 25px"><b>Skor Per Aspek Evaluasi Pelatihan</b></h3>
					<div class="chartContainer">
						<canvas id="radarCanvas"></canvas>
					</div>


					<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
					<script>
                        var graphData = {
                            type: "radar",
                            data: {
                                labels: [
                                    "Aspek 1",
                                    "Aspek 2",
                                    "Aspek 3",
                                    "Aspek 4",
                                    "Aspek 5"
                                ],

                                datasets: [
                                    {
                                        label: "Skor Aspek",
                                        fill: true,
                                        lineTension: 0,
                                        backgroundColor: "rgba(255,140,0,0.3)",
                                        borderDashOffset: 0.0,
                                        pointBorderColor: "rgba(255,140,0,1)",
                                        pointBackgroundColor: "rgba(255,140,0,0.5)",
                                        pointBorderWidth: 2,
                                        pointHoverRadius: 8,
                                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                        pointHoverBorderWidth: 2,
                                        pointRadius: 4,
                                        pointHitRadius: 10,
                                        paddingTop: 5,
                                        data: [<?php echo $hitungAspek1 ?>,<?php echo $hitungAspek2 ?>,<?php echo $hitungAspek3 ?>,
											<?php echo $hitungAspek4 ?>,<?php echo $hitungAspek5 ?>,],
                                        spanGaps: false
                                    }
                                ]
                            },
                            options: {
                                scale: {
                                    ticks: {
                                        min: 0, // suggestedMin: 0,
                                        max: 100, //suggestedMax: 50
                                        stepSize: 10
                                    }
                                },
                                animation: {
                                    duration: 2000,
                                    easing: "easeOutElastic"
                                },
                                responsive: true
                            }
                        };


                        var context = document.getElementById("radarCanvas").getContext("2d");

                        var radarChart = new Chart(context, graphData); // Works fine

                        // canvas2svg 'mock' context
                        var svgContext = C2S(300, 300);

                        // new chart on 'mock' context fails:
                        var mySvg = new Chart(svgContext, graphData);
                        // Failed to create chart: can't acquire context from the given item

                        console.log(svgContext.getSerializedSvg(true));

					</script>

				</div>
			</div>

			<div class="box">
				<div class="row">

					<script src="https://www.koolchart.com/demo/LicenseKey/codepen/KoolChartLicense.js"></script>
					<script src="https://www.koolchart.com/demo/KoolChart/JS/KoolChart.js"></script>
					<link rel="stylesheet" href="https://www.koolchart.com/demo/KoolChart/Assets/Css/KoolChart.css"/>
					<h3 style="padding-top: 50px; padding-left: 25px"><b>Skor Total Evaluasi Pelatihan</b></h3>

					<div align="center"><font size="100" color="#ff7f50"> <?php echo $totalAspek; ?>%</font></div>

				</div>
			</div>

			<div class="box" style="padding: 20px">
				<div class="row" style="padding: 10px">

					<?php
					$pertanyaan_ = array();
					$jawaban = array();
					foreach ($tampil as $data):
						$pertanyaan_[] = $data->pertanyaan_;
						$jawaban[] = $data->jawaban;
					endforeach;
					?>

					<label>1. <?php echo $pertanyaan_[17]; ?></label>

					<table style="width: 98%; border: 1px solid">
						<thead>
						<tr style="background-color: #9d9d9d; border: 1px solid">
							<th>
								<div align="center" class="form-control" style="background-color: #CCCCCC">Program</div>
							</th>
							<th>
								<div align="center" class="form-control" style="background-color: #CCCCCC">Sasaran</div>
							</th>
							<th>
								<div align="center" class="form-control" style="background-color: #CCCCCC">Waktu
									Pelaksanaan
								</div>
							</th>
							<th>
								<div align="center" class="form-control" style="background-color: #CCCCCC">Hasil yang
									Dicapai
								</div>
							</th>
						</tr>
						</thead>
						<tbody>
						<tr>

							<?php
							$aspekText = explode("@@@", $jawaban[17]);
							foreach ($aspekText
									 as $value): ?>

								<td>
									<div class="form-control"><?php echo $value ?></div>
								</td>

							<?php endforeach; ?>

						</tr>
						</tbody>
					</table>
					<br><br>

					<label>2. <?php echo $pertanyaan_[18]; ?></label>
					<textarea class="form-control" rows="5" style="width: 98%; background-color: white"
							  disabled><?php echo $jawaban[18]; ?></textarea>
					<br><br>

					<label>3. <?php echo $pertanyaan_[19]; ?></label>
					<table style="width: 98%; border: 1px solid">
						<thead>
						<tr style="background-color: #9d9d9d; border: 1px solid">
							<th width="2%">
								<div align="center" class="form-control" style="background-color: #CCCCCC">No</div>
							</th>
							<th>
								<div align="center" class="form-control" style="background-color: #CCCCCC">Jabatan</div>
							</th>
							<th>
								<div align="center" class="form-control" style="background-color: #CCCCCC">Pelatihan
									Yang Diperlukan
								</div>
							</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td width="2%">
								<div align="center" class="form-control">1</div>
							</td>

							<?php
							$aspekText = explode("@@@", $jawaban[19]);
							foreach ($aspekText
									 as $value):
								$value1[] = $value;
							endforeach;

							for ($i = 0; $i < 2; $i++) {
								?>

								<td>
									<div class="form-control"><?php echo $value1[$i] ?></div>
								</td>

							<?php } ?>

						</tr>

						<tr>
							<td width="2%">
								<div align="center" class="form-control">2</div>
							</td>

							<?php
							for ($i = 2; $i < 4; $i++) {
								?>

								<td>
									<div class="form-control"><?php echo $value1[$i] ?></div>
								</td>

							<?php } ?>

						</tr>

						<tr>
							<td width="2%">
								<div align="center" class="form-control">3</div>
							</td>

							<?php
							for ($i = 4; $i < 6; $i++) {
								?>

								<td>
									<div class="form-control"><?php echo $value1[$i] ?></div>
								</td>

							<?php } ?>

						</tr>

						</tbody>
					</table>
					<br><br>

					<label>4. <?php echo $pertanyaan_[20]; ?></label>
					<textarea class="form-control" rows="5" style="width: 98%; background-color: white"
							  disabled><?php echo $jawaban[20]; ?></textarea>

				</div>
			</div>
		</form>
	</section>
</div>
