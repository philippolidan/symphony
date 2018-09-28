<!-- Modal -->
<div class="modal fade" id="m_view_er_transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><span id="test_name">Transaction Details</span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body" style="background-color: #fafafa;">
				<div class="row" id="evaluation_part">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="my-2 p-3 bg-white rounded shadow-sm">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="bg-info small text-light p-2 text-center"> ER Transaction Overview</h6>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<div class="media text-muted pt-3">
										<div class="media-body pb-3 mb-0 small lh-125" style="font-size: 12px;">

											<div class="row">

												<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
													<span>Patient ID :<span class="d-block font-weight-bold" id="p_id"></span></span>

												</div>

												<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
													<span>Patient Name: <span class=" font-weight-bold d-block" id="pname"></span></span>
												</div>

												<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
													<span>Assessment Date: <span class="d-block font-weight-bold" id="transaction_date"></span></span>
												</div>

											</div>

										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="my-2 p-3 bg-white rounded shadow-sm">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="small bg-info p-2 text-center">Vital Signs</h6>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<ul class="list-group">
										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small">Blood Pressure</h6>
											</div>
											<span class="text-muted" id="blood_pressure"></span>
										</li>
										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small">Breathing</h6>
											</div>
											<span class="text-muted" id="breathing"></span>
										</li>
										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small">Pulse</h6>
											</div>
											<span class="text-muted" id="pulse"></span>
										</li>
										<li class="list-group-item d-flex justify-content-between">
											<div class="text-muted">
												<h6 class="my-0 small">Body Temperature</h6>
											</div>
											<span class="text-muted" id="body_temperature"></span>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<div class="my-2 p-3 bg-white rounded shadow-sm">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="small bg-info p-2 text-center">Allergies</h6>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<ul class="list-group">
										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small">Are you Allergic?</h6>
											</div>
											<span class="text-muted" id="is_allergic"></span>
										</li>

										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small" id="allergy_name"></h6>
											</div>
										</li>
									</ul>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt-2 mb-2">
									<h6 class="small bg-info p-2 text-center">Medication</h6>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<ul class="list-group">
										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small">Last / Recent Oral Intake</h6>
											</div>
											<span class="text-muted" id="is_medication"></span>
										</li>

										<li class="list-group-item d-flex justify-content-between lh-condensed">
											<div>
												<h6 class="my-0 small" id="medication_name"></h6>
											</div>
										</li>
									</ul>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
						<div class="my-2 p-3 bg-white rounded shadow-sm">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="small bg-info p-2 text-center">Lab Tests</h6>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<ul class="list-group mb-3" id="lab_test">
									</ul>
								</div>

							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
						<div class="my-2 p-3 bg-white rounded shadow-sm">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="small bg-info p-2 text-center">Symptoms</h6>
								</div>

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<ul class="list-group mb-3" id="symptom_list">
									</ul>
								</div>

							</div>
						</div>
					</div>

				</div>

				<div class="row">
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

			<div class="modal-footer">
				<button class="btn btn-sm btn-danger" class="close" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$("#lab_result").hide();
	$("#symptoms").hide();

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

	$('#m_view_er_transaction').on('hidden.bs.modal', function () {
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
</script>