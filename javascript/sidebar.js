const sidebar = document.querySelector('.sidebar-options')
const page = document.querySelector('.last-orders-page');

sidebar.onclick = function (){
    page.classList.toggle('active');
}