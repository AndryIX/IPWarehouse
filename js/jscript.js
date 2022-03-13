$(document).ready(function() {
    $('.burger,.showsidebar, .hidesidebar').click(function(event) {
        $('.burger, .menu,.showsidebar, .hidesidebar').toggleClass('active');
        $('body').toggleClass('lock');
    });
});

