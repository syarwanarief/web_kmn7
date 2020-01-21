<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				INPUT DATA EVALUASI
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a>
			</li>
			<li class="active"><font face="Book Antiqua">Input Evaluasi</font></li>
		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

	<section class="content">

		<!-- SELECT2 EXAMPLE -->

		<!-- /.box-header -->
		<!-- /.box-header -->

		<div class="box box-default">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<p>*Input Strata untuk pengelompokan dalam laporan evaluasi</p>
						<br>

						<form role="form" method="post" enctype="multipart/form-data"
							  action="<?php echo base_url('survey/simpanEvaluasi') ?>">

							<div class="form-group">
								<label><font face="Book Antiqua">Strata</font></label>
								<select class="form-control" id="strata" name="strata" required="">
									<option value="">--Pilih Strata--</option>

									<option value="Total">Total</option>
									<option value="Karpim">Karpim</option>
									<option value="Karpel">Karpel</option>

								</select>
							</div>

							<!-- /.form-group -->
							<div class="form-group">
								<label><font face="Book Antiqua">Tahun</font></label>
								<input type="text" class="form-control" value="" placeholder="Tahun"
									   name="tahun" id="tahun">
							</div>
							<div class="form-group">
								<label><font face="Book Antiqua">Skor Real</font></label>
								<input type="text" class="form-control" value="" required="" placeholder="skor"
									   name="skorReal">
							</div>

							<div class="form-group">
								<label><font face="Book Antiqua">Skor Target</font></label>
								<input type="text" class="form-control" value="" required="" placeholder="skor"
									   name="skorTarget">
							</div>

					</div>
				</div>

				<button type="submit" class="btn btn-primary pull-right" name="submit">
					<i class="glyphicon glyphicon-floppy-saved"></i>
					Simpan
				</button>

				</form>
			</div>
		</div>

<!-- /.form-group -->

<!-- /.form-group -->
</section>
</div>
