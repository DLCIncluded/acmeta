$(".icon").click(function(){
    console.log("yes");
    var cell = $(this).attr("cellid");
    window.location.href='tooninfo.php?id='+cell;
}); 