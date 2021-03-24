/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
selectTae("SelectedAll", "");
function insertTae() {
    var nome = $('#nome').val();
    var email = $('#email').val();
    if (validateEmail(email) === true) {
        dados = {
            name: nome,
            email: email
        };
        $.ajax({type: 'post', url: 'controller/objects/tae/insert_tae.php', data: dados,
            beforeSend: function () {
                $('#btn-addTae').val("Adicionando");
            },
            success: function (response) {
                $('#msg-insert-tae').html(response);
            },
            error: function (response) {
                $('#msg-insert-tae').html(response);
            },
            complete: function () {
                $('#btn-addTae').val("Adicionar");
                selectTae("LastRecord", "");
                setTimeout(function () {
                    $("#msg-insert-tae").html("");
                    // $("#msg-login").css("display", "none");
                }, 3000);
            }
        });
    } else {
        $('#msg-insert-tae').html("<div class='alert alert-danger' role='alert'>Por favor, preencha os dados corretamente</div>");
    }
}

function selectTae(key, value) {
    var pesquisa = value;
    dados = {pesquisa: pesquisa, key: key};
    $.ajax({type: 'post', url: 'controller/objects/tae/select_tae.php', data: dados,
        beforeSend: function () {
            $('#tae-response').html("<p style='color:#ff0000'>Aguarde, carregando lista...</p>");
        },
        success: function (response) {
            $('#tae-response').html(response);
        }
    });
}

// Ao Digitar qualquer tecla no Input executa a Função
$("#pesquisa").on("keyup", function () {
    // Deixa em variavel o valor que está sendo digitado no input (coloca em minusculo)
    let value = $(this).val();
    selectTae("SelectedByName", value);
});

function updateTae() {
    dados = {
        idtae: $("#idModal").val(),
        name: $("#nameModal").val(),
        email: $("#emailModal").val(),
        access: $("input[type='radio']:checked").val(),
        typeAccess: $("#selectedModal").val()
    };
    console.log(dados.idtae);
    $.ajax({type: 'post', url: 'controller/objects/tae/update_tae.php', data: dados,
        beforeSend: function () {
            $('#msg-modal').html("<p style='color:#ff0000'>Aguarde, Atualizando...</p>");
        },
        success: function (response) {
            $('#msg-modal').html(response);
        },
        complete: function () {
            selectTae("SelectById", dados.idtae);
            setTimeout(function () {
                $("#msg-modal").html("");
                // $("#msg-login").css("display", "none");
            }, 2000);
        }

    });
}

function deleteTae(id){
   if(confirm("Deseja realmente excluir o registro?") === true){
       dados = {
         idtae:$("#idtae" + id).text()
       };
       $.ajax({type: 'post', url: 'controller/objects/tae/delete_tae.php', data: dados,
        beforeSend: function () {
            $('#tae-response').html("<p style='color:#ff0000'>Aguarde, Deletando registro...</p>");
        },
        success: function (response) {
            $('#tae-response').html(response);
        },
        complete: function () {
            setTimeout(function () {
                selectTae("SelectedAll","");
            }, 1000);
        }

    });
   }
}

