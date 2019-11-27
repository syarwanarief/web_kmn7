<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<style>
	html,
	body {
		height: 100%;
		width: 100%;
	}

	#myChart {
		height: 75%;
		width: 70%;
		min-height: 100px;
	}

	.zc-ref {
		display: none;
	}

	zing-grid[loading] {
		height: 500px;
	}

	.imageDivParent {
		width: 150px !important;
		height: 150px !important;
		left: 50% !important;
		top: 42% !important;
	}

	.imageDiv {
		width: 100%;
		height: 100%;
		color: #fff;
		padding-top: 20px;
		position: absolute;
		font-size: 15px;
		font-weight: bold;
		box-sizing: border-box;
		text-align: center;
		transition: width 5.2s, height 5.2s;
		background: url(https://www.koolchart.com/demo/KoolChart/Assets/Images/trophy.png) center/100% 100% no-repeat;
	}

	.imageDivParentMove {
		width: 30px;
		height: 30px;
		margin-left: 0;
		margin-top: 0;
		transition: left 1s, top 1s, width 1s, height 1s, margin 1s;
	}

	.squibDiv {
		left: 0;
		top: 0;
		position: absolute;
		animation: squib 1s 3;
		background-position: center;
		background-size: 100% 100%;
		background-repeat: no-repeat;
		transform: scale(0, 0);
		-webkit-transform: scale(0, 0);
	}

	.squibDiv_0 {
		animation-delay: 0.01s;
	}

	.squibDiv_1 {
		animation-delay: 0.1s;
	}

	.squibDiv_2 {
		animation-delay: 0.2s;
	}

	@keyframes squib {
		from {
			transform: scale(0.2, 0.2);
			-webkit-transform: scale(0.2, 0.2);
		}
		to {
			transform: scale(1, 1);
			-webkit-transform: scale(1, 1);
		}
	}
</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				LAPORAN EVALUASI
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li class="active"><font face="Book Antiqua">Laporan Evaluasi</font></li>
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

		<div class="box" style="padding: 20px">
			<div style="padding: 10px">

				<script src="https://www.koolchart.com/demo/LicenseKey/codepen/KoolChartLicense.js"></script>
				<script src="https://www.koolchart.com/demo/KoolChart/JS/KoolChart.js"></script>
				<link rel="stylesheet" href="https://www.koolchart.com/demo/KoolChart/Assets/Css/KoolChart.css"/>

				<div id="chartHolder" style="height:350px; width:100%;"></div>

				<script>
                    var chartVars = "KoolOnLoadCallFunction=chartReadyHandler";

                    KoolChart.create("chart1", "chartHolder", chartVars, "100%", "80%");

                    function chartReadyHandler(id) {
                        document.getElementById(id).setLayout(layoutStr);
                        document.getElementById(id).setData(chartData);
                    }

                    var layoutStr =
                        '<KoolChart backgroundColor="#FFFFFF"  borderStyle="none">'
                        + '<Options>'
                        + '<Caption text="Total Skor Perhitungan Hasil Evaluasi" color="#555555" fontWeight="bold"/>'
                        + '</Options>'
                        + '<Column2DChart showDataTips="true" columnWidthRatio="0.46">'
                        + '<horizontalAxis>'
                        + '<CategoryAxis categoryField="Month" padding="0.5"/>'
                        + '</horizontalAxis>'
                        + '<verticalAxis>'
                        + '<LinearAxis id="vAxis" maximum="100"/>'
                        + '</verticalAxis>'
                        + '<series>'
                        + '<Column2DSeries yField="Data" displayName="Data" htmlJsFunction="userFunction">'
                        + '<fill>'
                        + '<SolidColor color="#5587a2"/>'
                        + '</fill>'
                        + '<showDataEffect>'
                        + '<SeriesInterpolate/>'
                        + '</showDataEffect>'
                        + '</Column2DSeries>'
                        + '</series>'
                        + '<annotationElements>'
                        + '<AxisMarker fontSize="15">'
                        + '<AxisLine value="70" label="Target">'
                        + '<stroke>'
                        + '<Stroke color="#ef562d" weight="2"/>'
                        + '</stroke>'
                        + '</AxisLine>'
                        + '</AxisMarker>'
                        + '</annotationElements>'
                        + '</Column2DChart>'
                        + '</KoolChart>';

                    var chartData =
                        [{"Month": "Jan", "Data": 20},
                            {"Month": "Feb", "Data": 30},
                            {"Month": "Mar", "Data": 33},
                            {"Month": "Apr", "Data": 51},
                            {"Month": "May", "Data": 47},
                            {"Month": "Jun", "Data": 39},
                            {"Month": "Jul", "Data": 26},
                            {"Month": "Aug", "Data": 42},
                            {"Month": "Sep", "Data": 77},
                            {"Month": "Oct", "Data": 68}];

                    var aniCount = 0,
                        animating = false;

                    function userFunction(id, index, data, values) {
                        var i, n, chart,
                            div, squibDiv,
                            size, left,
                            yValue = values[1];

                        div = document.createElement("div");
                        div.className = "imageDiv";

                        chart = document.getElementById("chart1");

                        if (!animating) {
                            var sizes = [150, 200, 100],
                                locations = [{x: 200, y: 40}, {x: 500, y: 50}, {x: 250, y: 250}];

                            animating = true;
                        }
                    }

                    function squibAnimationEnd(event) {
                        var target = event.currentTarget;
                        target.removeEventListener("animationEnd", squibAnimationEnd);
                        target.parentNode.removeChild(target);
                        //aniCount--;

                    }

                    function updateClickAfter() {
                        animating = false;
                    }
				</script>

				<div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Charts by ZingChart</a></div>

				<script>
                    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
                    window.feed = function (callback) {
                        var tick = {};
                        tick.plot0 = Math.ceil(87);
                        callback(JSON.stringify(tick));
                    };

                    var myConfig = {
                        type: "gauge",
                        globals: {
                            fontSize: 18
                        },
                        plotarea: {
                            marginTop: 40
                        },
                        plot: {
                            size: '100%',
                            valueBox: {
                                placement: 'center',
                                text: '%v', //default
                                fontSize: 35,
                                rules: [{
                                    rule: '%v >= 90',
                                    text: '%v<br>Sangat Bagus'
                                },
                                    {
                                        rule: '%v < 90 && %v >= 70',
                                        text: '%v<br>Bagus'
                                    },
                                    {
                                        rule: '%v < 70 && %v >= 50',
                                        text: '%v<br>Cukup'
                                    },
                                    {
                                        rule: '%v <  50',
                                        text: '%v<br>Buruk'
                                    }
                                ]
                            }
                        },
                        tooltip: {
                            borderRadius: 5
                        },
                        scaleR: {
                            aperture: 260,
                            minValue: 0,
                            maxValue: 100,
                            step: 10,
                            center: {
                                visible: false
                            },
                            tick: {
                                visible: false
                            },
                            item: {
                                offsetR: 0,
                                rules: [{
                                    rule: '%i == 9',
                                    offsetX: 15
                                }]
                            },
                            labels: ['0', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100'],
                            ring: {
                                size: 50,
                                rules: [{
                                    rule: '%v <= 40',
                                    backgroundColor: '#E53935'
                                },
                                    {
                                        rule: '%v > 40 && %v < 70',
                                        backgroundColor: '#EF5350'
                                    },
                                    {
                                        rule: '%v >= 70 && %v <= 90',
                                        backgroundColor: '#FFA726'
                                    },
                                    {
                                        rule: '%v >= 90',
                                        backgroundColor: '#29B6F6'
                                    }
                                ]
                            }
                        },
                        refresh: {
                            type: "feed",
                            transport: "js",
                            url: "feed()",
                            interval: 1500
                        },
                        series: [{
                            values: [0], // starting value
                            backgroundColor: 'black',
                            indicator: [10, 10, 10, 10, 0.75],
                            animation: {
                                effect: 2,
                                method: 1,
                                sequence: 3,
                                speed: 3000
                            },
                        }]
                    };

                    zingchart.render({
                        id: 'myChart',
                        data: myConfig,
                        height: 500,
                        width: '100%'
                    });
				</script>

			</div>

			<h4>Skor Perhitungan Evaluasi Pasca Pelatihan Karpel || Skor Perhitungan Evaluasi Pasca Pelatihan
				Karpim</h4>


		</div>
	</section>
</div>
