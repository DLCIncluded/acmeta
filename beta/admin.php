<?php
ini_set('display_errors', 1);
include("utils.php");
?>
<div class="container">
    <div class="toon-info-container">
<?php
if($loggedIn == "true"){
    if($rank >= 3){//only run this js if they're logged in and an editor or higher

        if(isset($_POST['rank'])){
            $sql = "SELECT * FROM users WHERE id='".$_POST['id']."'";
            $result = $connection->query($sql);
            $newrank = $_POST['rank'];
            $userid = $_POST['id'];
            //echo $result->num_rows;
            if($result->num_rows == 1){
                //echo "test";
                //$sql = "UPDATE users SET `rank`='$newrank' WHERE id='$userid'";
                $query = "UPDATE users SET rank='".$newrank."' WHERE id = '".$userid."'";
                //echo $sql;
                //echo $query;
                if($connection->query($query)){
                    echo "successfully updated user. tell them to log out and log back in<br>";
                }
                else{
                    echo "error";
                }
            }
        }
        if(isset($_GET['id'])){
            $sql = "SELECT * FROM users WHERE id='".$_GET['id']."'";
            $result = $connection->query($sql);

            

            if($result->num_rows == 1){
                //echo "test";
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $id = $row['id'];
                $rank = $row['rank'];

                echo "Please select the rank you would like for $username. <br>";
                ?>
                <form action="admin.php" method="POST">
                <select name="rank">
                    <option value='1'>1-view</option>
                    <option value='2'>2-edit</option>
                    <option value='3'>3-admin</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" value="Save"/>
                </form>
                <br>
                <a href="admin.php">Cancel/Back</a>
                <?php
            }
            
        }else{
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            if($result->num_rows >= 0){
                //echo $result->num_rows;
                while($row = $result->fetch_assoc()){
                    $username = $row['username'];
                    $id = $row['id'];
                    $rank = $row['rank'];
                    if($rank == "1"){
                        $rank = "View";
                    }
                    if($rank == "2"){
                        $rank = "Edit";
                    }
                    if($rank == "3"){
                        $rank = "Admin";
                    }
                        
                    echo "Edit User: <a href='admin.php?id=$id'>".$username."</a>(".$rank.")<br>";
                }
            }

        }

    }
}else{
    echo "not authorized";
}
include("bottom.php");
?>
