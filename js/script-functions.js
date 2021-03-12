//Validação E-mail do usuário
function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

