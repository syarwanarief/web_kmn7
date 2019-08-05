<section class="sidebar" xmlns="http://www.w3.org/1999/html">
	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
            <?php
            if($user['foto'] == 'fotoDefault'){  //foto= dashboard
                ?>
                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                <?php } else { ?>
            <img src="<?php echo base_url('fotoProfil/') . $this->session->userdata('foto'); ; ?>" class="user-image" alt="User Image">

            <?php } ?>
           <p></p>
            <a href="#"><i class="top a2"></i><font face="Book Antiqua"> Online</font></a>
        </div>
		<div class="pull-left info">
            <p><font face="Book Antiqua">&emsp;<?php echo $user['inisial']?> </font></p>
            <p><font face="Book Antiqua">&emsp;<?php echo $user['nik']?></font></p>


		</div>


	</div>


<ul class="sidebar-menu" data-widget="tree">
    <li class="header"><font face="Book Antiqua">MAIN NAVIGATION</font></li>
	<li class="active">
		<a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span><font face="Book Antiqua">Home</font></span>
		</a>
	</li>
    <li class="active">
        <a href="<?php echo base_url('MenuUtama'); ?>">
            <i class="fa fa-list-ul"></i> <span><font face="Book Antiqua">Menu Utama</font></span>
        </a>
    </li>

    <?php
    if($user['level'] == "SuperAdmin"){  //level= dashboard
    ?>
        <li class="active">
            <a href="<?php echo base_url('KinerjaTahunan') ?>">
                <i class="fa fa-bar-chart-o"></i> <span><span><font face="Book Antiqua">Kinerja Tahunan</font></span>
            </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url('PengembanganSDM') ?>">
                <i class="fa fa-database"></i> <span><span><font face="Book Antiqua">Pengembangan SDM</font></span>
            </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url('DataKaryawan/Filter') ?>">
                <i class="fa fa-address-card"></i> <span><span><font face="Book Antiqua">Data Karyawan</font></span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-address-card"></i>
                <span><font face="Book Antiqua">Laporan Data KM</font></span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('LaporanUser') ?>"><i class="glyphicon glyphicon-send"></i><span><font face="Book Antiqua">Kirim Data KM</font></a></li>
                <li><a href="<?php echo base_url('LaporanDataKM') ?>"><i class="fa fa-check-circle"></i><span><font face="Book Antiqua">Lihat Laporan Masuk</font></a></li>
                <li> <a href="<?php echo base_url('KritikSaran/View') ?>"><i class="fa fa-commenting-o"></i><span><font face="Book Antiqua">Kritik & Saran Pengguna</font></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-gears"></i>
                <span><font face="Book Antiqua">Set Up</font></span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('DataKaryawan/FilterKaryawan') ?>"><i class="fa fa-user-circle-o"></i><span><font face="Book Antiqua"> Ubah Data Karyawan</font></a></li>
                <li><a href="<?php echo base_url('ResetPassword') ?>"><i class="fa fa-refresh"></i> <span><font face="Book Antiqua">Manajemen Pengguna</font></a></li>
                <li><a href="<?php echo base_url('Aktivasi') ?>"><i class="fa fa-user-circle-o"></i><span><font face="Book Antiqua">Aktivasi Akun</font></a></li>

            </ul>
        </li>
    <?php }else if($user['level'] == "AdminSDM"){  //level= dashboard
        ?>

        <li class="active">
            <a href="<?php echo base_url('KinerjaTahunan') ?>">
                <i class="fa fa-bar-chart-o"></i> <span><span><font face="Book Antiqua">Kinerja Tahunan</font></span>
            </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url('PengembanganSDM') ?>">
                <i class="fa fa-database"></i> <span><span><font face="Book Antiqua">Pengembangan SDM</font></span>
            </a>
        </li>

        <li class="active">
            <a href="<?php echo base_url('DataKaryawan/Filter') ?>">
                <i class="fa fa-address-card"></i> <span><span><font face="Book Antiqua">Data Karyawan</font></span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-address-card"></i>
                <span><font face="Book Antiqua">Laporan Data KM</font></span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('LaporanUser') ?>"><i class="glyphicon glyphicon-send"></i><span><font face="Book Antiqua">Kirim Data KM</font></a></li>
                <li><a href="<?php echo base_url('LaporanDataKM') ?>"><i class="fa fa-check-circle"></i><span><font face="Book Antiqua">Lihat Laporan Masuk</font></a></li>
                <li><a href="<?php echo base_url('KritikSaran/View') ?>"><i class="fa fa-commenting-o"></i><span><font face="Book Antiqua">Kritik & Saran Pengguna</font></a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-gears"></i>
                <span><font face="Book Antiqua">Set Up</font></span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

                <li><a href="<?php echo base_url('Aktivasi') ?>"><i class="fa fa-user-circle-o"></i><span><font face="Book Antiqua">Aktivasi Akun</font></a></li>

            </ul>
        </li>

    <?php }else  {?>

        <li class="active">
            <a href="<?php echo base_url('KritikSaran') ?>">
                <i class="fa fa-comments"></i> <span><span><font face="Book Antiqua">Masukan Kritik Dan Saran</font></span>
            </a>
        </li>


    <?php } ?>

</ul>

    <script>
        function makeLink() {
            document.getElementById("link").setAttribute("href", "KinerjaTahunan",);
        }
    </script>
</section>
