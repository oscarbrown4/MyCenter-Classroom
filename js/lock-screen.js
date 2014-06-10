$("#lock").on('click',function(){
    $(this).addClass("off");
}).on('webkitTransitionEnd',function(){
    if ($(this).hasClass("off")) $(this).hide();
});