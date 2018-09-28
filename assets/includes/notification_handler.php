<?php
include 'db_connect.php';
$db = new Database;
if(isset($_POST['id'])){
	$id = $_POST['id'];
	if($id == 1){
		if($db->getNotification($_POST['role_id'])){
			$arr = [];
			foreach($db->getNotification($_POST['role_id']) as $notif){
				$arr[] = [$notif->title,$notif->body];
				$db->deleteNotification((string)$notif->_id);
			}
			echo json_encode($arr);
		}
		else{
			echo false;
		}
	}
}
?>