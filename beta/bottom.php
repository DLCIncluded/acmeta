<script src="js/menu.js"></script>


<script>

<?php 
if($loggedIn == "true"){
    if($rank >= 2){//only run this js if they're logged in and an editor or higher
?>

// Connecting the sortables with the columns so we can drag-drop grade change
$( ".dark-sortable" ).sortable({
    connectWith: ".dark-sortable"
});
$( ".light-sortable" ).sortable({
    connectWith: ".light-sortable"
});
$( ".fire-sortable" ).sortable({
    connectWith: ".fire-sortable"
});
$( ".water-sortable" ).sortable({
    connectWith: ".water-sortable"
});
$( ".thunder-sortable" ).sortable({
    connectWith: ".thunder-sortable"
});
$( ".wind-sortable" ).sortable({
    connectWith: ".wind-sortable"
});

// when we move, run the updates and shoot to the updateorder.php handler
$(document).ready(function(){	
    $(".icon").click(function(){
        console.log("yes");
        var cell = $(this).attr("cellid");
        window.location.href='tooninfo.php?id='+cell;
    }); 
    $(".sortable").sortable({
        helper : 'clone',
		update: function(event,ui) {
            if (this === ui.item.parent()[0]) {
                if (ui.sender !== null) {
                    // the movement was from one container to another
                    // not sure if we need the ui.sender any more but figured why not...
                    updateGrade();
                    console.log("changing grade");
                    updateOrder();
                    console.log("changing order");
                } else {
                    // the move was performed within the same container 
                    updateOrder();
                    console.log("changing order");
                }
            }
        }
    });  
      
});


function updateOrder() {	
	var item_order = new Array();
	$('.cell').each(function() {
        //create array with the cells id to send 
		item_order.push($(this).attr("cellid"));
	});
	var order_string = 'order='+item_order;
	$.ajax({
		type: "GET",
		url: "updateorder.php",
		data: order_string,
		cache: false,
		success: function(data){	
            console.log(data);		
		}
	});
}

function updateGrade() {	
	var item_grade = new Array();
    var grade, id;
	$('.cell').each(function() {
        //get the cellid and grade and put them into the array/object
        grade = $(this).parent().attr("grade");
        cellid = $(this).attr("cellid");
		item_grade.push({ id : cellid, grade : grade });
        json_grade = JSON.stringify(item_grade);
	});
    
	$.ajax({
		type: "POST",
		url: "updateorder.php",
		data:  {data : json_grade},
		cache: false,
		success: function(){			
           console.log("Updated Database");
		}
	});
    
}
<?php
    }else{
?>
$(document).ready(function(){	
    $(".icon").click(function(){
        console.log("yes");
        var cell = $(this).attr("cellid");
        window.location.href='tooninfo.php?id='+cell;
    }); 
}); 
<?php
    }
}else{
        ?>
$(document).ready(function(){	
    $(".icon").click(function(){
        console.log("yes");
        var cell = $(this).attr("cellid");
        window.location.href='tooninfo.php?id='+cell;
    }); 
}); 
<?php
    
}
?>
</script>