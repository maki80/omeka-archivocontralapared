$(function() {
    var logo = $(".hidden-logo");
    var scrolling = false;
    var small = false;
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 100 && !scrolling && !small) {
            scrolling = true;
            window.setTimeout(function() {
              logo.fadeOut( 2300).removeClass('hidden-logo').addClass("show-logo");
              scrolling = false;
              small = true;
            }, 300);
            
        } else if(!scrolling && small) {
            scrolling = true;
            window.setTimeout(function() {
              logo.fadeIn( 300).removeClass('show-logo').addClass("hidden-logo");
              scrolling = false;
              small = false;
            }, 300);
        }    
      
    });
});