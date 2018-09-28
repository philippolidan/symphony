<?php include('assets/parts/header.php'); ?>

<div class="wrapper">

	<?php include('assets/parts/evaluator_sidebar.php'); ?>

	<!-- Page Content -->
	<div id="content">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">

				<button type="button" id="sidebarCollapse" class="btn btn-info">
					<i class="fas fa-bars"></i>
				</button>
				<!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-align-justify"></i>
				</button> -->
			</div>
		</nav>

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 mb-2">
				<h3 class="border-bottom mt-2 mb-2">Patients</h3>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<table id="lab_test_table" class="table hover" style="width: 100%;">
					<thead>
						<tr>
							<th>ER Number</th>
							<th>Patient Number.</th>
							<th>Patient Name</th>
							<th>Birthday</th>
							<th width="10%">Actions</th>
						</tr>
					</thead>

					<tbody>
						
					</tbody>
				</table>

				<button class="btn btn-primary btn-sm" title="Add Result" data-target="#m_add_evaluation" data-toggle="modal"><i class="fas fa-eye"></i></button>

				<p class="text-success font-weight-bold">COMPLETED</p>
				<p class="text-orange-400 font-weight-bold">PENDING</p>

			</div>

		</div>

	</div>

</div>

<?php include('assets/parts/scripts.php'); ?>
<?php include('assets/modals/m_add_evaluation.php'); ?>

<script type="text/javascript">
	$("#lab_test_table").DataTable({
		"language": {
			"emptyTable": "No Available Evaluation Request"
		},
		"order": [[ 0, "desc" ]]
	});
	$('<div class="float-right col-lg-3 col-md-6">' +
		'<select class="form-control" id="er_status">'+
		'<option value="For Evaluation">For Evaluation</option>'+
		'<option value="Discharged">Discharged</option>'+
		'</select>' + 
		'</div>').appendTo("#lab_test_table_wrapper .dataTables_filter");
	$(".dataTables_filter label").addClass("pull-right");
	$("#er_status").on('change',function(){
		updateTable();
	});
	updateTable();
	check();
	function check(){
		var t = $("#er_status option:selected").val();
		var table = $('#lab_test_table').DataTable();
		var tcount = table.rows().count();
		$.ajax({
			url:"assets/includes/class_handler.php",
			type:"POST",
			data: {id:17,tcount:tcount,status:t},
			success:function(data){
				if(data == "true"){
					console.log(data);
					updateTable();
				}
			}
		});
		setTimeout(check,2000);
	}
	function updateTable(){
		var t = $("#er_status option:selected").val();
		$.ajax({
			url:"assets/includes/class_handler.php",
			type:"POST",
			data: {id:18,status:t},
			success:function(data){
				var table = $('#lab_test_table').DataTable();
				var data = JSON.parse(data);
				table.clear().draw();
				data.forEach(function(d){
					button = "<button class='btn btn-primary btn-sm' data-target='m_add_evaluation' data-erid ='"+d[4]+"' data-pid='"+d[5]+"' onclick='open_modal(this)' type='button' value='"+d[5]+"'><i class='fas fa-eye'></i></button>";
					table.row.add([d[0],d[6],d[1],d[2],button]).draw(false);
				});
			}
		});
	}
	function open_modal(object){
		var t = $("#er_status option:selected").val();
		var val = $(object).val();
		var type = $(object).data('type');
		var id;
		var modal = $(object).data('target');  
		var patient_oid = $(object).data('pid');
		var er_id = $(object).data('erid');
		$.ajax({
			url:"assets/includes/class_handler.php",
			type: "POST",
			data: {id:10, er_id : er_id, patient_oid:patient_oid,status :1,status1 : t },
			success: function(data){
				var data = JSON.parse(data);
				$("input[name='er_id']").val(data[14]);
				$("#pname").text(data[0]);
				$("#p_id").text("ER-"+data[1]);
				$("#a_date").text(data[2]);
				$("#birthdate").text(data[16]);
				$("#bp").text(data[3]);
				$("#breathing").text(data[4]);
				$("#pulse").text(data[5]);
				$("#temp").text(data[6]+"°");
				$("#isallergic").text(data[7]);
				$("#hasmedication").text(data[9]);
				if(data[8] == "" && data[10] == ""){
					$("#allergies").text("None");
					$("#medications").text("None");
				}
				else{
					$("#allergies").text(data[8]);
					$("#medications").text(data[10]);
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
				if(data[15].length > 0){
					// $("select[name='medicine_name']").addClass('d-none');
					// $("input[name='dosage']").addClass('d-none');
					// $("input[name='frequency']").addClass('d-none');
					$(".to-h").each(function(){
						$(this).addClass('d-none');
					});
					var table = $("#prescription_table").DataTable();
					var col = table.column(4);
					col.visible( ! col.visible() );
					for(var i = 0; i<data[15].length - 2; i++){
						table.row.add([0,data[15][i][0],data[15][i][1],data[15][i][2],null]).draw(false);
					}
					$("textarea[name='dietary']").val(data[15][(data[15].length - 2)]);
					$("#status").text(data[15][(data[15].length - 1)]);
					$("#admit").addClass("d-none");
					$("#discharge").addClass("d-none");
					$("textarea[name='dietary']").prop("readonly","readonly");
				}
				$('#'+modal).modal('show');
			}
		});
	}
	
</script>