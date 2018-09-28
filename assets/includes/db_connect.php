<?php
require $_SERVER['DOCUMENT_ROOT'].'/symphony/vendor/autoload.php';
date_default_timezone_set('Asia/Manila');
class Database
{
	function __construct()
	{
		$this->db = ( new MongoDB\Client)->hospital;
	}
	public function getPatientNumber(){
		// $number = count(iterator_to_array($this->db->er_transaction->find()));
		$pn = "PN-00001";
		foreach($this->db->patient->aggregate([['$sort' => ['patient_id' => -1]]]) as $patient){
			$number = $patient->patient_id;
			$pn = "PN-".str_pad($number + 1, 5, 0, STR_PAD_LEFT);
		}
		return $pn;
	}
	public function getMedicines(){
		return $this->db->medicine->find();
		
	}
	public function getPatients(){
		return $this->db->patient->find();
	}
	public function getPatient($patient_oid){
		$patient_oid = new MongoDB\BSON\ObjectId($patient_oid);
		return $this->db->patient->find(["_id" => $patient_oid]);
	}
	public function getPatientLike($val){
		return $this->db->patient->find(["lname" => ['$regex' => new \MongoDB\BSON\Regex($val),'$options' => 'i']]);
	}
	public function getSymptoms(){
		return $this->db->symptom->find();
	}
	public function getSymptomQuestion($symp_er_id,$symptom_id){
		return $this->db->symptom_questions->aggregate(
			[
				['$match' => 
					['symp_er_id' => $symp_er_id]
				],
				['$lookup' =>
					[
						"from" => "question_list",
						"localField"=>"question_oid",
						"foreignField"=>"_id",
						"as" => "question_list"
					]
				]
			]);
	}
	public function getFecalysis($labtest_id){
		return $this->db->fecalysis->find(['labtest_id' => "$labtest_id"]);
	}
	public function getUrinalysis($labtest_id){
		return $this->db->urinalysis->find(['labtest_id' => "$labtest_id"]);
	}
	public function getKUBXray($labtest_id){
		return $this->db->kubxray->find(['labtest_id' => "$labtest_id"]);
	}
	public function getChestXray($labtest_id){
		return $this->db->chestxray->find(['labtest_id' => "$labtest_id"]);
	}
	public function getLungsXray($labtest_id){
		return $this->db->lungsxray->find(['labtest_id' => "$labtest_id"]);
	}
	public function getAbdomenXray($labtest_id){
		return $this->db->abdomenxray->find(['labtest_id' => "$labtest_id"]);
	}
	public function getCBC($labtest_id){
		return $this->db->cbc->find(['labtest_id' => "$labtest_id"]);
	}
	public function getCTScan($labtest_id){
		return $this->db->ctscan->find(['labtest_id' => "$labtest_id"]);
	}
	public function getMRIScan($labtest_id){
		return $this->db->mriscan->find(['labtest_id' => "$labtest_id"]);
	}
	public function getUltrasound($labtest_id){
		return $this->db->ultrasound->find(['labtest_id' => "$labtest_id"]);
	}
	public function getECG($labtest_id){
		return $this->db->ecg->find(['labtest_id' => "$labtest_id"]);
	}
	public function getEvaluation($er_id){
		return $this->db->evaluation->find(['er_id' => "$er_id"]);
	}
	public function getFBSugar($labtest_id){
		return $this->db->fbsugar->find(['labtest_id' => "$labtest_id"]);
	}
	public function getSymptom($id){
		return $this->db->symptom->find(['symptom_id' => "$id"]);
	}
	public function getSymptomEr($er_id){
		return $this->db->symptom_er->find(["er_id" => $er_id]);
	}
	public function getTests(){
		return $this->db->test_list->find();
	}
	public function getTest($id){
		return $this->db->test_list->find(['test_id' => "$id"]);
	}
	public function getPatientTest($er_id){
		return $this->db->lab_test->find(['er_id' => "$er_id"]);
	}
	public function getQuestions($id){
		return $this->db->question_list->find(['symptom_id' => "$id"]);
	}
	public function getQuestionsByOid($oid){
		return $this->db->question_list->distinct("symptom_id",['_id' => new MongoDB\BSON\ObjectId($oid)]);
	}
	public function getBeds(){
		return $this->db->bed_list->find();
	}
	public function getBed($id){
		return $this->db->bed_list->find(['bed_no' => $id]);
	}
	public function getLabTest($id){
		return $this->db->lab_test->find(['_id' => new MongoDB\BSON\ObjectId($id)]);
	}
	public function getBill($er_id){
		return $this->db->bill->find(['er_id' => $er_id]);
	}
	// public function getLabTestByPatient($patient_oid){
	// 	$patient_oid1 = new MongoDB\BSON\ObjectId($patient_oid);
	// 	return $this->db->lab_test->aggregate( 
	// 		[
	// 			[ '$match' => 
	// 				[ "patient_oid" => $patient_oid ]
	// 			],
	// 			['$lookup' =>
	// 				[
	// 					"from" => "test_list",
	// 					"localField" => "test_id",
	// 					"foreignField" => "test_id",
	// 					"as" => "test_list"
	// 				]
	// 			]

