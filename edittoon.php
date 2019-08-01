<?php
ini_set('display_errors', 1);
include_once("dbConn.php");

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
            ?>

    <form class="new-toon" action="#" method="POST">
        <h1>
            Edit Toon (not functional yet)
        </h1>
        <p><a href="index.php">Home</a> | <a href="tooninfo.php?id=<?php echo $id; ?>">Info Page</a></p>
        <input type="text" name="name" placeholder="Name" />


        <div class="element-select">
            Element:
            <label><input type="radio" name="element" value="1" <?php echo $dark; ?>></input><div class="fire"> </div></label>
            <label><input type="radio" name="element" value="2" <?php echo $water; ?>></input><div class="water"> </div></label>
            <label><input type="radio" name="element" value="3" <?php echo $thunder; ?>></input><div class="thunder"> </div></label>
            <label><input type="radio" name="element" value="4" <?php echo $wind; ?>></input><div class="wind"> </div></label>
            <label><input type="radio" name="element" value="5" <?php echo $light; ?>></input><div class="light"> </div></label>
            <label><input type="radio" name="element" value="6" <?php echo $dark; ?>></input><div class="dark"> </div></label>
        </div>

        Image:
        <div class="scrollbox">
        <?php
        
        $fileList = glob('img/toons/*');
        foreach($fileList as $filename){
            //Use the is_file function to make sure that it is not a directory.
            if(is_file($filename)){

                //echo "<option value='".basename($filename)."'>", basename($filename), '</option>'; 
                ?>
                <label><input type="radio" name="img" value="<?php echo basename($filename); ?>" <?php if($img == basename($filename)){ echo "checked"; }?>><img src="<?php echo $filename ?>" alt="" width="58px" height="58px"><br></label>
                <?php
            }   
        }
        ?>
        </div>
        <br>


        Job:
        <div class="scrollbox">
        <?php
        
        $fileList = glob('img/jobs/*');
        foreach($fileList as $filename){
            //Use the is_file function to make sure that it is not a directory.
            if(is_file($filename)){

                //echo "<option value='".basename($filename)."'>", basename($filename), '</option>'; 
                ?>
                <label><input type="radio" name="job" value="<?php echo basename($filename) ?>" <?php if($img == basename($filename)){ echo "checked"; }?>><img src="<?php echo $filename ?>" alt="" width="48px" height="48px"><br></label>
                <?php
            }   
        }
        ?>
        </div>

        
        <div class="star-box">
        Star:
            <label><input type="radio" name="star" value="1" ></input><div class="stars-1"> </div></label>
            <label><input type="radio" name="star" value="2" <?php echo $s2; ?>></input><div class="stars-2"> </div></label>
            <label><input type="radio" name="star" value="3" <?php echo $s3; ?>></input><div class="stars-3"> </div></label>
            <label><input type="radio" name="star" value="4" <?php echo $s4; ?>></input><div class="stars-4"> </div></label>
            <label><input type="radio" name="star" value="5" <?php echo $s5; ?>></input><div class="stars-5"> </div></label>
        </div>
        <br>
        Grade:
        <select name="grade">
            <option value="ss" <?php echo $ss; ?>>SS</option>
            <option value="s" <?php echo $s; ?>>S</option>
            <option value="a" <?php echo $a; ?>>A</option>
            <option value="b" <?php echo $b; ?>>B</option>
            <option value="c" <?php echo $c; ?>>C</option>
            <option value="d" <?php echo $d; ?>>D</option>
        </select>**will be changable later**
        <br>
        <br>

        <input type="submit" value="Save Changes">
    </form>
</div>