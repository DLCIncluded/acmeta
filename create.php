<?php
    include("utils.php");
    if(isset($_POST['newskill'])){
        $name=$_POST['name'];
        $info=$_POST['info'];

        $sql="INSERT INTO skills (id, name, info) VALUES (NULL, '".$name."', '".$info."')";
        if($connection->query($sql)){
            echo "successfully created skill";
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                header("location: edittoon.php?id=$id");
            }else{
                header("location: index.php");
            }
        }else{
            echo $connection->error;
        }
    }elseif(isset($_POST['newability'])){
        $name=$_POST['name'];
        $info=$_POST['info'];

        $sql="INSERT INTO masterability (id, name, info) VALUES (NULL, '".$name."', '".$info."')";
        if($connection->query($sql)){
            echo "successfully created ability";
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                header("location: edittoon.php?id=$id");
            }else{
                header("location: index.php");
            }
        }else{
            echo $connection->error;
        }
    }

    if($loggedIn == "true"){
        if($rank >= 2){
            if(isset($_GET['type'])){
                if($_GET['type']=="skill"){
?>
        <div class="toon-info-container">
            <h2>New Skill</h2>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Skill Name" /><br>
                <input type="text" name="info" placeholder="Skill Info" /><br>
                <input type="submit" value="Save" name="newskill"><br>
            </form>
        </div>
<?php   
            }elseif($_GET['type']=="ability"){
?>
        <div class="toon-info-container">
            <h2>New Ability</h2>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Ability Name" /><br>
                <input type="text" name="info" placeholder="Ability Info" /><br>
                <input type="submit" value="Save" name="newability"><br>
            </form>
        </div>
<?php
            }
        }
    }
}
include("bottom.php");
?>