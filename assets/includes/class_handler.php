<?php
include 'db_connect.php';
include 'SMSHandler.php';
$sms = new SMSHandler;
$db = new Database;
if(isset($_POST['id'])){
	$id = $_POST['id'];
	if($id == 1){ // question list
		if(isset($_POST['symptom_id'])){
			$symptom_id = $_POST['symptom_id'];
			$title ='';
			foreach ($db->getSymptom($symptom_id) as $symptom) {
				$title = $symptom->name;
			}
			$response ="<div id='$symptom_id' class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
			$response .= "<div class='d-flex'><div><h6>$title</h6></div><div class='ml-auto'><a onclick='remove_symptom($symptom_id)' style='cursor: pointer;' class='fa fa-times text-danger'></a></div></div><hr>";
			$response .= "";
			foreach ($db->getQuestions($symptom_id) as $question) {
				$response.="<div class='form-group'>";
				$type = $question->type;
				if($type =='rate'){
					$response.="<div class='d-flex'>";
					$response.="<div><label>$question->question</label></div>";
					$response.="<div class='ml-auto'><span id='$question->_id' class='text-warning' style='font-size: 15px;'>1</span></div>";
					$response.="</div>";
					$response.="<input type='range' class='slider to-d' name='$question->_id' onchange='rateChange(\"$question->_id\",this.value)' style='width: 100%' min='1' max='10' value='1'>";
					$response.="<div class='d-flex'><div>1</div><div class='ml-auto'>10</div></div>";
				}
				else if($type =='text'){
					$response.="<label>$question->question</label>";
					$response.="<textarea name='$question->_id' class='form-control to-v'></textarea>";
				}
				else if($type =='y/n'){
					$response.="<label>$question->question</label>";
					$response.="<div class='row'>";
					$response.="<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>";
					$response.="<div class='form-check'>";
					$response.="<input class='form-check-input to-d' type='radio' name='".$question->_id."' id='".$question->_id."' value='yes'>";
					$response.="<label class='form-check-label' for='".$question->_id."_y'>Yes</label>";
					$response.="</div>";
					$response.="</div>";
					$response.="<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'>";
					$response.="<div class='form-check'>";
					$response.="<input class='form-check-input to-d' type='radio' name='".$question->_id."' id='".$question->_id."' value='no' checked>";
					$response.="<label class='form-check-label' for='".$question->_id."_n'>No</label>";
					$response.="</div>";
					$response.="</div>";
					$response.="</div>";
				}
				else if($type == "dropdown"){
					$response.="<label>$question->question</label>";
					$response.="<select class='form-control to-d' name='".$question->_id."' id='".$question->_id."'>";
					foreach($question->data as $data){
						$response.="<option value='".$data."'>".$data."</option>";
					}
					$response.="</select>";
				}
				$response.="</div>";
			}
			$response.="</div>";
			echo json_encode(array($response,$_POST['symptom_id']),JSON_UNESCAPED_SLASHES);
		}
	}
	else if($id == 2){ // get test
		if(isset($_POST['test_id'])){
			$test_id = $_POST['test_id'];
			foreach ($db->getTest($test_id) as $test) {
				$name = $test->name;
				$description = $test->description;

			}
			echo json_encode(array($name,$description));
		}
	}
	else if($id == 3){ // get bed
		$response=[];
		foreach ($db->getBeds() as $bed) {
			$response[]=array($bed->bed_no,$bed->ward_no,$bed->floor,$bed->status);
		}
		echo json_encode($response);
	}
	else if($id == 4){ //part 1 submit
		echo json_encode($db->insert_one($_POST));
	}
	else if($id == 5){ //get lab_test with status
		$response=[];
		$test_id1 = (string) $_POST['test_id'];
		foreach ($db->getPatientTest($test_id1) as $test) {
			foreach ($db->getTest($test->test_id) as $test1) {
				$t_id =  (string) $test->_id;
				$response[]=array($t_id,$test1->name,$test->date_completed,$test->status,$test1->name,$test->test_id);
			}
		}
		echo json_encode($response);
	}
	else if($id == 6){ // get lab test
		$type = $_POST['type'];
		$labtest_id = (string)$_POST['test_id'];
		$p_info = [];
		//check if Done
		if(isset($_POST['checker']))
			$checker = $_POST['checker'];
		else{
			foreach($db->getLabTest($labtest_id) as $lab){
				if($lab->status =='Done'){
					$checker = 1;
				}
				else 
					$checker = 0;
				foreach($db->getPatient($lab->patient_oid) as $patient){
					$p_info[] = array(ucfirst($patient->lname).", ".ucfirst($patient->fname)." ".ucfirst($patient->mname),date("F, d Y",strtotime($patient->bdate)));
				}
			}
		}
		$response=[];
		
		if($type == "Fecalysis" || $type == 1){//fecalysis
			if($checker == 1){
				foreach ( $db->getFecalysis($labtest_id) as $fec) {
					$response =
					[
						"Color", $fec->color,
						"Consistency" ,$fec->consistency,
						"Pus" ,$fec->pus,
						"Red Blood Cell" , $fec->rbc,
						"Others" , $fec->others,
						"interpretation", $fec->interpretation
					];
				}
			}
			else{
				$response = ["Color","Consistency","Pus","Red Blood Cell","Others"];
			}
		}
		else if($type == "Urinalysis" || $type == 2){//urinalysis
			if($checker == 1){
				foreach ( $db->getUrinalysis($labtest_id) as $uri) {
					$response =
					[
						"Color" , $uri->color,
						"Transparency" ,$uri->transparency,
						"Hemoglobin" , $uri->hemoglobin,
						"Hematocrit" , $uri->hematocrit,
						"White Blood Cell" , $uri->wbc,
						"Red Blood Cell" , $uri->rbc,
						"Pus", $uri->pus,
						"Platelet Count" , $uri->platelet_count,
						"interpretation", $uri->interpretation
					];
				}
			}
			else
				$response = ["Color","Transparency","Hemoglobin","Hematocrit","White Blood Cell","Red Blood Cell","Platelet Count","Pus"];
		}
		else if($type == "Kidney, Ureter and Bladder X-ray" || $type == 3){//urinalysis
			if($checker == 1){
				foreach ( $db->getKUBXray($labtest_id) as $res) {
					$response =
					[
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Findings"];
		}
		else if($type == "Chest X-ray" || $type == 4){//urinalysis
			if($checker == 1){
				foreach ( $db->getChestXray($labtest_id) as $res) {
					$response =
					[
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Findings"];
		}
		else if($type == "Lungs X-ray" || $type == 5){//urinalysis
			if($checker == 1){
				foreach ( $db->getLungsXray($labtest_id) as $res) {
					$response =
					[
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Findings"];
		}
		else if($type == "Abdomen X-ray" || $type == 6){//urinalysis
			if($checker == 1){
				foreach ( $db->getAbdomenXray($labtest_id) as $res) {
					$response =
					[
						"Indication" , $res->indication,
						"Comparison" , $res->comparison,
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Indication","Comparison","Findings"];
		}
		else if($type == "Complete Blood Count (CBC)" || $type == 7){//Complete Blood Count (CBC)
			if($checker == 1){
				foreach ( $db->getCBC($labtest_id) as $res) {
					$response =
					[
						"White Blood Cell" , $res->wbc_count,
						"Red Blood Cell" , $res->rbc_count,
						"Hemoglobin" , $res->hemoglobin,
						"Hematocrit" ,$res->hematocrit,
						"MCV" ,$res->mcv,
						"MCHC" ,$res->mchc,
						"RDW" ,$res->rdw,
						"Platelets" ,$res->platelets,
						"Neutrophils" ,$res->neutrophils,
						"Lymphs" ,$res->lymphs,
						"Monocytes" ,$res->monocytes,
						"EOS" ,$res->eos,
						"BASO" ,$res->baso,
						"Immature Granulocytes" ,$res->immature_granulocytes,
						"Immature Grans" ,$res->immature_grans,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["White Blood Cell","Red Blood Cell","Hemoglobin","Hematocrit","MCV","MCHC","RDW","Platelets","Neutrophils","Lymphs","Monocytes","EOS","BASO","Immature Granulocytes","Immature Grans"];
		}
		else if($type == "Computed Tomography Scan (CT Scan)" || $type == 8){//urinalysis
			if($checker == 1){
				foreach ( $db->getCTScan($labtest_id) as $res) {
					$response =
					[
						"Indication" , $res->indication,
						"Comparison" , $res->comparison,
						"Technique" , $res->technique,
						"Findings" ,$res->findings,
						"Impression" , $res->impression,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Indication","Comparison","Technique","Impression","Findings"];
		}
		else if($type == "Magnetic Resonance Imaging Scan (MRI Scan)" || $type == 9){//urinalysis
			if($checker == 1){
				foreach ( $db->getMRIScan($labtest_id) as $res) {
					$response =
					[
						"Indication" , $res->indication,
						"Comparison" , $res->comparison,
						"Technique" , $res->technique,
						"Impression" , $res->impression,
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Indication","Comparison","Technique","Impression","Findings"];
		}
		else if($type == "Sonography (Ultrasound)" || $type == 10){//urinalysis
			if($checker == 1){
				foreach ( $db->getUltrasound($labtest_id) as $res) {
					$response =
					[
						"Body Parts" , $res->body_parts,
						"Impression" , $res->impression,
						"Conclusion" , $res->conclusion,
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Body Parts","Impression","Conclusion","Findings"];
		}
		else if($type == "Electrocardiogram (ECG)" || $type == 11){//urinalysis
			if($checker == 1){
				foreach ( $db->getECG($labtest_id) as $res) {
					$response =
					[
						"Impression" , $res->impression,
						"Conclusion" , $res->conclusion,
						"Findings" ,$res->findings,
						"interpretation" , $res->interpretation
					];
				}
			}
			else
				$response = ["Impression","Conclusion","Findings"];
		}
		else if($type == "Fasting Blood Sugar (FBS Test / Glucose Test)" || $type == 12){//urinalysis
			if($checker == 1){
				foreach ( $db->getFBSugar($labtest_id) as $res) {
					$response =
					[
						"Result" , $res->result,
						"Flag" , $res->flag,
						"Impression" , $res->impression,
					];
				}
			}
			else
				$response = ["Result","Flag","Impression"];
		}
		echo json_encode(array($checker,$response,$p_info));
	}
	else if($id == 7){ // insert two
		$result = $db->insert_two($_POST['test_value']);
		if($result[0]){
			foreach($db->getPatient($result[1]) as $patient){
				$patient_contact = $patient->contact;
			}
			$status ="";
			$status= $sms->sendSMS_orderSuccessful($patient_contact,$result[2]);
			
		}
		echo json_encode(array(true,$result[1],$status));
	}
	else if($id == 8){// get er + patient info for billing

		$lab_test1 = [];
		foreach($db->getPatientER($_POST['er_id'],$_POST['patient_oid']) as $er){
			$assessment_date = $er->assessment_date;
			$admission_date = "";
			$discharge_date = date("F d, Y h:i A");
			$bed_no = "";
			$ward_no = "";
			if(isset($er->admission_date) && isset($er->bed_no) && isset($er->ward_no)){
				$admission_date = $er->admission_date;
				$bed_no = $er->bed_no;
				$ward_no = $er->ward_no;
			}
			$emergency_code = $er->emergency_code;
			if($er->wlt == 0){
				foreach($db->getLabTestByER($_POST['er_id']) as $lab_test){
					foreach ($lab_test->test_list as $lab) {
						$lab_test1[] = [$lab->name,$lab->price];
					}

				}
			}
			foreach($er->patient as $patient){
				$patient_name = $patient->lname.", ".$patient->fname." ".$patient->mname;
				$patient_address = $patient->address;
			}
			echo json_encode(array($patient_name,$patient_address,$assessment_date,$admission_date,$discharge_date,$bed_no,$ward_no,$emergency_code,$lab_test1));
		}
	}
	else if($id == 9){// insert bill
		$result = $db->bill($_POST);
		if($result[0]){
			// $c =count($result[2]);
			// $status ="";
			// for($i = 0; $i<$c;$i++){
			// 	$status= $sms->sendSMS_orderSuccessful($result[1],$result[2][$i]);
			// }
			echo true;
		}
	}
	else if($id == 10){
		foreach($db->getPatientERById($_POST['er_id'],$_POST['patient_oid']) as $er){
			$name = "";
			$address = "";
			$p_id = $er->patient_id;
			$a_date = $er->assessment_date;
			$bp = "";
			$breathing = "";
			$pulse = "";
			$temp = "";
			$isallergic = "";
			$allergies = "";
			$hasmedication = "";
			$medications = "";
			$sex = "";
			$test = [];
			$sympt = [];
			$e_id = $er->er_no;
			foreach($er->patient as $patient){
				$name = $patient->lname.", ".$patient->fname." ".$patient->mname;
				$address = $patient->address;
				if($patient->sex == "male"){
					$sex ="boy";
				}
				else
					$sex="girl";

			}
			foreach($er->triage as $triage){
				$bp = $triage->blood_pressure;
				$breathing = $triage->breathing;
				$pulse = $triage->pulse;
				$temp = $triage->temperature;
				$isallergic = $triage->isallergic;
				$allergies = $triage->allergies;
				$hasmedication = $triage->hasmedication;
				$medications = $triage->medications;
			}
	//get labtests
			if(!isset($_POST['status'])){
				foreach($db->getLabTestByER($_POST['er_id']) as $lab_test){
					$vtest= "<div class='row border-bottom mt-1 mb-1'>";
					foreach($db->getTest($lab_test->test_id) as $ltest){
						$vtest.="<div class='col-lg-4'><h6 class='small'>".$ltest->name."</h6></div>";
					}
					$vtest.="<div class='col-lg-4'>
					<h6 class='small font-weight-bold'>".$lab_test->status."</h6>
					</div>
					<div class='col-lg-4'>
					<a href='#' onclick='view_test(\"".$lab_test->_id."\",\"".$ltest->name."\")' class='text-info font-weight-bold float-right'>View</a>
					</div></div>";
					$test[] = $vtest;
				}
				foreach($db->getSymptomEr($_POST['er_id']) as $squestion){
					$s = "";
					foreach($squestion->symptom_ids as $id){
						$s .= "<div class='d-flex border-bottom mt-1 mb-1'>";
						$n = "";
						foreach($db->getSymptom($id) as $symp){
							$s.="<div><h6 class='small'>".$symp->name."</h6></div>";
							$n = $symp->name;
						}
						$s.="<div class='ml-auto'><a href='#' onclick='view_symptom(\"".$id."\",\"".$_POST['er_id']."\",\"".$n."\")' class='text-info font-weight-bold'>View</a>
						</div></div>";
						$sympt[] = $s;
					}
				}
			}
			else{
				$vtest = "";
				foreach($db->getLabTestByER($_POST['er_id']) as $lab_test){
					foreach($db->getTest($lab_test->test_id) as $ltest){
						$vtest.="<li class='list-group-item d-flex justify-content-between lh-condensed'>
								<div>
									<small class='text-muted'>".$ltest->name."</small>
								</div>
								<span class='text-muted small text-info font-weight-bold view-symptoms' style='cursor:pointer;' onclick='view_test(\"".$lab_test->_id."\",\"".$ltest->name."\")'>View</span></li>";
					}
					$test[] = $vtest;
				}
				foreach($db->getSymptomEr($_POST['er_id']) as $squestion){
					$s = "";
					foreach($squestion->symptom_ids as $id){
						foreach($db->getSymptom($id) as $symp){
							$s.="<li class='list-group-item d-flex justify-content-between lh-condensed'>
								<div>
									<small class='text-muted'>".$symp->name."</small>
								</div>
								<a class='text-muted small text-info font-weight-bold view-symptoms' style='cursor:pointer;' onclick='view_symptom(\"".$id."\",\"".$_POST['er_id']."\",\"".$symp->name."\")'>View</span></li>";
							$n = $symp->name;
						}
						$sympt[] = $s;
					}
				}
			}
			
		}
		echo json_encode(array($name,$p_id,$a_date,$bp,$breathing,$pulse,$temp,ucfirst($isallergic),$allergies,ucfirst($hasmedication),$medications,$sex,$test,$sympt,$_POST['er_id']));
	}
	else if($id == 11){
		foreach($db->getPatient($_POST['patient_oid']) as $patient){
			$lname = $patient->lname;
			$mname = $patient->mname;
			$fname = $patient->fname;
			$address = $patient->address;
			$bdate = $patient->bdate;
			$contact = $patient->contact;
			$hmo_cname = $patient->HMO_Company_name;
			$hmo_accno = $patient->HMO_acc_no;
			$hmo_cardno = $patient->HMO_card_no;
			$sex = $patient->sex;
			$patient_id = "PN-".$patient->patient_id;
			echo json_encode(array($lname,$mname,$fname,$address,$sex,$patient_id,$bdate,$contact,$hmo_cname,$hmo_accno,$hmo_cardno));
		}
	}
	else if($id == 12){
		$pat = [];
		foreach($db->getPatientLike($_POST['val']) as $patient){
			$patient_oid = (string)$patient->_id;
			$lname = $patient->lname;
			$mname = $patient->mname;
			$fname = $patient->fname;
			$pat [] = array($lname.", ".$fname." ".$mname,$lname,$patient_oid);
		}
		echo json_encode($pat);
	}
	else if($id == 13){
		$status = 0;
		$count = $db->getCountPendingByER($_POST['er_id']);
		if($count > $_POST['done_count'])
			$status = $_POST['done_count'];
		echo $status;
	}
	else if($id == 14){
		$status = 0;
		$count = $db->getCountLabTest($_POST['type']);
		if($count != $_POST['tcount'])
			$status = true;
		else
			$status = $_POST['tcount'];
		echo $status;
	}
	else if($id == 15){
		$arr1 = [];
		foreach($db->getCLabTest($_POST['type']) as $res){
			$arr = [];
			foreach($res->lab_test as $labtest){
				foreach($db->getERById($labtest->er_id) as $er){
					$arr[0] = "ER-".$er->er_no;
					foreach($db->getPatient($er->patient_oid) as $patient){
						$arr[1] = ucfirst($patient->lname).", ".ucfirst($patient->fname)." ".ucfirst($patient->mname);
						$arr[2] = date("F, d Y",strtotime($patient->bdate));
					}
				}
				$arr[3] = $res->name;
				
				$arr[4] = $labtest->status;
				$arr[5] = (string)$labtest->_id;
				$arr[6] = $labtest->er_id;
				$arr[7] = "PN-".$er->patient_id;
				$arr1[] = $arr;
			}
			
		}
		echo json_encode($arr1);
	}
	else if($id == 16){
		$symptom_id = $_POST['symptom_id'];
		$er_id = $_POST['er_id'];
		$symp = [];
		foreach($db->getSymptomEr($er_id) as $ser){
			foreach($db->getSymptomQuestion((string)$ser->_id,$symptom_id) as $sq){
				foreach($sq->question_list as $q){
					if($q->symptom_id == $symptom_id)
						$symp[] = [$q->question ,$sq->answer];
				}
			}
		}
		echo json_encode($symp);
	}
	else if($id == 17){
		$status = 0;
		$count = $db->getCERS($_POST['status']);
		if($count != $_POST['tcount'])
			$status = true;
		else
			$status = $_POST['tcount'];
		echo $status;
	}
	else if($id == 18){
		$arr1 = [];
		foreach($db->getERS($_POST['status']) as $res){
			$arr = [];
			foreach($res->patient as $patient){
				$arr[0] = "ER-".$res->er_no;
				$arr[1] = ucfirst($patient->lname).", ".ucfirst($patient->fname)." ".ucfirst($patient->mname);
				$arr[2] = date("F, d Y",strtotime($patient->bdate));
				$arr[3] = $res->status;
				$arr[4] = (string)$res->_id;
				$arr[5] = (string)$patient->_id;
				$arr[6] = "PN-".$patient->patient_id;
				$arr1[] = $arr;
			}
			
		}
		echo json_encode($arr1);
	}
	else if($id == 19){
		echo $db->evaluation($_POST);
	}
}

?>

