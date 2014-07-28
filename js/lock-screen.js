$("#lock").on('click',function(){
    $(this).addClass("off");
}).on('webkitTransitionEnd',function(){
    if ($(this).hasClass("off")) $(this).hide();
});

$(document).ready(function(){
	$(document).idleTimer(10*1000);
	
	$(document).on("idle.idleTimer", function (event, elem, obj) {
          showLockScreen();
     });
});

$("#lock_button").on('click', showLockScreen);

function showLockScreen() {
	$("#lock.off").show();
    $("body").redraw();
    $("#lock.off").removeClass("off");
}