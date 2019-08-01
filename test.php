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
    $sql = "SELECT * FROM toons WHERE grade='".$grd."' AND element='".$ele."' ORDER BY displayorder";
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
            $cell_data .= '<div class="cell ui-sortable-handle" cellid="'.$id.'" grade="'.$grade.'">';
                $cell_data .= '<div class="icon">';
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
    <script src="https://kit.fontawesome.com/2e1be1b97d.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>AC Meta Tracker</title>

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
  z-index: 999;
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

.openModal {
    cursor:pointer;
    display:inline-block;
    text-align:center;
}
.modal {
    display:none;
    position: fixed;
    z-index:999;
    padding-top:100px;
    left:0;
    top:0;
    width:100%;
    height:100%;
    overflow:auto;
    background-color:rgba(0,0,0,0.4);
}

.modal_content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border:1px solid #888;
    width:80%;
}

.close {
    color: #aaa;
    float:right;
    font-size:28px;
    font-weight:bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration:none;
    cursor:pointer;
}
</style>

</head>
<body>
    <div class="container">

        <div class="row">
            <div class="main-cell header-cell">
                <h2>Meta Tracker</h2>
                <p class="openModal" id="openModalInfo" onclick="openModal('modalInfo')">Click here for info</p>
                <div class="modal" id="modalInfo">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalInfo')">&times;</span>
                        <h2>Information</h2>
                        <p>This will help track the Meta for AC Toons</p>
                        
                        <p>Instructions to change grade:</p>
                        <ol>
                            <li>Click on the toon's icon</li>   
                            <li>Select the new grade</li>
                            <li>Click save</li>
                        </ol>
                        <a href="newtoon.php">New Toon</a>
                    </div>
                </div>
            </div>
            <div class="main-cell header-cell purple">
                <div class="cell dark"></div>
            </div>
            <div class="main-cell header-cell grey">
                <div class="cell light"></div>
            </div>
            <div class="main-cell header-cell red">
                <div class="cell fire"></div>
            </div>
            <div class="main-cell header-cell blue">
                <div class="cell water"></div>
            </div>
            <div class="main-cell header-cell yellow">
                <div class="cell thunder"></div>
            </div>
            <div class="main-cell header-cell green">
                <div class="cell wind"></div>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalSS" onclick="openModal('modalSS')">Core Units<br>(SS)<br><i class="fas fa-info-circle" style="font-size:12pt;text-decoration:none;margin-left:10px;"></i></h2>
                <div class="modal" id="modalSS">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalSS')">&times;</span>
                        <p>They stand out from their element as the core unit of respective element</p>
                    </div>
                </div>
                <!-- <p>They stand out from their element as the core unit of respective element</p> -->
            </div>
            <div class="main-cell purple-1 reorder-gallery dark-column" grade="ss">
                <?php
                   echo pullContent("ss", "6");//dark_ss
                ?>
            </div>
            <div class="main-cell grey-1 reorder-gallery light-column" grade="ss">
                <?php
                    //echo $light_ss;
                    echo pullContent("ss", "5");//light_ss
                ?>
            </div>
            <div class="main-cell red-1 reorder-gallery fire-column" grade="ss">
                <?php
                    //echo $fire_ss;
                    echo pullContent("ss", "1");//fire_ss
                ?>
            </div>
            <div class="main-cell blue-1 reorder-gallery water-column" grade="ss">
                <?php
                    //echo $water_ss;
                    echo pullContent("ss", "2");//water_ss
                ?>
            </div>
            <div class="main-cell yellow-1 reorder-gallery thunder-column" grade="ss">
                <?php
                    //echo $thunder_ss;
                    echo pullContent("ss", "3");//thunder_ss
                ?>
                
            </div>
            <div class="main-cell green-1 reorder-gallery wind-column" grade="ss">
                <?php
                    //echo $wind_ss;
                    echo pullContent("ss", "4");//wind_ss
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalS" onclick="openModal('modalS')">Excellent Units<br>(S)<br><i class="fas fa-info-circle" style="font-size:12pt;text-decoration:none;margin-left:10px;"></i></h2>
                <div class="modal" id="modalS">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalS')">&times;</span>
                        <p>They are the staple in their respective elements and they excel in their role.</p>
                    </div>
                </div>
            </div>
            
            <div class="main-cell purple-2 reorder-gallery dark-column" grade="s">
                <?php
                    //echo $dark_s;
                    echo pullContent("s", "6");//dark_s
                ?>
            </div>
            <div class="main-cell grey-2 reorder-gallery light-column" grade="s">
                <?php
                    //echo $light_s;
                    echo pullContent("s", "5");//light_s
                ?>
            </div>
            <div class="main-cell red-2 reorder-gallery fire-column" grade="s">
                <?php
                    //echo $fire_s;
                    echo pullContent("s", "1");//fire_s
                ?>
            </div>
            <div class="main-cell blue-2 reorder-gallery water-column" grade="s">
                <?php
                    //echo $water_s;
                    echo pullContent("s", "2");//water_s
                ?>
            </div>
            <div class="main-cell yellow-2 reorder-gallery thunder-column" grade="s">
                <?php
                    //echo $thunder_s;
                    echo pullContent("s", "3");//thunder_s
                ?>
            </div>
            <div class="main-cell green-2 reorder-gallery wind-column" grade="s">
                <?php
                    //echo $wind_s;
                    echo pullContent("s", "4");//wind_s
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">                
                <h2 class="openModal" id="openModalA" onclick="openModal('modalA')">Great Units<br>(A)<br><i class="fas fa-info-circle" style="font-size:12pt;text-decoration:none;margin-left:10px;"></i></h2>
                <div class="modal" id="modalA" onclick="closeModal('modalA')">
                    <div class="modal_content">
                        <span class="close">&times;</span>
                        <p>Excel in their elements and role but certain flaws limits them</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-3 reorder-gallery dark-column" grade="a">
                <?php
                    //echo $dark_a;
                    echo pullContent("a", "6");//dark_a
                ?>
            </div>
            <div class="main-cell grey-3 reorder-gallery light-column" grade="a">
                <?php
                    //echo $light_a;
                    echo pullContent("a", "5");//light_a
                ?>
            </div>
            <div class="main-cell red-3 reorder-gallery fire-column" grade="a">
                <?php
                    //echo $fire_a;
                    echo pullContent("a", "1");//fire_a
                ?>
            </div>
            <div class="main-cell blue-3 reorder-gallery water-column" grade="a">
                <?php
                    //echo $water_a;
                    echo pullContent("a", "2");//water_a
                ?>
            </div>
            <div class="main-cell yellow-3 reorder-gallery thunder-column" grade="a">
                <?php
                    //echo $thunder_a;
                    echo pullContent("a", "3");//thunder_a
                ?>
            </div>
            <div class="main-cell green-3 reorder-gallery wind-column" grade="a">
                <?php
                    //echo $wind_a;
                    echo pullContent("a", "4");//wind_a
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">        
                <h2 class="openModal" id="openModalB" onclick="openModal('modalB')">Good Units<br>(B)<br><i class="fas fa-info-circle" style="font-size:12pt;text-decoration:none;margin-left:10px;"></i></h2>
                <div class="modal" id="modalB">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalB')">&times;</span>
                        <p>Able to perform their role, these units are good but have a more niche usage.</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-4 reorder-gallery dark-column" grade="b">
                <?php
                    //echo $dark_b;
                    echo pullContent("b", "6");//dark_b
                ?>
            </div>
            <div class="main-cell grey-4 reorder-gallery light-column" grade="b">
                <?php
                    //echo $light_b;
                    echo pullContent("b", "5");//light_b
                ?>
            </div>
            <div class="main-cell red-4 reorder-gallery fire-column" grade="b">
                <?php
                    //echo $fire_b;
                    echo pullContent("b", "1");//fire_b
                ?>
            </div>
            <div class="main-cell blue-4 reorder-gallery water-column" grade="b">
                <?php
                    //echo $water_b;
                    echo pullContent("b", "2");//water_b
                ?>
            </div>
            <div class="main-cell yellow-4 reorder-gallery thunder-column" grade="b">
                <?php
                    //echo $thunder_b;
                    echo pullContent("b", "3");//thunder_b
                ?>
            </div>
            <div class="main-cell green-4 reorder-gallery wind-column" grade="b">
                <?php
                    //echo $wind_b;
                    echo pullContent("b", "4");//wind_b
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalC" onclick="openModal('modalC')">Decent Units<br>(C)<br><i class="fas fa-info-circle" style="font-size:12pt;text-decoration:none;margin-left:10px;"></i></h2>
                <div class="modal" id="modalC">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalC')">&times;</span>
                        <p>These units have a niche usage and are rarely used.</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-5 reorder-gallery dark-column" grade="c">
                <?php
                    //echo $dark_c;
                    echo pullContent("c", "6");//dark_c
                ?>
            </div>
            <div class="main-cell grey-5 reorder-gallery light-column" grade="c">
                <?php
                    //echo $light_c;
                    echo pullContent("c", "5");//light_c
                ?>
            </div>
            <div class="main-cell red-5 reorder-gallery fire-column" grade="c">
                <?php
                    //echo $fire_c;
                    echo pullContent("c", "1");//fire_c
                ?>
            </div>
            <div class="main-cell blue-5 reorder-gallery water-column" grade="c">
                <?php
                    //echo $water_c;
                    echo pullContent("c", "2");//water_c
                ?>
            </div>
            <div class="main-cell yellow-5 reorder-gallery thunder-column" grade="c">
                <?php
                    //echo $thunder_c;
                    echo pullContent("c", "3");//thunder_c
                ?>
            </div>
            <div class="main-cell green-5 reorder-gallery wind-column" grade="c">
                <?php
                    //echo $wind_c;
                    echo pullContent("c", "4");//wind_c
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalD" onclick="openModal('modalD')">Bad Units<br>(D)<br><i class="fas fa-info-circle" style="font-size:12pt;text-decoration:none;margin-left:10px;"></i></h2>
                <div class="modal" id="modalD">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalD')">&times;</span>
                        <p>These units are bad and should be advoided.</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-6 reorder-gallery dark-column" grade="d">
                <?php
                    //echo $dark_d;
                    echo pullContent("d", "6");//dark_d
                ?>
            </div>
            <div class="main-cell grey-6 reorder-gallery light-column" grade="d">
                <?php
                    //echo $light_d;
                    echo pullContent("d", "5");//light_d
                ?>
            </div>
            <div class="main-cell red-6 reorder-gallery fire-column" grade="d">
                <?php
                    //echo $fire_d;
                    echo pullContent("d", "1");//fire_d
                ?>
            </div>
            <div class="main-cell blue-6 reorder-gallery water-column" grade="d">
                <?php
                    //echo $water_d;
                    echo pullContent("d", "2");//water_d
                ?>
            </div>
            <div class="main-cell yellow-6 reorder-gallery thunder-column" grade="d">
                <?php
                    //echo $thunder_d;
                    echo pullContent("d", "3");//thunder_d
                ?>
            </div>
            <div class="main-cell green-6 reorder-gallery wind-column" grade="d">
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



