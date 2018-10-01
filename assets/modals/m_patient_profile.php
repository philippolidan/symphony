<!-- Modal -->
<div class="modal fade" id="m_patient_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
		<div class="modal-content">

			<div class="modal-body" style="background-color: #fafafa;">
				<div class="row">

					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
						<div class="d-flex">
							<div>
								<h4 class="text-dark font-weight-bold">Patient Record</h4>
							</div>
							<div class="ml-auto">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" class="text-danger">&times;</span>
								</button>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<div class="my-3 p-3 bg-white rounded shadow-sm">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<div class="media text-muted pt-3">
										<img src="" alt="" class="mr-2 rounded" style="height: 60px; width: 60px;" id="img">
										<div class="media-body pb-3 mb-0 small lh-125" style="font-size: 12px;">
											<div class="d-flex justify-content-between align-items-center w-100">
												<strong class="text-dark" id="pname">Mr. Mark Dherrick P. Cuevas</strong>
											</div>
											<span class="d-block" id="p_id">Patient ID: ALPX-3829</span>
											<span class="d-block" id="a_date"></span>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="my-3 p-3 bg-white rounded shadow-sm" id="patient_overview">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="pb-2 mb-0">Patient Overview</h6>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="bg-info text-light p-2 small mt-2">Vitals & Information</h6>

									<div class="row p-2">

										<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
											<label class="font-weight-bold">Last Vitals</label><hr style="margin-top: -3px;">

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Blood Pressure</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id="bp">5'6</h6>
												</div>
											</div>

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Breathing</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id="breathing">75 kgs</h6>
												</div>
											</div>

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Pulse</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id="pulse">28</h6>
												</div>
											</div>

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small" >Temperature</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id="temp">38°</h6>
												</div>
											</div>

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Allergic</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id="isallergic">28/min</h6>
												</div>
											</div>

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Allergies</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id="allergies">89/min</h6>
												</div>
											</div>

											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Has Medications?</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id='hasmedication'>125/80</h6>
												</div>
											</div>
											<div class="d-flex border-bottom mt-1 mb-1">
												<div>
													<h6 class="small">Medications</h6>
												</div>

												<div class="ml-auto">
													<h6 class="small font-weight-bold" id='medications'>125/80</h6>
												</div>
											</div>
										</div>

									<!-- 	<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
											<label class="font-weight-bold">BMI</label><hr style="margin-top: -3px;">
											<div style="width:100%;">
												<canvas id="bmi_chart"></canvas>
											</div>
										</div> -->

									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<h6 class="bg-info text-light p-2 small mt-2">Symptoms</h6>
									<div class="row p-2">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="symptom">
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<div class="row  text-light p-3 mt-2">
										<div class="bg-info col-lg-4 col-md-4 col-xs-4 col-sm-4 p-2">
											<h6 class="small">Laboratory Test</h6>
										</div>
										<div class="bg-info col-lg-4 col-md-4 col-xs-4 col-sm-4 p-2">
											<h6 class="small">Status</h6>
										</div>
										<div class="bg-info col-lg-4 col-md-4 col-xs-4 col-sm-4 p-2">
											<h6 class="small float-right">Action</h6>
										</div>
									</div>
									<div class="row p-2">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="lab_test">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="my-3 p-3 bg-white rounded shadow-sm" id="test_div">
							<div class="row mb-4">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

									<div class="row mb-4">

										<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
													<h6 class="bg-info small text-light p-2 text-center" id="test_title">Lab Result</h6>
												</div>

												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
													<h6 class="go-back-lab bg-info-800 small text-light p-2 text-center" onclick="reset()" style="cursor: pointer;">Go Back</h6>
												</div>
											</div>
											<div class="row" >
												<div class="col-lg-12" id="test_body">
													
												</div>
											</div>
										</div>

									</div>

									<div class="row mb-4">

										<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">

											<h6 class="pb-2 border-bottom bottom-gray"><strong>Interpretation</strong></h6>

											<div class="form-group" id="test_interpretation">
												<textarea class="form-control" name="interpretation" readonly></textarea>
											</div>

										</div>

									</div>

								</div>

							</div>
						</div>
						<div class="my-3 p-3 bg-white rounded shadow-sm" id="symptom_div">
							<div class="row mb-4">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

									<div class="row mb-4">

										<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
											<div class="row">
												<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
													<h6 class="bg-info small text-light p-2 text-center" id="symptom_title">Lab Result</h6>
												</div>

												<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
													<h6 class="go-back-lab bg-info-800 small text-light p-2 text-center" onclick="reset1()" style="cursor: pointer;">Go Back</h6>
												</div>
											</div>
											<div class="row" >
												<div class="col-lg-12" id="symptom_body">
													
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
	function reset(){
		$("#test_div").animate({
			opacity: 0.25,
			center: "+=50",
			height: "toggle"
		}, 200, function(){
			$("#patient_overview").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 200, function(){
			});
		});
		
	}
	function reset1(){
		$("#symptom_div").animate({
			opacity: 0.25,
			center: "+=50",
			height: "toggle"
		}, 200, function(){
			$("#patient_overview").animate({
				opacity: 1,
				center: "+=50",
				height: "toggle"
			}, 200, function(){
			});
		});
		
	}
	$('#m_patient_profile').on('hidden.bs.modal', function () {
		// $("#patient_overview").animate({
		// 	opacity: 1,
		// 	center: "+=50",
		// 	height: "toggle"
		// }, 200, function(){
		// });
		$("#patient_overview").show();
		$("#patient_overview").css({"opacity":"1"});
		$("#test_div").hide();
		$("#symptom_div").hide();
	});

	$("#test_div").hide();
	$("#symptom_div").hide();
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
				
				$("#patient_overview").animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200, function(){$("#test_div").animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200, function(){});});
			}
		});
	}
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
				$("#patient_overview").animate({
					opacity: 0.25,
					center: "+=50",
					height: "toggle"
				}, 200, function(){$("#symptom_div").animate({
					opacity: 1,
					center: "+=50",
					height: "toggle"
				}, 200, function(){});});
			}
		});
	}
		// window.chartColors = {
	// 	red: 'rgb(255, 99, 132)',
	// 	orange: 'rgb(255, 159, 64)',
	// 	yellow: 'rgb(255, 205, 86)',
	// 	green: 'rgb(75, 192, 192)',
	// 	blue: 'rgb(54, 162, 235)',
	// 	purple: 'rgb(153, 102, 255)',
	// 	grey: 'rgb(201, 203, 207)'
	// };

	// (function(global) {
	// 	var Months = [
	// 	'January',
	// 	'February',
	// 	'March',
	// 	'April',
	// 	'May',
	// 	'June',
	// 	'July',
	// 	'August',
	// 	'September',
	// 	'October',
	// 	'November',
	// 	'December'
	// 	];

	// 	var COLORS = [
	// 	'#4dc9f6',
	// 	'#f67019',
	// 	'#f53794',
	// 	'#537bc4',
	// 	'#acc236',
	// 	'#166a8f',
	// 	'#00a950',
	// 	'#58595b',
	// 	'#8549ba'
	// 	];

	// 	var Samples = global.Samples || (global.Samples = {});
	// 	var Color = global.Color;

	// 	Samples.utils = {
	// 	// Adapted from http://indiegamr.com/generate-repeatable-random-numbers-in-js/
	// 	srand: function(seed) {
	// 		this._seed = seed;
	// 	},

	// 	rand: function(min, max) {
	// 		var seed = this._seed;
	// 		min = min === undefined ? 0 : min;
	// 		max = max === undefined ? 1 : max;
	// 		this._seed = (seed * 9301 + 49297) % 233280;
	// 		return min + (this._seed / 233280) * (max - min);
	// 	},

	// 	numbers: function(config) {
	// 		var cfg = config || {};
	// 		var min = cfg.min || 0;
	// 		var max = cfg.max || 1;
	// 		var from = cfg.from || [];
	// 		var count = cfg.count || 8;
	// 		var decimals = cfg.decimals || 8;
	// 		var continuity = cfg.continuity || 1;
	// 		var dfactor = Math.pow(10, decimals) || 0;
	// 		var data = [];
	// 		var i, value;

	// 		for (i = 0; i < count; ++i) {
	// 			value = (from[i] || 0) + this.rand(min, max);
	// 			if (this.rand() <= continuity) {
	// 				data.push(Math.round(dfactor * value) / dfactor);
	// 			} else {
	// 				data.push(null);
	// 			}
	// 		}

	// 		return data;
	// 	},

	// 	labels: function(config) {
	// 		var cfg = config || {};
	// 		var min = cfg.min || 0;
	// 		var max = cfg.max || 100;
	// 		var count = cfg.count || 8;
	// 		var step = (max - min) / count;
	// 		var decimals = cfg.decimals || 8;
	// 		var dfactor = Math.pow(10, decimals) || 0;
	// 		var prefix = cfg.prefix || '';
	// 		var values = [];
	// 		var i;

	// 		for (i = min; i < max; i += step) {
	// 			values.push(prefix + Math.round(dfactor * i) / dfactor);
	// 		}

	// 		return values;
	// 	},

	// 	months: function(config) {
	// 		var cfg = config || {};
	// 		var count = cfg.count || 12;
	// 		var section = cfg.section;
	// 		var values = [];
	// 		var i, value;

	// 		for (i = 0; i < count; ++i) {
	// 			value = Months[Math.ceil(i) % 12];
	// 			values.push(value.substring(0, section));
	// 		}

	// 		return values;
	// 	},

	// 	color: function(index) {
	// 		return COLORS[index % COLORS.length];
	// 	},

	// 	transparentize: function(color, opacity) {
	// 		var alpha = opacity === undefined ? 0.5 : 1 - opacity;
	// 		return Color(color).alpha(alpha).rgbString();
	// 	}
	// };

	// // DEPRECATED
	// window.randomScalingFactor = function() {
	// 	return Math.round(Samples.utils.rand(-100, 100));
	// };

	// // INITIALIZATION

	// Samples.utils.srand(Date.now());

	// // Google Analytics
	// /* eslint-disable */
	// if (document.location.hostname.match(/^(www\.)?chartjs\.org$/)) {
	// 	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	// 		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	// 		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	// 	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	// 	ga('create', 'UA-28909194-3', 'auto');
	// 	ga('send', 'pageview');
	// }
	// /* eslint-enable */

	// }(this));

	// var config = {
	// 	type: 'line',
	// 	data: {
	// 		labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
	// 		datasets: [
	// 		{
	// 			backgroundColor: window.chartColors.green,
	// 			borderColor: window.chartColors.green,
	// 			data: [
	// 			randomScalingFactor(),
	// 			randomScalingFactor(),
	// 			randomScalingFactor(),
	// 			randomScalingFactor(),
	// 			randomScalingFactor(),
	// 			randomScalingFactor(),
	// 			randomScalingFactor()
	// 			],
	// 			fill: true,
	// 		}]
	// 	},
	// 	options: {
	// 		responsive: true,
	// 		tooltips: {
	// 			mode: 'index',
	// 			intersect: false,
	// 		},
	// 		hover: {
	// 			mode: 'nearest',
	// 			intersect: true
	// 		},
	// 		scales: {
	// 			xAxes: [{
	// 				display: true,
	// 				scaleLabel: {
	// 					display: true,
	// 					labelString: 'Month'
	// 				}
	// 			}],
	// 			yAxes: [{
	// 				display: true,
	// 				scaleLabel: {
	// 					display: true,
	// 					labelString: 'Value'
	// 				}
	// 			}]
	// 		}
	// 	}
	// };

	// window.onload = function() {
	// 	var ctx = document.getElementById('bmi_chart').getContext('2d');
	// 	window.myLine = new Chart(ctx, config);
	// };
</script>