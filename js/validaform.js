function validarTelefone() {
    var telefoneInput = document.getElementById('telefone');
    var telefone = telefoneInput.value;

    // Expressão regular para validar telefone
    var regexTelefone = /^\d{11}$/;

    if (!regexTelefone.test(telefone)) {
      alert('Por favor, insira um telefone válido no formato (apenas números)');
      telefoneInput.focus();
      return false;
    }

    return true;
}
function validarEmail() {
    var emailInput = document.getElementById('email');
    var email = emailInput.value;

    // Expressão regular para validar e-mail
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexEmail.test(email)) {
      alert('Por favor, insira um endereço de e-mail válido.');
      emailInput.focus();
      return false;
    }

    return true;
  }
  function validarNome() {
    var nomeInput = document.getElementById('nome');
    var nome = nomeInput.value;

    // Expressão regular para validar que o nome não contenha números
    var regexNome = /^[^\d]+$/;

    if (!regexNome.test(nome)) {
      alert('Por favor, insira um nome válido');
      nomeInput.focus();
      return false;
    }

    return true;
  }

  function exibirMensagem() {
    alert('Mensagem enviada com sucesso! Agradecemos o seu contato.');
}

document.getElementById('meuFormulario').addEventListener('submit', function (event) {
  event.preventDefault();

  var telefoneValido = validarTelefone();
  var emailValido = validarEmail();
  var nomeValido = validarNome();

  // Se todas as validações passarem, exibe a mensagem e envia os dados ao servidor
  if (telefoneValido && emailValido && nomeValido) {
    // Exibe a mensagem
    exibirMensagem();

    // Obtém os dados do formulário
    var formData = new FormData(this);

    fetch('../salvar_formulario.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      console.log('Resposta do servidor:', data);
    })
    .catch(error => {
      console.error('Erro na solicitação AJAX:', error);
    });
  }
});