function openModal($id){
    var modal = document.getElementById($id);
    modal.style.display = "block";
}

function closeModal($id){
    var modal = document.getElementById($id);
    modal.style.display = "none";
}
var modalInfo = document.getElementById("modalInfo");
var modalSS = document.getElementById("modalSS");
var modalS = document.getElementById("modalS");
var modalA = document.getElementById("modalA");
var modalB = document.getElementById("modalB");
var modalC = document.getElementById("modalC");
var modalD = document.getElementById("modalD");
window.onclick = function(event) {
  if (event.target == modalInfo || event.target == modalSS || event.target == modalS || event.target == modalA || event.target == modalB ||event.target == modalC ||event.target == modalD) {
    modalInfo.style.display = "none";
    modalSS.style.display = "none";
    modalS.style.display = "none";
    modalA.style.display = "none";
    modalB.style.display = "none";
    modalC.style.display = "none";
    modalD.style.display = "none";
  }
}
/*
$(document).ready(function(){	
	$(".main-cell.reorder-gallery").sortable({		
		update: function( event, ui ) {
			updateOrder();
		}
	});  
});
*/

$( ".dark-column" ).sortable({
    connectWith: ".dark-column"
});
$( ".light-column" ).sortable({
    connectWith: ".light-column"
});
$( ".fire-column" ).sortable({
    connectWith: ".fire-column"
});
$( ".water-column" ).sortable({
    connectWith: ".water-column"
});
$( ".thunder-column" ).sortable({
    connectWith: ".thunder-column"
});
$( ".wind-column" ).sortable({
    connectWith: ".wind-column"
});

