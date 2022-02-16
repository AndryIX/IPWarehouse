$(document).ready(function(){
    $('.burger').click(function(event){
        $('.burger, .menu').toggleClass('active');
        $('body').toggleClass('lock');
    });
});