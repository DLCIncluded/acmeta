<?php
    include("utils.php");

    if(isset($_POST['jobid'])){
        $jobid=$_POST['jobid'];
        
        $id=$_POST['id'];
        $job=$_POST['job'];

        switch($jobid) {
            case 0:
                $sql="UPDATE toons SET job='".$job."' WHERE id='".$id."'";
                break;
            case 1:
                $sql="UPDATE toons SET job1='".$job."' WHERE id='".$id."'";
                break;
            case 2:
                $sql="UPDATE toons SET job2='".$job."' WHERE id='".$id."'";
                break;
            case 3:
                $sql="UPDATE toons SET job3='".$job."' WHERE id='".$id."'";
                break;
        }
        if($connection->query($sql)){
            echo "successfully updated job";
            header("location: edittoon.php?id=$id");
        }else{
            echo $connection->error;
        }
    }

    if($loggedIn == "true"){
        if($rank >= 2){
            if(isset($_GET['id']) && isset($_GET['job'])){
                $id = $_GET['id'];
                $job = $_GET['job'];
?>
            <form action="#" method="POST">
                <div class="toon-info-container">
                    Job <?php echo $job + 1; ?>:
                    <div class="scrollbox">
                    <?php

                    $fileList = glob('img/jobs/*');
                    foreach($fileList as $filename){
                        //Use the is_file function to make sure that it is not a directory.
                        if(is_file($filename)){

                            //echo "<option value='".basename($filename)."'>", basename($filename), '</option>'; 
                            ?>
                            <label><input type="radio" name="job" value="<?php echo basename($filename) ?>"><img src="<?php echo $filename ?>" alt="" width="48px" height="48px"><br></label>
                            <?php
                        }   
                    }
                    ?>
                    </div>
                    <input type="hidden" name="jobid" value="<?php echo $job; ?>"/>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" value="Save" name="setjob">
                    <br><br>
                    If the job is not in the list, you can upload a new one <a href="uploadjob.php">here</a>.
                </div>

            </form>
<?php
        }
    }
}
?>