$(document).ready(function(){	
	$(".reorder-gallery").sortable({		
		update: function(event,ui) {
            if (this === ui.item.parent()[0]) {
                if (ui.sender !== null) {
                    // the movement was from one container to another - do something to process it
                    // ui.sender will be the reference to original container
                    updateGrade();
                    console.log("changing grade");
                    updateOrder();
                    console.log("changing order");
                } else {
                    // the move was performed within the same container - do your "same container" stuff
                    updateOrder();
                    console.log("changing order");
                }
            }
        }
	});  
});


function updateOrder() {	
	var item_order = new Array();
	$('.main-cell.reorder-gallery .cell').each(function() {
		item_order.push($(this).attr("cellid"));
	});
	var order_string = 'order='+item_order;
	$.ajax({
		type: "GET",
		url: "updateorder.php",
		data: order_string,
		cache: false,
		success: function(data){			
		}
	});
}

function updateGrade() {	
	var item_grade = new Array();
    var grade, id;
	$('.main-cell.reorder-gallery .cell').each(function() {
        grade = $(this).parent().attr("grade");
        cellid = $(this).attr("cellid");
        //console.log(grade);
        //console.log(id);
		item_grade.push({ id : cellid, grade : grade });
        json_grade = JSON.stringify(item_grade);
        //console.log(json_grade);
	});
	//var order_string = 'grade='+item_grade;
    //console.log(order_string);
    
	$.ajax({
		type: "POST",
		url: "updateorder.php",
		data:  {data : json_grade},
		cache: false,
		success: function(){			
           console.log("Updated Database");
		}
	});
    
}

</script>