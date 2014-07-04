$("#lock").on('click',function(){
    $(this).addClass("off");
}).on('webkitTransitionEnd',function(){
    if ($(this).hasClass("off")) $(this).hide();
});

$(document).ready(function(){
	$(document).idleTimer(60*1000);
	
	$(document).on("idle.idleTimer", function (event, elem, obj) {
          $("#lock.off").show();
          $("body").redraw();
          $("#lock.off").removeClass("off");
     });
});