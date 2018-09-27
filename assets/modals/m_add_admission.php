<!-- Modal -->
<div class="modal fade" id="m_add_evaluation" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
		<div class="modal-content">

			<div class="modal-body" style="background-color: #fbfbfb;">
				<div class="row">

					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<div class="d-flex">
							<div>
								<h4 class="text-dark">Admission</h4>
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
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

						<!-- <div class="row mt-2">
							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
								<div class="row text-center">
									<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
										<h6 class="bg-info-800 text-light p-2 prev"  onclick="prev()" style="cursor: pointer"><i class="fa fa-chevron-left"></i></h6>
									</div>

									<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
										<h6 id="step_name" class="bg-info text-light p-2">Bed Assignment</h6>
									</div>

									<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
										<h6 class="bg-info-800 text-light p-2 next" onclick="next()" style="cursor:pointer"><i class="fa fa-chevron-right"></i></h6>
									</div>
								</div>
							</div>
						</div> -->

						<div class="divs row">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row text-center">

												<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
													<h6 id="step_name" class="bg-info text-light small p-2">Bed Assignment</h6>
												</div>

												<!-- <div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 class="bg-info-800 text-light small p-2 next" onclick="next()" style="cursor:pointer" onclick="next()" style="cursor:pointer"><i class="fa fa-chevron-right"></i></h6>
												</div> -->
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 mb-2">
											<select id="room_type" name="room_type" class="select2" style="width: 100%">
												<option disabled selected>Select Room Type</option>
												<option value="1">Suite</option>
												<option value="2">Private</option>
												<option value="3">Semi Private</option>
												<option value="4">Ward</option>
											</select>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 mb-2">
											<table id="bed_list_table" class="table hover">
												<thead>
													<tr>
														<th>Room No.</th>
														<th>Floor</th>
														<th>Rate</th>
														<th width="5%">Actions</th>
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>

											<!-- <button class="btn-select-bed btn btn-sm btn-primary next" onclick="next()" style="cursor:pointer"><i class="fa fa-check"></i></button> -->
										</div>

									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row text-center">

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 class="bg-info-800 small text-light p-2 prev" onclick="prev()" style="cursor: pointer"><i class="fa fa-chevron-left"></i></h6>
												</div>

												<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
													<h6 id="step_name" class="bg-info small text-light p-2">Dietary Plan</h6>
												</div>

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 id="dietary_next" class="bg-info-800 small text-light p-2 next" onclick="next()" style="cursor:pointer"><i class="fa fa-chevron-right"></i></h6>
												</div>
												
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<textarea class="form-control" name="dietary" rows="10"></textarea>
										</div>

									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row text-center">

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 class="bg-info-800 small text-light p-2 prev"  onclick="prev()" style="cursor: pointer"><i class="fa fa-chevron-left"></i></h6>
												</div>

												<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
													<h6 id="step_name" class="bg-info small text-light p-2">Prescription</h6>
												</div>

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 id="prescription_next" class="bg-info-800 small text-light p-2 next" onclick="next()" style="cursor:pointer"><i class="fa fa-chevron-right"></i></h6>
												</div>
												
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt-2 mb-2">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
													<input type="text" class="form-control" name="medicine_name" placeholder="Search for medicine...">
												</div>

												<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
													<input type="text" class="form-control" name="dosage" placeholder="Dosage">
												</div>

												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
													<input type="text" class="form-control" name="frequency" placeholder="Frequency">
												</div>

												<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 justify-content-end">
													<button class="btn btn-primary btn-sm " type="button"><i class="fa fa-plus"></i></button>
												</div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 mb-2">
											<table id="precription_table" class="table hover">
												<thead>
													<tr>
														<th>Name</th>
														<th>Dosage</th>
														<th>Frequency</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>Amoxicillin</td>
														<td>500 mg</td>
														<td>3 times a day</td>
													</tr>

													<tr>
														<td>Ibuprofen</td>
														<td>400 mg</td>
														<td>Every 6 hours</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row text-center">

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 class="bg-info-800 small text-light p-2 prev" onclick="prev()" style="cursor: pointer"><i class="fa fa-chevron-left"></i></h6>
												</div>

												<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
													<h6 id="step_name" class="bg-info small text-light p-2">Physician</h6>
												</div>

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 class="bg-info-800 small text-light p-2 next" onclick="next()" id="physician_next" style="cursor:pointer"><i class="fa fa-chevron-right"></i></h6>
												</div>
												
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt-2 mb-2">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Enter Doctor Name...">
													</div>
												</div>

												<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
													<div class="form-group">
														<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</button>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<table id="physician_table" class="table hover">
												<thead>
													<tr>
														<th>Name</th>
														<th>Specialty</th>
														<th>Actions</th>
													</tr>
												</thead>

												<tbody>
													<tr>
														<td>Dr. Mark Dherrick Cuevas</td>
														<td>Surgeon</td>
														<td></td>
													</tr>

													<tr>
														<td>Dr. Ian Historillo</td>
														<td>Orthopedic</td>
														<td></td>
													</tr>

													<tr>
														<td>Dr. Christian Philip Polidan</td>
														<td>Neurologist</td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="my-2 p-3 bg-white rounded shadow-sm">
									<div class="row">

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row text-center">

												<div class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
													<h6 class="bg-info-800 small text-light p-2 prev"  onclick="prev()" style="cursor: pointer"><i class="fa fa-chevron-left"></i></h6>
												</div>

												<div class="col-lg-11 col-md-11 col-xs-11 col-sm-11">
													<h6 id="step_name" class="bg-info small text-light p-2">Finalize Admission</h6>
												</div>
												
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
											<div class="row">

												<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 mt-2 mb-2">
													<h6 class="small">Selected Room / Bed Allocation</h6>
													<h6 id="selected_room" class="font-weight-bold small"></h6>
												</div>

												<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 mt-2 mb-2">
													<h6 class="small">Rate</h6>
													<h6 id="room_rate" class="small font-weight-bold"></h6>
												</div>

												<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 mt-2 mb-2">
													<h6 class="small">Admission Date</h6>
													<h6 class="font-weight-bold small"><?php echo date("F d, Y - g:i A"); ?></h6>
												</div>

												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 mb-2">
													<h6 class="small">Dietary</h6>

													<h6 id="f_dietary" class="small font-weight-bold"></h6>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-2 mb-2">
													<h6 class="small">Prescription</h6>

													<ul class="list-group mb-3" id="prescription_list">
													</ul>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-2 mb-2">
													<h6 class="small">Physician</h6>

													<ul class="list-group mb-3" id="physician_list">
													</ul>
												</div>

												<div class="col-lg-12 justify-content-center">
													<button class="btn btn-success btn-block">Admit</button>
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

		</div>
	</div>
