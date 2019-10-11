<?php
include("includes/dbConn.php");
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
<link rel="stylesheet" href="beta.css">
<link rel="stylesheet" href="css/elementicon.css">
    <link rel="stylesheet" href="css/staricon.css">
    <link rel="stylesheet" href="css/jobicon.css">
    <link rel="stylesheet" href="css/toonicon.css">
    <link rel="stylesheet" href="css/tooninfo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<table class="dark-head">
    <tr>
        <td class="small-cell">Dark Units</td>
    </tr>
    <tr>
        <td class="small-cell">SS</td>
        <td class="large-row">
            <?php echo pullContent("ss", "6");//dark_ss ?>
        </td>
    </tr>
    <tr>
        <td class="small-cell">S</td>
        <td class="large-row">
            <?php echo pullContent("s", "6");//dark_ss ?>
        </td>
    </tr>
    <tr>
        <td class="small-cell">A</td>
        <td class="large-row">
            <?php echo pullContent("a", "6");//dark_ss ?>
        </td>
    </tr>
    <tr>
        <td class="small-cell">B</td>
        <td class="large-row">
            <?php echo pullContent("b", "6");//dark_ss ?>
        </td>
    </tr>
    <tr>
        <td class="small-cell">C</td>
        <td class="large-row">
            <?php echo pullContent("c", "6");//dark_ss ?>
        </td>
    </tr>
    <tr>
        <td class="small-cell">D</td>
        <td class="large-row">
            <?php echo pullContent("d", "6");//dark_ss ?>
        </td>
    </tr>
</table>