
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
               Riwayat Knowledge Management
          </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Dashboard</font></li>
        </ol>
        <div role="alert" class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>



    <section class="content">



        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Riwayat Laporan -
                        <?php
                        if($kriteria  == !null) {
                            echo $kriteria->kriteria;
                        }
                       ?>


                </h3>

                <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default pull-right">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    KEMBALI
                </button>

            </div>
            <!-- /.box-header -->
            <div  class="box-body">
                <div class="table-responsive">



                    <table id="example1" class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="display:none;">ID</th>
                            <th>NOPEK</th>
                            <th>JUDUL</th>
                            <th>KATA KUNCI</th>
                            <th>T. INPUT</th>
                            <th>STATUS</th>
                            <th>OPSI</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach($table as $data):
                            ?>
                            <tr>
                                <td style="display:none;"><?php echo $data->id ?></td>
                                <td class="mailbox-subject"><?php echo $data->nopek ?></td>
                                <td class="mailbox-subject"><?php echo $data->judul ?></td>
                                <td class="mailbox-attachment"><?php echo $data->kata_kunci ?></td>
                                <td class="mailbox-attachment"><?php echo $data->waktu_input ?></td>
                                <td class="mailbox-date"><?php echo $data->status ?></td>
                                <td>
                                    <?php
                                        if($data ->kode_kriteria == '1'){  ?>
                                    <a href="<?php echo base_url('LaporanDataKM/KnowledgeSharing/'). base64_encode($data->id."-".base64_encode("PTPN7J@Y@"))?>" class="btn btn-xs btn-primary">
                                        Lihat
                                    </a>
                                    <?php }else if($data ->kode_kriteria == '2') { ?>
                                    <a href="<?php echo base_url('LaporanDataKM/TransferKnowledge/'). base64_encode($data->id."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                        Lihat
                                    </a>
                                    <?php }else if($data ->kode_kriteria == '3') { ?>
                                    <a href="<?php echo base_url('LaporanDataKM/KaryaTulis/'). base64_encode($data->id."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                        Lihat
                                    </a>

                                <?php } else {?>
                                            <a href="<?php echo base_url('LaporanDataKM/PengalamanNarasumber/'). base64_encode($data->id."-".base64_encode("PTPN7J@Y@"))?>" class="btn btn-xs btn-primary">
                                                Lihat
                                            </a>

                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                    <!-- /.table -->


                </div>
            </div>
        </div>

    </section>


    <!-- right col (We are only adding the ID to make the widgets sortable)-->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
