<!-- Modal -->
<div class="modal fade" id="m_view_patient_bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-fluid" role="document">
		<div class="modal-content">

			<div class="modal-body" style="background-color: #fbfbfb;">
				<div class="row p-2">

					<input type="hidden" class="d-none" name="bill_checker" value="0">
					<input type="hidden" class="d-none" name="er_id" value="0">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mb-2">
						<div class="d-flex">
							<div>
								<h4 class="text-dark">Invoice</h4>
							</div>
							<div class="ml-auto">
								<button class="btn btn-warning btn-sm mr-2 d-none" title="Print" onclick="print_button()" id="print"><i class="fa fa-print"></i></button>
								<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close" title="Close">
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
					</div>

					<div id="to_print" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border">
						<div class="row mb-4 mt-4">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="d-flex">
									<div><img src="assets/img/icons/symphony icon text.svg" style="height: 60px;"></div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align: right;font-size: 10px;">
								<span>
									Unit 2B, Sancor Building, General Malvar St.,<br>Brgy. San Vicente, Biñan, Laguna
									<br>Tel. No: (049) 854-5754
									<br>Mobile No: (+63) 925-102-1024
									<br>Website: symphony.com.ph
								</span>
							</div>
						</div>

						<hr style="margin-top: -5px;">

						<div class="row mb-4 mt-4">

							<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
										<label class="billing-patient-details">Patient Name</label>
										<p class="font-weight-bold" id="b_pname"></p>

										<label class="billing-patient-details">Address</label>
										<p class="font-weight-bold" id="b_address"></p>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="text-align: right">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 ">

										<div class="row justify-content-end">
											<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="admission_div">
												<label class="billing-patient-details">Admission Date</label>
												<p class="font-weight-bold" id="admission_date"></p>
											</div>

											<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="discharge_div">
												<label class="billing-patient-details">Discharge Date</label>
												<p class="font-weight-bold" id="discharge_date"></p>
											</div>

											<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
												<label class="billing-patient-details">Assessment Date</label>
												<p class="font-weight-bold" id="b_assessment"></p>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
											</div>

											<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="bed_div">
												<label class="billing-patient-details">Ward No.</label>
												<p class="font-weight-bold" id="bill_ward_no"></p>
											</div>

											<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" id="ward_div">
												<label class="billing-patient-details">Bed No.</label>
												<p class="font-weight-bold" id="bill_bed_no"></p>
											</div>
										</div>

									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
										<label class="billing-patient-details">Mode of Payment</label>
										<p class="font-weight-bold">Cash</p>
									</div>
								</div>

								<div class="row"><hr>
									<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="table_div">
										<table id="billing_table1" class="hover table-striped table-bordered" style="width: 100%">
											<thead>
												<tr>
													<th>Particulars</th>
													<th class="dt-right">Amount</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt-4" style="font-size: 12px;"><hr>
								<div class="row">
									<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
									</div>

									<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
										<div class="d-flex">

											<div>
												<p class="billing-patient-details font-weight-bold">Subtotal</p>
												<p class="billing-patient-details font-weight-bold">Discount</p>
												<p class="billing-patient-details font-weight-bold">Total Bill</p>
											</div>

											<div class="ml-auto" style="text-align: right">
												<p class="billing-patient-details font-weight-bold" id="subtotal">0.00</p>
												<input type="text" class="form-control form-control-sm text-right" name="discount" value="0.00">
												<p class="billing-patient-details font-weight-bold d-none" id="p-discount"></p>
												<p class="billing-patient-details font-weight-bold" id="total">0.00</p>
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
				<button type="button" class="btn btn-primary" onclick="bill()" id="submit">Submit</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.ui-pnotify-action-button{
		cursor:pointer;
	}
</style>
<script type="text/javascript">
	$('#billing_table1').DataTable({
		"paging":   false,
		"ordering": false,
		"info":     false,
		"searching":false,
		responsive: true,
		"language": {
			"emptyTable": "Empty"
		}
	});
	$('#m_view_patient_bill').on('hidden.bs.modal', function () {
		$("input[name='discount'").removeClass('d-none');
		$("#p-discount").addClass('d-none');
		$("#submit").removeClass("d-none");
		$("#print").addClass("d-none");
	});
	function bill(){
		var checker = $("input[name='bill_checker']").val();
		if(checker == "0"){
			(new PNotify({
				title: 'Confirmation Needed',
				text: 'Are you sure?',
				icon: 'glyphicon glyphicon-question-sign',
				hide: false,
				confirm: {
					confirm: true
				},
				buttons: {
					closer: false,
					sticker: false
				},
				history: {
					history: false
				},
				addclass: 'stack-modal',
				stack: {'dir1': 'down', 'dir2': 'right', 'modal': true}
			})).get().on('pnotify.confirm', function(){
				var c = 0;
				var subtotal = $("#subtotal").text();
				var discount = $("input[name='discount']").val();
				var total = $("#total").text();
				var er_id = $("input[name='er_id']").val();
				var table = $("#billing_table1").DataTable();
				var data = table.rows().data();
				console.log(total);
				$.ajax({
					url:"assets/includes/class_handler.php",
					type: "POST",
					data: {id:9,subtotal:subtotal,discount:discount,total:total,er_id:er_id},
					success: function(data){
						console.log(data);
						if(data == 1){
							$("input[name='bill_checker']").val(1);
							print_button("confirm");
							$("#submit").addClass("d-none");
							$("#print").removeClass("d-none");
						}
					}
				});
			}).on('pnotify.cancel', function(){
			});

		}
		else{
			print_button("confirm");
		}
		
	}
	function calculate(){
		var subtotal = 0.00;
		var discount = $("input[name='discount']").val();
		if(isNaN(discount))
			discount = 0.00;
		$("#p-discount").text(parseFloat(discount).toFixed(2));
		$('#billing_table1 tr').each(function() {
			var st = parseFloat($(this).find("td").eq(1).html());
			if(isNaN(st))
				st = 0.00;
			subtotal = subtotal + st;
			var amnt = st - parseFloat(discount);
			$(this).find("td").eq(3).html(amnt.toFixed(2))
		});
		$("#subtotal").text(parseFloat(subtotal).toFixed(2));
		//$("#input[name='discount']").text(parseFloat(discount).toFixed(2));
		var total = subtotal - discount;
		console.log(total);
		$("#total").text(parseFloat(total).toFixed(2));
	}
	$("input[name='discount']").on("change", function() {
		console.log($(this).val());
		calculate();
	});
	function print_button(modal) {
		$("#"+modal).modal("hide");
		$("input[name='discount']").addClass("d-none");
		$("#p-discount").removeClass("d-none");
		var print_data = $(document).find('#to_print').html();
		if (print_data != "" || !isNaN(print_data))
		{
			var mapForm = document.createElement("form");
			mapForm.target = "Map";
			mapForm.method = "POST"; // or "post" if appropriate
			mapForm.action = "print.php";

			var mapInput = document.createElement("input");
			mapInput.type = "text";
			mapInput.name = "print";
			mapInput.value = print_data;
			mapForm.appendChild(mapInput);

			document.body.appendChild(mapForm);

			map = window.open("", "Map", "status=0,title=0,height=600,width=800,scrollbars=1");

			if (map) {
				mapForm.submit();
				$('form[target="Map"]').remove();
			}
			
			else {
				alert('You must allow popups for this map to work.');
			}
		}
	}
</script>