</div>

<script type="text/javascript">
	$("#room_type").select2();
	var bed_table = $("#bed_list_table").DataTable();
	var prescription_table = $("#precription_table").DataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": false,
		"bInfo": false,
		"language" : {
			"emptyTable" :"No Prescription Available"
		}
	});
	var physician_table = $("#physician_table").DataTable({
		"bPaginate": false,
		"bLengthChange": true,
		"bFilter": false,
		"bInfo": false,
		"language" : {
			"emptyTable" :"No Physician Available"
		}
	});

		/*$("#bed_assignment").show();
		$("#dietary").hide();

		$(".btn-select-bed").on("click", function(){
			$("#dietary").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});

			$( "#bed_assignment" ).animate({
				opacity: 0.25,
				center: "+=50",
				height: "toggle"
			}, 400, function(){});
		});*/

		var columnName = [
		{ title: "Room No." },
		{ title: "Floor" },
		{ title: "Rate" },
		{ title: "Actions" }
		];

		$("#room_type").on("change", function(){
			var x = $(this).val();
			console.log(x);

			if (x == 1) {
				if ($.fn.DataTable.isDataTable("#bed_list_table")) {
					$("#bed_list_table").empty();
					bed_table.destroy();
				}

				bed_table = $("#bed_list_table").DataTable({
					columns: columnName,
					"ajax": {
						"url": "assets/data/suite_rooms.txt",
						"dataSrc": "data"
					}
				});
			}

			if (x == 2) {
				if ($.fn.DataTable.isDataTable("#bed_list_table")) {
					$("#bed_list_table").empty();
					bed_table.destroy();
				}

				bed_table = $("#bed_list_table").DataTable({
					columns: columnName,
					"ajax": {
						"url": "assets/data/private_rooms.txt",
						"dataSrc": "data"
					}
				});
			}

			if (x == 3) {
				if ($.fn.DataTable.isDataTable("#bed_list_table")) {
					$("#bed_list_table").empty();
					bed_table.destroy();
				}

				bed_table = $("#bed_list_table").DataTable({
					columns: columnName,
					"ajax": {
						"url": "assets/data/semi_private_rooms.txt",
						"dataSrc": "data"
					}
				});
			}

			if (x == 4) {
				if ($.fn.DataTable.isDataTable("#bed_list_table")) {
					$("#bed_list_table").empty();
					bed_table.destroy();
				}

				bed_table = $("#bed_list_table").DataTable({
					columns: columnName,
					"ajax": {
						"url": "assets/data/ward_rooms.txt",
						"dataSrc": "data"
					}
				});
			}
		});

		$('#bed_list_table').on('click', 'tbody .btn-select-bed', function () {
			var data_row = bed_table.row($(this).closest('tr')).data();
			$("#selected_room").empty();
			$("#room_rate").empty();
			$("#selected_room").html(data_row[0]+" - "+data_row[1]);
			$("#room_rate").html(data_row[2]);
		});

		$("#physician_next").on("click", function(){
			var x = physician_table.rows().data();
			console.log(x);

			$("#physician_list").empty();

			for (var i=0; i <= x.length -1; i++) {
				var template = '<li class="list-group-item d-flex justify-content-between lh-condensed"><div> <h6 class="my-0 small font-weight-bold">'+x[i][0]+'</h6><small class="text-muted">'+x[i][1]+'</small></div><span class="text-muted"></span></li>';
				$("#physician_list").append(template);
			}
		});

		$("#dietary_next").on("click", function(){
			var x = $("textarea[name='dietary']").val();
			console.log(x);
			if (x == "") {
				$("#f_dietary").empty();
				$("#f_dietary").html("No Dietary Plan Added");
			}

			else{
				$("#f_dietary").empty();
				$("#f_dietary").html(x);
			}
		});

		$("#prescription_next").on("click", function(){
			var x = prescription_table.rows().data();
			console.log(x);

			$("#prescription_list").empty();

			for (var i=0; i <= x.length -1; i++) {
				var template = '<li class="list-group-item d-flex justify-content-between lh-condensed"><div> <h6 class="my-0 small font-weight-bold">'+x[i][0]+'</h6><small class="text-muted">'+x[i][2]+'</small></div><span class="text-muted">'+x[i][1]+'</span></li>';
				$("#prescription_list").append(template);
			}
			
		});


		$(".divs > div").each(function(e) {
			if (e != 0) $(this).hide();
		});

		function next(){
			if ($(".divs > div:visible").next().length != 0){
				$(".divs > div:visible").next().animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200).show().prev().animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200).hide();
			}
			else {
				$(".divs > div:visible").animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200).hide();

				$(".divs > div:first").animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200).show();
			}
			return false;
		}

		function prev(){
			if ($(".divs > div:visible").prev().length != 0){
				$(".divs > div:visible").prev().animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200).show().next().animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200).hide();
			}
			else{
				$(".divs > div:visible").animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200).hide();

				$(".divs > div:last").animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200).show();
			}
			return false;
		}
	</script>
