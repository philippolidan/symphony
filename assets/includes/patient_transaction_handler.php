<?php

include 'db_connect.php';
$db = new Database();

session_start();
$response = [];
$id = $_POST['id'];

if ($id == 1) {

	$patient_id = $_POST['patient_id'];
	$result = $db->getERTransaction($patient_id);

	if ($result) {

		foreach ($result as $er_transactions) {
			$transaction[] = array(
				(string)$er_transactions->_id,
				$er_transactions->er_no,
				"ER-".$er_transactions->er_no,
				$er_transactions->date_created,
				$er_transactions->status
			);
		}

		$response[0] = "1";
		$response[1] = $transaction;
	}

	else{
		$response[0] = "0";
		$response[1] = "";
	}

}

echo json_encode($response);
?>