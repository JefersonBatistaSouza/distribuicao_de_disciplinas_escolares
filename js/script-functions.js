//Validação E-mail do usuário
function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function showModal(id) {
    $('#myModal').modal('show');
    $('#idModal').val($("#idtae" + id).text());
    $('#nameModal').val($(".nometae" + id).text());
    $('#emailModal').val($(".emailtae" + id).text());
    $("#selectedModal").val($("#tipoacessotae" + id).text());
    var radios = document.getElementsByName("flexRadioDefault");
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].value === $("#accesstae" + id).text()) {
            radios[i].checked = true;
            break;
        }
    }
}