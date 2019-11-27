<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data evaluasi pelatihan.xls");
?>
<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
</style>
<div class="table-responsive">

	<table id="examplesdm" class="table table-bordered" border="1">
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
			<th colspan="5">
				<div align="center">Pelaksana Pelatihan</div>
			</th>
			<th rowspan="2">
				<div align="top">Status</div>
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
			<th>
				<div align="center">Durasi</div>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		foreach ($tampil

		as $data):
		?>
			<tr>

				<td><?php echo $no++ ?></td>
				<td><?php echo $data->nopek_penilai ?></td>
				<td><?php echo $data->nama_penilai ?></td>
				<td><?php echo $data->jabatan_penilai ?></td>
				<td><?php echo $data->nopek_peserta ?></td>
				<td><?php echo $data->nama_peserta ?></td>
				<td><?php echo $data->jabatan_peserta ?></td>
				<td><?php echo $data->unit_peserta ?></td>
				<td><?php echo $data->unit_saat_pelatihan ?></td>
				<td><?php echo $data->no_tugas ?></td>
				<td><?php echo $data->judul_nama ?></td>
				<td><?php echo $data->tgl_mulai ?></td>
				<td><?php echo $data->tgl_mulai ?></td>
				<td><?php
					$mulai = date_create($data->tgl_mulai);
					$selesai = date_create($data->tgl_selesai);
					echo date_diff($mulai, $selesai)->format("%a Hari") ?></td>
				<td><?php echo $data->status ?></td>
			</tr>
			<?php endforeach; ?>
	</table>
</div>
