/* 
 * Requisição de autenticação ao usuário
 */

function authenticate() {
    var typeAccess = $("#tipo").val();
    var email = $("#email").val();
    var password = md5($("#password").val());
    console.log(password);
    if (validateEmail(email) === true && password !== "d41d8cd98f00b204e9800998ecf8427e")
    {
        var dados = {
            typeAccess: typeAccess,
            email: email,
            password: password
        };
        //console.log(dados['email'], dados['password'], dados['typeAccess']);
        $.ajax({type: 'post', url: './controller/authenticator.php', data: dados,
            beforeSend: function () {
                $("#btn-acessar").val("Autenticando...");
            },
            success: function (response) {
                if (response === "logged") {
                    window.location.href = "./home.php";
                } else {
                    $("#msg-login").html(response);
                    $("#msg-login").css("display", "block");
                }
            },
            complete: function () {
                $("#btn-acessar").val("Acessar");
               /* setTimeout(function () {
                    $("#msg-login").html("");
                    $("#msg-login").css("display", "none");
                }, 3000);*/
            }
        });
    } else {
        $("#msg-login").html("<div class='alert alert-danger' role='alert'>Por favor, preencha os dados corretamente</div>");
        $("#msg-login").css("display", "block");

        setTimeout(function () {
            $("#msg-login").html("");
            $("#msg-login").css("display", "none");
        }, 2000);
    }
}

function sendEmail() {
    var typeAccess = $("#tipo").val();
    var email = $("#email").val();
    if (validateEmail(email) === true) {
        var dados = {
            typeAccess: typeAccess,
            email: email
        };
        $.ajax({type: 'post', url: './controller/generateToken.php', data: dados,
            beforeSend: function () {
                $("#btn-sendEmail").val("Enviando...");
            },
            success: function (response) {
                $("#msg-recovery").html(response);
                console.log(response);
            },
            complete: function () {
                $("#btn-sendEmail").val("Recuperar");
                /*setTimeout(function () {
                 $("#msg-recovery").html("");
                 //$("#msg-recovery").css("display", "none");
                 }, 3000);
                 * 
                 */
            }
        });
    } else {
        $("#msg-recovery").html("<div class='alert alert-danger' role='alert'>Por favor, preencha os dados corretamente</div>");
    }
}

function updatePassword() {
    var email = $("#email").val();
    var typeAccess = $("#typeAccess").val();
    var password = md5($("#newPassword").val());
    var confpassword = md5($("#confPassword").val());
    if (validateEmail(email) === true) {
        var dados = {
            typeAccess: typeAccess,
            email: email,
            password: password,
            confpassword: confpassword
        };
        console.log(dados);
        $.ajax({type: 'post', url: './controller/update_password.php', data: dados,
            beforeSend: function () {
                $("#btn-password").val("Alterando...");
            },
            success: function (response) {
                $("#msg-newpassword").html(response);
            },
            complete: function () {
                $("#btn-password").val("Alterar");
            }
        });
    }
}
