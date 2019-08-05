
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
              AKTIVASI AKUN
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Aktivasi Akun</font></li>
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
                <h3 class="box-title">Daftar Nama User</h3>


                <button type="reset" class="btn btn-primary  btn-xs pull-right" data-toggle="modal" data-target="#kontak">
                    <i class="glyphicon glyphicon-phone"></i>
                    Update Kontak
                </button>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>NOPEK</th>
                        <th>NAMA KARYAWAN</th>
                        <th>INISIAL</th>

                        <th>OPSI</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach($table as $data):
                        $id = $data->nopek;?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->nopek ?></td>
                            <td><?php echo $data->nama ?>
                            </td>
                            <td><?php echo $data->inisial ?></td>
                            <td>


                                <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $id;?>">
                                    <i class="glyphicon glyphicon-edit"> Aktivasi Akun</i>

                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>NOPEK</th>
                        <th>NAMA KARYAWAN</th>
                        <th>INISIAL</th>

                        <th>OPSI</th>
                    </tr>
                    </tfoot>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>



        <?php
        $no = 1;
        foreach($table as $data):
            $id = $data->nopek;
            $nama = $data->nama;
            $level = $data->level;
            $status = $data->status;

            ?>

            <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">AKTIVASI USER</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('Aktivasi/edit/').base64_encode($data->nopek."-".base64_encode("PTPN7J@Y@")) ?>">

                                <input type="hidden" class="form-control" id="nopek" value="<?php echo $id ?>" placeholder="nopek" required="" name="nopek">

                                <label><font face="Book Antiqua">Nopek</font></label>
                                <input type="text" class="form-control" id="nopek2" value="<?php echo $id ?>" placeholder="nopek" required="" name="nopek2" disabled>
                                <p></p>
                                <label><font face="Book Antiqua">Nama Karyawan</font></label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Karyawan" value="<?php echo $nama ?>" required="" name="nama" disabled>
                                <p></p>
                                <label><font face="Book Antiqua">Level</font></label>
                                <select class="form-control" name="level">
                                    <option value="<?php echo $level ?>"><?php echo $level ?></option>
                                    <option value="">- Pilih Level -</option>
                                    <option value="SuperAdmin">SuperAdmin</option>
                                    <option value="AdminSDM">AdminSDM</option>
                                    <option value="User">User</option>
                                </select>
                                <p></p>
                                <label><font face="Book Antiqua">Status</font></label>
                                <select class="form-control" name="status">
                                    <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                    <option value="">- Pilih Status -</option>
                                    <option value="ON">ON</option>
                                    <option value="OFF">OFF</option>
                                </select>

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
        <?php endforeach;?>



        <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Update Kontak</h4>
                    </div>
                    <div class="modal-body">



                        <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('Aktivasi/updateKontak/') ?>">


                            <label><font face="Book Antiqua">Kontak</font></label>
                            <input type="text" class="form-control" id="kontak" placeholder="Kontak" value="<?php echo $help->no ?>" required="" name="kontak" >


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




    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
