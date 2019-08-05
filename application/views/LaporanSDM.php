<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<table border="1" width="100%">
    <thead>
    <tr>
        <th  rowspan="2"><div align="top">No</div></th>
        <th rowspan="2"><div align="center">Periode</div></th>
        <th  rowspan="2"><div align="center">Uraian</div></th>
        <th rowspan="2"><div align="center">Kriteria Pelatihan</div></th>
        <th rowspan="2"><div align="center">Penyelenggara</div></th>
        <th  rowspan="2"><div align="center">Tanggal</div></th>
        <th  rowspan="2"><div align="center">Tanggal Mulai</div></th>
        <th  rowspan="2"><div align="center">Tanggal Akhir</div></th>
        <th rowspan="2"><div align="center">Lokasi</div></th>
        <th  colspan="2"><div align="center">Peserta</div></th>
        <th  rowspan="2"><div align="center">Jumlah Hari</div></th>
        <th  rowspan="2"><div align="center">Mandays</div></th>
        <th colspan="6"><div align="center">Biaya</div></th>
        <th rowspan="2"><div align="center">Peserta</div></th>

    </tr>
    <tr>
        <th><div align="center">Nama</div></th>
        <th><div align="center">Jumlah</div></th>
        <th><div align="center">Kepesertaan</div></th>
        <th><div align="center">SPPD</div></th>
        <th><div align="center">Tiket</div></th>
        <th><div align="center">Penginapan</div></th>
        <th><div align="center">Lain-lain</div></th>
        <th><div align="center">Jumlah </div></th>
    </tr>
    </thead>

    <?php
    $no = 1;
    foreach($sdm as $data):
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
            <td><?php echo $data->nama ?></td>
            <td><?php echo $data->j_peserta ?></td>
            <td><?php echo $data->jumlah_hari ?></td>
            <td><?php echo $data->mandays ?></td>
            <td><?php echo $data->b_kepesertaan ?></td>
            <td><?php echo $data->b_sppd ?></td>
            <td><?php echo $data->b_tiket ?></td>
            <td><?php echo $data->b_kepenginapan ?></td>
            <td><?php echo $data->b_lain ?></td>
            <td><?php echo $data->b_jumlah ?></td>
            <td><?php echo $data->dpeserta ?></td>

        </tr>
    <?php endforeach; ?>


</table>
