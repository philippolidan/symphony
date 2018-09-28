<?php include('assets/parts/header.php'); ?>

<div class="wrapper">

	<?php include('assets/parts/patient_sidebar.php'); ?>

	<!-- Page Content  -->
	<div id="content">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">

				<button type="button" id="sidebarCollapse" class="btn btn-info">
					<i class="fas fa-bars"></i>
				</button>
				<!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-align-justify"></i>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="nav navbar-nav ml-auto mt-4 mb-2">
						<li class="nav-item active">
							<a class="nav-link" href="#">Logout</a>
						</li>
					</ul>
				</div> -->
			</div>
		</nav>

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="d-flex align-items-center p-3 my-1 text-white-50 rounded shadow-sm" style="background-image: linear-gradient(#02AAB0, #00CDAC);">
					<img class="mr-3" src="assets/img/avatars/boy.svg" alt="" width="48" height="48">
					<div class="lh-100">
						<h6 class="mb-0 text-white lh-100">Welcome, <?php echo $_SESSION['full_name']; ?>!</h6>
						<small class="text-white"><?php echo $_SESSION['id']; ?></small>
					</div>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<div class="my-3 p-3 bg-white rounded shadow-sm">
					<h6 class="border-bottom border-gray pb-2 mb-0">My Medical Journal</h6>

					<div class="row mt-4 mb-2">
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">

							<table id="transaction_table" class="table hover stripped" style="width: 100%">
								<thead>
									<tr>
										<th>ER. No.</th>
										<th>Date</th>
										<th>Status</th>
										<th width="10%">Actions</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>

						</div>
					</div>

				</div>
			</div>

			<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="my-3 p-3 bg-white rounded shadow-sm">
					<h6 class="border-bottom border-gray pb-2 mb-0">CURRENT MEDICATIONS & ACTIVITY</h6>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<strong class="text-gray-dark">MONDAY</strong>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">7:00 AM - Ambroxol 50 mg (<strong class="text-gray-dark">1 Tablet</strong>)</span>
						</div>
					</div>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<strong class="text-gray-dark">TUESDAY</strong>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">No Medication</span>
						</div>
					</div>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<strong class="text-gray-dark">WEDNESDAY</strong>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">No Medication</span>
						</div>
					</div>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<strong class="text-gray-dark">THURSDAY</strong>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">No Medication</span>
						</div>
					</div>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<strong class="text-gray-dark">FRIDAY</strong>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">No Medication</span>
						</div>
					</div>
					
					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<strong class="text-gray-dark">SATURDAY</strong>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">No Medication</span>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="my-3 p-3 bg-white rounded shadow-sm">
					<h6 class="border-bottom border-gray pb-2 mb-0">MEDICAL JOURNAL</h6>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<h6 class="mb-1 text-info">Dr. Christian Historillo</h6>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">September 18, 2018 - 9:30 AM</span>
							<p>ALPAX Hospital & Medical Center</p>
						</div>
					</div>

					<div class="media text-muted pt-3">
						<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<div class="d-flex justify-content-between align-items-center w-100">
								<h6 class="mb-1 text-info">Dr. Jomer Buñag</h6>
								<a href="#" class="text-info">View</a>
							</div>
							<span class="d-block">September 20, 2018 - 11:30 AM</span>
							<p>ALPAX Hospital & Medical Center</p>
						</div>
					</div>

				</div>
			</div> -->

		</div>

	</div>
</div>
<?php include('assets/parts/scripts.php'); ?>
<?php include('assets/modals/m_view_er_transaction.php'); ?>

<script type="text/javascript">

	<?php
	$patient_no = explode("PN-", $_SESSION['id']);
	?>

	var transaction_table = $("#transaction_table").DataTable({
		responsive: true
	});

	$(document).ready(function(){
		$.ajax({
			type: "POST",
			url: "assets/includes/patient_transaction_handler.php",
			data: {id:1, patient_id:'<?php echo $patient_no[1]; ?>'},
			success: function(data){
				var data = JSON.parse(data);

				if (data[0] == "1") {
					for (var i = 0; i <= data[1].length -1; i++) {
						var action = "<button data-target='#m_view_er_transaction' class='btn btn-info btn-sm' onclick='get_transaction_details(this)' data-erid='"+data[1][i][0]+"' data-pid='<?php echo $_SESSION['patient_oid']; ?>'><i class='fa fa-eye'></i></button>";

						transaction_table.row.add([
							data[1][i][2],
							data[1][i][3],
							data[1][i][4],
							action
							]).draw(false);
					}
				}

				else{

				}

			}
		});
	});

	function get_transaction_details(object){

		var patient_oid = $(object).data('pid');
		var er_id = $(object).data('erid');
		var modal = $(object).data('target');
		
		$.ajax({
			type: "POST",
			url: "assets/includes/class_handler.php",
			data: { id: 10, er_id: er_id, patient_oid : patient_oid},
			success: function(data){
				var data = JSON.parse(data);

				console.log(data);

				$("#pname").text(data[0]);
				$("#p_id").text("PN-"+data[1]);
				$("#transaction_date").text(data[2]);
				$("#blood_pressure").text(data[3]);
				$("#breathing").text(data[4]);
				$("#pulse").text(data[5]);
				$("#body_temperature").text(data[6]);
				$("#is_allergic").text(data[7]);

				if (data[8] == "") {
					$("#allergy_name").text("No Allergies");
				}

				else{
					$("#allergy_name").text(data[8]);
				}

				
				$("#is_medication").text(data[9]);

				if (data[10] == "") {
					$("#medication_name").text("No Recent Medication Available");
				}

				else{
					$("#medication_name").text(data[10]);
				}

				if(data[12].length > 0){
					console.log(data[12]);
					for(var i = 0; i<data[12].length; i++){
						$("#lab_test").append(data[12][i]);
					}
				}

				for(var i = 0; i<data[13].length;i++){
					$("#symptom_list").append(data[13][i]);
				}

				$(modal).modal('show');
			}
		});

	}
</script>