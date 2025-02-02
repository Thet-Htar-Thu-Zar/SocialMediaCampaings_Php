// swiper start
var swiper = new Swiper(".mySwiper", {
    sliderPreView: 1,
    grabCursor: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        preEl: ".swiper-button-prev",
    },
});
// swiper end

