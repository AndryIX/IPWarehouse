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

    if (inlogin.trim() == "") {
        alert("Введите логин!");
        return false;
    }
    if (inpassword.trim() == "") {
        alert("Введите пароль!");
    }
}

function validateFormAddUser() {
    var addfio = document.forms["fadduser"]["add_fio"].value;
    var addlogin = document.forms["fadduser"]["add_login"].value;
    var addpassword = document.forms["fadduser"]["add_password"].value;
    var confirmpass = document.forms["fadduser"]["confirm_pass"].value;

    if (addfio.trim() == "") {
        alert("Заполните поле: ФИО!");
        return false;
    }
    if (addlogin.trim() == "") {
        alert("Заполните поле: Логин!");
        return false;
    }
    if (addpassword.trim() == "") {
        alert("Заполните поле: Пароль!");
        return false;
    }
    if (confirmpass.trim() == "") {
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

    if (addrole.trim() == "") {
        alert("Заполните поле: Роль!");
        return false;
    }
}

function validateFormAddApp() {
    var addapp = document.forms["faddapp"]["add_app_name"].value;
    var addurl = document.forms["faddapp"]["add_app_url"].value;

    if (addapp.trim() == "") {
        alert("Заполните поле: Название приложения!");
        return false;
    }
    if (addurl.trim() == "") {
        alert("Заполните поле: Url адрес!");
        return false;
    }
}

function validateFormSells() {
    var incount = document.forms["f_add_invoice"]["count"].value;
    var inprice = document.forms["f_add_invoice"]["price"].value;

    if (incount.trim() == "") {
        alert("Введите Количество!");
        return false;
    }
    if (inprice.trim() == "") {
        alert("Введите цену!");
        return false;
    }
}