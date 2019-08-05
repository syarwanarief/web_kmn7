<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>
               TAMBAH DATA KINERJA TAHUNAN

        </h4>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('KinerjaTahunan')?>">Kinerja Tahunan</a></li>
            <li>Tambah</li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <form  action="<?php echo base_url('KinerjaTahunan/Save') ?>" method="post">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Uraian</label>
                            <select class="form-control" required="" id="ur"  name="ur">
                                <option value="">- Pilih Uraian -</option>
                                <?php foreach ($ur as $data): ?>
                                    <option value="<?php echo $data->id_uraian ?>"><?php echo $data->uraian ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>RKAP</label>
                            <input type="number" onchange="total()" class="form-control" id="rkap" name="rkap" required="" placeholder="Masukan RPKAD">
                        </div>

                        <div class="form-group">
                            <label>Real</label>
                            <input type="number" onchange="total()" class="form-control" id="real2" name="real2" required="" placeholder="Masukan Real">
                        </div>
                        <!-- /.form-group -->
                        <button type="submit" id="submit" class="btn btn-success">Simpan</i></button>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" required="" placeholder="Masukan Satuan">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Persen</label>
                            <input type="number" class="form-control" id="persen" name="persen" required="" placeholder="Masukan Persen">
                        </div>

                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun" required="" placeholder="Masukan Tahun">
                        </div>

                        <!-- /.form-group -->
                    </div>

                    <!-- /.col -->
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Admin Dapat Menambahkan Uraian Baru <a href="#" data-toggle="modal" data-target="#tUr"> Disini.</a> Atau Dapat Merubahnya <a href="<?php echo base_url('EditMaster') ?>">Disini.</a>
            </div>
        </div>
        <!-- /.box -->













        <div class="modal fade" id="tUr" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Tambah Uraian</h4>
                    </div>
                    <div class="modal-body">


                        <form  action="<?php echo base_url('KinerjaTahunan/ADD') ?>" method="post">



                                <div class="form-group">
                                    <label>Masukan Uraian Baru</label>
                                    <input type="text" class="form-control" name="urn" required="" placeholder="Masukan Uraian">
                                </div>
                                <!-- /.form-group -->
                                <button type="submit" id="submit" class="btn btn-success">Simpan</i></button>

                            <!-- /.col -->


                            <!-- /.col -->
                        </form>





                    </div>

                </div>
            </div>
        </div>





        <script type="text/javascript">
            function total() {
                var real2 =  parseFloat(document.getElementById('real2').value);
                var rkap =  parseFloat(document.getElementById('rkap').value);
              //  var vphp = 90000 * parseInt(document.getElementById('harga_php').value);

                var jpersen = real2/rkap*100;

                document.getElementById('persen').value = jpersen.toFixed(0);
            }

        </script>








    </section>


    <!-- /.box-body -->



    <!-- /.row (main row) -->
</div>