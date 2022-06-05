
const sign_in_btn = document.querySelector('#sign-in-button');
const sign_up_btn = document.querySelector('#sign-up-button');
const container = document.querySelector('.container');
if(sign_up_btn) {
    sign_up_btn.addEventListener('click', () => {
        container.classList.add('sign-up-mode');
    });
}
if(sign_in_btn) {
    sign_in_btn.addEventListener('click', () => {
        container.classList.remove('sign-up-mode');
    });
}

let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');
if(menu) {
    menu.onclick = () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }
}