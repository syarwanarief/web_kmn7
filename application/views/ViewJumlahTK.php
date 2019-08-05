
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><font face="Book Antiqua">
                JUMLAH TENAGA KERJA
            </font>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
            <li class="active"><font face="Book Antiqua">Jumlah Tenaga Kerja</font></li>
        </ol>
        <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
            <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
            <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
        </div>
        <!-- message end -->
    </section>




    <section class="content">
        <!-- SELECT2 EXAMPLE -->
            <!-- /.box-header -->
            <div  class="box-body">
                <div class="col-md-6">
                    <form  action="<?php echo base_url('JumlahTK/tampil') ?>" method="get">
                        <div class="input-group">
                            <select class="form-control" required="" id="ur" onChange="changeTextBox();" name="kat">
                                <option value="">--Pilih Tampilan--</option>
                                <?php foreach ($kat as $data): ?>
                                    <option value="<?php echo base64_encode($data->id_jumlah_tk) ?>"><?php echo $data->kategori_laporan_tk?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-success" value="Get Selected Values"><i class="fa fa-search"></i>
                </button>
              </span>
                        </div>
                        <?php
                        if(isset($_POST['submit'])){
                            $selected_val = $_POST['ur'];  // Storing Selected Value In Variable
                            echo "You have selected :" .$selected_val;  // Displaying Selected Value
                        }
                        ?>

                    </form>
                </div>
            </div>
    </section>
</div>
