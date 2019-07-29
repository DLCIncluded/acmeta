<?php
ini_set('display_errors', '1');
include_once("dbConn.php");
//fire    = 1
//water   = 2
//thunder = 3
//wind    = 4
//light   = 5
//dark    = 6

//Dark SS
$sql = "SELECT * FROM toons WHERE grade='ss' AND element='6'";
$result = $connection->query($sql);
if($result->num_rows >= 1){
    $dark_ss = '';
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $dark_ss .= '<div class="cell">';
            $dark_ss .= '<div class="icon">';
                $dark_ss .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $dark_ss .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $dark_ss .= '<div class="element-star star-' . $star . '">';
                    $dark_ss .= '<div class="element-icon element-' . $element . '"></div>';
                $dark_ss .= '</div>';
            $dark_ss .= '</div>';
        $dark_ss .= '</div>';
    }
}

//Light SS
$sql = "SELECT * FROM toons WHERE grade='ss' AND element='5'";
$result = $connection->query($sql);
if($result->num_rows >= 1){
    $light_ss = '';
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $light_ss .= '<div class="cell">';
            $light_ss .= '<div class="icon">';
                $light_ss .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $light_ss .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $light_ss .= '<div class="element-star star-' . $star . '">';
                    $light_ss .= '<div class="element-icon element-' . $element . '"></div>';
                $light_ss .= '</div>';
            $light_ss .= '</div>';
        $light_ss .= '</div>';
    }
}

//Fire SS
$sql = "SELECT * FROM toons WHERE grade='ss' AND element='1'";
$result = $connection->query($sql);
if($result->num_rows >= 1){
    $fire_ss = '';
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $fire_ss .= '<div class="cell">';
            $fire_ss .= '<div class="icon">';
                $fire_ss .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $fire_ss .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $fire_ss .= '<div class="element-star star-' . $star . '">';
                    $fire_ss .= '<div class="element-icon element-' . $element . '"></div>';
                $fire_ss .= '</div>';
            $fire_ss .= '</div>';
        $fire_ss .= '</div>';
    }
}

//Water SS
$sql = "SELECT * FROM toons WHERE grade='ss' AND element='2'";
$result = $connection->query($sql);
if($result->num_rows >= 1){
    $water_ss = '';
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $water_ss .= '<div class="cell">';
            $water_ss .= '<div class="icon">';
                $water_ss .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $water_ss .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $water_ss .= '<div class="element-star star-' . $star . '">';
                    $water_ss .= '<div class="element-icon element-' . $element . '"></div>';
                $water_ss .= '</div>';
            $water_ss .= '</div>';
        $water_ss .= '</div>';
    }
}

//Thunder SS
$sql = "SELECT * FROM toons WHERE grade='ss' AND element='3'";
$result = $connection->query($sql);
if($result->num_rows >= 1){
    $thunder_ss = '';
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $thunder_ss .= '<div class="cell">';
            $thunder_ss .= '<div class="icon">';
                $thunder_ss .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $thunder_ss .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $thunder_ss .= '<div class="element-star star-' . $star . '">';
                    $thunder_ss .= '<div class="element-icon element-' . $element . '"></div>';
                $thunder_ss .= '</div>';
            $thunder_ss .= '</div>';
        $thunder_ss .= '</div>';
    }
}

//Wind SS
$sql = "SELECT * FROM toons WHERE grade='ss' AND element='4'";
$result = $connection->query($sql);
if($result->num_rows >= 1){
    $wind_ss = '';
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        $img = $row['img'];
        $job = $row['job'];
        $star = $row['star'];
        $element = $row['element'];
        $grade = $row['grade'];

        $wind_ss .= '<div class="cell">';
            $wind_ss .= '<div class="icon">';
                $wind_ss .= '<img src="img/toons/' . $img . '" alt="alfr" class="toon">';
                $wind_ss .= '<img src="img/jobs/' . $job . '" alt="job-icon" class="job-icon">';
                $wind_ss .= '<div class="element-star star-' . $star . '">';
                    $wind_ss .= '<div class="element-icon element-' . $element . '"></div>';
                $wind_ss .= '</div>';
            $wind_ss .= '</div>';
        $wind_ss .= '</div>';
    }
}

function pullContent($grd,$ele) {

    global $connection;
    $sql = "SELECT * FROM toons WHERE grade='".$grd."' AND element='".$ele."'";
    $result = $connection->query($sql);
    $cell_data = '';
    if($result->num_rows >= 1){

        
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $name = $row['name'];
            $img = $row['img'];
            $job = $row['job'];
            $star = $row['star'];
            $element = $row['element'];
            $grade = $row['grade'];

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



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Mikes Dumb</title>
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