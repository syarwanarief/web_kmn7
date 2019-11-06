<!DOCTYPE html>
<html>
<head>
    <script language='JavaScript'>
        var txt = "PMMB PT PERKEBUNAN NUSANTARA VII - ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }

        action();
    </script>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fvc.jpg') ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href=<?php echo base_url('assets') ?>"/images/apple-touch-icon.png">
    <style type="text/css">

        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

        #team {
            background: #eee !important;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #108d6f;
            border-color: #108d6f;
            box-shadow: none;
            outline: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #007b5e;
            border-color: #007b5e;
        }

        section {
            padding: 60px 0;
        }

        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        #team .card {
            border: none;
            background: #ffffff;
        }

        .image-flip:hover .backside,
        .image-flip.hover .backside {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            transform: rotateY(0deg);
            border-radius: .25rem;
        }

        .image-flip:hover .frontside,
        .image-flip.hover .frontside {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .mainflip {
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -ms-transition: 1s;
            -moz-transition: 1s;
            -moz-transform: perspective(1000px);
            -moz-transform-style: preserve-3d;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
            position: relative;
        }

        .frontside {
            position: relative;
            -webkit-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            z-index: 2;
            margin-bottom: 30px;
        }

        .backside {
            position: absolute;
            top: 0;
            left: 0;
            background: white;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
            -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        }

        .frontside,
        .backside {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -moz-transition: 1s;
            -moz-transform-style: preserve-3d;
            -o-transition: 1s;
            -o-transform-style: preserve-3d;
            -ms-transition: 1s;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
        }

        .frontside .card,
        .backside .card {
            min-height: 312px;
        }

        .backside .card a {
            font-size: 18px;
            color: #007b5e !important;
        }

        .frontside .card .card-title,
        .backside .card .card-title {
            color: #007b5e !important;
        }

        .frontside .card .card-body img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

    </style>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>


<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">PMMB PT PERKEBUNAN NUSANTARA VII 2019</h5>
        <div class="row">
            <!-- Team member -->

            <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class=" img-fluid"
                                        src="<?php echo base_url('assets/images/syarwanarief.jpeg') ?>"
                                        alt="card image"></p>
                                <h4 class="card-title">Syarwan Arief</h4>
                                <p class="card-text">Program Studi Informatika<br> Fakultas Teknik dan Ilmu Komputer
                                    <br>Universitas Teknokrat Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="backside">
                        <div class="card">
                            <div class="card-body text-center mt-4">
                                <h4 class="card-title">Syarwan Arief</h4>
                                <p class="card-text">when you don't create things, you become defined by your tastes
                                    rather than ability. your tastes only narrow & exclude people. so create.
                                    <br/> ~ Why The Lucky Stiff</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="#">
                                            <i class="fa fa-skype"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon text-xs-center" target="_blank" href="#">
                                            <i class="fa fa-google"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"
                                            src="<?php echo base_url('assets/images/iqlimah.jpeg') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Iqlimah Fitriyani</h4>
                                    <p class="card-text">Program Studi Manajemen<br>Fakultas Ekonomi<br>Universitas Sriwijaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Iqlimah Fitriyani</h4>
                                    <p class="card-text">....</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"
                                            src="<?php echo base_url('assets/images/riska.jpeg') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Riska Irmawati</h4>
                                    <p class="card-text">Program Studi Ilmu Komunikasi<br>Fakultas Ilmu Sosial dan Politik<br>Universitas Sriwijaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Riska Irmawati</h4>
                                    <p class="card-text">....</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"
                                            src="<?php echo base_url('assets/images/indah.jpeg') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Indah Purwati</h4>
                                    <p class="card-text">Program Studi Akuntansi<br>Fakultas Ekonomi<br>Universitas Sriwijaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Indah Purwati</h4>
                                    <p class="card-text">....</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"
                                            src="<?php echo base_url('assets/images/cinthya.jpeg') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Cinthya Bella</h4>
                                    <p class="card-text">Program Studi Manajemen<br>Fakultas Ekonomi dan Bisnis<br> Universitas Teknokrat Indonesia</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Cinthya Bella</h4>
                                    <p class="card-text">Develop the winning edge. Small differences in your performance
                                        can lead to large differences in your results” - Brian Tracy</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"
                                            src="<?php echo base_url('assets/images/via.jpeg') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Via Auliya</h4>
                                    <p class="card-text">Program Studi Manajemen<br>Fakultas Ekonomi dan Bisnis<br> Universitas Teknokrat Indonesia</p>
                                </div>
                            </div>
                        </div>

                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Via Auliya</h4>
                                    <p class="card-text">....</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid"
                                            src="<?php echo base_url('assets/images/imam.png') ?>" alt="card image">
                                    </p>
                                    <h4 class="card-title">Imam Hidayah</h4>
                                    <p class="card-text">Program Studi Informatika Fakultas Ilmu Komputer
                                        Universitas Bandar Lampung</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body  mt-4">
                                    <h4 class="card-title text-center">Imam Hidayah</h4>
                                    <p class="card-text ">

                                        <?php

                                        date_default_timezone_set('Asia/Jakarta');
                                        $date = date('Y-m-d H:i:s');

                                        $tempo = "2020-02-06 10:00:00";


                                        if ($date < $tempo) {

                                            $waktu = substr($date, -1);

                                            // echo $date;

                                            if ($waktu == 1) {
                                                echo '<p><center>&emsp;"Kehebatan Mu Akan Selalu Di Uji Dan Ujian Itulah Yang Menentukan Apakah Kita Kokoh Tegak Berdiri
                                                    Atau Runtuh Sama Sekali. <br /> Yakinlah Pada Pendirian Layaknya Matahari Yang Tak Pernah Ingkar Janji"<p><strong>- Letkol Inf Wahyo Yuniartoto -</strong></p></center></p>';
                                            } else if ($waktu == 2) {
                                                echo '<br/><br/><p><center>Terkadang Membuktikan Kamu Yang Tebaik Adalah Sebuah Penghinaan.Paham ?</center></p>';
                                            } else if ($waktu == 3) {
                                                echo '<br/><br/><p><center>Kami Bukanlah Siapa-siapa, Hanya Manusia Biasa Yang Terbiasa Melakukan Tugas Luar Biasa.</center></p>';
                                            } else if ($waktu == 4) {
                                                echo '<br/><br/><p><center>&emsp;Kesalahan Adalah Bukti Bahwa Kau Sedang Mencoba. &emsp;</center></p>';
                                            } else if ($waktu == 5) {
                                                echo '<br/><p><center>"Pengalaman Memungkinkan Seseorang Menjadi Tahu Dan Hasil Tahu Ini Yang Kemudian Disebut Pengetahuan"</center></p>';
                                            } else if ($waktu == 6) {
                                                echo '<br/><p><center>"Kamu Gak Akan Pernah Tau Apa Arti Ini Bagi Kami Kalau Kamu Belum Pernah Menjalaninya"</center></p>';
                                            } else if ($waktu == 7) {
                                                echo '<br/><p><center>"Dibalik Senyum Kami Yang Kompak, Terdapat Banyak Penderitaan Yang Telah Kami Lalui."</center></p>';
                                            } else if ($waktu == 8) {
                                                echo '<br/><br/><p><center>&emsp;"Untuk Kamu Para Pejuang Hidup, Tersenyumlah Dalam Mengerjakan Bagianmu, Karena Apa Yang Kamu Tabur Akan Kamu Tuai.</center></p>';
                                            } else if ($waktu == 9) {
                                                echo '<br/><p><center>"Ada Saatnya Siapapun Akan Bisa Berubah Menjadi Apapun."</center></p>';
                                            } else if ($waktu == 0) {
                                                echo '<p><center>&emsp;"Bila engkau berhasil berbuat sesuatu dengan baik, tapi tidak dipuji… Janganlah engkau berkecil hati.
                                            Dan bila engkau melakukan sedikit kesalahan…, caci maki tak usah membuatmu sakit hati.
                                            Milikilah perasaan yang lapang, lembut dan mesra, berusahalah mempunyai sifat yang terpuji."<p><strong>Jend. TNI (Purn) Gatot Nurmantyo</strong></p></center></p>';
                                            }

                                        } else {

                                            $waktu = substr($date, -1);

                                            // echo $date;

                                            if ($waktu == 1) {
                                                echo "<br/><p><center>Hari Kerja Pingin Tidur ,Hari Libur Kurang Tidur.. <br/><br/>~Gw</center></p>";
                                            } else if ($waktu == 2) {
                                                echo '<br/><br/><p><center>&emsp;"Mana Saya Tau, Saya Kan Back-End....."&emsp;</center></p>';
                                            } else if ($waktu == 3) {
                                                echo "<p>Sr : Kalo Bikin Design Tuh Jangan Sepi-sepi Gitu ntar disangka gak Kerja<br/> Jr : Tapi Kan Saya Developer Bukan Designer<br/> Sr : Tak Peduli Apapun Itu Selama Kau Berkecimpung Di Dunia IT Kau Akan Dianggap Mampu Menguasai Segalanya <br/> Jr : Siap :(</p>";
                                            } else if ($waktu == 4) {
                                                echo '<br/><p><center>"Ketahuilah., Dibalik Tampilan Yang Kalian Nyiyir Dan Kalian Rendahkan Itu, Ada Puluhan Ribu Baris Code Yang Harus Saya Susun Kata perKata Agar Tetap Se-irama"</center></p>';
                                            } else if ($waktu == 5) {
                                                echo '<br/><p><center>"Bertanya Itu Lebih Baik Daripada Sok Tau !"</center></p>';
                                            } else if ($waktu == 6) {
                                                echo "<br/><p>A : Masa Gitu Doang Gak Bisa?, <b>Lu kAn aNaK it..</b> Besok Harus Dah Jadi Ya..! <br/><br/> B : Yeeee Pentium....!!</p>";
                                            } else if ($waktu == 7) {
                                                echo '<br/><p><center>&emsp;"Programmer Itu Jago Menulis Code Bukan Sastra, Bukan Juga Ahli Tafsir"</center></p>';
                                            } else if ($waktu == 8) {
                                                echo '<br/><br/><p><center>&emsp;"Siap Bantu Walau Dapetnya Cuma Thank You.."&emsp;</center></p>';
                                            } else if ($waktu == 9) {
                                                echo "<p><strong><h4>S.Kom</h4></strong><br/>(n.) Manusia Biasa Yang Kadang Kala Dikira Manusia Super Oleh Client Yang Sering Kali Dianggap Mampu Menguasai Benda Yang Berhubungan Dengan Elektronik.</p>";
                                            } else if ($waktu == 0) {
                                                echo '<p><center>&emsp;" Emas Hitam Itu Amatlah Pandai Bernyanyi, Tapi Ia Tak Tahu Cara Menciptakan Lagu. " &emsp;</strong></p></center></p>';
                                            }
                                        }

                                        ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <br>
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/Nanda.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Nanda Primalita</h4>
                                    <p class="card-text">Prodi Agroekoteknologi Fakultas Pertanian Universitas
                                        Sriwijaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Nanda Primalita</h4>
                                    <p class="card-text">Bersyukur bisa jadi bagian dari Program Magang BUMN
                                        Bersertifikat. Bertemu dengan orang-orang hebat di PTPN 7 merupakan hal emas yg
                                        gak semua orang bisa mengalaminya. Terimakasih dan maaf keluarga baru ku, PTPN
                                        7. Sehat dan sukses selalu. Jangan lupa bersyukur.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/syuef.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Amri Suef</h4>
                                    <p class="card-text">Prodi Budidaya Tanaman Perkebunan D3 Politeknik LPP
                                        Yogyakarta</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Amri Suef</h4>
                                    <p class="card-text">"Jangan percaya dengan kata² bijak, Kamu cukup bangkit dari
                                        tidur mu untuk bekerja dan belajar lebih keras".</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/saputro.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Andri Saputro</h4>
                                    <p class="card-text">Prodi Budidaya Tanaman Perkebunan D3 Politeknik LPP
                                        Yogyakarta</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Andri Saputro</h4>
                                    <p class="card-text">Setiap Rasa Bisa Dinikmati. Tak Peduli Apapun Itu Rasanya. Maka
                                        Nikmatilah Selagi Masih Sempat. <br/><br/>By: saputro.a.97</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/igo.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Igo Mayranda</h4>
                                    <p class="card-text">Prodi Teknik Mesin Politeknik LPP Yogyakarta</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Igo Mayrandra</h4>
                                    <p class="card-text">Hidup di dunia ini keras, maka jangan menjadi orang yang lemah.
                                        Hidup hanya sekali lakukanlah yang terbaik dan buat bahagia semua orang.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/handoko.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Andri Handoko</h4>
                                    <p class="card-text">Prodi Budidaya Tanaman Perkebunan D3 Politeknik LPP
                                        Yogyakarta</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Andri Handoko</h4>
                                    <p class="card-text">Kita tak bisa kembali ke masa lalu dan mengubah sebuah awal yg
                                        buruk. Namun kita bisa membuat akhir yang indah, mulai saat ini...</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/jorgi.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Jorgi Adriyanto</h4>
                                    <p class="card-text">Prodi Teknik Sipil Fakultas Teknik Universitas Bandar
                                        Lampung</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Jorgi Adriyanto</h4>
                                    <p class="card-text">"cara terbaik memprediksi masa depan adalah mengambil tindakan
                                        pada saat ini"</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/riyan.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Riyan Syahputra</h4>
                                    <p class="card-text">Prodi Budidaya Tanaman Perkebunan D3 Politeknik LPP
                                        Yogyakarta.</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Riyan Syahputra</h4>
                                    <p class="card-text">Jadilah engkau seperti Intan. Dimanapun ia diletakkan akan
                                        tetap menjadi intan, tidak akan pernah jadi permata..</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?php echo base_url('assets/images/ahmad.png') ?>"
                                            alt="card image"></p>
                                    <h4 class="card-title">Ahmad Sepriansyah</h4>
                                    <p class="card-text">Prodi Ilmu Tanah Fakultas Pertanian Universitas Sriwijaya</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Ahmad Sepriansyah</h4>
                                    <p class="card-text">Jangan karena kita lebih intelektual, dan dengan mudahnya
                                        memandang seseorang itu bodoh, itu adalah salah satu sifat yg seharusnya tidak
                                        dimiliki orang yg sudah sukses.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
        </div>
    </div>

</section>


</body>
</html>
