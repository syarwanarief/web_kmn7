<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <script language='JavaScript'>
        var txt="KM PT PERKEBUNAN NUSANTARA VII - ";
        var speed=300;
        var refresh=null;
        function action() { document.title=txt;
            txt=txt.substring(1,txt.length)+txt.charAt(0);
            refresh=setTimeout("action()",speed);}action();
    </script>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fvc.jpg')?>" type="image/x-icon">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/off.css')?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops !</h1>
			</div>
			<h2>PT PERKEBUNAN NUSANTARA VII</h2>
			<p>Mohon Maaf Akun Anda Tidak/Belum Di Aktifkan Oleh Admin. Silahkan Menunggu Sampai Akun Anda Di Verifikasi Oleh Admin.
                <br /> <br />Atau Hubungi <?php echo $help->no ?> Untuk Info Lebih Lanjut. Terimakasih.</p>
			<a href="<?php echo base_url('Users/logout') ?>">Go To Homepage</a>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
