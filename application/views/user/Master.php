<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               EDIT MASTER
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Edit Master</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><font face="Book Antiqua">Master Kiteria</font></h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th  style="display:none;">id</th>
                            <th>Kriteria</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($kriteria as $data):
                                $id = $data-> kode_kriteria
                            ?>
                                <tr>
                                    <td  style="display:none;"><?php echo $id ?></td>
                            <td><?php echo $data-> kriteria ?></td>
                            <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#editkriteria<?php echo $id;?>">
                                    Edit
                                </a></td>
                        </tr>
                            <?php endforeach; ?>

                    </table>
                    <p><br /> <hr ></p>


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th  style="display:none;">id</th>
                            <th>Kriteria Pelatihan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($pelatihan as $data):
                            $id = $data-> kode_pelatihan
                            ?>
                            <tr>
                                <td  style="display:none;"><?php echo $id ?></td>
                                <td><?php echo $data-> k_pelatihan ?></td>
                                <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#editpelatihan<?php echo $id;?>">
                                        Edit
                                    </a></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>


                </div>
            </div>


            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><font face="Book Antiqua">Master Bidang</font></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- message -->

                    <!-- form start -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th  style="display:none;">id</th>
                            <th>Bidang</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($bidang as $data):
                            $id = $data-> kode_bidang
                            ?>
                            <tr>
                                <td  style="display:none;"><?php echo $id ?></td>
                                <td><?php echo $data-> bidang ?></td>
                                <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#editbidang<?php echo $id;?>">
                                        Edit
                                    </a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>





                    <p><br /> <hr ></p>


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th  style="display:none;">id</th>
                            <th>Uraian Kinerja Tahunan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($ur as $data):
                            $id = $data-> id_uraian
                            ?>
                            <tr>
                                <td  style="display:none;"><?php echo $id ?></td>
                                <td><?php echo $data-> uraian ?></td>
                                <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#editUR<?php echo $id;?>">
                                        Edit
                                    </a></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>




                </div>
            </div>
        </div>



        <?php
        foreach ($kriteria as $data):
        $id = $data-> kode_kriteria
        ?>


        <div class="modal fade" id="editkriteria<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Kriteria</h4>
                    </div>
                    <div class="modal-body">



                        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('EditMaster/Kriteria/') ?>">


                            <input type="hidden" class="form-control" id="idk" placeholder="Pelatihan" value="<?php echo $id ?>" required="" name="idk" >


                            <label><font face="Book Antiqua">Kriteria</font></label>
                            <input type="text" class="form-control" id="k" placeholder="Kriteria" value="<?php echo $data->kriteria ?>" required="" name="k" >


                            <P></P>
                            <button type="submit" class="btn btn-success" name="submitReset">
                                <i class="glyphicon glyphicon-floppy-saved"></i>
                                SIMPAN
                            </button>

                            <button type="button" data-dismiss="modal" class="btn btn-warning pull-right">
                                <i class="glyphicon glyphicon-remove-circle"></i>
                                BATAL
                            </button>
                        </form>


                    </div>

                </div>
            </div>
        </div>


        <?php
       endforeach;
        ?>






        <?php
        foreach ($bidang as $data):
            $id = $data-> kode_bidang
            ?>


            <div class="modal fade" id="editbidang<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Update Bidang</h4>
                        </div>
                        <div class="modal-body">



                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('EditMaster/Bidang/') ?>">

                                <input type="hidden" class="form-control" id="idb" placeholder="Pelatihan" value="<?php echo $id ?>" required="" name="idb" >


                                <label><font face="Book Antiqua">Bidang</font></label>
                                <input type="text" class="form-control" id="b" placeholder="Bidang" value="<?php echo $data->bidang ?>" required="" name="b" >


                                <P></P>
                                <button type="submit" class="btn btn-success" name="submitReset">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>
                                    SIMPAN
                                </button>

                                <button type="button" data-dismiss="modal" class="btn btn-warning pull-right">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                    BATAL
                                </button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>


        <?php
        endforeach;
        ?>






        <?php
        foreach ($pelatihan as $data):
            $id = $data-> kode_pelatihan
            ?>

            <div class="modal fade" id="editpelatihan<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Update Kriteria Pelatihan</h4>
                        </div>
                        <div class="modal-body">



                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('EditMaster/Pelatihan/') ?>">

                                <input type="hidden" class="form-control" id="idkp" placeholder="Pelatihan" value="<?php echo $id ?>" required="" name="idkp" >


                                <label><font face="Book Antiqua">Kriteria Pelatihan</font></label>
                                <input type="text" class="form-control" id="kp" placeholder="Pelatihan" value="<?php echo $data->k_pelatihan ?>" required="" name="kp" >


                                <P></P>
                                <button type="submit" class="btn btn-success" name="submitReset">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>
                                    SIMPAN
                                </button>

                                <button type="button" data-dismiss="modal" class="btn btn-warning pull-right">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                    BATAL
                                </button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>


        <?php
        endforeach;
        ?>





        <?php
        foreach ($ur as $data):
            $id = $data-> id_uraian
            ?>

            <div class="modal fade" id="editUR<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Update Uraian</h4>
                        </div>
                        <div class="modal-body">



                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('EditMaster/Uraian/') ?>">

                                <input type="hidden" class="form-control" id="idur" placeholder="Pelatihan" value="<?php echo $id ?>" required="" name="idur" >


                                <label><font face="Book Antiqua">Kriteria Pelatihan</font></label>
                                <input type="text" class="form-control" id="ur" placeholder="Uraian" value="<?php echo $data->uraian ?>" required="" name="ur" >


                                <P></P>
                                <button type="submit" class="btn btn-success" name="submitReset">
                                    <i class="glyphicon glyphicon-floppy-saved"></i>
                                    SIMPAN
                                </button>

                                <button type="button" data-dismiss="modal" class="btn btn-warning pull-right">
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                    BATAL
                                </button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>


        <?php
        endforeach;
        ?>




    </section>

    <!-- right col (We are only adding the ID to make the widgets sortable)-->

</div>
<!-- /.row (main row) -->
