<div class="content-wrapper">
	<style>

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

			$hitungAspek1 = round($skorAspek1[0] * 20 / count($skorAspek1) + 40);

			?>

			<div class="box" style="padding: 20px">
				<div class="row" style="padding: 10px">

					<script src="https://www.koolchart.com/demo/LicenseKey/codepen/KoolChartLicense.js"></script>
					<script src="https://www.koolchart.com/demo/KoolChart/JS/KoolChart.js"></script>
					<link rel="stylesheet" href="https://www.koolchart.com/demo/KoolChart/Assets/Css/KoolChart.css"/>
					<div id="chartHolder" style="height:500px; width:100%;"></div>

					<script>
                        var chartVars = "KoolOnLoadCallFunction=chartReadyHandler";

                        KoolChart.create("chart1", "chartHolder", chartVars, "100%", "100%");

                        function chartReadyHandler(id) {
                            document.getElementById(id).setLayout(layoutStr);
                            document.getElementById(id).setData(chartData);
                        }

                        var layoutStr =
                            '<KoolChart backgroundColor="#FFFFFF"  borderStyle="none">'
                            +'<Options>'
                            +'<Caption text="Hasil Skor Evaluasi Pelatihan" fontFamily="Malgun Gothic"/>'
                            +'<Legend useVisibleCheck="true" fontFamily="Malgun Gothic"/>'
                            +'</Options>'
                            +'<RadarChart id="chart1" isSeriesOnAxis="true" type="circle" paddingTop="25" paddingBottom="25" showDataTips="true">'
                            +'<backgroundElements>'
                            +'<RadarGridLines>'
                            +'<radarAlternateFill>'
                            +'<SolidColor color="#ffffff"/>'
                            +'</radarAlternateFill>'
                            +'</RadarGridLines>'
                            +'</backgroundElements>'
                            +'<radialAxis>'
                            +'<LinearAxis id="rAxis"/>'
                            +'</radialAxis>'
                            +'<angularAxis>'
                            +'<CategoryAxis id="aAxis" categoryField="catName" displayName="Category"/>'
                            +'</angularAxis>'
                            +'<radialAxisRenderers>'
                            +'<Axis2DRenderer axis="{rAxis}" horizontal="true" visible="true" tickPlacement="outside" tickLength="4">'
                            +'<axisStroke>'
                            +'<Stroke color="#555555" weight="1"/>'
                            +'</axisStroke>'
                            +'</Axis2DRenderer>'
                            +'<Axis2DRenderer axis="{rAxis}" horizontal="false" visible="true" tickPlacement="outside" tickLength="4">'
                            +'<axisStroke>'
                            +'<Stroke color="#555555" weight="1"/>'
                            +'</axisStroke>'
                            +'</Axis2DRenderer>'
                            +'</radialAxisRenderers>'
                            +'<angularAxisRenderers>'
                            +'<AngularAxisRenderer axis="{aAxis}"/>'
                            +'</angularAxisRenderers>'
                            +'<series>'
                            +'<RadarSeries field="aspek1" displayName="Aspek 1">'
                            +'<stroke>'
                            +'<Stroke color="#03a9f5" weight="2"/>'
                            +'</stroke>'
                            +'<lineStroke>'
                            +'<Stroke color="#03a9f5" weight="2"/>'
                            +'</lineStroke>'
                            +'<showDataEffect>'
                            +'<SeriesInterpolate/>'
                            +'</showDataEffect>'
                            +'</RadarSeries>'
                            +'<RadarSeries field="aspek2" displayName="Aspek 2">'
                            +'<stroke>'
                            +'<Stroke color="#4352a5" weight="2"/>'
                            +'</stroke>'
                            +'<lineStroke>'
                            +'<Stroke color="#4352a5" weight="2"/>'
                            +'</lineStroke>'
                            +'<areaFill>'
                            +'<SolidColor color="#4352a5" alpha="0.3"/>'
                            +'</areaFill>'
                            +'<showDataEffect>'
                            +'<SeriesInterpolate/>'
                            +'</showDataEffect>'
                            +'</RadarSeries>'
                            +'<RadarSeries field="aspek3" displayName="Aspek 3">'
                            +'<stroke>'
                            +'<Stroke color="#f9c243" weight="2"/>'
                            +'</stroke>'
                            +'<lineStroke>'
                            +'<Stroke color="#f9c243" weight="2"/>'
                            +'</lineStroke>'
                            +'<areaFill>'
                            +'<SolidColor color="#f9c243" alpha="0.3"/>'
                            +'</areaFill>'
                            +'<showDataEffect>'
                            +'<SeriesInterpolate/>'
                            +'</showDataEffect>'
                            +'</RadarSeries>'
                            +'<RadarSeries field="aspek4" displayName="Aspek 4">'
                            +'<stroke>'
                            +'<Stroke color="#66ff66" weight="2"/>'
                            +'</stroke>'
                            +'<lineStroke>'
                            +'<Stroke color="#66ff66" weight="2"/>'
                            +'</lineStroke>'
                            +'<areaFill>'
                            +'<SolidColor color="#f9c243" alpha="0.3"/>'
                            +'</areaFill>'
                            +'<showDataEffect>'
                            +'<SeriesInterpolate/>'
                            +'</showDataEffect>'
                            +'</RadarSeries>'
                            +'<RadarSeries field="aspek5" displayName="Aspek 5">'
                            +'<stroke>'
                            +'<Stroke color="#21cbc0" weight="2"/>'
                            +'</stroke>'
                            +'<lineStroke>'
                            +'<Stroke color="#21cbc0" weight="2"/>'
                            +'</lineStroke>'
                            +'<areaFill>'
                            +'<SolidColor color="#21cbc0" alpha="0.3"/>'
                            +'</areaFill>'
                            +'<showDataEffect>'
                            +'<SeriesInterpolate/>'
                            +'</showDataEffect>'
                            +'</RadarSeries>'
                            +'</series>'
                            +'</RadarChart>'
                            +'</KoolChart>';

                        var chartData =
                            [{"catName":"Aspek 1", "aspek1":140,"aspek2":110,"aspek3":90,"aspek4":40,"aspek5":60},
                                {"catName":"Aspek 2", "aspek1":100,"aspek2":115,"aspek3":80,"aspek5":50},
                                {"catName":"Aspek 3", "aspek1":170,"aspek2":135,"aspek3":100,"aspek5":70},
                                {"catName":"Aspek 4", "aspek1":80,"aspek2":115,"aspek3":60,"aspek4":40},
                                {"catName":"Aspek 5", "aspek1":160,"aspek2":125,"aspek3":95,"aspek4":30}];
					</script>

					<p id="tampil"></p>

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
