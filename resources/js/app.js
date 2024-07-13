import './bootstrap';
import 'bootstrap';

let navbar = document.querySelector('.navbar');
let navbarBrand = document.querySelector('.navbar-brand');

window.addEventListener('scroll', () => {
    let scrolled = window.scrollY
    if (scrolled > 30) {
        navbar.classList.remove('w-75', 'rounded-bottom-3');
        navbar.classList.add('w-100')
        if (window.innerWidth > 600) {
            navbarBrand.classList.add('rotate-brand')
        } else {
            navbarBrand.classList.remove('rotate-brand')
        }
    } else {
        navbar.classList.add('w-75', 'rounded-bottom-3')
        navbar.classList.remove('w-100')
        navbarBrand.classList.remove('rotate-brand')
    }
})