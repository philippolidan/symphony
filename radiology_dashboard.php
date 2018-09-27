<?php include('assets/parts/header.php'); ?>

<div class="wrapper">

	<?php include('assets/parts/radiology_sidebar.php'); ?>

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
				<h3 class="border-bottom mt-2 mb-2">Radiology Tests</h3>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<table id="lab_test_table" class="table hover" style="width: 100%;">
					<thead>
						<tr>
							<th>ER Number</th>
							<th>Patient Number</th>
							<th>Patient Name</th>
							<th>Birthday</th>
							<th>Test Name</th>
							<th>Status</th>
							<th width="10%">Actions</th>
						</tr>
					</thead>

					<tbody>
						
					</tbody>
				</table>

				<button class="btn btn-primary btn-sm" title="Add Result" data-target="#m_input_test_result" data-toggle="modal"><i class="fas fa-plus"></i></button>

				<p class="text-success font-weight-bold">COMPLETED</p>
				<p class="text-orange-400 font-weight-bold">PENDING</p>

			</div>

		</div>

	</div>

</div>

<?php include('assets/parts/scripts.php'); ?>
<?php include('assets/modals/m_input_lab_result.php'); ?>

<script type="text/javascript">
	$("#lab_test_table").DataTable({
		"language": {
			"emptyTable": "No Available Lab Test Request"
		},
		"order": [[ 4, "desc" ]]
	});
	updateTable();
	check();
	function check(){
		var table = $('#lab_test_table').DataTable();
		var tcount = table.rows().count();
		$.ajax({
			url:"assets/includes/class_handler.php",
			type:"POST",
			data: {id:14,tcount:tcount,type:2},
			success:function(data){
				if(data == true){
					updateTable();
				}
				console.log(data);
			}
		});
		setTimeout(check,2000);
	}
	function updateTable(){
		$.ajax({
			url:"assets/includes/class_handler.php",
			type:"POST",
			data: {id:15,type:2},
			success:function(data){
				var table = $('#lab_test_table').DataTable();
				var data = JSON.parse(data);
				table.clear().draw();
				data.forEach(function(d){
					button = "<button class='btn btn-primary btn-sm' data-target='m_input_test_result' data-erid ='"+d[6]+"' data-pid='"+d[0]+"' data-id ='"+d[5]+"' data-type ='"+d[3]+"' onclick='open_modal(this)' type='button' value='"+d[5]+"'><i class='fas fa-eye'></i></button>";
					table.row.add([d[0],d[7],d[1],d[2],d[3],d[4],button]).draw(false);
				});
			}
		});
	}
	function to_validate(){
		var status = false;
		$(".to-v").each(function(){
			if($(this).val() == "" || $(this).val() == null ){
				if($(this).hasClass("select2")){
					$(this).parent().children().children().children().addClass("required-field");
				}
				else
					$(this).addClass("required-field");
				status = true;
			}
			else{
				status =  false;
			}
		});
		return status;
	}
	function open_modal(object){
		var val = $(object).val();
		var type = $(object).data('type');
		var id;
		var modal = $(object).data('target');  
		var p_id = $(object).data('pid');
		var er_id = $(object).data('erid');
		console.log(modal)
		$.ajax({
			url:"assets/includes/class_handler.php",
			type: "POST",
			data: {id:6, test_id : val, type:type },
			success: function(data){
				var data = JSON.parse(data);
				$("#pname").text(data[2][0][0]);
				$("#p_id").text(p_id);
				$("#birthdate").text(data[2][0][1]);
				var header = "<div class='row'><div class='col-lg-6 col-md-6 col-xs-6 col-sm-6'>";
				var end_header = "</div></div>";
				var body_data='';
				var readonly ='';
				var input_val = '';
				console.log(data[0]);
				for(var i = 0; i< data[1].length; i++){
					if(data[0] != 0){
						readonly='readonly';
						input_val = data[1][i+1];
					}
					else{
						readonly ='';
						input_val = "";
					}
					if(data[1][i] != "interpretation" ){
						var form_group = "<div class='form-group'>";
						var label = "<label>"+data[1][i]+"</label>";
						var input = "<input type='text' class='form-control to-v' name ='test_value[]' value='"+input_val+"' "+readonly+">";
						var end_form_group = "</div>";
						body_data = form_group+body_data + header + label + input + end_form_group + end_header;
					}
					if(data[0] != 0)
						i = i + 1;
				}
				if(data[0] != 0){
					$("textarea[name='interpretation']").val(data[1][data[1].length - 1]);
					$("textarea[name='interpretation']").prop("readonly",true);
					$("#test_submit").addClass("d-none");
				}
				else{
					$("textarea[name='interpretation']").val("");
					$("textarea[name='interpretation']").prop("readonly",false);
					$("#test_submit").removeClass("d-none");
				}
				$("#test_title").text(type+" Results");
				$("#test_body").html(body_data);
				$("input[name='labtest_id']").val(val);
				$("input[name='test_type']").val(type);
				$("input[name='er_id']").val(er_id);
				$('#'+modal).modal('show');
			}
		});
	}
	$("#test_submit").on("click", function(){
		var st = to_validate();
		if(!st){
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
					console.log(data[2]);
					if(data[0] == true){
						$("#m_input_test_result").modal('hide');
						updateTable();
					}
				}
			});
		}
	});
</script>