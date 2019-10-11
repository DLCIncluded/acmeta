<?php
ini_set('display_errors', 1);
include_once("top.php");
$br="<br>";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM toons WHERE id='".$id."'";
    $result = $connection->query($sql);
    $cell_data = '';
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        //pull info from DB
        $id = $row['id'];
        $name = ucfirst(strtolower($row['name']));
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

        $sql = "SELECT * FROM masterability WHERE id='".$masterability."'";
        $result = $connection->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $abilityname = $row['name'];
            $abilityinfo = $row['info'];
        }

        $sql = "SELECT * FROM skills WHERE id='".$leaderskill."'";
        $result = $connection->query($sql);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $skillname = $row['name'];
            $skillinfo = $row['info'];
        }

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
        <div class="toon-info-top">
            <div class="toon-img">
                <img src="img/toons/<?php echo $img; ?>" alt="Toon Img">
            </div>
            <div class="toon-info">
                <h1><?php echo $name; ?></h1>
                <h2><?php echo $skillname; ?></h2>
                <p><?php echo $skillinfo; ?></p>
                <img src="img/jobs/<?php echo $job; ?>">
                <img src="img/jobs/<?php echo $job1; ?>">
                <img src="img/jobs/<?php echo $job2; ?>">
            </div>
        </div>
        <div class="toon-info-left">
            <div class="toon-info-img-large">
                <img src="img/large/<?php echo $largeimg; ?>" alt="toon img large">
            </div>
            <div class="toon-bio">
                <?php
                    echo nl2br($bio);
                ?>
            </div>
        </div>
            <div class="toon-ability">
                <h2><?php echo $abilityname; ?></h2>
                <h2><?php echo $abilityinfo; ?></h2>
            </div>

        <div class="toon-info-right">
            <div class="toon-info-builds">
                <?php
                    echo $builds;
                ?>
            </div>
        </div>
    </div>

<?php
    if($loggedIn == "true"){
        if($rank >= 3){//only run this js if they're logged in and an editor or higher
?>
    <p><a href="edittoon.php?id=<?php echo $id; ?>">Edit</a></p>
<?php
        }
    }
?>
</div>
<?php
include("bottom.php");
?>