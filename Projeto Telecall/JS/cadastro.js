function validaForm() {
  var nomeInput = document.getElementById("nome");
  var nomeError = document.getElementById("nomeError");
  var labelNome = document.getElementById("labelNome");
  var dataInput = document.getElementById("data");

  var dataError = document.getElementById("dataError");
  var labelDate = document.getElementById("labelDate");
  
  var maternoInput = document.getElementById("materno")
  var labelMaterno = document.getElementById("labelMaterno");
  var maternoError = document.getElementById("maternoError");

  var cpfInput = document.getElementById("cpf");
  var labelCPF = document.getElementById("labelCPF");
  var cpfError = document.getElementById("cpfError");
  
  var celInput = document.getElementById("cel");
  var labelCel = document.getElementById("labelCel");
  var celError = document.getElementById("celError");
  
  var fixoInput = document.getElementById("fixo");
  var labelFixo = document.getElementById("labelFixo");
  var fixoError = document.getElementById("fixoError");
  
  var enderecoInput = document.getElementById("endereco");
  var labelEnde= document.getElementById("labelEnde");
  var enderecoError = document.getElementById("enderecoError");


  var loginInput = document.getElementById("login");
  var labelLogin= document.getElementById("labelLogin");
  var loginError = document.getElementById("loginError");


  var senhaInput = document.getElementById("senha");
  var labelSenha= document.getElementById("labelSenha");
  var senhaError = document.getElementById("senhaError");


  var confirmeInput = document.getElementById("confirme");
  var labelConfi= document.getElementById("labelConfi");
  var confirmeError = document.getElementById("confirmeError");
  var Sexo = document.getElementById('Sexo');
  
  

  function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]/g, ''); // Remover caracteres não numéricos

    if (cpf.length !== 11 || !/^\d{11}$/.test(cpf)) {
      return false;
    }

    // Verificar se todos os dígitos são iguais (CPF inválido)
    if (/^(\d)\1*$/.test(cpf)) {
      return false;
    }

    let sum = 0;
    let remainder;
    for (let i = 1; i <= 9; i++) {
      sum += parseInt(cpf.charAt(i - 1)) * (11 - i);
    }
    remainder = (sum * 10) % 11;

    if (remainder === 10 || remainder === 11) {
      remainder = 0;
    }

    if (remainder !== parseInt(cpf.charAt(9))) {
      return false;
    }

    sum = 0;
    for (let i = 1; i <= 10; i++) {
      sum += parseInt(cpf.charAt(i - 1)) * (12 - i);
    }
    remainder = (sum * 10) % 11;

    if (remainder === 10 || remainder === 11) {
      remainder = 0;
    }

    if (remainder !== parseInt(cpf.charAt(10))) {
      return false;
    }

    return true;
  }


  if (nomeInput.value === "") {
    nomeError.innerHTML = "*Por favor, entre com seu nome*";
    nomeInput.style.borderColor = "red";
    labelNome.classList.add("error-label");
    nomeInput.focus();
    return false;
  } else if (/\d/.test(nomeInput.value)) {
    nomeError.innerHTML = "*O nome não pode conter números*";
    nomeInput.style.borderColor = "red";
    labelNome.classList.add("error-label");
    nomeInput.focus();
    return false;
  } else if (
    nomeInput.value.length < 15 ||
    nomeInput.value.length > 60 ||
    !/^[a-zA-Z\s]+$/.test(nomeInput.value)
  ) {
    nomeError.innerHTML = "*O nome deve ter entre 15 e 60 caracteres alfabéticos*";
    nomeInput.style.borderColor = "red";
    labelNome.classList.add("error-label");
    nomeInput.focus();
    return false;
  } else {
    nomeError.innerHTML = "";
    nomeInput.style.borderColor = "";
    labelNome.classList.remove("error-label");
  }

  if (dataInput.value === "") {
    dataError.innerHTML = "*Por favor, entre com sua data de nascimento*";
    dataInput.style.borderColor = "red";
    labelDate.classList.add("error-label");
    dataInput.focus();
    return false;
  } 
  else {
    dataError.innerHTML = "";
    dataInput.style.borderColor = "";
    labelDate.classList.remove("error-label");
  }
  if (!document.querySelector('input[name="sexo"]:checked')) {
    sexoErro.innerHTML = "*Por favor, selecione seu sexo*";
    Sexo.classList.add('error-label');
    
    document.getElementById("labelSexo").classList.add("error-label");
    document.getElementById("masc").nextElementSibling.style.color = "red";
    document.getElementById("fem").nextElementSibling.style.color = "red";
    document.getElementById("out").nextElementSibling.style.color = "red";
    return false;
  } else {
    sexoErro.innerHTML = "";
    Sexo.classList.remove('error-label');
    document.getElementById("labelSexo").classList.remove("error-label");
    document.getElementById("masc").nextElementSibling.style.color = "";
    document.getElementById("fem").nextElementSibling.style.color = "";
    document.getElementById("out").nextElementSibling.style.color = "";
  
} if (maternoInput.value === "") {
    maternoError.innerHTML = "*Por favor, entre com seu nome*";
    maternoInput.style.borderColor = "red";
    labelMaterno.classList.add("error-label");
    maternoInput.focus();
    return false;
  } else if (/\d/.test(maternoInput.value)) {
    maternoError.innerHTML = "*O nome não pode conter números*";
    maternoInput.style.borderColor = "red";
    labelMaterno.classList.add("error-label");
    maternoInput.focus();
    return false;
  } else if (
    maternoInput.value.length < 15 ||
    maternoInput.value.length > 60 ||
    !/^[a-zA-Z\s]+$/.test(maternoInput.value)
  ) {
    maternoError.innerHTML = "*O nome deve ter entre 15 e 60 caracteres alfabéticos*";
    maternoInput.style.borderColor = "red";
    labelMaterno.classList.add("error-label");
    maternoInput.focus();
    return false;
  } else {
    maternoError.innerHTML = "";
    maternoInput.style.borderColor = "";
    labelMaterno.classList.remove("error-label");
  } if (cpfInput.value === "") {
    cpfError.innerHTML = "*Por favor, entre com seu CPF*";
    cpfInput.style.borderColor = "red";
    labelCPF.classList.add("error-label");
    cpfInput.focus();
    return false;
  } else if (!validarCPF(cpfInput.value)) {
    cpfError.innerHTML = "*CPF inválido*";
    cpfInput.style.borderColor = "red";
    labelCPF.classList.add("error-label");
    cpfInput.focus();
    return false;
  } else {
    cpfError.innerHTML = "";
    cpfInput.style.borderColor = "";
    labelCPF.classList.remove("error-label");
  }if (celInput.value === "") {
    celError.innerHTML = "*Por favor, entre com seu Telefone Celular*";
    celInput.style.borderColor = "red";
    labelCel.classList.add("error-label");
    celInput.focus();
    return false;
  }else if (!/^\(\+55\)\d{2}-\d{9}$/.test(celInput.value)){
    celError.innerHTML = "*O telefone deve estar no formato (+55)XX-XXXXXXXXX*";
    celInput.style.borderColor = "red";
    labelCel.classList.add("error-label");
    celInput.focus();
  }else {
    celError.innerHTML = "";
    celInput.style.borderColor = "";
    labelCel.classList.remove("error-label");
  }if (fixoInput.value === "") {
    fixoError.innerHTML = "*Por favor, entre com seu Telefone Fixo*";
    fixoInput.style.borderColor = "red";
    labelFixo.classList.add("error-label");
    fixoInput.focus();
    return false;
  }else if (!/^\(\+55\)\d{2}-\d{9}$/.test(fixoInput.value)){
    fixoError.innerHTML = "*O telefone deve estar no formato (+55)XX-XXXXXXXXX*";
    fixoInput.style.borderColor = "red";
    labelFixo.classList.add("error-label");
    fixoInput.focus();
  }else {
    fixoError.innerHTML = "";
    fixoInput.style.borderColor = "";
    labelFixo.classList.remove("error-label");
  }
  if (enderecoInput.value === "") {
    enderecoError.innerHTML = "*Por favor, entre com seu Endereço Completo*";
    enderecoInput.style.borderColor = "red";
    labelEnde.classList.add("error-label");
    enderecoInput.focus();
    return false;
  } else if (enderecoInput.value.length >=60){
    enderecoError.innerHTML = "*O endereço dece ter no maxímo 60 caracteres*";
    enderecoInput.style.borderColor = "red";
    labelEnde.classList.add("error-label");
    enderecoInput.focus();
  }else {
    enderecoError.innerHTML = "";
    enderecoInput.style.borderColor = "";
    labelEnde.classList.remove("error-label");
  
  }if (loginInput.value === "") {
    loginError.innerHTML = "*Por favor, escolha seu Login";
    loginInput.style.borderColor = "red";
    labelLogin.classList.add("error-label");
    loginInput.focus();
    return false;
  } else if (/\d/.test(loginInput.value)) {
    loginError.innerHTML = "*O nome não pode conter números*";
    loginInput.style.borderColor = "red";
    labelLogin.classList.add("error-label");
    loginInput.focus();
    return false;
  } else if (
    loginInput.value.length !== 6 ||
    !/^[a-zA-Z\s]+$/.test(loginInput.value)
  ) {
    loginError.innerHTML = "*O Login deve ter  6 caracteres alfabéticos*";
    loginInput.style.borderColor = "red";
    labelLogin.classList.add("error-label");
    loginInput.focus();
    return false;
  } else {
    loginError.innerHTML = "";
    loginInput.style.borderColor = "";
    labelLogin.classList.remove("error-label");
  }
  if (senhaInput.value === "") {
    senhaError.innerHTML = "*Por favor, escolha sua Senha";
    senhaInput.style.borderColor = "red";
    labelSenha.classList.add("error-label");
    senhaInput.focus();
    return false;
  } else if (/\d/.test(senhaInput.value)) {
    senhaError.innerHTML = "*A Senha não pode conter números*";
    senhaInput.style.borderColor = "red";
    labelSenha.classList.add("error-label");
    senhaInput.focus();
    return false;
  } else if (
    senhaInput.value.length !== 8 ||
    !/^[a-zA-Z\s]+$/.test(senhaInput.value)
  ) {
    senhaError.innerHTML = "*A Senha deve ter 8 caracteres alfabéticos*";
    senhaInput.style.borderColor = "red";
    labelSenha.classList.add("error-label");
    senhaInput.focus();
    return false;
  } else {
    senhaError.innerHTML = "";
    senhaInput.style.borderColor = "";
    labelSenha.classList.remove("error-label");
   }
   if (confirmeInput.value === "") {
    confirmeError.innerHTML = "*Por favor, confirme sua Senha";
    confirmeInput.style.borderColor = "red";
    labelConfi.classList.add("error-label");
    confirmeInput.focus();
    return false;
  } else if (confirmeInput.value !== senhaInput.value) {
    confirmeError.innerHTML = "*A confirmação da senha não corresponde à senha digitada*";
    confirmeInput.style.borderColor = "red";
    labelConfi.classList.add("error-label");
    confirmeInput.focus();
    return false;
  } else {
    confirmeError.innerHTML = "";
    confirmeInput.style.borderColor = "";
    labelConfi.classList.remove("error-label");
  }
  var sexoSelecionado = document.querySelector('input[name="sexo"]:checked').value;
  var cadastro = {
    nome: nomeInput.value,
    datadenascimento: dataInput.value,
    sexo:sexoSelecionado, 
    nomemat:maternoInput.value,
    cpf:cpfInput.value,
    celular:celInput.value,
    fixoInput:fixoInput.value,
    endereco:enderecoInput.value,
    login: loginInput.value,
    senha: senhaInput.value

  };

  localStorage.setItem("cadastro", JSON.stringify(cadastro));

  
  console.log("Formulário válido. Dados salvos no localStorage:", cadastro);
  setTimeout(()=>{
    window.location.href = "http://127.0.0.1:5501/login.html"
}, 2000)
  
  ; 

  return true;
}



function toggleMenu(){
  const menuMobile = document.getElementById("menu-mobile")

  if(menuMobile.className === "menu-mobile-active"){
   menuMobile.className = "menu-mobile"
  }else{
   menuMobile.className = "menu-mobile-active"
  }
}



 // Botão limpar
 document.addEventListener('DOMContentLoaded', function() {
  var botaoLimpar = document.getElementById('limpar');
  var formulario = document.getElementById('form');

  if (botaoLimpar && formulario) {
    botaoLimpar.addEventListener('click', function() {
      formulario.reset();
    });
  }
});














  

    
  

