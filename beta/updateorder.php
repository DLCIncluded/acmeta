<?php
ini_set('display_errors', '1');
include("includes/dbConn.php");
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

	//print_r($_POST["data"]);
	//print_r($grade);
	foreach ($grade as &$value) {
		//$test = json_encode($value);
		print_r($value);
		$id = $value->id;
		$grd = $value->grade;
		//echo $test1 ." : ". $test2;
		echo "<br> <br>";

		$sql = "UPDATE toons SET grade='" . $grd . "' WHERE id='". $id."'";		
		if($connection->query($sql)){
            echo "successfully updated $id to $grd <br>";
        }else{
            echo $connection->error;
		}
	}
	/*
	foreach ($your_object->DataFormItem->Values->fv as $fv_element) {
		echo $fv_element->Value." ".$fv_element->ID."<br>";
	}

	echo "</pre>";
	
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