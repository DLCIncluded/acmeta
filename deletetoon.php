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
    if($rank >= 3){//only run this js if they're logged in and an admin or higher
        
            $sql = "SELECT * FROM toons";
            $result = $connection->query($sql);
            $cell_data = '';
            while($row = $result->fetch_assoc()){
                
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
                $cell_data .= '<span style="position:absolute;margin-left:55px;margin-top:-35px">'.$name.' <a href="delete.php?id='.$id.'">Delete</a></span>';
        }
?>
<link rel="stylesheet" href="css/styles.css">

<div class="container">
    <div class="toon-info-container">
        <?php
            echo $cell_data;
        ?>
    </div>
</div>
<?php
    }
}
include("bottom.php");
?> 