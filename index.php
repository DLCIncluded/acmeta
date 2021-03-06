<?php
include("utils.php");

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

            //create the data for the cell
            $cell_data .= '<div class="cell ui-sortable-handle" cellid="'.$id.'" grade="'.$grade.'">';
                $cell_data .= '<div class="icon" cellid="'.$id.'">';
                    $cell_data .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon" alt="'. $name .'">';
                    $cell_data .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                    $cell_data .= '<div class="element-star star-' . $star . '">';
                        $cell_data .= '<div class="element-icon element-' . $element . '"></div>';
                    $cell_data .= '</div>';
                $cell_data .= '</div>';
               // $cell_data .= '<a href="edittoon.php?id='.$id.'" style="z-index:999; opacity:1;">'.$name.'</a>';
            $cell_data .= '</div>';
        }
    }
    return $cell_data;
}
?>

    <div id="container" class="container">

        <div class="row">
            <div class="main-cell main-header-cell">
                <h2>Meta Tracker</h2>               
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
                <h2 class="openModal" id="openModalSS" onclick="openModal('modalSS')">Core Units<br>(SS)<br><img src="https://img.icons8.com/flat_round/24/000000/info.png"></h2>
                <div class="modal" id="modalSS">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalSS')">&times;</span>
                        <p>They stand out from their element as the core unit of respective element</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-1 reorder-gallery dark-column dark-head" grade="ss">
                <?php
                   echo pullContent("ss", "6");//dark_ss
                ?>
            </div>
            <div class="main-cell grey-1 reorder-gallery light-column light-head" grade="ss">
                <?php
                    echo pullContent("ss", "5");//light_ss
                ?>
            </div>
            <div class="main-cell red-1 reorder-gallery fire-column fire-head" grade="ss">
                <?php
                    echo pullContent("ss", "1");//fire_ss
                ?>
            </div>
            <div class="main-cell blue-1 reorder-gallery water-column water-head" grade="ss">
                <?php
                    echo pullContent("ss", "2");//water_ss
                ?>
            </div>
            <div class="main-cell yellow-1 reorder-gallery thunder-column thunder-head" grade="ss">
                <?php
                    echo pullContent("ss", "3");//thunder_ss
                ?>
                
            </div>
            <div class="main-cell green-1 reorder-gallery wind-column wind-head" grade="ss">
                <?php
                    echo pullContent("ss", "4");//wind_ss
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalS" onclick="openModal('modalS')">Excellent Units<br>(S)<br><img src="https://img.icons8.com/flat_round/24/000000/info.png"></h2>
                <div class="modal" id="modalS">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalS')">&times;</span>
                        <p>They are the staple in their respective elements and they excel in their role.</p>
                    </div>
                </div>
            </div>
            
            <div class="main-cell purple-2 reorder-gallery dark-column" grade="s">
                <?php
                    echo pullContent("s", "6");//dark_s
                ?>
            </div>
            <div class="main-cell grey-2 reorder-gallery light-column" grade="s">
                <?php
                    echo pullContent("s", "5");//light_s
                ?>
            </div>
            <div class="main-cell red-2 reorder-gallery fire-column" grade="s">
                <?php
                    echo pullContent("s", "1");//fire_s
                ?>
            </div>
            <div class="main-cell blue-2 reorder-gallery water-column" grade="s">
                <?php
                    echo pullContent("s", "2");//water_s
                ?>
            </div>
            <div class="main-cell yellow-2 reorder-gallery thunder-column" grade="s">
                <?php
                    echo pullContent("s", "3");//thunder_s
                ?>
            </div>
            <div class="main-cell green-2 reorder-gallery wind-column" grade="s">
                <?php
                    echo pullContent("s", "4");//wind_s
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">                
                <h2 class="openModal" id="openModalA" onclick="openModal('modalA')">Great Units<br>(A)<br><img src="https://img.icons8.com/flat_round/24/000000/info.png"></h2>
                <div class="modal" id="modalA" onclick="closeModal('modalA')">
                    <div class="modal_content">
                        <span class="close">&times;</span>
                        <p>Excel in their elements and role but certain flaws limits them</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-3 reorder-gallery dark-column" grade="a">
                <?php
                    echo pullContent("a", "6");//dark_a
                ?>
            </div>
            <div class="main-cell grey-3 reorder-gallery light-column" grade="a">
                <?php
                    echo pullContent("a", "5");//light_a
                ?>
            </div>
            <div class="main-cell red-3 reorder-gallery fire-column" grade="a">
                <?php
                    echo pullContent("a", "1");//fire_a
                ?>
            </div>
            <div class="main-cell blue-3 reorder-gallery water-column" grade="a">
                <?php
                    echo pullContent("a", "2");//water_a
                ?>
            </div>
            <div class="main-cell yellow-3 reorder-gallery thunder-column" grade="a">
                <?php
                    echo pullContent("a", "3");//thunder_a
                ?>
            </div>
            <div class="main-cell green-3 reorder-gallery wind-column" grade="a">
                <?php
                    echo pullContent("a", "4");//wind_a
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">        
                <h2 class="openModal" id="openModalB" onclick="openModal('modalB')">Good Units<br>(B)<br><img src="https://img.icons8.com/flat_round/24/000000/info.png"></h2>
                <div class="modal" id="modalB">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalB')">&times;</span>
                        <p>Able to perform their role, these units are good but have a more niche usage.</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-4 reorder-gallery dark-column" grade="b">
                <?php
                    echo pullContent("b", "6");//dark_b
                ?>
            </div>
            <div class="main-cell grey-4 reorder-gallery light-column" grade="b">
                <?php
                    echo pullContent("b", "5");//light_b
                ?>
            </div>
            <div class="main-cell red-4 reorder-gallery fire-column" grade="b">
                <?php
                    echo pullContent("b", "1");//fire_b
                ?>
            </div>
            <div class="main-cell blue-4 reorder-gallery water-column" grade="b">
                <?php
                    echo pullContent("b", "2");//water_b
                ?>
            </div>
            <div class="main-cell yellow-4 reorder-gallery thunder-column" grade="b">
                <?php
                    echo pullContent("b", "3");//thunder_b
                ?>
            </div>
            <div class="main-cell green-4 reorder-gallery wind-column" grade="b">
                <?php
                    echo pullContent("b", "4");//wind_b
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalC" onclick="openModal('modalC')">Decent Units<br>(C)<br><img src="https://img.icons8.com/flat_round/24/000000/info.png"></h2>
                <div class="modal" id="modalC">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalC')">&times;</span>
                        <p>These units have a niche usage and are rarely used.</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-5 reorder-gallery dark-column" grade="c">
                <?php
                    echo pullContent("c", "6");//dark_c
                ?>
            </div>
            <div class="main-cell grey-5 reorder-gallery light-column" grade="c">
                <?php
                    echo pullContent("c", "5");//light_c
                ?>
            </div>
            <div class="main-cell red-5 reorder-gallery fire-column" grade="c">
                <?php
                    echo pullContent("c", "1");//fire_c
                ?>
            </div>
            <div class="main-cell blue-5 reorder-gallery water-column" grade="c">
                <?php
                    echo pullContent("c", "2");//water_c
                ?>
            </div>
            <div class="main-cell yellow-5 reorder-gallery thunder-column" grade="c">
                <?php
                    echo pullContent("c", "3");//thunder_c
                ?>
            </div>
            <div class="main-cell green-5 reorder-gallery wind-column" grade="c">
                <?php
                    echo pullContent("c", "4");//wind_c
                ?>
            </div>
        </div>

        <div class="row">
            <div class="main-cell header-cell">
                <h2 class="openModal" id="openModalD" onclick="openModal('modalD')">Bad Units<br>(D)<br><img src="https://img.icons8.com/flat_round/24/000000/info.png"></h2>
                <div class="modal" id="modalD">
                    <div class="modal_content">
                        <span class="close" onclick="closeModal('modalD')">&times;</span>
                        <p>These units are bad and should be advoided.</p>
                    </div>
                </div>
            </div>
            <div class="main-cell purple-6 reorder-gallery dark-column" grade="d">
                <?php
                    echo pullContent("d", "6");//dark_d
                ?>
            </div>
            <div class="main-cell grey-6 reorder-gallery light-column" grade="d">
                <?php
                    echo pullContent("d", "5");//light_d
                ?>
            </div>
            <div class="main-cell red-6 reorder-gallery fire-column" grade="d">
                <?php
                    echo pullContent("d", "1");//fire_d
                ?>
            </div>
            <div class="main-cell blue-6 reorder-gallery water-column" grade="d">
                <?php
                    echo pullContent("d", "2");//water_d
                ?>
            </div>
            <div class="main-cell yellow-6 reorder-gallery thunder-column" grade="d">
                <?php
                    echo pullContent("d", "3");//thunder_d
                ?>
            </div>
            <div class="main-cell green-6 reorder-gallery wind-column" grade="d">
                <?php
                    echo pullContent("d", "4");//wind_d
                ?>
            </div>
        </div>

    </div>
