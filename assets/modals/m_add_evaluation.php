<?php
$db = new Database;
?>
<style type="text/css">
.pnotify-center {
	right: calc(50% - 150px) !important;
}
</style>
<!-- Modal -->
<div class="modal fade" id="m_add_evaluation" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
		<div class="modal-content">

			<div class="modal-body" style="background-color: #fbfbfb;">
				<div class="row">
					<input type="hidden" name="er_id">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<div class="d-flex">
							<div>
								<h4 class="text-dark">Evaluation</h4>
							</div>
							<div class="ml-auto">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="text-danger">&times;</span>
								</button>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

						<div class="row">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<h6 class="bg-info small text-light p-2 text-center">Patient Overview</h6>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="media text-muted pt-3">
												<img src="assets/img/avatars/man.svg" alt="" class="mr-2 rounded" style="height: 60px; width: 60px;" id="img">
												<div class="media-body pb-3 mb-0 small lh-125" style="font-size: 12px;">
													<div class="d-flex justify-content-between align-items-center w-100">
														<strong class="text-dark" id="pname">Mr. Mark Dherrick P. Cuevas</strong>
													</div>
													<span class="d-block" id="p_id">Patient No: ALPX-3829</span>
													<span class="d-block" id="birthdate">July 23, 1997</span>
													<div class="d-flex justify-content-between align-items-center w-100">
														<strong class="text-dark" id="status"></strong>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"  id="evaluation_part">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<div class="row">

												<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
													<h6 class="bg-info small text-light p-2">Symptoms</h6>

													<ul class="list-group mb-3" id="symptom_list">

														
													</ul>
												</div>

											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<div class="row">

												<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
													<h6 class="bg-info small text-light p-2">Laboratory Results</h6>

													<ul class="list-group mb-3" id="lab_test">
														
														
													</ul>
												</div>

											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row">

												<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
													<h6 class="bg-info small text-light p-2">Prescription</h6>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 to-h">
													<select name='medicine_name' class="select2 to-v" style="width: 100%;">
														<option disabled selected value>Select Medicine</option>
														<?php
														foreach ($db->getMedicines() as $med) { ?>
															<option value="<?php echo (string)$med->_id ?>"><?php echo $med->name ?></option>
														<?php }
														?>
													</select>
												</div>

												<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 to-h">
													<input type="text" class="form-control to-v" name="dosage" placeholder="Dosage">
												</div>

												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 to-h">
													<input type="text" class="form-control to-v" name="frequency" placeholder="Frequency">
												</div>

												<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 float-right to-h">
													<button class="btn btn-primary btn-sm " type="button" id="add"><i class="fa fa-plus"></i></button>
												</div>

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 mb-2">
													<table id="prescription_table" class="table hover" style="width: 100%">
														<thead>
															<tr>
																<th>Id</th>
																<th>Name</th>
																<th>Dosage</th>
																<th>Frequency</th>
																<th>Actions</th>
															</tr>
														</thead>
													</table>
												</div>

											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row">

												<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
													<h6 class="bg-info small text-light p-2">Dietary</h6>
												</div>

												<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
													<textarea class="form-control" placeholder="Enter Dietary Plan..." name="dietary"></textarea>
												</div>

											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="lab_result">
						<div class="row">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
													<h6 class="bg-info small text-light p-2 text-center">Lab Result</h6>
												</div>

												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
													<h6 class="go-back-lab bg-info-800 small text-light p-2 text-center" style="cursor: pointer;">Go Back</h6>
												</div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<p class="small border-bottom" id="test_title">Sonograph (Ultrasound)</p>

											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="test_body">
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="symptoms">
						<div class="row">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
													<h6 class="bg-info small text-light p-2 text-center">Symptoms</h6>
												</div>

												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
													<h6 class="go-back-symptoms bg-info-800 small text-light p-2 text-center"  style="cursor: pointer;">Go Back</h6>
												</div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<p class="small border-bottom" id="symptom_title"></p>

											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="symptom_body">
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<div class="modal-footer justify-content-center">
				<button class="btn btn-primary btn-lg" id="admit">Admit</button>
				<button class="btn btn-success btn-lg" id="discharge">Discharge</button>
			</div>

		</div>
	</div>

	<script type="text/javascript">
		$("#lab_result").hide();
		$("#symptoms").hide();
		$(".select2").select2({"width" :"100%"});
		$("#prescription_table").DataTable({
			"bPaginate": false,
			"bLengthChange": false,
			"bFilter": false,
			"bInfo": false,
			"language" : {
				"emptyTable" :"No Prescription Available"
			},
			"columnDefs": [
			{
				"targets": [0],
				"visible": false,
				"searchable": false
			}]
		});
		$('#m_add_evaluation').on('hidden.bs.modal', function () {
			// $("#patient_overview").animate({
			// 	opacity: 1,
			// 	center: "+=50",
			// 	height: "toggle"
			// }, 200, function(){
			// });
			$(".to-h").each(function(){
				$(this).removeClass('d-none');
			});
			$("#admit").removeClass("d-none");
			$("#discharge").removeClass("d-none");
			var table = $("#prescription_table").DataTable();
			table.clear().draw();
			$("#lab_test").empty();
			$("textarea[name='dietary']").val("");
			$("textarea[name='dietary']").removeAttr("readonly");
			$("#symptom_list").empty();
			$("#evaluation_part").show();
			$("#patient_overview").css({"opacity":"1"});
			$("#test_body").empty();
			$("#symptom_body").empty();
			$("#lab_result").hide();
			$("#symptoms").hide();
		});
		$(".view-lab-result").on("click", function(){
			$("#lab_result").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});

			$( "#evaluation_part" ).animate({
				opacity: 0.25,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});
		});

		$(".go-back-lab").on("click", function(){
			$("#lab_result").animate({
				opacity: 0.25,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});

			$("#evaluation_part").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});
		});

		$(".view-symptoms").on("click", function(){
			$("#symptoms").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});

			$("#evaluation_part").animate({
				opacity: 0.25,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});
		});

		$(".go-back-symptoms").on("click", function(){
			$("#symptoms").animate({
				opacity: 0.25,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});

			$("#evaluation_part").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});
		});
	function to_validate(){
		var checker = true;
		$(".to-v").each(function(){
			if($(this).val() == "" || $(this).val() == null ){
				if($(this).hasClass("select2")){
					$(this).parent().children().children().children().addClass("required-field");
				}
				else
					$(this).addClass("required-field");
				checker = false;
			}
		});
		return checker;
	}
	$("#add").on('click',function(){
		var table = $("#prescription_table").DataTable();
		var dosage = $("input[name='dosage']").val();
		var frequency = $("input[name='frequency']").val();
		var med_name = $("select[name='medicine_name'] option:selected").text();
		var med_val = $("select[name='medicine_name'] option:selected").val();
		var data = table.rows().data();
		var existing = 0;
		for(var i = 0; i<data.length; i++){
			if(data[i][0] == med_name){
				existing = 1;
			}
		}
		if(existing == 1){
			new PNotify({
				text: 'Selected medicine is already in the table',
				type: 'info',
				delay: 2000
			});
			return false;
		}
		var checker = to_validate();
    	if(checker){
    		button = "<button class='btn btn-danger btn-sm'><i class='fas fa-times'></i></button>";
    		table.row.add([med_val,med_name,dosage,frequency,button]).draw(false);
    		$("input[name='dosage']").val("");$("input[name='frequency']").val("");
    	}
	});
	$("#discharge").on("click",function(){
		var table = $("#prescription_table").DataTable();
		var data_count = table.rows().data().count();
		if(data_count > 0){
			var data = table.rows().data();
			var plan = $("textarea[name='dietary']").val();
			var er_id = $("input[name='er_id']").val();
			var form_one = [];
			var form_data =[];
			for(var i = 0; i<data.length; i++){
				form_one[i] =[data[i][1],data[i][2],data[i][3]];
			}
			var jsonString = JSON.stringify(form_one);
			console.log(jsonString);
			form_data.push({name:"prescription" , value: jsonString});
			form_data.push({name:"plan" , value: plan});
			form_data.push({name:"id" , value: 19});
			form_data.push({name:"er_id" , value: er_id});
			form_data.push({name:"status" , value: "Discharged"});
			$.ajax({
				url:"assets/includes/class_handler.php",
				type:"POST",
				data:form_data,
				success:function(data){
					console.log(data);
					if(data == true){
						new PNotify({
							text: 'Success!',
							type: 'success',
							delay: 2000
						});
						$("#m_add_evaluation").modal('hide');
						table.clear().draw();;
						$("textarea[name='dietary']").val("");
						$("select[name='medicine_name'] option").each(function() {
							$(this).prop("selected","selected");
							return false;
						});
						updateTable();
					}
				}
			});
		}
		else{
			new PNotify({
				text: 'Please add a prescription',
				type: 'info',
				delay: 2000
			});
		}
	});
	$(".to-v").on('change',function(){
		if($(this).hasClass("select2")){
			$(this).parent().children().children().children().removeClass("required-field");
		}
		else
			$(this).removeClass('required-field');
	});
	$('#prescription_table tbody').on( 'click', '.btn-danger', function () {
		var table = $('#prescription_table').DataTable();
		table
		.row( $(this).parents('tr') )
		.remove()
		.draw();
	} );
	function view_symptom(symptom_id,er_id,name){
		$.ajax({
			url:"assets/includes/class_handler.php",
			type: "POST",
			data: {id:16, symptom_id : symptom_id,er_id:er_id },
			success: function(data){
				var data = JSON.parse(data);
				var header = "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'><div class='form-group row'>";
				var end_header = "</div></div>";
				var body_data='';
				var readonly ='';
				var input_val = '';
				for(var i = 0; i<data.length;i++){
					var label = "<label class='col-sm-4 col-form-label'>"+data[i][0]+"</label>";
					var input = "<div class='col-sm-8'><input type='text' name='test_value[]' class='form-control' value='"+data[i][1]+"' readonly></div>";
					body_data = body_data + header + label + input + end_header;
				}
				var fname = $("input[name='fname']").val();
				var mname = $("input[name='mname']").val();
				var lname = $("input[name='lname']").val();
				console.log(name);
				$("#symptom_title").text(name);
				$("#symptom_body").html(body_data);
				$("#evaluation_part").animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200, function(){$("#symptoms").animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200, function(){});});
			}
		});
	}
	function view_test(labtest_id,type){
		$.ajax({
			url:"assets/includes/class_handler.php",
			type: "POST",
			data: {id:6, test_id : labtest_id,type:type },
			success: function(data){
				var data = JSON.parse(data);
				var header = "<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'><div class='form-group row'>";
				var end_header = "</div></div>";
				var body_data='';
				var readonly ='';
				var input_val = '';
				for(var i = 0; i< data[1].length; i++){
					readonly='readonly';
					if(data[0] != 0){
						input_val = data[1][i+1];
					}
					else{
						input_val = "";
					}
					if(data[1][i] != "interpretation" ){
						var label = "<label class='col-sm-4 col-form-label'>"+data[1][i]+"</label>";
						var input = "<div class='col-sm-8'><input type='text' name='test_value[]' class='form-control' value='"+input_val+"' "+readonly+"></div>";
						body_data = body_data + header + label + input + end_header;
					}
					if(data[0] != 0)
						i = i + 1;
				}
				if(data[0] != 0)
					$("textarea[name='interpretation']").val(data[1][data[1].length - 1]);
				else
					$("textarea[name='interpretation']").val("");

				$("textarea[name='interpretation']").prop("readonly",true);
				var fname = $("input[name='fname']").val();
				var mname = $("input[name='mname']").val();
				var lname = $("input[name='lname']").val();
				$("#test_title").html(type);
				$("#test_body").html(body_data);
				
				$("#evaluation_part").animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200, function(){$("#lab_result").animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200, function(){});});
			}
		});
	}
	</script>