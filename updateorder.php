<?php
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

if(isset($_GET["grade"])) {
	$grade = explode(",",$_GET["grade"]);
	print_r($grade);
	for($i=0; $i < count($grade);$i++) {
		/*
		$sql = "UPDATE toons SET displayorder='" . $i . "' WHERE id=". $grade[$i];		
		if($connection->query($sql)){
            echo "successfully updated toon(s)";
        }else{
            echo $connection->error;
		}
		*/
	}
}
?>