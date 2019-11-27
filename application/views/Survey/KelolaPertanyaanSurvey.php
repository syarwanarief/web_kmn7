<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				TAMBAH PERTANYAAN BARU
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('Survey') ?>">Kelola Pertanyaan </a></li>
			<li>Tambah Pertanyaan</li>

		</ol>
		<div class="callout <?php echo $this->session->flashdata('message')['color']; ?>">
			<h4><?php echo $this->session->flashdata('message')['title']; ?></h4>
			<p><?php echo $this->session->flashdata('message')['msg']; ?></p>
		</div>
		<!-- message end -->
	</section>

	<section class="content">

		<div class="preloader">
			<div class="loading">
				<div align="center">

					<img src="<?php echo base_url('assets/images/Loading1.GIF') ?>" width="20%">
					<p></p>
					<p><strong>Harap Tunggu, Sedang Memuat Halaman.</strong></p>
				</div>
			</div>
		</div>

		<div class="box" style="padding: 15px">

			<div class="row" style="padding: 15px">

				<form class="form-horizontal" action="<?php echo base_url('Survey/save') ?>" method="post">

					<input type="hidden" name="page" value="create_survey"/>
					<input type="hidden" name="proceed_save" value="1"/>

					<hr/>

					<input type="hidden" name="survey_questions" id="survey_questions"/>

					<h4>Buatlah suatu pertanyaan untuk evaluasi yang akan dibuat</h4>
					<div style="border-top: 1px solid; margin-bottom: 15px">

					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="survey_question">Pertanyaan</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="survey_question" id="survey_question">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="pil">Jenis Penilaian</label>
						<div class="col-sm-5">
							<select class="form-control" id="pil" name="pil" onchange="select()">
								<option value="Text">Text</option>
								<option value="Skor">Skor</option>
							</select>
						</div>
					</div>

					<div class="form-group" id="answers_group" style="display: none">
						<label class="control-label col-sm-2" for="kat">Aspek Pertanyaan</label>
						<div class="col-sm-5">
							<select class="form-control" id="kat" name="kat">
								<option value="text"></option>
								<option value="Peningkatan Kompetensi">Peningkatan Kompetensi</option>
								<option value="Peningkatan Kinerja">Peningkatan Kinerja</option>
								<option value="Implementasi Hasil Pelatihan">Implementasi Hasil Pelatihan</option>
								<option value="Knowledge Sharing">Knowledge sharing</option>
								<option value="Peran Atasan">Peran Atasan</option>
								<option value="Peran Atasan">Uraian RTL dan Pembimbingan</option>
								<option value="Peran Atasan">Upaya Pembimbingan Atasan Terhadap Peserta</option>

							</select>
						</div>
					</div>

					<div class="form-group col-sm-5">
						<button type="submit" class="btn btn-primary pull-left" onclick="AddQuestion()">
							<i class="fa fa-plus"></i>
							Tambah Pertanyaan
						</button>
					</div>
				</form>
			</div>
		</div>
		<script>
            var sel = document.getElementById("pil");

            function select() {

                var selText = sel.options[sel.selectedIndex].value;

                if (selText == "Skor" || selText == "2" || selText == "3") {
                    document.getElementById("answers_group").style.display = "block";
                    document.getElementById("kat").value = "text";
                } else {
                    document.getElementById("answers_group").style.display = "none";
                    document.getElementById("kat").value = "text";
                }
            }
		</script>
		<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
		<script type="text/javascript">

            var line_counter = 0;

            var pertanyaan = [];
            var jawaban = [];

            function AddQuestion() {

                var survey_question = document.getElementById("survey_question").value;

                if (survey_question === "") {
                    alert("Belum ada pertanyaan yang diinputkan");
                    document.getElementById("survey_question").focus();

                } else {
                    //alert(survey_question);
                    var selected_field_type = document.getElementById("pil").value;
                    var possible_answers = document.getElementById("possible_answers").value;
                    var select = document.getElementById("pil").value;

                    possible_answers = possible_answers.replace(/@@@/gm, " / ");

                    var preview_html = "";
                    var no = line_counter + 1;
                    preview_html +=
                        "<tr id=\"line" + line_counter + "\" class=\"line-custom\">" +
                        "<td>" + no + "</td>" +
                        "<td>" + survey_question + "</td>";
                    if (select === "1") {
                        var pilihan1 = possible_answers.split("\n");

                        preview_html += "<td>";
                        for (j = 0; j < pilihan1.length; j++) {
                            preview_html += "<input type='checkbox' value=''>" + pilihan1[j] + " ";
                        }
                        preview_html += "</td>";
                        jawaban[line_counter] = pilihan1;

                    } else if (select === "2") {
                        var pilihan2 = possible_answers.split("\n");

                        preview_html += "<td>";
                        for (j = 0; j < pilihan2.length; j++) {
                            preview_html += "<input type='radio' value=''>" + pilihan2[j] + " ";
                        }
                        preview_html += "</td>";
                        jawaban[line_counter] = pilihan1;

                    } else {
                        preview_html += "<td>Jawaban Langsung</td>"
                        jawaban[line_counter] = "jawaban";
                    }
                    preview_html +=
                        "<td align=\"right\">" +
                        "<a href=\"javascript:RemoveLine('" + line_counter + "','"
                        + survey_question + "')\"><img src=\"<?php echo base_url() . 'assets/images/closeicon.png' ?>\"/></a></td></tr>";

                    var html = document.getElementById("tabel_tampung").innerHTML + preview_html;

                    pertanyaan[line_counter] = survey_question;

                    document.getElementById("tabel_tampung").innerHTML = html;

                    line_counter++;
                    document.getElementById("survey_questions").value +=
                        selected_field_type + "---" + survey_question + "---" + possible_answers.replace(/(?:\r\n|\r|\n)/g, '@@@') + ";;;";

                    document.getElementById("survey_question").value = "";
                }
            }

            function RemoveLine(x, y) {
                document.getElementById("line" + x).style.display = "none";
                document.getElementById("survey_questions").value = document.getElementById("survey_questions").value.replace(y + ";;;", "");
            }

		</script>
	</section>
</div>
