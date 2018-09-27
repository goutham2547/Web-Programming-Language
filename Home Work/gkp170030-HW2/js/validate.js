$(document).ready(function () {
    var element = document.createElement("span");
    element.setAttribute("id", "usn");
    $(element).insertAfter("#username");

    element = document.createElement("span");
    element.setAttribute("id", "pswd");
    $(element).insertAfter("#password");

    element = document.createElement("span");
    element.setAttribute("id", "mail1");
    $(element).insertAfter("#email");

    $("#username").focusin(function () {
        $("#usn").empty().removeClass("ok").removeClass("error");
        var element = document.getElementById("usn")
        var node = document.createTextNode("infoMessage: only alphabetical or numeric characters");
        element.appendChild(node);
        $(element).addClass("info");
    });
    $("#username").focusout(function () {
        $("#usn").empty().removeClass("info").removeClass("ok").removeClass("error");
        var username = $("#username");
        if (username.val().length != 0) {
            var pattern = /^[a-zA-Z0-9]+$/;
            if (username.val().match(pattern)) {
                var element = document.getElementById("usn");
                var node = document.createTextNode("OK");
                element.appendChild(node);
                $(element).addClass("ok");
            } else {
                var element = document.getElementById("usn");
                var node = document.createTextNode("Error");
                element.appendChild(node);
                $(element).addClass("error");
            }
        }
    });

    $("#password").focusin(function () {
        $("#pswd").empty().removeClass("ok").removeClass("error");
        var element = document.getElementById("pswd");
        var node = document.createTextNode("infoMessage: atleast 8 characters");
        element.appendChild(node);
        $(element).addClass("info");
    });
    $("#password").focusout(function () {
        $("#pswd").empty().removeClass("info").removeClass("ok").removeClass("error");
        var password = $("#password");
        if (password.val().length != 0) {
            if (password.val().length >= 8) {
                var element = document.getElementById("pswd");
                var node = document.createTextNode("OK");
                element.appendChild(node);
                $(element).addClass("ok");
            } else {
                var element = document.getElementById("pswd");
                var node = document.createTextNode("Error");
                element.appendChild(node);
                $(element).addClass("error");
            }
        }
    });

    $("#email").focusin(function () {
        $("#mail1").empty().removeClass("ok").removeClass("error");
        var element = document.getElementById("mail1");
        var node = document.createTextNode("infoMessage: xxxx@yyyy.zzz");
        element.appendChild(node);
        $(element).addClass("info");
    });
    $("#email").focusout(function () {
        $("#mail1").empty().removeClass("info").removeClass("ok").removeClass("error");
        var email = $("#email");
        if (email.val().length != 0) {
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3}$/;
            if (pattern.test(email.val())) {
                var element = document.getElementById("mail1");
                var node = document.createTextNode("OK");
                element.appendChild(node);
                $(element).addClass("ok");
            } else {
                var element = document.getElementById("mail1");
                var node = document.createTextNode("Error");
                element.appendChild(node);
                $(element).addClass("error");
            }
        }
    });
});