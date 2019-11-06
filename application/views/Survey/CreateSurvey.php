<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><font face="Book Antiqua">
				TAMBAH EVALUASI BARU
			</font>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> <font face="Book Antiqua">Home</font></a></li>
			<li><a href="<?php echo base_url('Survey') ?>">Kelola Evaluasi </a></li>
			<li>Tambah Evaluasi</li>

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

				<form action="" method="post">

					<input type="hidden" name="page" value="create_survey"/>
					<input type="hidden" name="proceed_save" value="1"/>

					<div class="form-group">
						<label>No. Evaluasi</label>
						<input type="text" class="form-control" name="noSurvey" id="noSurvey" required=""
							   placeholder="Masukan No.Survey">

						<label>Nama Evaluasi</label>
						<input type="text" class="form-control" name="namaSurvey" id="namaSurvey" required=""
							   placeholder="Masukan No.Survey">
					</div>
					<hr/>

					<input type="hidden" name="survey_questions" id="survey_questions"/>
					<br/>
					<table class="table" id="table">

						<tbody id="tabel_tampung">

						</tbody>
					</table>

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

                        function saveSurvey() {
                            $.ajax({
                                url: '<?php echo base_url();?>index.php/Survey/Save',
                                method: 'POST',
                                data: {pertanyaan: pertanyaan, jawaban: jawaban},
                                async: false,
                                dataType: 'json',
                                success: function (data) {
                                    alert("Berhasil Menyimpan")
                                }
                            }
                        }
					</script>

					<div style="border-top: 1px solid; margin-bottom: 15px">
						<h4>Berikan suatu pertanyaan untuk evaluasi yang akan dibuat</h4>
					</div>

					<div class="col-md-9">
						<div class="form-group">
							<input type="text" class="form-control" name="survey_question" id="survey_question">
						</div>

						<div class="form-group">
							<div class="form-group" id="answers_group" style="display: none">
								<label for="possible_answers" style="color: #999999">*Masukkan jawaban (1 per
									baris)</label>
								<textarea id="possible_answers" name="possible_answers" rows="7" type="text"
										  class="form-control border-input"></textarea>
							</div>
						</div>

						<div class="form-group">
							<button type="button" class="btn btn-success pull-left" onclick="AddQuestion()">
								<i class="fa fa-plus"></i>
								Tambah Pertanyaan
							</button>
						</div>

						<div class="form-group">
							<a href="<?php echo base_url('') ?>">
								<button type="button" class="btn btn-primary pull-right">
									<i class="fa fa-check"></i>
									Simpan
								</button>
							</a>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<div class="btn-group">
								<select class="form-control" id="pil" name="pil" onchange="select()">
									<option value="0">Jawaban</option>
									<option value="1">CheckBox</option>
									<option value="2">Radio Button</option>
								</select>

							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<script>
            var sel = document.getElementById("pil");

            function select() {

                var selText = sel.options[sel.selectedIndex].value;

                if (selText == "1" || selText == "2" || selText == "3") {
                    document.getElementById("answers_group").style.display = "block";
                    document.getElementById("possible_answers").value = "";
                } else {
                    document.getElementById("answers_group").style.display = "none";
                    document.getElementById("possible_answers").value = "";
                }
            }
		</script>
	</section>
</div>
