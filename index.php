<?php
ini_set('display_errors', '1');
include_once("dbConn.php");

//element id's
//fire    = 1
//water   = 2
//thunder = 3
//wind    = 4
//light   = 5
//dark    = 6

//grades SS, S, A, B, C, D
if(isset($_POST['grade']) && isset($_POST['id'])){
    $grade = $_POST['grade'];
    $id = $_POST['id'];
    $sql = "UPDATE toons SET grade='".$grade."' WHERE id='".$id."'";
    if($connection->query($sql)){
        echo "successfully updated toon";
    }else{
        echo $connection->error;
    }
}
/*
function pullContent($grd,$ele) {//function to pull the info from the DB
    global $connection;//pull the connection variable from DbConn file
    $sql = "SELECT * FROM toons WHERE grade='".$grd."' AND element='".$ele."'";
    $result = $connection->query($sql);
    $cell_data = '';
    if($result->num_rows >= 1){
        while($row = $result->fetch_assoc()){
            //pull info from DB
            $id = $row['id'];
            $name = $row['name'];
            $img = $row['img'];
            $job = $row['job'];
            $star = $row['star'];
            $element = $row['element'];
            $grade = $row['grade'];
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
    }
    return $cell_data;
}
*/
function pullContent($grd,$ele) {//function to pull the info from the DB
    global $connection;//pull the connection variable from DbConn file
    $sql = "SELECT * FROM toons WHERE grade='".$grd."' AND element='".$ele."'";
    $result = $connection->query($sql);
    $cell_data = '';
    if($result->num_rows >= 1){
        while($row = $result->fetch_assoc()){
            //pull info from DB
            $id = $row['id'];
            $name = $row['name'];
            $img = $row['img'];
            $job = $row['job'];
            $star = $row['star'];
            $element = $row['element'];
            $grade = $row['grade'];

            $sel_ss = ($grade == "ss") ? "selected='selected'" : " ";
            $sel_s = ($grade == "s") ? "selected='selected'" : " ";
            $sel_a = ($grade == "a") ? "selected='selected'" : " ";
            $sel_b = ($grade == "b") ? "selected='selected'" : " ";
            $sel_c = ($grade == "c") ? "selected='selected'" : " ";
            $sel_d = ($grade == "d") ? "selected='selected'" : " ";


            //create the data for the cell
            $cell_data .= '<div class="cell">';
                $cell_data .= '<div class="icon" onclick="togglePopup('.$id.')">';
                    $cell_data .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                    $cell_data .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                    $cell_data .= '<div class="element-star star-' . $star . '">';
                        $cell_data .= '<div class="element-icon element-' . $element . '"></div>';
                    $cell_data .= '</div>';
                    
                $cell_data .= '</div>';
                $cell_data .= '<div class="popuptext" id="'.$id.'">';
                        $cell_data .= 'Grade:';
                        $cell_data .= '<form action="#" method="POST">';
                            $cell_data .= '<select name="grade">';
                                $cell_data .= '<option value="ss" '.$sel_ss.'>SS</option>';
                                $cell_data .= '<option value="s" '.$sel_s.'>S</option>';
                                $cell_data .= '<option value="a" '.$sel_a.'>A</option>';
                                $cell_data .= '<option value="b" '.$sel_b.'>B</option>';
                                $cell_data .= '<option value="c" '.$sel_c.'>C</option>';
                                $cell_data .= '<option value="d" '.$sel_d.'>D</option>';
                            $cell_data .= '</select>';
                            $cell_data .= '<input type="hidden" name="id" value="'.$id.'">';
                            $cell_data .= '<input type="submit" value="Save">';
                            $cell_data .= '<span style="display:inline-block; cursor:pointer" onclick="togglePopup('.$id.')">Close</span>';
                        $cell_data .= '</form>';
                    $cell_data .= '</div>';
            $cell_data .= '</div>';
        }
    }
    return $cell_data;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mikes Dumb</title>

    <style>
/* Popup container - can be anything you want */
.icon {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: relative;
  z-index: 1;
  top: 10%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popuptext::after {
  bottom: 100%;
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-bottom-color: #555;
  border-width: 10px;
  margin-left: -10px;
}

/* Toggle this class - hide and show the popup */
.show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

</head>
<body>
    <div class="container">

        <div class="row">
            <div class="main-cell">
                Job Plus
            </div>
            <div class="main-cell">
                <div class="cell dark"></div>
            </div>
            <div class="main-cell">
                <div class="cell light"></div>
            </div>
            <div class="main-cell">
                <div class="cell fire"></div>
            </div>
            <div class="main-cell">
                <div class="cell water"></div>
            </div>
            <div class="main-cell">
                <div class="cell thunder"></div>
            </div>
            <div class="main-cell">
                <div class="cell wind"></div>
            </div>
        </div>

        <div class="row">
            <div class="main-cell">
                <h2>Core Units (SS)</h2>
                <p>They stand out from their element as the core unit of respective element</p>
            </div>
            <div class="main-cell">
                <?php
                   echo pullContent("ss", "6");//dark_ss
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $light_ss;
                    echo pullContent("ss", "5");//light_ss
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $fire_ss;
                    echo pullContent("ss", "1");//fire_ss
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $water_ss;
                    echo pullContent("ss", "2");//water_ss
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $thunder_ss;
                    echo pullContent("ss", "3");//thunder_ss
                ?>
                
            </div>
            <div class="main-cell">
                <?php
                    //echo $wind_ss;
                    echo pullContent("ss", "4");//wind_ss
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell">
                <h2>Excellent Units (S)</h2>
                <p>They are the staple in their respective elements and they excel in their role.</p>
            </div>
            <div class="main-cell">
                <?php
                    //echo $dark_s;
                    echo pullContent("s", "6");//dark_s
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $light_s;
                    echo pullContent("s", "5");//light_s
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $fire_s;
                    echo pullContent("s", "1");//fire_s
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $water_s;
                    echo pullContent("s", "2");//water_s
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $thunder_s;
                    echo pullContent("s", "3");//thunder_s
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $wind_s;
                    echo pullContent("s", "4");//wind_s
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell">
                <h2>Great Units (A)</h2>
                <p>Excel in their elements and role but certain flaws limits them</p>
            </div>
            <div class="main-cell">
                <?php
                    //echo $dark_a;
                    echo pullContent("a", "6");//dark_a
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $light_a;
                    echo pullContent("a", "5");//light_a
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $fire_a;
                    echo pullContent("a", "1");//fire_a
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $water_a;
                    echo pullContent("a", "2");//water_a
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $thunder_a;
                    echo pullContent("a", "3");//thunder_a
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $wind_a;
                    echo pullContent("a", "4");//wind_a
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell">
                <h2>Good Units (B)</h2>
                <p>Able to perform their role, these units are good but have a more niche usage.</p>
            </div>
            <div class="main-cell">
                <?php
                    //echo $dark_b;
                    echo pullContent("b", "6");//dark_b
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $light_b;
                    echo pullContent("b", "5");//light_b
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $fire_b;
                    echo pullContent("b", "1");//fire_b
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $water_b;
                    echo pullContent("b", "2");//water_b
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $thunder_b;
                    echo pullContent("b", "3");//thunder_b
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $wind_b;
                    echo pullContent("b", "4");//wind_b
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell">
                <h2>Decent Units (C)</h2>
                <p>These units have a niche usage and are rarely used.</p>
            </div>
            <div class="main-cell">
                <?php
                    //echo $dark_c;
                    echo pullContent("c", "6");//dark_c
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $light_c;
                    echo pullContent("c", "5");//light_c
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $fire_c;
                    echo pullContent("c", "1");//fire_c
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $water_c;
                    echo pullContent("c", "2");//water_c
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $thunder_c;
                    echo pullContent("c", "3");//thunder_c
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $wind_c;
                    echo pullContent("c", "4");//wind_c
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell">
                <h2>Bad Units (D)</h2>
                <p>These units are bad and should be advoided.</p>
            </div>
            <div class="main-cell">
                <?php
                    //echo $dark_d;
                    echo pullContent("d", "6");//dark_d
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $light_d;
                    echo pullContent("d", "5");//light_d
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $fire_d;
                    echo pullContent("d", "1");//fire_d
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $water_d;
                    echo pullContent("d", "2");//water_d
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $thunder_d;
                    echo pullContent("d", "3");//thunder_d
                ?>
            </div>
            <div class="main-cell">
                <?php
                    //echo $wind_d;
                    echo pullContent("d", "4");//wind_d
                ?>
            </div>
        </div>

    </div>
</body>
</html>

<script>
// When the user clicks on div, open the popup
function togglePopup($id) {
  var popup = document.getElementById($id);
  popup.classList.toggle("show");
}
</script>