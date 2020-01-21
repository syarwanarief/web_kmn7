<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				MENU EVALUASI 5 TAHUN TERAKHIR
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li><a href="<?php echo base_url("survey/inputEvaluasi") ?>"><font face="Book Antiqua">Evaluasi 5
						Tahun</font></a>
			</li>
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
						<h3 class="panel-title">Data Evaluasi 5 Tahun Terakhir</h3>
					</div>
					<br/>

					<div class="table-responsive">

						<table id="examplesdm" class="table table-bordered">
							<thead>
							<tr class="success filters">
								<th>
									<div align="top">Strata</div>
								</th>
								<th>
									<div align="center">Tahun</div>
								</th>
								<th>
									<div align="center">Skor Target</div>
								</th>
								<th>
									<div align="center">Skor Real</div>
								</th>
								<th colspan="2">
									<div align="center">Action</div>
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($tampil as $data):
								?>
								<tr>

									<input type="text" value="<?php echo $data->id ?>" style="display: none"
										   name="id" id="id_<?php echo $data->id ?>">
									<input type="text" value="<?php echo $data->strata ?>" style="display: none"
										   name="strata_" id="strata_<?php echo $data->id ?>">
									<input type="text" value="<?php echo $data->tahun ?>" style="display: none"
										   name="tahun_" id="tahun_<?php echo $data->id ?>">
									<input type="text" value="<?php echo $data->skor_real ?>" style="display: none"
										   name="skorR_" id="skorR_<?php echo $data->id ?>">
									<input type="text" value="<?php echo $data->skor_target ?>" style="display: none"
										   name="skorL_" id="skorR_<?php echo $data->id ?>">

									<td>

										<input class="form-control" id="strata<?php echo $data->id ?>"
											   name="strata" value="<?php echo $data->strata ?>" disabled>

									</td>
									<td>

										<input class="form-control" id="tahun<?php echo $data->id ?>"
											   name="tahun" value="<?php echo $data->tahun ?>" disabled>
									</td>
									<td>

										<input class="form-control" id="skorT<?php echo $data->id ?>"
											   name="skorT" value="<?php echo $data->skor_target ?>" disabled>

									</td>
									<td>

										<input class="form-control" id="skorR<?php echo $data->id ?>"
											   name="skorR" value="<?php echo $data->skor_real ?>"
											   disabled>
									</td>
									<td>

										<button type="submit" class="btn btn-xs btn-success" style="display: none"
												id="save_<?php echo $data->id ?>" name="save"
												onclick="save(<?php echo $data->id ?>);">Simpan
										</button>

										<button type="submit" class="btn btn-xs btn-success"
												id="edit_<?php echo $data->id ?>" name="edit"
												onclick="edit(<?php echo $data->id ?>);">Ubah Data
										</button>
									</td>

									<td>

										<button type="submit" class="btn btn-xs btn-danger"
												id="del_<?php echo $data->id ?>" name="del"
												onclick="del(<?php echo $data->id ?>);">Hapus
										</button>

										<script type="text/javascript"
												src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
										<script type="text/javascript"
												src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
										<script type="text/javascript">

                                            function edit(id) {

                                                document.getElementById("save_" + id).style.display = "block";
                                                document.getElementById("edit_" + id).style.display = "none";
                                                document.getElementById("del_" + id).style.display = "none";

                                                document.getElementById("strata" + id).disabled = false;
                                                document.getElementById("tahun" + id).disabled = false;
                                                document.getElementById("skorR" + id).disabled = false;
                                                document.getElementById("skorT" + id).disabled = false;

                                                return false;

                                            }

                                            function save(id) {

                                                document.getElementById("save_" + id).style.display = "none";
                                                document.getElementById("edit_" + id).style.display = "block";
                                                document.getElementById("del_" + id).style.display = "block";

                                                document.getElementById("strata" + id).disabled = true;
                                                document.getElementById("tahun" + id).disabled = true;
                                                document.getElementById("skorR" + id).disabled = true;
                                                document.getElementById("skorT" + id).disabled = true;

                                                var idNya = document.getElementById('id_' + id).value;
                                                var strata = document.getElementById('strata' + id).value;
                                                var tahun = document.getElementById('tahun' + id).value;
                                                var skor_real = document.getElementById('skorR' + id).value;
                                                var skor_target = document.getElementById('skorT' + id).value;

                                                $.ajax({
                                                    url: '<?php echo base_url();?>index.php/Survey/SimpanPerubahanEvaluasi',
                                                    method: 'POST',
                                                    data: {
                                                        id: idNya,
                                                        strata: strata,
                                                        tahun: tahun,
                                                        skor_real: skor_real,
                                                        skor_target: skor_target,
                                                    },
                                                    async: false,
                                                    dataType: 'json',
                                                    success: function (data) {
                                                        alert("Berhasil Menyimpan Perubahan pada Tahun : " + tahun + " Strata : " + strata);
                                                        location.reload();
                                                    },
                                                    error: function () {
                                                        alert("Gagal Melakukan Perubahan");
                                                        location.reload();
                                                    }

                                                });
                                            }

                                            function del(id) {

                                                if (confirm('Yakin Ingin Menghapus Data?')){
                                                    var idNya = document.getElementById('id_' + id).value;
                                                    var strata = document.getElementById('strata' + id).value;
                                                    var tahun = document.getElementById('tahun' + id).value;
                                                    var skor_real = document.getElementById('skorR' + id).value;
                                                    var skor_target = document.getElementById('skorT' + id).value;

                                                    $.ajax({
                                                        url: '<?php echo base_url();?>index.php/Survey/HapusPerubahanEvaluasi',
                                                        method: 'POST',
                                                        data: {
                                                            id: idNya,
                                                            strata: strata,
                                                            tahun: tahun,
                                                            skor_real: skor_real,
                                                            skor_target: skor_target,
                                                        },
                                                        async: false,
                                                        dataType: 'json',
                                                        success: function (data) {
                                                            alert("Berhasil Menghapus Data");
                                                            location.reload();
                                                        },
                                                        error: function () {
                                                            alert("Gagal Menghapus Data");
                                                            location.reload();
                                                        }

                                                    });
												}

                                            }
										</script>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>

				<form role="form" method="post" enctype="multipart/form-data"
					  action="<?php echo base_url('survey/TambahEvaluasi') ?>">

					<button type="submit" id="submit" class="btn btn-primary pull-right" style="margin-right: 15px">
						Tambah Data Evaluasi</i></button>

				</form>

			</div>
			<!-- /.box-body -->
		</div>

	</section>
	<!-- right col (We are only adding the ID to make the widgets sortable)-->

	<!-- right col -->
</div>
<!-- /.row (main row) -->
