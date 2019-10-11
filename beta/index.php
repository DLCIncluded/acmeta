<?php
include("top.php");
if(isset($_GET['display'])){
    $display = $_GET['display'];
    if($display=="full"){
        $table_class="table-container-small";
    }
    elseif($display="single"){
        if(isset($_GET['row'])){
            $table_row = $_GET['row'];
        }else{
            $table_row = "6";
        }
    }else{
        $display="error";
    }
}else{
    $display="single";
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
    }else{
        //$cell_data="ERROR";
    }
    return $cell_data;
}
?>

<?php
if($display == "full"){
?>
<meta name="viewport" content=" initial-scale=1">
<div class="table-container-small">
    <?php include("includes/dark.php"); ?>
</div>
<div class="table-container-small">
    <?php include("includes/light.php"); ?>
</div>
<div class="table-container-small">
    <?php include("includes/fire.php"); ?>
</div>
<div class="table-container-small">
    <?php include("includes/water.php"); ?>
</div>
<div class="table-container-small">
    <?php include("includes/thunder.php"); ?>
</div>
<div class="table-container-small">
    <?php include("includes/wind.php"); ?>
</div>
<?php
}elseif($display == "single"){
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
    if(isset($table_row)){
        if($table_row=="6"){
            include("includes/dark.php");
        }elseif($table_row=="5"){
            include("includes/light.php");
        }elseif($table_row=="1"){
            include("includes/fire.php");
        }elseif($table_row=="2"){
            include("includes/water.php");
        }elseif($table_row=="3"){
            include("includes/thunder.php");
        }elseif($table_row=="4"){
            include("includes/wind.php");
        } 
    }else{
        include("includes/dark.php");
    }
    
}elseif($display=="error"){
?>
<h2 class="center-text">ERROR - table type not selected</h2>
Please select either <a href="beta.php?display=full">Full table</a> or <a href="beta.php?display=single&row=1">Single table</a>.
<?php
}

?>
<script>
$(".select").click(function(){
    if ( $(".select-menu").is(":hidden") ){
        $(".select-menu").slideDown();
    }else{
        $(".select-menu").slideUp();
    }
});
</script>
<?php
include("bottom.php");
?>