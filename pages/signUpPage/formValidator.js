document.addEventListener('DOMContentLoaded', function () {
  const cpfInput = document.getElementById('cpf');
  const telefoneInput = document.getElementById('telefone');
  const emailInput = document.getElementById('email');
  const cadastrar = document.getElementById('cadastrar');
  const form = document.getElementById('signupForm');

  cpfInput.addEventListener('input', function () {
    let value = cpfInput.value;
    value = value.replace(/\D/g, ''); 
    if (value.length > 11) value = value.slice(0, 11);
    value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
    value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); 
    cpfInput.value = value; 
  });

  telefoneInput.addEventListener('input', function () {
    let value = telefoneInput.value;
    value = value.replace(/\D/g, '');
    if (value.length > 11) value = value.slice(0, 11);
    value = value.replace(/(\d{2})(\d)/, '($1) $2'); 
    value = value.replace(/(\d{5})(\d)/, '$1-$2');
    telefoneInput.value = value;
  });


  function validarCampos() {
    let erros = [];
    const cpfPattern = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
    if (!cpfPattern.test(cpfInput.value)) {
      erros.push('CPF inválido. Formato: 000.000.000-00');
    }

    const telefonePattern = /^\(\d{2}\) \d{5}-\d{4}$/;
    if (!telefonePattern.test(telefoneInput.value)) {
      erros.push('Telefone inválido. Formato: (XX) XXXXX-XXXX');
    }

    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    if (!emailPattern.test(emailInput.value)) {
      erros.push('E-mail inválido. Formato: usuario@dominio.com');
    }
    return erros;
  }

  cadastrar.addEventListener('click', function (event) {
    event.preventDefault(); 
    const erros = validarCampos();
    if (erros.length > 0) {
      alert(erros.join('\n')); // exibe os erros
    } else {
      form.submit(); // formulário enviado com sucesso
    }
  });
});