<?php include('assets/parts/header.php'); 
$db = new Database;
$er_id = "5bab3ab0b8dde128480001a9";
$bill = [];

foreach($db->loginUser('PN-00001', hash("sha512", "123456")) as $er){
	var_dump($er);
}

?>