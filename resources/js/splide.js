import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

// or only core styles
import '@splidejs/splide/css/core';

let splideInstances = [];

document.addEventListener('DOMContentLoaded', function () {
    // initialize all splide instances, get them by data attribute
    document.querySelectorAll('.splide').forEach(function (element) {
        initializeSplide(element);
    });
});

function initializeSplide(element) {
    // let options = JSON.parse(element.getAttribute('data-splide-options') || null) || {};

    let splide = new Splide(element, OPTIONS_SINGLE_FULL);

    splide.mount();
    splideInstances.push(splide);
}

const OPTIONS_SINGLE_FULL = {
    type: 'loop',
    perPage: 1,
    perMove: 1,
    pagination: false,
    autoplay: false,
    interval: 3000,
    pauseOnHover: true,
    arrows: true,
    autoHeight: true,
    // mediaQuery: 'min',
    breakpoints: {
        640: {
            gap: '1rem',
            padding: '1rem',
        },
        768: {
            gap: '2rem',
            padding: '2rem',
        },
    }
}


