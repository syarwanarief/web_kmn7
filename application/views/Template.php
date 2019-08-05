
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script language='JavaScript'>
        var txt="KMN PT PERKEBUNAN NUSANTARA VII - ";
        var speed=300;
        var refresh=null;
        function action() { document.title=txt;
            txt=txt.substring(1,txt.length)+txt.charAt(0);
            refresh=setTimeout("action()",speed);}action();
    </script>


    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fvc.jpg')?>" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css')?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/Ionicons/css/ionicons.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/AdminLTE.min.css')?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/skins/_all-skins.min.css')?>">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/morris.js/morris.css')?>">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css')?>">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/select2/dist/css/select2.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/iCheck/all.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/star-rating.min.css')?>">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>

    table,
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6{
   /*overflow-y:auto;
        overflow-x:scroll; */
        font-family: Book Antiqua, Palatino, Palatino Linotype, Palatino LT STD, Georgia, serif;
    }
    .btn1 {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
    }


    .btn2 {
        background-color: #d21f1f;
        border: none;
        color: white;
        padding: 7px 30px;
        cursor: pointer;
        font-size: 20px;
    }

    /* Darker background on mouse-over */
    .btn1:hover {
        background-color: RoyalBlue;
    }
    .btn2:hover {
        background-color: Red;
    }

    .top {
        position: relative;
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;

    }
    .top.a1 , .top.a1:before{
        background: #d21f1f;
        animation-delay: 0s;
    }
    .top.a2, .top.a2:before{
        background: #69c820;
        animation-delay: 0.2s;
    }
    .top.a3, .top.a3:before{
        background: #ceb32a;
        animation-delay: 0.4s;
    }
    .top.a4, .top.a4:before{
        background: #306bb3;
        animation-delay: 0.6s;
    }
    .top:before{
        content: "";
        display: block;
        position: absolute;
        left: -2.5px;
        top: -2.1px;
        width: 17px;
        height: 17px;
        border-radius: 50%;
        animation: ani 2s infinite ease-in;
    }
    @keyframes ani{
        0%{
            transform: scale(0.5);
            opacity: 1;
        }
        100%{
            transform: scale(2);
            opacity: 0;
        }
    }


    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }
    .preloader .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
    }


    .merah {color: #FF0000}

    .filterable {
        margin-top: 15px;
    }
    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }
    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }
    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }


</style>
<body class="hold-transition skin-green sidebar-mini">





<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="<?php echo base_url('Dashboard') ?>" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>KM</b>N7</span>
			<!-- logo for regular state and mobile devices -->
        <span><img width="40%" src="<?php echo base_url('assets/images/logo n.png')?>"></span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>


			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account: style can be found in dropdown.less -->

                    <?php
                    if($user['level'] == "SuperAdmin" or $user['level'] == "AdminSDM"){  //level= dashboard
                    ?>
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-info"><?php echo $notif-> ks + $notif->tk +$notif->kt + $notif->pn ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Anda Memiliki <?php echo $notif-> ks + $notif->tk +$notif->kt + $notif->pn ?> Notifikasi</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo base_url('LaporanDataKM?page=KnowledgeSharing') ?>">
                                            <i class="label label-primary pull-left"><?php echo $notif->ks ?></i>&emsp;Knowledge Sharing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('LaporanDataKM?page=TransferKnowledge') ?>">
                                            <i class="label label-success pull-left"><?php echo $notif->tk ?></i>&emsp; Laporan Transfer Knowledge
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('LaporanDataKM?page=KaryaTulis') ?>">
                                            <i class="label label-warning pull-left"><?php echo $notif->kt ?></i>&emsp; Laporan Karya Tulis
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('LaporanDataKM?page=PengalamanNarasumber') ?>">
                                            <i class="label label-danger pull-left"><?php echo $notif->pn ?></i>&emsp; Laporan Pengalaman Narasumber
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="<?php echo base_url('LaporanDataKM') ?>">View all</a></li>
                        </ul>
                    </li>

                    <?php }else  {?>




                    <?php } ?>



					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">


                            <?php
                            if($user['foto'] == 'fotoDefault'){  //foto= dashboard
                                ?>
                                <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="user-image" alt="User Image">
                            <?php } else { ?>
                                <img src="<?php echo base_url('fotoProfil/') . $this->session->userdata('foto'); ; ?>" class="user-image" alt="User Image">

                            <?php } ?>

                            <span class="hidden-xs"> <font face="Book Antiqua">  <?php echo $user['inisial']?></font></span>

						</a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php
                                if($user['foto'] == 'fotoDefault'){  //foto= dashboard
                                    ?>
                                    <img src="<?php echo base_url('assets/adminlte/dist/img/imgs.jpg')?>" class="img-circle" alt="User Image">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('fotoProfil/') . $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">

                                <?php } ?>


                                <p>
                                    <?php echo $user['inisial']?>
                                    <small> <?php echo $user['nik']?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url('Profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('Users/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
				</ul>
			</div>
		</nav>
	</header>




	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<?php include 'menu.php';?>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<?php require_once($web['page']);?>

	<!-- /.content-wrapper -->



	<footer class="main-footer"><font face="Book Antiqua">
		<strong>Copyright &copy; 2019 <a href="http://www.ptpn7.com">PT Perkebunan Nusantara VII</a></strong> All rights
            reserved.</font>
	</footer>

	<!-- Control Sidebar -->
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

            <!-- /.control-sidebar-menu -->


            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->

        <!-- Settings tab content -->

        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->




<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/adminlte/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/morris.js/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/adminlte/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/adminlte/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/adminlte/dist/js/demo.js')?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte//plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>

<script src="<?php echo base_url('assets/adminlte/plugins/iCheck/icheck.min.js')?>"></script>



<script src="<?php echo base_url('assets/js/star-rating.min.js')?>"></script>

<script>
	$(function () {

        $('#filter2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true,
            'order': [[2, 'asc']]
        })

		$('#examplesdm').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true
        });
        $('#example1').DataTable();
        $('#exampleX').DataTable({
            'order': [[2,'asc']]
        });
        $('#exampleY').DataTable({
            'order': [[2,'asc']]
        });



		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		});


        $('#exampleFt').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true,
            'order': [[2,'asc']]
        });


        $('#kv').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'order': [[0,'desc']]
        });
        $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true,
            'order': [[8,'desc']]
        });

        $('#example4').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'order': [[2,'desc']]
        });
        $('#example5').DataTable({
            'order': [[5,'asc']]
        });
        $('#example6').DataTable({
            'order': 'desc'
        });



    });




    $(document).ready(function(){
        $(".preloader").fadeOut();
    });



</script>



<script>
	$(function () {


        //Date picker
        $('#datepicker').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        //Date picker
        $('#datepicker2').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });

        $('#datepicker3').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true
        });

        $('#tgl').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        //Date picker
        $('#tgl2').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });

        $('#tgl3').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true
        });
		//Initialize Select2 Elements
		$('.select2').select2()
	})
</script>



<script>



    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e){
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });


</script>


<script>
    Morris.Line({
        element: 'graph',
        data: <?php echo $chart;?>,
        xkey: 'tahun',
        ykeys: ['rkap', 'real2', 'persen'],
        labels: ['RKAP', 'REAL', 'PERSEN']
    });



</script>
</body>
</html>
