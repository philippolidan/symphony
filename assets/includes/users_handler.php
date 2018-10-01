<?php

include 'db_connect.php';
$db = new Database;

session_start();
$response = [];

$user_id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_STRING);
$password = hash("sha512", filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

if (isset($_POST['id']) && isset($_POST['password'])) {
	$result = $db->loginUser($user_id, $password);
	if ($result) {
		
		json_encode($result);

		$_SESSION['user_id'] = $result['user_id'];
		$_SESSION['role_id'] = $result['role_id'];
		$_SESSION['id'] = $result['id'];

		if ($result['role_id'] == 5) {
			$p_id = explode("PN-", $result['id']);
			$user_info = $db->getPatientInformation($p_id[1]);

			$_SESSION['patient_oid'] = $user_info['_id'];
			$_SESSION['full_name'] = $user_info['lname'].", ".$user_info['fname'];
		}

		else{

		}

		$_SESSION['full_name'] = $user_info['fname']." ".$user_info['lname'];

		if ($result['role_id'] == 4) {
			header('Location: ../../doctor_dashboard.php');
		}

		if ($result['role_id'] == 5) {
			header('Location: ../../patient_dashboard.php');
		}
		if ($result['role_id'] == 6) {
			header('Location: ../../laboratory_dashboard.php');
		}
		if ($result['role_id'] == 7) {
			header('Location: ../../radiology_dashboard.php');
		}
		if ($result['role_id'] == 8) {
			header('Location: ../../evaluator_dashboard.php');
		}
		if ($result['role_id'] == 9) {
			header('Location: ../../billing_dashboard.php');
		}
		if ($result['role_id'] == 10) {
			header('Location: ../../admission_dashboard.php');
		}
		
	}

	else{
		header('Location: ../../index.php?err=1');
		exit();
	}
}

else{
	header('Location: ../../index.php?err=0');
	exit();
}

?>