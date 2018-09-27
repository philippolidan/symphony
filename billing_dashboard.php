<?php include('assets/parts/header.php'); ?>
<div class="wrapper">

	<?php include('assets/parts/billing_sidebar.php'); ?>

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

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h3 class="border-bottom mt-2 mb-2">Billing</h3>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="billing_table" class="table hover">
					<thead>
						<tr>
							<th>ER Number</th>
							<th>Patient Number</th>
							<th>Name</th>
							<th>Birthday</th>
							<th>Actions</th>
						</tr>
					</thead>
				</table>
			</div>

			<button class="btn btn-primary btn-sm" title="Generate Bill" data-toggle="modal" data-target="#m_view_patient_bill"><i class="fa fa-file-invoice"></i></button>

		</div>

	</div>
	<!-- Page Content -->

</div>

<?php include('assets/parts/scripts.php'); ?>
<?php include('assets/modals/m_view_patient_bill.php'); ?>
<?php include('assets/modals/m_confirm.php'); ?>

<script type="text/javascript">
	$(".select2").select2({});
	$("#billing_table").DataTable({
		"language": {
			"emptyTable": "No Available Data"
		},
		"order": [[ 0, "desc" ]]
	});
	$('<div class="float-right col-lg-2 col-md-6">' +
		'<select class="form-control" id="bill_type">'+
		'<option value="Discharged">Discharged</option>'+
		'<option value="Paid">Paid</option>'+
		'</select>' + 
		'</div>').appendTo("#billing_table_wrapper .dataTables_filter");
	$(".dataTables_filter label").addClass("pull-right");
	$("#bill_type").on('change',function(){
		updateTable();
	});
	updateTable();
	check();
	function check(){
		var t = $("#bill_type option:selected").val();
		var table = $('#billing_table').DataTable();
		var tcount = table.rows().count();
		$.ajax({
			url:"assets/includes/class_handler.php",
			type:"POST",
			data: {id:17,tcount:tcount,status:t},
			success:function(data){
				if(data == true){
					updateTable();
				}
			}
		});
		setTimeout(check,2000);
	}
	function updateTable(){
		var t = $("#bill_type option:selected").val();
		$.ajax({
			url:"assets/includes/class_handler.php",
			type:"POST",
			data: {id:18,status:t},
			success:function(data){
				var table = $('#billing_table').DataTable();
				var data = JSON.parse(data);
				table.clear().draw();
				data.forEach(function(d){
					button = "<button class='btn btn-primary btn-sm' data-target='m_view_patient_bill' data-erid ='"+d[4]+"' data-pid='"+d[5]+"' onclick='open_modal(this)' type='button' value='"+d[5]+"'><i class='fas fa-file-invoice'></i></button>";
					table.row.add([d[0],d[6],d[1],d[2],button]).draw(false);
				});
			}
		});
	}
	function open_modal(object){
		var val = $(object).val();
		var type = $(object).data('type');
		var id;
		var modal = $(object).data('target');  
		var patient_oid = $(object).data('pid');
		var er_id = $(object).data('erid');
		$.ajax({
			url:"assets/includes/class_handler.php",
			type: "POST",
			data: {id:8, patient_oid:patient_oid,er_id: er_id },
			success: function(data){
				var data = JSON.parse(data);
				console.log(data);
				$("#b_pname").text(data[0]);
				$("#b_address").text(data[1]);
				$("#b_assessment").text(data[2]);
				$("input[name='er_id']").val(er_id);
				if(data[3] != ""){
					$("#admission_date").text(data[3]);
					$("#discharge_date").text(data[4]);
					$("#bill_bed_no").text(data[5]);
					$("#bill_ward_no").text(data[6]);
				}
				else{
					$("#admission_div").addClass("d-none");
					$("#discharge_div").addClass("d-none");
					$("#bed_div").addClass("d-none");
					$("#ward_div").addClass("d-none");
				}
				var t = $('#billing_table1').DataTable();
				t.clear().draw();
				console.log(data[9]);
				if(data[9].length > 0){
					$("#total").text(data[9][0]);
					$("#p-discount").removeClass('d-none');
					$("input[name='discount']").addClass('d-none');
					$("#p-discount").text(data[9][1]);
					$("#subtotal").text(data[9][2]);
					data[9][3].forEach(function(d){
						t.row.add([d[0],d[1]]).draw(false);
					});
					$("#submit").addClass("d-none");
					$("#print").removeClass("d-none");
				}
				else{
					t.row.add(["Physician's Fee","1000.00"]).draw(false);
					data[8].forEach(function(d){
						t.row.add([d[0],d[1]]).draw(false);
					});
					calculate();
				}
				// for(var i = 0; i<data[8][0].length;i++){

				// 	t.row.add([data[8][0][i],data[8][0][i+1],"<input type='text' class='form-control' value='0.00'>",data[8][0][i]]).draw(false);
				// }
				$('#'+modal).modal('show');
			}
		});
	}
	
	$("#test_submit").on("click", function(){
		var test_value = [];
		$("input[name='test_value[]']").each(function(){
			test_value.push($(this).val());
		});
		var interpretation = $("textarea[name='interpretation']").val();
		var labtest_id = $("input[name='labtest_id']").val();
		var er_id = $("input[name='er_id']").val();
		var type = $("input[name='test_type']").val();
		test_value.push(interpretation,labtest_id,type);
		$.ajax({
			url:"assets/includes/class_handler.php",
			type: "POST",
			data: {id:7, test_value : test_value },
			success: function(data){
				var data = JSON.parse(data);
				if(data[0] == true){
					$("#m_input_test_result").modal('hide');
					updateTable();
				}
			}
		});
	});
</script>