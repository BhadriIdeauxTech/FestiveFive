// top round image
var swiper = new Swiper(".round-image", {
    slidesPerView: 8,
    spaceBetween: 30,
    centeredSlides: true,
    loop: true, // Enable loop mode
    autoplay: {
        delay: 2500, // Set delay between slides in milliseconds
        disableOnInteraction: false, // Keep autoplay running even when user interacts with swiper
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        30: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        500: {
            slidesPerView: 5,
            spaceBetween: 0,
        },

        950: {
            slidesPerView: 6,
            spaceBetween: 0,
        },
        1200: {
            slidesPerView: 7,
            spaceBetween: 0,
        },
        1500: {
            slidesPerView: 8,
            spaceBetween: 30,


        },
    },
});


// client swiper

var swiper = new Swiper(".client-swiper", {
    slidesPerView: 5,
    spaceBetween: -50,
    loop: true, // Enable loop mode
    autoplay: {
        delay: 2300, // Set delay between slides in milliseconds
        disableOnInteraction: false, // Keep autoplay running even when user interacts with swiper
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        30: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        600: {
            slidesPerView: 2,
            spaceBetween: 0,
        },

        950: {
            slidesPerView: 3,
            spaceBetween: 0,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: -30,
        },
        1500: {
            slidesPerView: 5,
            spaceBetween: -50,

        },
    },
});


// brand swiper
var swiper = new Swiper(".brand-Swiper", {
    slidesPerView: 5,
    spaceBetween: -50,
    loop: true, // Enable loop mode
    autoplay: {
        delay: 2500, // Set delay between slides in milliseconds
        disableOnInteraction: false, // Keep autoplay running even when user interacts with swiper
    },
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        30: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        600: {
            slidesPerView: 2,
            spaceBetween: 0,
        },

        950: {
            slidesPerView: 3,
            spaceBetween: 0,
        },
        1200: {
            slidesPerView: 4,
            spaceBetween: -30,
        },
        1500: {
            slidesPerView: 5,
            spaceBetween: -50,

        },
    },
});


//   Testimonials

var swiper = new Swiper(".testimonials", {
    spaceBetween: 30,
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});