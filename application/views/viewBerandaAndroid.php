<body style="background-color: #CCCCCC">
<div class="content-wrapper" style="background-color: #cccccc">
	<section class="content">
		<?php foreach ($tampil

					   as $data): ?>
			<div class="row"
				 style="background-color: #ffffff; border: 1px; border-style: groove; padding: 1%; padding-bottom: 5%">
				<div>
					<p><img src="<?php echo base_url('assets/images/indah.jpeg') ?>"
							style="float:left; width: 7%; height: 10%; margin-right: 1%"/><b><?php echo $data->judul ?></b>
						<br>
						<text style="color: #666666"><?php echo $data->waktu_input ?></text>
					</p>
					<br>
					<p style="font-size: larger"><?php echo $data->judul ?></p><br>
					<embed src="<?php echo base_url('LaporanPdf/Buku_Android.pdf') ?>" type='application/pdf'
						   width='100%' height='400px'/>
				</div>
				<br>
				<b><?php //echo $getlike->num_rows() ?> Suka</b>

				&emsp;&nbsp;&emsp;&nbsp;
				&emsp;&nbsp;
				&emsp;<b><?php //echo $getdislike->num_rows() ?> Tidak Suka</b>
				<br>
				<br>

			</div>
			<br>
		<?php endforeach; ?>
	</section>
</div>
</body>
