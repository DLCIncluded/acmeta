<?php
ini_set('display_errors', 1);
include_once("dbConn.php");
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
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $fire = ($element == "1") ? "checked" : " ";
        $water = ($element == "2") ? "checked" : " ";
        $thunder = ($element == "3") ? "checked" : " ";
        $wind = ($element == "4") ? "checked" : " ";
        $light = ($element == "5") ? "checked" : " ";
        $dark = ($element == "6") ? "checked" : " ";

        $s1 = ($star == "1") ? "checked" : " ";
        $s2 = ($star == "2") ? "checked" : " ";
        $s3 = ($star == "3") ? "checked" : " ";
        $s4 = ($star == "4") ? "checked" : " ";
        $s5 = ($star == "5") ? "checked" : " ";

        $ss = ($grade == "ss") ? "selected" : " ";
        $s = ($grade == "s") ? "selected" : " ";
        $a = ($grade == "a") ? "selected" : " ";
        $b = ($grade == "b") ? "selected" : " ";
        $c = ($grade == "c") ? "selected" : " ";
        $d = ($grade == "d") ? "selected" : " ";

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
    <?php
        echo $cell_data;
        echo $br;
        echo $name;
        echo $br;
    ?>
    <p><a href="edittoon.php?id=<?php echo $id; ?>">Edit</a></p>

</div>