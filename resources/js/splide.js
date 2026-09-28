import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

// or only core styles
import '@splidejs/splide/css/core';

let splideInstances = [];

document.addEventListener('DOMContentLoaded', function () {
    initProductGallerySlider();
    initSliderImages();
    // initialize all splide instances, get them by data attribute
    document.querySelectorAll('.splide').forEach(function (element) {
        if (element.id !== 'main-slider' && element.id !== 'thumbnail-slider' && element.id !== 'image-slider') {
            initializeSplide(element);
        }
    });
});

function initializeSplide(element) {
    // let options = JSON.parse(element.getAttribute('data-splide-options') || null) || {};

    let splide = new Splide(element, OPTIONS_SINGLE_FULL);

    splide.mount();
    splideInstances.push(splide);
}

function initProductGallerySlider() {
    const mainEl = document.getElementById('main-slider');
    const thumbEl = document.getElementById('thumbnail-slider') ;
    if (!mainEl || !thumbEl) return;

    const main = new Splide(mainEl, {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        pagination: true,
        arrows: false,
        breakpoints: {
            768: {
                    fixedHeight: 1,
                }
        }
    });

    const thumbnails = new Splide(thumbEl, {
        type: 'slide',
        rewind: true,
        pagination: false,
        fixedWidth: 80,
        fixedHeight: 80,
        gap: 10,
        arrows: false,
        // cover: true,
        isNavigation: true,
    });

    main.sync(thumbnails);
    main.mount();
    thumbnails.mount();

    splideInstances.push(main, thumbnails);
}
 function initSliderImages() {
        const imgEl = document.getElementById('image-slider');

        if (!imgEl) return;

        const slides = imgEl.querySelectorAll('.splide__slide');
        const hasMultiple = slides.length > 1;
        const main = new Splide(imgEl, {
            type: 'slide',
            rewind: true,
            rewindSpeed: 1500,
    perPage: 1,
    perMove: 1,
    pagination: true,
    autoplay: true,
    arrows: hasMultiple,
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
        }).mount();
}
const OPTIONS_SINGLE_FULL = {
    type: 'loop',
    perPage: 1,
    perMove: 1,
    pagination: false,
    autoplay: true,
    interval: 2500,
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