	// 		]
	// 	);
	// }
	public function getLabTestByER($er_id){
		return $this->db->lab_test->aggregate( 
			[
				[ '$match' => 
					[ "er_id" => $er_id ]
				],
				['$lookup' =>
					[
						"from" => "test_list",
						"localField" => "test_id",
						"foreignField" => "test_id",
						"as" => "test_list"
					]
				]

			]
		);
	}
	public function getCountPendingLabTestByER($er_id){
		return $this->db->lab_test->count([ '$and' => [['er_id' => $er_id],['status' => 'pending']]]);
	}
	public function getCountPendingByER($er_id){
		return $this->db->lab_test->count([ "er_id" => $er_id ,"status" => "done"]);
	}
	public function getER($er_id){
		return $this->db->er_transaction->find(['_id' => new MongoDB\BSON\ObjectId($er_id)]);
	}
	public function getERById($er_id){
		return $this->db->er_transaction->find(['_id' => new MongoDB\BSON\ObjectId($er_id)]);
	}
	public function getERByIdStatus($er_id,$status){
		return $this->db->er_transaction->find([ '$and' => [['_id' =>new MongoDB\BSON\ObjectId($er_id)],['status' => $status]]]);
		// [['_id' => new MongoDB\BSON\ObjectId($er_id),"status" => $status]]
	}
	public function getERS($status = null){
		if($status == null)
			return $this->db->er_transaction->aggregate(
			[

				['$lookup' =>
					[
						"from" => "patient",
						"localField" => "patient_id",
						"foreignField" => "patient_id",
						"as" => "patient"
					]
				]
			]);
		else{
			if($status == "Discharged"){
				return $this->db->er_transaction->aggregate(
					[
						['$match' =>['status' =>['$in'=>[$status,'Paid']]]],
						['$lookup' =>
						[
							"from" => "patient",
							"localField" => "patient_id",
							"foreignField" => "patient_id",
							"as" => "patient"
						]
					]
				]);
			}
			else{
				return $this->db->er_transaction->aggregate(
					[
						['$match' =>['status' =>$status ]],
						['$lookup' =>
						[
							"from" => "patient",
							"localField" => "patient_id",
							"foreignField" => "patient_id",
							"as" => "patient"
						]
					]
				]);
			}
			
		}
			
	}
	public function getCERS($status){
		if($status == "Discharged"){
			return $this->db->er_transaction->count([ '$or' => [['status' => $status],['status' => 'Paid']]]);
		}
		else{
			return $this->db->er_transaction->count(['status'=>$status]);
		}
		
	}
	// public function getPatientERById($id,$patient_oid){
	// 	return $this->db->er_transaction->aggregate( 
	// 		[
	// 			[ '$match' => 
	// 				[ "_id" => new MongoDB\BSON\ObjectId($id) ]
	// 			],
	// 			['$lookup' =>
	// 				[
	// 					"from" => "patient",
	// 					"pipeline" => [
	// 						[ '$match' => [ "_id" => new MongoDB\BSON\ObjectId($patient_oid) ]]
	// 					],
	// 					"as" => "patient"
	// 				]
	// 			],
	// 			['$lookup' =>
	// 				[
	// 					"from" => "triage",
	// 					"pipeline" => [
	// 						[ '$match' => [ "patient_oid" => $patient_oid ]]
	// 					],
	// 					"as" => "triage"
	// 				]
	// 			],
	// 			['$lookup' =>
	// 				[
	// 					"from" => "lab_test",
	// 					"pipeline" => [
	// 						[ '$match' => [ "er_id" => $id ]]
	// 					],
	// 					"as" => "lab_test"
	// 				]
	// 			]
	// 		]
	// 	);
	// }
	public function getPatientERById($id,$patient_oid){
		return $this->db->er_transaction->aggregate( 
			[
				[ '$match' => 
					[ "_id" => new MongoDB\BSON\ObjectId($id) ]
				],
				['$lookup' =>
					[
						"from" => "patient",
						"pipeline" => [
							[ '$match' => [ "_id" => new MongoDB\BSON\ObjectId($patient_oid) ]]
						],
						"as" => "patient"
					]
				],
				['$lookup' =>
					[
						"from" => "triage",
						"pipeline" => [
							[ '$match' => [ "er_id" => $id ]]
						],
						"as" => "triage"
					]
				]

			]
		);
	}
	public function getCLabTest($type){
		return $this->db->test_list->aggregate( 
			[
				[ '$match' => 
					[ "type" =>  $type ]
				],
				['$lookup' =>
					[
						"from" => "lab_test",
						"localField" => "test_id",
						"foreignField" => "test_id",
						"as" => "lab_test"
					]
				]
			]
		);
	}
	public function getCountLabTest($type){
		$result =  $this->db->test_list->aggregate( 
			[
				[ '$match' => 
					[ "type" =>  $type ]
				],
				['$lookup' =>
					[
						"from" => "lab_test",
						"localField" => "test_id",
						"foreignField" => "test_id",
						"as" => "lab_test"
					]
				]
			]
		);
		$c = 0;
		foreach($result as $res){
			foreach($res->lab_test as $lab){
				$c++;
			}
		}
		return $c;
	}
	public function getPatientER($er_id,$patient_oid){
		$er_id1 = new MongoDB\BSON\ObjectId($er_id);
		return $this->db->er_transaction->aggregate( 
			[
				[ '$match' => 
					[ "_id" => $er_id1 ]
				],
				['$lookup' =>
					[
						"from" => "patient",
						"pipeline" => [
							[ '$match' => [ "_id" =>  new MongoDB\BSON\ObjectId($patient_oid) ]]
						],
						"as" => "patient"
					]
				],

			]
		);
	}
	public function insert_one($data){
		try{
			//get patient id
			$number1 = count(iterator_to_array($this->db->er_transaction->find()));
			$er_no = str_pad($number1 + 1, 5, 0, STR_PAD_LEFT);
			if($data["patient_type"] == "existing"){
				$patient_no = $data['patient_id'];
				$patient_no = explode("PN-",$patient_no);
				$patient_no = $patient_no[1];
				$patient_oid = $data['patient_oid'];
				foreach($this->getPatient($patient_oid) as $patient){
					$patient_id = $patient->patient_id;
				}
			}
			else{
				$number = count(iterator_to_array($this->db->patient->find()));
				$patient_no = $this->getPatientNumber();
				$patient_no1 = explode("PN-",$patient_no);
				$patient_id = $patient_no1[1];

				$salt = hash("sha512", "123456");
				$password = hash("sha512", $salt);
				$created_date = date("Y-m-d H:i:s");

				//insert users
				$user = 
				[
					"id" => $patient_no,
					"password" => $password,
					"salt" => $salt,
					"role_id" => "5",
					"created_date" => $created_date
				];

				$this->db->users->insertOne($user);

				//insert patient
				$patient = 
				[
					"patient_id" => $patient_id, "lname"=> $data['lname'], "fname" => $data['fname'],
					"mname" => $data['mname'], "bdate" => $data['bdate'], "sex" => $data['sex'], 
					"address" => $data['address'],"contact"=>$data['mobile_no'],"HMO_Company_name" => $data['cname'],"HMO_acc_no" =>$data['accnumber'],
					"HMO_card_no" =>$data['cardno']
				];
				$patient_oid = "";
				$result_patient = $this->db->patient->insertOne($patient);
				$patient_oid = (string) $result_patient->getInsertedId();
			}
			//insert to er_transaction
			if(isset($data['bed_no']) && !empty($data['bed_no'])){
				$er_sdetails = array("admisson_date" => date("F d, Y h:i A"),"bed_no" => $data['bed_no']);
				//update bed status;
				$update = $this->db->bed_list->updateOne( ['bed_no' => $data['bed_no']], ['$set' => ['status' => 'Occupied']]);
			}
			else{
				$er_sdetails = [];
			}
			$sts = "";
			if($data['wlt'] == 0){
				$sts = "pending";
			}
			else
				$sts = "For Evaluation";
			$er_details = 
			[
				"er_no" => $er_no,"patient_oid" => $patient_oid,"emergency_code" => $data['emergency_code'], "patient_id" => $patient_id, "assessment_date" => $data['assessment_date'] , "date_created" => date("F d, Y h:i A"), "status" => $sts, "wlt" => $data['wlt']
			];
			$er_details = array_merge($er_details, $er_sdetails);
			$result_er = $this->db->er_transaction->insertOne($er_details);

			$er_id = (string) $result_er->getInsertedId();

			//insert triage
			$triage = 
			[
				"er_id" => $er_id, "blood_pressure" => $data['bpressure'], "breathing" => $data['breathing'],
				"pulse" => $data['pulse'], "temperature" => $data['temperature'], "isallergic" => $data['allergies'], 
				"allergies" => $data['a_name'], "hasmedication" => $data['medication'], "medications" => $data['m_name'],
				"symptom_id" => $data['symptom']
			];
			$result_triage = $this->db->triage->insertOne($triage);
			$question_list = $this->getQuestions($data['symptom']);
			$q_handler = [];
			$symp_handler = [];
			foreach($_POST['selected_symptom'] as $symp){
				$symp_handler[] = $symp;
			}
			$symp = ["er_id" => $er_id, "symptom_ids" => $symp_handler];
			$result_symp = $this->db->symptom_er->insertOne($symp);
			$symp_id = (string) $result_symp->getInsertedId();
			foreach ($question_list as $question) {
				$q_handler[] = array("question_oid"=>$question->_id, "answer"=>$data["$question->_id"], "symp_er_id"=> $symp_id);
			}
			$result_squestion = $this->db->symptom_questions->insertMany($q_handler);
			if($data['wlt'] == 0){// if with labtest
				//insert to laborty  test
				$lab_test = [];
				foreach ($data['test'] as $test) {
					$lab_test[] =  array("test_id"=>$test, "patient_oid"=>$patient_oid,"er_id" => $er_id, "status"=> "pending", "date_completed" => "n/a");
				}
				$result_labtest = $this->db->lab_test->insertMany($lab_test);
				$labtest_ids = $result_labtest->getInsertedIds();
				$count = 0;
				$f = $u = $cxray = $kub = $lxray = $axray =$cbcc = $ct = $mri = $uts = $ecgg = $fbs = [];
				foreach ($labtest_ids as $id) {
					if($data['test'][$count] == 1){//fecalysis
						$f[] =
						[
							"color" => "n/a", "consistency" => "n/a", "pus" => "n/a", "rbc" => "n/a", 
							"others" => "n/a", "interpretation" => "n/a", "date_completed" => "n/a", "status" => "pending", "labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 2){// urinalysis
						$u[] =
						[
							"color" => "n/a", "transparency" => "n/a", "hemoglobin" => "n/a", "hematocrit" => "n/a", 
							"wbc" => "n/a", "rbc" => "n/a", "pus" => "n/a", "platelet_count" => "n/a", "interpretation" => "n/a", "status" => "pending",  "date_completed" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 3){// Kidney, Ureter and Bladder X-ray
						$kub[] =
						[
							"findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 4){//Chest X-ray
						$cxray[] =
						[
							"findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 5){//Lungs X-ray
						$lxray[] =
						[
							"findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 6){//Abdomen X-ray
						$axray[] =
						[
							"indication" =>"n/a","comparison" =>"n/a", "findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 7){//CBC
						$cbcc[] =
						[
							"wbc_count"=>"n/a","rbc_count"=>"n/a","hemoglobin"=>"n/a","hematocrit"=>"n/a",
							"mcv"=>"","mchc"=>"n/a","rdw"=>"n/a","platelets"=>"n/a","neutrophils"=>"n/a",
							"lymphs"=>"n/a","monocytes"=>"n/a","eos"=>"n/a","baso"=>"n/a",
							"immature_granulocytes"=>"n/a","immature_grans"=>"n/a","interpretation"=>"n/a",
							"labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 8){//CT Scan
						$ct[] =
						[
							"indication" =>"n/a","technique" =>"n/a","comparison" =>"n/a", "findings" => "n/a","impression" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 9){//MRI Scan
						$mri[] =
						[
							"indication" =>"n/a","technique" =>"n/a","comparison" =>"n/a", "findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 10){//Ultrasound
						$uts[] =
						[
							"body_parts" =>"n/a","impression" =>"n/a","conclusion" =>"n/a", "findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 11){//Electrocardiogram
						$ecgg[] =
						[
							"impression" =>"n/a","conclusion" =>"n/a", "findings" => "n/a", "interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					else if($data['test'][$count] == 12){//Fasting Blood Sugar
						$fbs[] =
						[
							"result" => "n/a","flag"=>"n/a","impression" => "n/a","interpretation" => "n/a","labtest_id" => (string)$id
						];
					}
					$count++;
				}
				if(count($f) > 0){
					$result_fecalysis = $this->db->fecalysis->insertMany($f);
				}
				if(count($u) > 0){
					$result_urinalysis = $this->db->urinalysis->insertMany($u);
				}
				if(count($kub) > 0){
					$result_kub = $this->db->kubxray->insertMany($kub);
				}
				if(count($cxray) > 0){
					$result_cxray = $this->db->chestxray->insertMany($cxray);
				}
				if(count($cbcc) > 0){
					$result_cbc = $this->db->cbc->insertMany($cbcc);
				}
				if(count($lxray) > 0){
					$result_lxray = $this->db->lungsxray->insertMany($lxray);
				}
				if(count($axray) > 0){
					$result_axray = $this->db->abdomenxray->insertMany($axray);
				}
				if(count($ct) > 0){
					$result_cscan = $this->db->ctscan->insertMany($ct);
				}
				if(count($mri) > 0){
					$result_mri = $this->db->mri->insertMany($mri);
				}
				if(count($uts) > 0){
					$result_usound = $this->db->ultrasound->insertMany($uts);
				}
				if(count($ecgg) > 0){
					$result_ecg = $this->db->ecg->insertMany($ecgg);
				}
				if(count($fbs) > 0){
					$result_fsugar = $this->db->fbsugar->insertMany($fbs);
				}
			}
			return array(true,$patient_oid,$er_id);
		}
		catch(Exception $e){
			return "Error: ".$e->getMessage();
		}
	}
	public function insert_two($data){//updating test
		$c = count($data)-1;
		$date_completed = date("m/d/Y H:i:s");
		$patient_oid ='';
		$er_id = '';
		foreach ($this->getLabTest($data[$c - 1]) as $info) {
			$patient_oid = $info->patient_oid;
			$er_id = $info->er_id;
		}
		if($data[$c] == "Fecalysis" || $data[$c] == 1){ //fecalysis
			$update = $this->db->fecalysis->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['color' => $data[0], 'consistency' => $data[1],'pus' => $data[2],
					'rbc' => $data[3],'others' => $data[4],'interpretation' => $data[5],
					'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Fecalysis Result \nColor:".$data[0]."\nConsistency:".$data[1]."\nPus:".$data[2]."\nRed Blood Cell:".$data[3]."\nOthers:".$data[4]."\nInterpretation:".$data[5];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Urinalysis" || $data[$c] == 2){ //urinalysis
			$update = $this->db->urinalysis->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['color' => $data[0], 'transparency' => $data[1],'hemoglobin' => $data[2],
					'hematocrit' => $data[3],'wbc' => $data[4],'rbc' => $data[5],'pus' => $data[6],'platelet_count' => $data[7],'interpretation' => $data[8],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Urinalysis Result \nColor:".$data[0]."\nTransparency:".$data[1]."\nHemoglobin:".$data[2]."\nHematocrit:".$data[3]."\nWhite Blood Cell:".$data[4]."\nRed Blood Cell:".$data[5]."\nPlatelet Count:".$data[7]."\nPus:".$data[6]."\nInterpretation:".$data[8];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Kidney, Ureter and Bladder X-ray" || $data[$c] == 3){ //urinalysis

			$update = $this->db->kubxray->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['findings' => $data[0],'interpretation' => $data[1],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Kidney, Ureter and Bladder X-ray Result \nFindings:".$data[0]."\nInterpretation:".$data[1];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Chest X-ray" || $data[$c] == 4){ //Chest X-ray
			$update = $this->db->chestxray->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['findings' => $data[0],'interpretation' => $data[1],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Chest X-ray Result \nFindings:".$data[0]."\nInterpretation:".$data[1];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Lungs X-ray" || $data[$c] == 5){ //Lungs X-ray
			$update = $this->db->lungsxray->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					[ 'findings' => $data[0],'interpretation' => $data[1],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Lungs X-ray Result \nFindings:".$data[0]."\nInterpretation:".$data[1];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Abdomen X-ray" || $data[$c] == 6){ //Abdomen X-ray
			$update = $this->db->abdomenxray->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					[ 'indication' => $data[0],'comparison' => $data[1],"findings" =>$data[2],'interpretation' => $data[3],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Abdomen X-ray Result \nIndication:".$data[0]."\nComparison:".$data[1]."\nFindings:".$data[2]."\nInterpretation:".$data[3];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Complete Blood Count (CBC)" || $data[$c] == 7){ //CBC
			
			$update = $this->db->cbc->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					[
						"wbc_count" => $data[0], "rbc_count" => $data[1], "hemoglobin" => $data[2], 
						"hematocrit" => $data[3], "mcv" => $data[4], "mchc"=> $data[5], "rdw" => $data[6],
						"platelets" => $data[7], "neutrophils"=> $data[8], "lymphs" => $data[9], 
						"monocytes" => $data[10],"eos" => $data[11], "baso" => $data[12],
						"immature_granulocytes" => $data[13], "immature_grans" => $data[14], 
						"interpretation" => $data[15],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Complete Blood Count (CBC) Result \nWhite Blood Cell Count:".$data[0]."\nRed Blood Cell Count:".$data[1]."\nHemoglobin:".$data[2]."\nHematocrit:".$data[3]."\nMCV:".$data[4]."\nMCHC:".$data[5]."\nRDW:".$data[6]."\nPlatelets:".$data[7]."\nNeutrophils:".$data[8]."\nLymphs:".$data[9]."\nMonocytes:".$data[10]."\nEOS:".$data[11]."\nBASO:".$data[12]."\nImmature Granulocytes:".$data[13]."\nImmature Grans:".$data[14]."\nInterpretation:".$data[15];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Computed Tomography Scan (CT Scan)" || $data[$c] == 8){ //CT Scan
			$update = $this->db->ctscan->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['indication' => $data[0],'technique' => $data[1],"comparison" =>$data[2],'findings' => $data[3],"impression" => $data[4],"interpretation" => $data[5],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Computed Tomography Scan (CT Scan) Result \nIndication:".$data[0]."\nComparison:".$data[2]."\nTechnique:".$data[1]."\nFindings:".$data[3]."\nImpression:".$data[4]."\nInterpretation:".$data[5];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Magnetic Resonance Imaging Scan (MRI Scan)" || $data[$c] == 9){ //MRI Scan
			$update = $this->db->mriscan->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['indication' => $data[0],'technique' => $data[1],"comparison" =>$data[2],'findings' => $data[3],"interpretation" => $data[4],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Magnetic Resonance Imaging Scan (MRI Scan) Result \nIndication:".$data[0]."\nComparison:".$data[2]."\nTechnique:".$data[1]."\nFindings:".$data[3]."\nInterpretation:".$data[4];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Sonography (Ultrasound)" || $data[$c] == 10){ //ultrasound
			$update = $this->db->ultrasound->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['body_parts' => $data[0],'impression' => $data[1],"conclusion" =>$data[2],'findings' => $data[3],"interpretation" => $data[4],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Sonography (Ultrasound) Result \nBody Parts:".$data[0]."\nFinding:".$data[3]."\nConclusion:".$data[2]."\nImpression:".$data[1]."\nInterpretation:". $data[4];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Electrocardiogram (ECG)" || $data[$c] == 11){ //Electrocardiogram
			$update = $this->db->ecg->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['impression' => $data[0],'conclusion' => $data[1],'findings' => $data[2],"interpretation" => $data[3],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Electrocardiogram (ECG) Result \nFinding:".$data[2]."\nConclusion:".$data[1]."\nImpression:". $data[0]."\nInterpretation:".$data[3];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		else if($data[$c] == "Fasting Blood Sugar (FBS Test / Glucose Test)" || $data[$c] == 12){ //Fasting Blood Sugar
			$update = $this->db->fbsugar->updateOne( 
				['labtest_id' => $data[$c - 1]], 
				['$set' => 
					['result' => $data[0], 'flag' => $data[1],'impression' => $data[2],'interpretation' => $data[3],'status' => 'Done','date_completed' => $date_completed]
				]	
			);
			$msgg = "Fasting Blood Sugar (FBS Test / Glucose Test) Result \nResult:".$data[0]."\nFlag:".$data[1]."\nImpression:".$data[2]."\nInterpretation:".$data[3];
			$update = $this->db->lab_test->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId ($data[$c - 1])], 
				['$set' => 
					['status' => "Done",'date_completed' => $date_completed]
				]
			);
		}
		$cc = $this->getCountPendingLabTestByER($er_id);
		if($cc == 0){
			$update = $this->db->er_transaction->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId($er_id)], 
				['$set' => 
					['status' => "For Evaluation"]
				]
			);
		}
		// if($cc == 1){ // all is done
		// 	
		return array(true,$patient_oid,$msgg);
	}
	public function bill($data){
		$date_completed = date("m/d/Y H:i:s");
		$msg = [];
		$tt = [];
		foreach($this->getER($data['er_id']) as $er){
			$update = $this->db->er_transaction->updateOne( 
				['_id' => new MongoDB\BSON\ObjectId($data['er_id'])], 
				['$set' => 
					['status' => "Paid",'date_completed' => $date_completed]
				]
			);
			$update = $this->db->bed_list->updateOne( 
				['bed_no' => $er->bed_no], 
				['$set' => 
					['status' => "Vacant"]
				]
			);
			$lab_test =$this->getLabTestByER((string)$er->_id);
			$bill_items = [];
			$bill_items[] = ["name"=>"Physician's Fee", "price" => "1000"];
			foreach ($lab_test as $lab) {
				foreach($lab->test_list as $test){
					$bill_items[] =["name"=>$test->name, "price" => $test->price];
				}
			}
			$bill = 
			[
				"er_id" => (string)$er->_id, "subtotal" => $data['subtotal'],
				"discount" => $data['discount'], "total" => $data['total'],
				"date" => $date_completed,"bill_items" => $bill_items
			];
			$result_bill = $this->db->bill->insertOne($bill);
			// $bill_id = (string) $result_bill->getInsertedId();
			// $lab_test =$this->getLabTestByER((string)$er->_id);
			// $bill_items = [];
			// $bill_items[] = ["bill_id" => $bill_id, "name"=>"Physician's Fee", "price" => "1000"];
			// foreach ($lab_test as $lab) {
			// 	foreach($lab->test_list as $test){
			// 		$bill_items[] =["bill_id" => $bill_id, "name"=>$test->name, "price" => $test->price];
			// 	}
			// }
			//$result_bill = $this->db->bill_items->insertMany($bill_items);
		}
		return true;
	}
	public function loginUser($id, $password){
		$result = $this->db->users->findOne(["id" => $id, "salt" => $password]);
		return $result;
	}
	public function loginUserById($user_id){
		$result = $this->db->users->findOne(["id" => $user_id]);
		return $result;
	}
	public function evaluation($data){
		$date_completed = date("m/d/Y H:i:s");
		$prescription=[];
		$pres = json_decode(stripslashes($data['prescription']));
		$c = count($pres);
		for($i = 0; $i<$c; $i++){
			$prescription[] = ["medicine_name" =>$pres[$i][0],"dosage" => $pres[$i][1], "frequency" => $pres[$i][2]];
		}
		$evaluation = 
		[
			"er_id" => $data['er_id'], "dietary_plan" => $data['plan'],"status" =>$data['status'],"evaluation_items" => $prescription
		];

		$result_evaluation = $this->db->evaluation->insertOne($evaluation);
		$update = $this->db->er_transaction->updateOne( 
			['_id' => new MongoDB\BSON\ObjectId($data['er_id'])], 
			['$set' => 
			['status' => "Discharged",'date_completed' => $date_completed]
		]);
		return true;
	}

	public function getERTransaction($patient_id){
		return $this->db->er_transaction->find(["patient_id" => $patient_id]);
	}

	public function getPatientInformation($patient_id){
		return $this->db->patient->findOne(["patient_id" => $patient_id]);
	}

	public function getERTransactionDetails($er_no){
		return $this->db->er_transaction->find(["er_no" => $er_no]);
	}

	public function getPatientOID($patient_id){
		return $this->db->patient->findOne([ "user_id" => $patient_id ]);
	}
}
?>