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

function validateFormAuth() {
    var inlogin = document.forms["fauth"]["login"].value;
    var inpassword = document.forms["fauth"]["password"].value;

    if (inlogin == "") {
        alert("Введите логин!");
        return false;
    }
    if (inpassword == "") {
        alert("Введите пароль!");
    }
}

function validateFormAddUser() {
    let addfio = document.forms["fadduser"]["add_fio"].value;
    let addlogin = document.forms["fadduser"]["add_login"].value;
    let addpassword = document.forms["fadduser"]["add_password"].value;
    let confirmpass = document.forms["fadduser"]["confirm_pass"].value;

    if (addfio == "") {
        alert("Заполните поле: ФИО!");
        return false;
    }
    if (addlogin == "") {
        alert("Заполните поле: Логин!");
        return false;
    }
    if (addpassword == "") {
        alert("Заполните поле: Пароль!");
        return false;
    }
    if (confirmpass == "") {
        alert("Заполните поле: Подтвердите пароль!");
        return false;
    }
    if (addpassword !== confirmpass) {
        alert("Пароли не совпадают!");
        return false;
    }
}

function validateFormAddRole() {
    var addrole = document.forms["faddrole"]["add_role"].value;

    if (addrole == "") {
        alert("Заполните поле: Роль!");
        return false;
    }
}

function validateFormAddApp() {
    var addapp = document.forms["faddapp"]["add_app_name"].value;
    var addurl = document.forms["faddapp"]["add_app_url"].value;

    if (addapp == "") {
        alert("Заполните поле: Название приложения!");
        return false;
    }
    if (addurl == "") {
        alert("Заполните поле: Url адрес!");
        return false;
    }
}

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