<?php
include("dbConn.php");
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $img=$_POST['img'];
    $job=$_POST['job'];
    $star=$_POST['star'];
    $element=$_POST['element'];
    $grade=$_POST['grade'];
    $sql = "INSERT INTO toons (name,img,job,star,element,grade) VALUES ('$name', '$img', '$job', '$star', '$element', '$grade')";
    if($connection->query($sql)){
        echo "successfully created toon";
    }else{
        echo $connection->error;
    }

}
?>

    <link rel="stylesheet" href="css/styles.css">
<style>

.new-toon {
    margin-left:20px;
    margin-top:20px;
}

[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}
[type=radio]:checked + div {
  outline: 2px solid #f00;
}

.scrollbox {
    height: 300px;
    width:455px;
    display:flex;
    flex-wrap: wrap;
    overflow: scroll;
}

.scrollbox img {
    margin: 2px;
}

.element-select {
    display:flex;
    flex-wrap: wrap;
    margin-bottom:20px;
    margin-top:20px;
    align-content: center;
}

.element-select div {
    margin: 2px;
}

.star-box {
    display:flex;
    margin-top:20px;
}

.stars-1 {
    background-image: url('img/assets/unit-stars.png');
    background-position: 0 0;
    width:60px;
    height:20px;
    background-repeat: no-repeat;
    background-size: 600%;
    margin-bottom:5px;
    margin-left:10px;
    padding:0;
}

.stars-2 {
    background-image: url('img/assets/unit-stars.png');
    background-position: 20% 0;
    width:60px;
    height:25px;
    background-repeat: no-repeat;
    background-size: 600%;
    margin-bottom:5px;   
    margin-left:10px;
    height:20px;
}

.stars-3 {
    background-image: url('img/assets/unit-stars.png');
    background-position: 40% 0;
    width:60px;
    height:20px;
    background-repeat: no-repeat;
    background-size: 600%;
    margin-bottom:5px;
    margin-left:10px;
}

.stars-4 {
    background-image: url('img/assets/unit-stars.png');
    background-position: 60% 0;
    width:60px;
    height:20px;
    background-repeat: no-repeat;
    background-size: 600%;
    margin-bottom:5px;
    margin-left:10px;
}

.stars-5 {
    background-image: url('img/assets/unit-stars.png');
    background-position: 80% 0;
    width:60px;
    height:20px;
    background-repeat: no-repeat;
    background-size: 600%;
    margin-bottom:5px;
    margin-left:10px;
}

</style>



<form class="new-toon" action="#" method="POST">
<h1>
    Add new toon
</h1>
<input type="text" name="name" placeholder="Name" />


<div class="element-select">
    Element:
    <label><input type="radio" name="element" value="1"></input><div class="fire"> </div></label>
    <label><input type="radio" name="element" value="2"></input><div class="water"> </div></label>
    <label><input type="radio" name="element" value="3"></input><div class="thunder"> </div></label>
    <label><input type="radio" name="element" value="4"></input><div class="wind"> </div></label>
    <label><input type="radio" name="element" value="5"></input><div class="light"> </div></label>
    <label><input type="radio" name="element" value="6"></input><div class="dark"> </div></label>
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
        <label><input type="radio" name="img" value="<?php echo basename($filename) ?>"><img src="<?php echo $filename ?>" alt="" width="58px" height="58px"><br></label>
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
        <label><input type="radio" name="job" value="<?php echo basename($filename) ?>"><img src="<?php echo $filename ?>" alt="" width="48px" height="48px"><br></label>
        <?php
     }   
 }
?>
</div>

 
<div class="star-box">
Star:
    <label><input type="radio" name="star" value="1"></input><div class="stars-1"> </div></label>
    <label><input type="radio" name="star" value="2"></input><div class="stars-2"> </div></label>
    <label><input type="radio" name="star" value="3"></input><div class="stars-3"> </div></label>
    <label><input type="radio" name="star" value="4"></input><div class="stars-4"> </div></label>
    <label><input type="radio" name="star" value="5"></input><div class="stars-5"> </div></label>
</div>

Grade:
<select name="grade">
    <option value="SS">SS</option>
    <option value="S">S</option>
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
    <option value="d">D</option>
</select>**will be changable later**
<br>
<br>

<input type="submit">
</form>
<br>
<br>