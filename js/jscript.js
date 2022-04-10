$(document).ready(function() {
    $('.burger').click(function(event) {
        $('.burger, .menu').toggleClass('active');
        $('body').toggleClass('lock');
    });
});

$(document).ready(function() {
    $('.showsidebar, .hidesidebar').click(function(event) {
        $('.sidebar, .showsidebar, .hidesidebar').toggleClass('active');
    });
});



function validateFormSells() {
    var incount = document.forms["f_add_invoice"]["count"].value;
    var inprice = document.forms["f_add_invoice"]["price"].value;

    if (incount == "") {
        alert("Введите Количество!");
        return false;
    }
    if (inprice == "") {
        alert("Введите цену!");
        return false;
    }
}

