
function toggleSenhaVisibility() {
    var senhaInput = document.getElementById("senha");
    var toggleIcon = document.querySelector(".senha-toggle");
    
    if (senhaInput.type === "password") {
      senhaInput.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    } else {
      senhaInput.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    }
  }
  


function entrar() {
    var loginInput = document.getElementById("login");
    var labelLogin = document.getElementById("labelLogin");
    var loginError = document.getElementById("loginError");
  
    var senhaInput = document.getElementById("senha");
    var labelSenha = document.getElementById("labelSenha");
    var senhaError = document.getElementById("senhaError");
  
    if (loginInput.value === "") {
      loginError.innerHTML = "*Por favor, digite seu Login";
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
      senhaError.innerHTML = "*Por favor digite a sua senha*";
      senhaInput.style.borderColor = "red";
      labelSenha.classList.add("error-label");
      senhaInput.focus();
      return false;
    } else {
      senhaError.innerHTML = "";
      senhaInput.style.borderColor = "";
      labelSenha.classList.remove("error-label");
    }
  
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