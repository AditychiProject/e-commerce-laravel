import "./bootstrap";

// Navbar Fixed
window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;
    const toTop = document.querySelector("#to-top");
    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
        toTop.classList.remove("hidden");
        toTop.classList.add("flex");
    } else {
        header.classList.remove("navbar-fixed");
        toTop.classList.remove("flex");
        toTop.classList.add("hidden");
    }
};

// Hamburger Menu
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");
hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
});

// Klik di luar hamburger menu
window.addEventListener("click", function (e) {
    if (e.target != hamburger && e.target != navMenu) {
        hamburger.classList.remove("hamburger-active");
        navMenu.classList.add("hidden");
    }
});

// Carousel
import { Carousel, initTE } from "tw-elements";

initTE({ Carousel });

// Search Input
// Search Input
const searchInput = document.querySelector(".search-input");
const searchBox = document.querySelector("#searchbox");
document.querySelector("#search").onclick = (e) => {
    searchInput.classList.toggle("active");
    e.preventDefault();
};

// Click outside the elements
const searchBtn = document.querySelector("#search");
document.addEventListener("click", function (e) {
    // Search Input
    if (!searchBtn.contains(e.target) && !searchInput.contains(e.target)) {
        searchInput.classList.remove("active");
    }
});

// autocomplete search

$(function () {
    var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme",
    ];
    $("#searchbox").autocomplete({
        source: availableTags,
    });
});
