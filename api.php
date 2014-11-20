<?php
$data = file_get_contents("php://input");

$objData = json_decode($data);

if ($objData->action == 'register'){
	$users=unserialize(file_get_contents('db.txt'));
	// echo $objData->mail;
	// echo $objData->name;
	// print_r($objData);
	$users[]=array("name"=>$objData->name,"mail"=>$objData->mail);
	file_put_contents( 'db.txt' , serialize($users) );

	echo "User inserito";
}

if ($objData->action == 'getUser'){
	$users=unserialize(file_get_contents('db.txt'));
	echo json_encode($users);
}

if ($objData->action == 'sendEngele'){
	for ($i=0; $i < length($objData->users)-1; $i++) {
		if ($i){}
		$regalatore= $objData->users[$i];
		$ricevitore= $objData->users[$i-1]
	}
}
?>