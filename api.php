<?php
$data = file_get_contents("php://input");

$objData = json_decode($data);

if ($objData->action == 'register'){
	$users=unserialize(file_get_contents('db.txt'));
	// echo $objData->mail;
	// echo $objData->name;
	// print_r($objData);
	$users[]=array("name"=>$objData->name,"mail"=>$objData->mail);
	// print_r($users);
	mail($objData->mail, "Engele Pengele - iscrizione", "Ciao reMediano \n Sei stato iscritto all'Engele Pengele 2014 di reMedia, a breve ti verrà dato il tuo obbiettivo.");
	file_put_contents( 'db.txt' , serialize($users) );

	echo "User inserito";
}

if ($objData->action == 'getUser'){
	$users=unserialize(file_get_contents('db.txt'));
	echo json_encode($users);
}

if ($objData->action == 'sendEngele'){
	print_r($objData->users);
	//random this array $objData->users
	function shuffle_assoc(&$array) {
	    $keys = array_keys($array);

	    shuffle($keys);

	    foreach($keys as $key) {
	        $new[$key] = $array[$key];
	    }

	    return $new;
	}
	shuffle($objData->users);
	echo "_______";
	print_r($objData->users);
	for ($i=0; $i < count($objData->users); $i++) {
		if ($i==0){
			$dest = count($objData->users)-1;
		}else{
			$dest = $i -1;
		}
		$regalatore= $objData->users[$i];
		$ricevitore= $objData->users[$dest];

		mail($regalatore->mail, "Engele Pengele", "Ciao reMediano \n Dovrai fare il regalo a... \n\n\n\n...\n...\n\nUn po' di suspance(suggerito da Giulia) \n\n\n\n" $ricevitore->name);

		echo "Mail inviata a: ". $regalatore->mail."<br>";
	}
}
?>