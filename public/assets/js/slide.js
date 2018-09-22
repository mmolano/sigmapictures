    
$(document).on('ready', function() {
     var element = $('#myCarousel');

    if (element.length) {
        element.carousel();
        var winWidth = $(window).innerWidth();
        $(window).resize(function () {
            if ($(window).innerWidth() < winWidth) {
                $('.carousel-inner>.item>img').css({
                    'min-width': winWidth, 'width': winWidth
                });
            } else {
                winWidth = $(window).innerWidth();
                $('.carousel-inner>.item>img').css({
                    'min-width': '', 'width': ''
                });
            }
        });
    }
});
