
const formulario = document.querySelector("#form");

formulario.onsubmit = evento => {
  //Receber o valor de campo
    var login = document.querySelector("#login");

    console.log(login);
    
    evento.prefentDefaut();
 

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