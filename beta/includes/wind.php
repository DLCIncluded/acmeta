    <div class="center-text">
        <h2 class="center-text">Wind Units <img src="img/assets/icons8-menu-24.png" height="16" class="select"></h2>
        <div class="select-menu">
            <?php
            if(isset($_GET['display'])){
                if($_GET['display']=="single"){
            ?>
            <h3 class=""><a href="beta.php?display=single&row=6">Dark Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=5">Light Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=1">Fire Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=2">Water Units</a></h3>
            <h3 class=""><a href="beta.php?display=single&row=3">Thunder Units</a></h3>
            <h3 class=""><a href="beta.php?display=full">All Units</a></h3>
            <?php 
                }
            }
            ?>
        </div>
        
    </div>
    <table class="">
        <tr>
            <td class="">SS</td>
            <td class="wind-sortable sortable" grade="ss">
                <?php echo pullContent("ss", "4");//wind_ss ?>
            </td>
        </tr>
        <tr>
            <td class="">S</td>
            <td class="wind-sortable sortable" grade="s">
                <?php echo pullContent("s", "4");//wind_s ?>
            </td>
        </tr>
        <tr>
            <td class="">A</td>
            <td class="wind-sortable sortable" grade="a">
                <?php echo pullContent("a", "4");//wind_a ?>
            </td>
        </tr>
        <tr>
            <td class="">B</td>
            <td class="wind-sortable sortable" grade="b">
                <?php echo pullContent("b", "4");//wind_b ?>
            </td>
        </tr>
        <tr>
            <td class="">C</td>
            <td class="wind-sortable sortable" grade="c">
                <?php echo pullContent("c", "4");//wind_c ?>
            </td>
        </tr>
        <tr>
            <td class="">D</td>
            <td class="wind-sortable sortable" grade="d">
                <?php echo pullContent("d", "4");//wind_d ?>
            </td>
        </tr>
    </table>