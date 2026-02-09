"use strict";
document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper('.swiper', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        slidesPerView: 5,
        spaceBetween: 20,
        loop: true,
        breakpoints: {
            // when window width is >= 0px
            0: {
                slidesPerView: 1
            },
            // when window width is >= 576px
            576: {
                slidesPerView: 2
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 3
            },
            // when window width is >= 1200px
            1200: {
                slidesPerView: 5
            }
        }
    });
});
