
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                PENGEMBANGAN SDM
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><a href="<?php echo base_url('PengembanganSDM')?>"> <font face="Book Antiqua">Pengembangan SDM</font></a></li>
            <li class="active"><font face="Book Antiqua">Periode</font></li>
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
            <div class="box-header">


                <a  href="<?php echo base_url('PengembanganSDM') ?>">
                    <button  type="button" class="btn btn-xs btn-default pull-right">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        KEMBALI
                    </button>
                </a>
                <p class="pull-right">&emsp;</p>
                <a  href="<?php echo base_url('PengembanganSDM/Tambah') ?>">
                    <button  type="button" class="btn btn-xs btn-primary pull-right">
                        <i class="glyphicon glyphicon-plus"></i>
                        Tambah Data
                    </button>
                </a>
                <p class="pull-right">&emsp;</p>
                <a  href="<?php echo base_url('PengembanganSDM/Excel/') .base64_encode($nb."-".base64_encode("PTPN7J@Y@")) ?>">
                    <button  type="button" class="btn btn-xs btn-success pull-right">
                        <i class="glyphicon glyphicon-floppy-open"></i>
                        Export Ke Excel
                    </button>
                </a>

            </div>

            <!-- /.box-header -->
            <div  class="box-body">

                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pengembangan SDM</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                    <br />

                    <div class="table-responsive">

                        <table id="examplesdm" class="table table-bordered">
                            <thead>
                            <tr class="success filters">
                                <th  rowspan="2"><div align="top"><input type="text" class="form-control" placeholder="No" disabled></div></th>
                                <th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Periode" disabled></div></th>
                                <th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Uraian" disabled></div></th>
                                <th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Kriteria Pelatihan" disabled></div></th>
                                <th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Penyelenggara" disabled></div></th>
                                <th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Tanggal" disabled></div></th>
                                <th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Tanggal Mulai" disabled></div></th>
                                <th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Tanggal Akhir" disabled></div></th>
                                <th rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Lokasi" disabled></div></th>
                                <th  colspan="2"><div align="center">Peserta</div></th>
                                <th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Jumlah Hari" disabled></div></th>
                                <th  rowspan="2"><div align="center"><input type="text" class="form-control" placeholder="Mandays" disabled></div></th>
                                <th colspan="6"><div align="center">Biaya</div></th>
                                <th rowspan="2"><div align="center">Peserta</div></th>
                                <th rowspan="2"><div align="center">Laporan</div></th>
                            </tr>
                            <tr class="success filters">
                                <th><div align="center"><input type="text" class="form-control" placeholder="Nama" disabled></div></th>
                                <th><div align="center"><input type="text" class="form-control" placeholder="Jumlah" disabled></div></th>
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
                                    <td>


                                        <form role="form" method="get" enctype="multipart/form-data" action="<?php echo base_url('CekLaporan/')?>">


                                            <input type="hidden" class="form-control" id="no_tugas" value="<?php echo $data->no_tugas ?>" placeholder="no_tugas" required="" name="no_tugas">
                                            <input type="hidden" class="form-control" id="nopek" value="<?php echo $data->nopek ?>" placeholder="nopek" required="" name="nopek">

                                            <button  type="submit" class="btn btn-xs btn-success" name="submitReset">

                                                Cek Laporan
                                            </button>


                                        </form>

                                        <a href="<?php echo base_url('PengembanganSDM/Edit/').base64_encode($data->id_laporan."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                            Edit Data
                                        </a>

                                        <a href="<?php echo base_url('PengembanganSDM/Hapus/').base64_encode($data->id_laporan."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-danger"  onClick="return confirm('Hapus Data Terpilih ?');">
                                            Hapus Data
                                        </a>

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
