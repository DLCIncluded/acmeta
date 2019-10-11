<?PHP
include("utils.php");
if($loggedIn=="true"){

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
    .container {
        position: relative;
        width: 500px;
        min-width:500px;
        margin:auto;
    }
</style>

<div class="container">
    <form class="new-toon" action="#" method="POST">
        <h1>
            Add new toon
        </h1>
        <p>Click here to go back: <a href="index.php">Home</a></p>
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
        <br>
        Grade:
        <select name="grade">
            <option value="ss">SS</option>
            <option value="s">S</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>**will be changable later**
        <br>
        <br>

        <input type="submit" value="Create">
    </form>
</div>

<?PHP
	}else{
?>
	<p>You must be <a href="login.php">logged</a> in to view this page.</p>
<?PHP
    }
    include("bottom.php");
?>