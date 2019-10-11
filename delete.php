<?php
include("utils.php");
?>
<div class="container">
    <div class="toon-info-container">
<?php
if($loggedIn == "true"){
    if($rank >= 3){//only run this js if they're logged in and an admin or higher
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $sql = "SELECT * FROM toons WHERE id='".$id."'";
            $result = $connection->query($sql);
            $cell_data = '';
            if($result->num_rows == 1){
                $sql = "DELETE FROM toons WHERE id='".$id."'";
                if($connection->query($sql)){
                    echo "successfully deleted toon, <a href='deletetoon.php'>go back</a>";
                }else{
                    echo $connection->error;
                }
            }else{
                echo "that toon not found";
            }
        } elseif(isset($_GET['id'])){
            $id=$_GET['id'];
            $sql = "SELECT * FROM toons WHERE id='".$id."'";
            $result = $connection->query($sql);
            $cell_data = '';
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $name = $row['name'];
                
                echo "Are you sure you wish to delete: ". $name;
                ?>
                
                        <form action="delete.php" method="POST">
                            <input type="hidden" value="<?php echo $id; ?>" name="id" />
                            <input type="submit" value="Delete" />
                        </form>
                    </div>
                </div>
                
                <?php
            }
        }else{
            echo "no characters found";
        }

    }
}

?>