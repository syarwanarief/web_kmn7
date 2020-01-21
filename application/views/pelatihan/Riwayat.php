
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				RIWAYAT PELATIHAN YANG TELAH ANDA IKUTI
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li class="active"><font face="Book Antiqua">Riwayat Pelatihan</font></li>
		</ol>
		<div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
			<h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

	<section class="content">


		<!-- SELECT2 EXAMPLE -->
		<div class="box">

			<!-- /.box-header -->
			<div  class="box-body">

				<a target="_blank" href="<?php echo base_url("pelatihanAnda/ExportPenilai") ?>">
					<button type="submit" class="btn btn-success pull-right" style="margin-left: 20px">
						<i class="glyphicon glyphicon-export"></i> Export Excel
					</button>
				</a>
				<br><br>

				<div class="panel panel-primary filterable">
					<div class="panel-heading">
						<h3 class="panel-title">Riwayat Pelatihan Anda</h3>
						<div class="pull-right">
							<button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
						</div>
					</div>
					<br />

					<div class="table-responsive">

						<table id="examplesdm" class="table table-bordered">
							<thead>
							<tr class="success filters">
								<th  rowspan="2" width="25px"><div align="top"><input type="text" class="form-control" placeholder="No" disabled></div></th>
								<th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Periode" disabled></div></th>
								<th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Uraian" disabled></div></th>
								<th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Kriteria Pelatihan" disabled></div></th>
								<th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Penyelenggara" disabled></div></th>
								<th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Tanggal" disabled></div></th>
								<th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Tanggal Mulai" disabled></div></th>
								<th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Tanggal Akhir" disabled></div></th>
								<th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Lokasi" disabled></div></th>

							</thead>

							<?php
							$no = 1;
							foreach($tampil as $data):
								$id = $data->no_tugas;
								?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $data->periode ?></td>
									<td><?php echo $data->uraian ?></td>
									<td><?php echo $data->k_pelatihan ?></td>
									<td><?php echo $data->penyelenggara ?></td>
									<td><?php echo $data->t_tugas ?></td>
									<td><?php echo $data->t_mulai ?></td>
									<td><?php echo $data->t_akhir ?></td>
									<td><?php echo $data->lokasi ?></td>
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
