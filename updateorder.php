<?php
include("dbConn.php");
if(isset($_GET["order"])) {
	$order  = explode(",",$_GET["order"]);
	for($i=0; $i < count($order);$i++) {
		$sql = "UPDATE toons SET displayorder='" . $i . "' WHERE id=". $order[$i];		
		if($connection->query($sql)){
            echo "successfully updated toon(s)";
        }else{
            echo $connection->error;
        }
	}
}
?>