<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("dbConn.php");

if(isset($_POST['grade']) && isset($_GET['id'])){
    $grade = $_POST['grade'];
    $id = $_GET['id'];
    $sql = "UPDATE toons SET grade='".$grade."' WHERE id='".$id."'";
    if($connection->query($sql)){
        echo "successfully updated toon";
    }else{
        echo $connection->error;
    }
}
//element id's
//fire    = 1
//water   = 2
//thunder = 3
//wind    = 4
//light   = 5
//dark    = 6

//grades SS, S, A, B, C, D

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
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        //echo $grade;
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
                        $cell_data .= '<input type="submit" value="Save">';
                        $cell_data .= '<span style="display:inline-block; cursor:pointer" onclick="togglePopup('.$id.')">Close</span>';
                    $cell_data .= '</form>';
                $cell_data .= '</div>';
        $cell_data .= '</div>';
    }
} else {
    $cell_data = "No toon found by that id, please try again...";
}
?>
<link rel="stylesheet" href="css/styles.css">
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
  position: absolute;
  z-index: 1;
  top: 85%;
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
<div class="container">
    <div class="row">
        <div class="main-cell">
            <?php
                echo $cell_data;
            ?>
        </div>
            <form>
                <input type="text" name="name" id="name" placeholder="Name..." value="<?php echo $name; ?>">
                <div class="element-select">
                    Element:
                    <label><input type="radio" name="element" value="1"></input><div class="fire"> </div></label>
                    <label><input type="radio" name="element" value="2"></input><div class="water"> </div></label>
                    <label><input type="radio" name="element" value="3"></input><div class="thunder"> </div></label>
                    <label><input type="radio" name="element" value="4"></input><div class="wind"> </div></label>
                    <label><input type="radio" name="element" value="5"></input><div class="light"> </div></label>
                    <label><input type="radio" name="element" value="6"></input><div class="dark"> </div></label>
                </div>
            </form>
    </div>
</div>


<script>
// When the user clicks on div, open the popup
function togglePopup($id) {
  var popup = document.getElementById($id);
  popup.classList.toggle("show");
}



</script>