</body>
</html>


<script type="text/javascript">

if (screen.width < 980) { 
    document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>');  
   
 } 

</script>
<script>

function openModal($id){
    var modal = document.getElementById($id);
    modal.style.display = "block";
}

function closeModal($id){
    var modal = document.getElementById($id);
    modal.style.display = "none";
}
//TODO This needs a re-write BADLY!
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

// END TODO

<?php 
if($loggedIn == "true"){
    if($rank >= 2){//only run this js if they're logged in and an editor or higher
?>

// Connecting the sortables with the columns so we can drag-drop grade change
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

// when we move, run the updates and shoot to the updateorder.php handler
$(document).ready(function(){	
    $(".icon").click(function(){
        console.log("yes");
        var cell = $(this).attr("cellid");
        window.location.href='tooninfo.php?id='+cell;
    }); 
    $(".reorder-gallery").sortable({
        helper : 'clone',
		update: function(event,ui) {
            if (this === ui.item.parent()[0]) {
                if (ui.sender !== null) {
                    // the movement was from one container to another
                    // not sure if we need the ui.sender any more but figured why not...
                    updateGrade();
                    console.log("changing grade");
                    updateOrder();
                    console.log("changing order");
                } else {
                    // the move was performed within the same container 
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
        //create array with the cells id to send 
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
        //get the cellid and grade and put them into the array/object
        grade = $(this).parent().attr("grade");
        cellid = $(this).attr("cellid");
		item_grade.push({ id : cellid, grade : grade });
        json_grade = JSON.stringify(item_grade);
	});
    
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
<?php
    }else{
?>
$(document).ready(function(){	
    $(".icon").click(function(){
        console.log("yes");
        var cell = $(this).attr("cellid");
        window.location.href='tooninfo.php?id='+cell;
    }); 
}); 
<?php
    }
}else{
        ?>
$(document).ready(function(){	
    $(".icon").click(function(){
        console.log("yes");
        var cell = $(this).attr("cellid");
        window.location.href='tooninfo.php?id='+cell;
    }); 
}); 
<?php
    
}
?>
</script>
<?php
include("bottom.php");
?>
