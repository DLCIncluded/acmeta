<?php
include("dbConn.php");
if(isset($_POST['edittoon'])){
    if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['skill']) && isset($_POST['star']) && isset($_POST['ability']) && isset($_POST['bio']) && isset($_POST['builds'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $skill=$_POST['skill'];
        $star=$_POST['star'];
        $ability=$_POST['ability'];
        $bio=addslashes($_POST['bio']);
        $builds=addslashes($_POST['builds']);

        $sql = "UPDATE toons SET name='".$name."', leaderskill='".$skill."', star='".$star."', masterability='".$ability."', bio='".$bio."', builds='".$builds."' WHERE id='".$id."'";
        if($connection->query($sql)){
            echo "successfully updated $name";
            header("location: ../edittoon.php?id=$id");
        }else{
            echo $connection->error;
        }
    }else{
        echo "We're missing data there bud, go back and try again.";
    }
}

?>