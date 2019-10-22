    <div class="center-text">
        <h2 class="">Dark Units <img src="img/assets/icons8-menu-24.png" height="16" class="select"></h2>
        <div class="select-menu">
            <?php
            if(isset($_GET['display'])){
                if($_GET['display']=="full"){
            ?>
            <h3 class=""><a href="beta.php?display=single&row=6">Dark Units</a></h3>
            <?php
                }
            }
            ?>
            <h3 class=""><a href="beta.php?display=single&row=5">Light Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=1">Fire Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=2">Water Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=3">Thunder Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=4">Wind Units</a></h3>
            <?php
            if(isset($_GET['display'])){
                if($_GET['display']=="full"){
                }else{
                ?>
                <h3 class=""><a href="beta.php?display=full">All Units</a></h3>
                <?php
                }
            }else{
                ?>
                <h3 class=""><a href="beta.php?display=full">All Units</a></h3>
                <?php
            }
            ?>
        </div>
    </div>
    
    <table class="reorder-gallery dark-head">
        <tr>
            <td class="">SS</td>
            <td class="dark-sortable sortable" grade="ss">
                <?php echo pullContent("ss", "6");//dark_ss ?>
            </td>
        </tr>
        <tr>
            <td class="">S</td>
            <td class="dark-sortable sortable" grade="s">
                <?php echo pullContent("s", "6");//dark_s ?>
            </td>
        </tr>
        <tr>
            <td class="">A</td>
            <td class="dark-sortable sortable" grade="a">
                <?php echo pullContent("a", "6");//dark_a ?>
            </td>
        </tr>
        <tr>
            <td class="">B</td>
            <td class="dark-sortable sortable" grade="b">
                <?php echo pullContent("b", "6");//dark_b ?>
            </td>
        </tr>
        <tr>
            <td class="">C</td>
            <td class="dark-sortable sortable" grade="c">
                <?php echo pullContent("c", "6");//dark_c ?>
            </td>
        </tr>
        <tr>
            <td class="">D</td>
            <td class="dark-sortable sortable" grade="d">
                <?php echo pullContent("d", "6");//dark_d ?>
            </td>
        </tr>
    </table>
