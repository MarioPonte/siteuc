/*!
* Start Bootstrap - Creative v7.0.6 (https://startbootstrap.com/theme/creative)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
*/
//
// Scripts
// 


// My scripts

const passwordInput = document.getElementById('inputSenha');
const eye = document.getElementById('showBtn');

function eyeClick(){
    let inputTypeIsPassword = passwordInput.type == "password";
    if(inputTypeIsPassword){
        passwordInput.setAttribute("type", "text");
        eye.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }else{
        passwordInput.setAttribute("type", "password");
        eye.innerHTML = '<i class="fa-solid fa-eye"></i>';
    }
}


function validarSenha(){
    var senha = formCad.senha.value;
    var repSenha = formCad.repSenha.value;

    if(senha=="" || senha.length < 6){
      alert("Prencha o campo senha com no minimo 6 caracteres.");
      formCad.senha.focus();
      return false;
    }

    if(repSenha=="" || repSenha.length < 6){
      alert("Prencha o campo senha com no minimo 6 caracteres.");
      formCad.repSenha.focus();
      return false;
    }

    if(senha != repSenha){
      alert("Senhas diferentes, volte a inserir");
      formCad.senha.focus();
      return false;
    }
  }


function loading(){
    document.getElementsByClassName("box-load")[0].style.display = "none";
    document.getElementsByClassName("contentPage")[0].style.display = "block";
}

let scrollBtn = document.querySelector(".btn-scroll-up");

window.addEventListener("scroll", () => {
    if(window.pageYOffset > 100){
        scrollBtn.style.cursor = "pointer";
        scrollBtn.style.display = "block";
        scrollBtn.classList.add("active");
    }else{
        scrollBtn.style.cursor = "auto";
        scrollBtn.classList.remove("active");
    }
});

// **********

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Activate SimpleLightbox plugin for portfolio items
    new SimpleLightbox({
        elements: '#portfolio a.portfolio-box'
    });

});
