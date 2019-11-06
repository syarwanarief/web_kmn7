<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <script language='JavaScript'>
        var txt="KM PT PERKEBUNAN NUSANTARA VII - ";
        var speed=300;
        var refresh=null;
        function action() { document.title=txt;
            txt=txt.substring(1,txt.length)+txt.charAt(0);
            refresh=setTimeout("action()",speed);}action();
    </script>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fvc.jpg')?>" type="image/x-icon">
    <link rel="apple-touch-icon" href=<?php echo base_url('assets')?>"/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets')?>/css/bootstrap.min.css" rel="stylesheet">
	<!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/style.css">
	<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/all.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style type="text/css">

        body {
            font-family: Book Antiqua, Palatino, Palatino Linotype, Palatino LT STD, Georgia, serif;
        }
        .modal-confirm {
            color: #434e65;
            width: 525px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }
        .modal-confirm .modal-header {
            background: #47c9a2;
            border-bottom: none;
            position: relative;
            text-align: center;
            margin: -20px -20px 0;
            border-radius: 5px 5px 0 0;
            padding: 35px;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 36px;
            margin: 10px 0;
        }
        .modal-confirm .form-control, .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }
        .modal-confirm .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #fff;
            text-shadow: none;
            opacity: 0.5;
        }
        .modal-confirm .close:hover {
            opacity: 0.8;
        }
        .modal-confirm .icon-box {
            color: #fff;
            width: 95px;
            height: 95px;
            display: inline-block;
            border-radius: 50%;
            z-index: 9;
            border: 5px solid #fff;
            padding: 15px;
            text-align: center;
        }
        .modal-confirm .icon-box i {
            font-size: 64px;
            margin: -4px 0 0 -4px;
        }
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #eeb711;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 30px;
            margin-top: 10px;
            padding: 6px 20px;
            border: none;
        }
        .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #eda645;
            outline: none;
        }
        .modal-confirm .btn span {
            margin: 1px 3px 0;
            float: left;
        }
        .modal-confirm .btn i {
            margin-left: 1px;
            font-size: 20px;
            float: right;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }

    </style>

</head>

<body>

<div id="particles-js" class="main-form-box">
	<div class="md-form">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="panel panel-login">
						<div class="logo-top">
							<a href="#"><img width="60%" src="<?php echo base_url('assets/images/logo m.png')?>" alt="" /></a>

							<div style="background-color: #ffff00">
								<marquee><b><font color="#000000">Aplikasi Ini Sedang Dalam Proses Pengembangan</font> </b></marquee>
							</div>
                        </div>

						<div class="panel-heading">
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-xl-6">
									<a href="#" class="active" id="login-form-link">Login</a>
								</div>
								<div class="col-lg-6 col-sm-6 col-xl-6">
									<a href="#" id="register-form-link">Register</a>
								</div>
								<div class="or">OR</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="login-form" action="<?php echo base_url('Users/login') ?>" method="post" role="form" style="display: block;">
                                        <?php if(isset($_SESSION['message'])): ?>
                                            <div class="col-xs-12 "  id="message">
                                                <!-- message -->
                                                <div class="callout <?php echo $this -> session->flashdata('message')['color'];?>">
                                                    <h4><?php echo $this -> session->flashdata('message')['title'];?></h4>
                                                    <p><?php echo $this->session->flashdata('message')['msg']; ?></p>
                                                </div>
                                                <!-- message end -->
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
											<label class="icon-lp"><i class="fas fa-user-tie"></i></label>
											<input type="text" name="nopekUser2" id="nopekUser2" tabindex="1" class="form-control" placeholder="No. Induk Karyawan" value="" required="">
										</div>
										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-key"></i></label>
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="">
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 offset-sm-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="text-center">
														<a href="#myModal" class="forgot-password" data-toggle="modal">Forgot Password?</a>
													</div>
												</div>
											</div>
										</div>

									</form>
									<form id="register-form" action="<?php echo base_url('Users/register') ?>" method="post" role="form" style="display: none;">


                                        <div class="form-group">
                                            <label class="icon-lp"><i class="fas fa-user-tie"></i></label>
                                            <input type="text" name="nopekUser1" id="nopekUser1" tabindex="1" class="form-control" placeholder="No. Induk Karyawan" value="" required="">
                                        </div>

                                        <div class="form-group">
                                            <label class="icon-lp"><i class="fas fa-user-tie"></i></label>
                                            <input type="text" name="nama" id="nama" tabindex="1" class="form-control" placeholder="Nama (Huruf Kapital)" value="" required="">
                                        </div>

										<div class="form-group">
											<label class="icon-lp"><i class="fas fa-key"></i></label>
											<input type="password" name="password1" id="password1" tabindex="1" class="form-control" placeholder="Password" required="">
										</div>
                                        <div class="form-group">
                                            <label class="icon-lp"><i class="fas fa-key"></i></label>
                                            <input type="password" name="password2" id="password2" tabindex="1" class="form-control" placeholder="Masukan Ulang Password" required="">
                                        </div>

                                        <div class="form-group">
                                            <label class="icon-lp"><i class="fas fa-user-tie"></i></label>
                                            <input type="text" name="inisial" id="inisial" tabindex="1" class="form-control" placeholder="Masukan Inisial" value="" required="">
                                        </div>


                                        <div class="form-group">
											<div class="row">
												<div class="col-sm-6 offset-sm-3">
													<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register">
												</div>
											</div>
										</div>										
									</form>
								</div>
							</div>
						</div>
					</div>
					<p></p>

                    <p class="footer-company-name"><b>All Rights Reserved. &copy; 2019 <a target="blank" href="http://www.ptpn7.com"><b>PTPN7</b></a> Powered by : <a target="blank" href="<?php echo base_url('PMMB') ?>"><strong>PMMB</strong></a></b></p>
					
				</div>
			</div>
		</div>	
	</div>
	
</div>



<script src="<?php echo base_url('assets')?>/js/jquery.min.js"></script>
<script src="<?php echo base_url('assets')?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets')?>/js/particles.min.js"></script>
<script src="<?php echo base_url('assets')?>/js/index.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
		});
		
		$('.form-group input').focus(function () {
			$(this).parent().addClass('addcolor');
		}).blur(function () {
			$(this).parent().removeClass('addcolor');
		});
		


    $(document).ready(function(){
        $('#nopekUser1').on('input',function(){

            var nopekUser1=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Users/ceknama')?>",
                dataType : "JSON",
                data : {nopekUser1: nopekUser1},
                cache:false,

                success: function(data){
                    $.each(data,function(nopekUser1, nama){
                        $('[name="nama"]').val(data.nama);


                    });

                }
            });
            return false;
        });

    });
</script>

<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword(){
        var pass1=document.getElementById("password1").value;
        var pass2=document.getElementById("password2").value;

        if(pass1 != pass2)

        document.getElementById("password2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
        else
            document.getElementById("password2").setCustomValidity('');

    }
</script>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Help Desk !</h4>
                <p>Silahkan Hubungi Admin Untuk Mereset Password Di No. Berikut (<?php echo $help->no ?>).</p>
                <button class="btn btn-success" data-dismiss="modal"><span>OKE</span></button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
