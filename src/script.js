
//Hamburger
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#nav-menu');
hamburger.addEventListener('click', function() {
    this.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});

//navbar fixed
window.onscroll = function() {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.scrollY >= fixedNav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};

//dropdown toggle
const btn = document.getElementById("userDropdownBtn");
const dropdown = document.getElementById("userDropdown");

if (btn) {
    btn.addEventListener("click", function (e) {
        e.stopPropagation();
        dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", function () {
        dropdown.classList.add("hidden");
    });
}

