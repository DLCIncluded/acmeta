<?php
ini_set('display_errors', 1);
include_once("utils.php");

//element id's
//fire    = 1
//water   = 2
//thunder = 3
//wind    = 4
//light   = 5
//dark    = 6

//grades SS, S, A, B, C, D
if($loggedIn == "true"){
    if($rank >= 3){//only run this js if they're logged in and an editor or higher

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM toons WHERE id='".$id."'";
    $result = $connection->query($sql);
    $cell_data = '';
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        //pull info from DB
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $job1 = $row['job1'];
        $job2 = $row['job2'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];
        
        $leaderskill = $row['leaderskill'];
        $masterability = $row['masterability'];
        $builds = $row['builds'];
        $largeimg = $row['largeimg'];
        $bio = $row['bio'];

        $s1 = ($star == "1") ? "checked" : " ";
        $s2 = ($star == "2") ? "checked" : " ";
        $s3 = ($star == "3") ? "checked" : " ";
        $s4 = ($star == "4") ? "checked" : " ";
        $s5 = ($star == "5") ? "checked" : " ";

        //create the data for the cell
        $cell_data .= '<div class="cell">';
            $cell_data .= '<div class="icon">';
                $cell_data .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $cell_data .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $cell_data .= '<div class="element-star star-' . $star . '">';
                    $cell_data .= '<div class="element-icon element-' . $element . '"></div>';
                $cell_data .= '</div>';
                
            $cell_data .= '</div>';
        $cell_data .= '</div>';
    }
} else {
    $cell_data = "No toon found by that id, please try again...";
}
?>
<link rel="stylesheet" href="css/styles.css">

<div class="container">
    <div class="toon-info-container">
        <?php
            echo $cell_data;
        ?>

        <form action="includes/functions.php" method="POST" enctype="multipart/form-data">
            <h1>Edit Toon</h1>
            <p><a href="index.php">Home</a> | <a href="tooninfo.php?id=<?php echo $id; ?>">Info Page</a></p><br>

            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"/><br><br>
            <div class='job-list'>
                <div class="job-item"> 
                    <p>Job 1:</p> <img src="img/jobs/<?php echo $job; ?>" alt="job1"> <a href="setjob.php?id=<?php echo $id; ?>&job=0">Change</a>
                </div>
                <div class="job-item">
                    <p>Job 2:</p> <img src="img/jobs/<?php echo $job1; ?>" alt="job2"> <a href="setjob.php?id=<?php echo $id; ?>&job=1">Change</a>
                </div>
                <div class="job-item">
                    <p>Job 3:</p> <img src="img/jobs/<?php echo $job2; ?>" alt="job3"> <a href="setjob.php?id=<?php echo $id; ?>&job=2">Change</a>
                </div>
            </div>
            <div class="star-box">
                Star:
                <label><input type="radio" name="star" value="1" <?php echo $s1; ?>><div class="stars-1"> </div></label>
                <label><input type="radio" name="star" value="2" <?php echo $s2; ?>><div class="stars-2"> </div></label>
                <label><input type="radio" name="star" value="3" <?php echo $s3; ?>><div class="stars-3"> </div></label>
                <label><input type="radio" name="star" value="4" <?php echo $s4; ?>><div class="stars-4"> </div></label>
                <label><input type="radio" name="star" value="5" <?php echo $s5; ?>><div class="stars-5"> </div></label>
            </div>
            <br><br>
            Skill:
            <select name="skill">
            <?php
                $sql = "SELECT * FROM skills";
                $result = $connection->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $skillid = $row['id'];
                        $skillname = $row['name'];
                        $skillinfo = $row['info'];
                        echo "<option value='".$skillid."'>".$skillname."</option>";
                    }
                }
            ?>
            </select> <a href="create.php?type=skill&id=<?php echo $id; ?>">Create New Skill</a>
            <br><br>
            Master Ability:
            <select name="ability">
            <?php
                $sql = "SELECT * FROM masterability";
                $result = $connection->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $abilityid = $row['id'];
                        $abilityname = $row['name'];
                        $abilityinfo = $row['info'];
                        echo "<option value='".$abilityid."'>".$abilityname."</option>";
                    }
                }
            ?>
            </select> <a href="create.php?type=ability&id=<?php echo $id; ?>">Create New Ability</a>
            <br><br>
            <br>
            Bio:<br>
            <textarea name="bio" rows="10" cols="75"><?php echo $bio; ?></textarea>
            <br><br>
            Builds:<br>
            <textarea name="builds" rows="10" cols="75"><?php echo $builds; ?></textarea><br><br>

            Click <a href="upload.php?id=<?php echo $id; ?>">Here</a> to upload a new large picture, that shows up on the info page.<br> <br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Save Changes" name="edittoon">
            <br><br>
        </form>
    </div>
</div>
<?php
    }
}
include("bottom.php");
?>