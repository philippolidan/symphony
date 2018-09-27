<?php include('assets/parts/header.php'); 
$db = new Database;
$er_id = "5bab3ab0b8dde128480001a9";
$bill = [];
foreach($db->getBill($er_id) as $bill){
	$bill_itemss = [];
	foreach($bill->bill_items as $bill_items){
		$bill_itemss[] =[$bill_items->name,$bill_items->price];
	}
	$bill = [$bill->total,$bill->discount,$bill->subtotal,$bill_itemss];
}

echo json_encode($bill);
?>