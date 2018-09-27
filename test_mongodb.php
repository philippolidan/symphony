<?php
include('assets/includes/db_connect.php'); 
$db = new Database;
$symptom_list = [];
$er_id = "5bab24cdb8dde1284800019e";
$symptom_id = '5';
$symp = [];
foreach($db->getSymptomEr($er_id) as $ser){
	foreach($db->getSymptomQuestion((string)$ser->_id,$symptom_id) as $sq){
		foreach($sq->question_list as $q){
			if($q->symptom_id == $symptom_id)
				$symp[] = [$q->question => $sq->answer];
		}
	}
}
echo json_encode($symp);
?>