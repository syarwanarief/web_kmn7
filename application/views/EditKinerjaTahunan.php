<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>
            EDIT DATA KINERJA TAHUNAN

        </h4>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li><a href="<?php echo base_url('KinerjaTahunan')?>">Kinerja Tahunan</a></li>
            <li>Edit</li>
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
                    <form  action="<?php echo base_url('KinerjaTahunan/SimpanEdit') ?>" method="post">
                        <div class="col-md-6">

                                <input type="hidden" class="form-control" value="<?php echo $dk->id_uraian ?>" name="idu" required="" placeholder="Masukan Tahun">
                            <input type="hidden" class="form-control" value="<?php echo $dk->tahun ?>" name="tahun" required="" placeholder="Masukan Tahun">
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>RKAP</label>
                                <input type="number" class="form-control" onchange="totaledit()" value="<?php echo $dk->rkap ?>" name="rkap" id="rkap" required="" placeholder="Masukan RPKAD">
                            </div>

                            <div class="form-group">
                                <label>Real</label>
                                <input type="number" class="form-control" onchange="totaledit()" value="<?php echo $dk->real2 ?>" name="real2" id="real2"  required="" placeholder="Masukan Real">
                            </div>
                            <!-- /.form-group -->
                            <button type="submit" id="submit" class="btn btn-success">Simpan</i></button>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" value="<?php echo $dk->satuan ?>" name="satuan" required="" placeholder="Masukan Satuan">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Persen</label>
                                <input type="number" class="form-control" name="persen" id="persen"  value="<?php echo $dk->persen ?>" required="" placeholder="Masukan Persen">
                            </div>



                            <!-- /.form-group -->
                        </div>

                        <!-- /.col -->
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->




        <script type="text/javascript">
            function totaledit () {
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