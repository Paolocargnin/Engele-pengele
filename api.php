<?php
$data = file_get_contents("php://input");

$objData = json_decode($data);

if ($objData->action == 'register'){
	$users=unserialize(file_get_contents('db.txt'));
	$users[]=array("name"=>$objData->name,"mail"=>$objData->mail));
	print(serialize($users));
	file_put_contents( 'db.txt' , serialize($users) );
	echo "User inserito";
}



if ($objData->action == 'getUser'){
	$users=unserialize(file_get_contents('db.txt'));
	echo json_encode($users);
}

?>