<?php
ini_set('display_errors', '1');
include("dbConn.php");
if(isset($_GET["order"])) {
	$order = explode(",",$_GET["order"]);
	print_r($order);
	for($i=0; $i < count($order);$i++) {
		$sql = "UPDATE toons SET displayorder='" . $i . "' WHERE id=". $order[$i];		
		if($connection->query($sql)){
            echo "successfully updated toon(s)";
        }else{
            echo $connection->error;
        }
	}
}

if(isset($_POST["data"])) {
    $grade = json_decode(stripslashes($_POST["data"]));

	echo "<pre>";
	echo "</pre>";
	foreach ($grade as &$g) {
		//echo "<pre>";
		//print_r($g);
		//echo "</pre>";
		$i = 0;
		foreach($g as $label=>$info){
			echo $label .": ".$info."<br />";
		}
		
		
	}

	/*
	for($i=0; $i < count($grade);$i++) {
		
		$sql = "UPDATE toons SET displayorder='" . $i . "' WHERE id=". $grade[$i];		
		if($connection->query($sql)){
            echo "successfully updated toon(s)";
        }else{
            echo $connection->error;
		}
		
	}
	*/
}
?>