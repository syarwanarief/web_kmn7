<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>
            TAMBAH DATA TENAGA kERJA

        </h4>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('JumlahTK')?>">Tenaga Kerja Total</a></li>
            <li>Tambah</li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->

        <div  class="box box-primary">
            <div class="box-header with-border">


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                </div>
            </div>

        <div  class="box-body">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Jumlah Total Tenaga Kerja</h3>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered table-striped" border="2">

                        <thead>
                        <tr class="primary filters">
                            <th><input type="text" class="form-control" placeholder="Uraian" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Orang" disabled></th>
                            <th><input type="text" class="form-control" placeholder="% (Persen)" disabled></th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        foreach ($tampil as $data):

                            $k_tetap = $data->karyawan_tetap;
                            $k_tidak_tetap = $data->karyawan_tidak_tetap;
                            $total = $k_tetap+$k_tidak_tetap;
                            ?>
                            <tr>
                                <td><?php echo "Karyawan Tetap" ?></td>
                                <td><?php echo $data->karyawan_tetap ?></td>
                                <td><?php echo round($k_tetap/$total*100) ?>%</td>
                            </tr>
                            <tr>
                                <td><?php echo "Karyawan Tidak Tetap" ?></td>
                                <td><?php echo $data->karyawan_tidak_tetap ?></td>
                                <td><?php echo round($k_tidak_tetap/$total*100) ?>%</td>
                            </tr>
                            <tr>
                                <td><?php echo "Total Karyawan" ?></td>
                                <td><?php echo $total ?></td>
                                <td><?php echo round($total/$total*100) ?>%</td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

        <form  action="<?php echo base_url('JumlahTK/Save') ?>" method="post">

            <?php foreach ($tampil as $data): ?>
            <input type="hidden" name="id_total" value="<?php echo $data->id_jumlah_total?>">
            <input type="hidden" name="kar_tetap" value="<?php echo $data->karyawan_tetap?>">
            <input type="hidden" name="kar_tidak_tetap" value="<?php echo $data->karyawan_tidak_tetap?>">
            <?php endforeach; ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Karyawan Tetap</label>
                    <input type="number" class="form-control" name="tetap" required="" placeholder="Masukan Satuan">
                </div>
                        <div class="form-group">
                            <label>Karyawan Tidak Tetap</label>
                            <input type="number" class="form-control" id="tidak_tetap" name="tidak_tetap" required="" placeholder="Masukan Satuan">
                        </div>
            </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" required="" placeholder="Masukan Satuan" value="<?php echo date('Y') ?>">
                </div>
                        <button type="submit" id="submit" class="btn btn-primary pull-right">Simpan</i></button>
            </div>
        </form>
    </section>
</div>