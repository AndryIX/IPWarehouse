$(document).ready(function() {
    $('.burger').click(function(event) {
        $('.burger, .menu').toggleClass('active');
        $('body').toggleClass('lock');
    });
});

$(document).ready(function() {
    $('.showsidebar, .hidesidebar').click(function(event) {
        $('.sidebar, .showsidebar, .hidesidebar').toggleClass('active');
        $('body').toggleClass('lock');
    });
});