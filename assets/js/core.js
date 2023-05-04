var myCarousel = document.querySelector("#carouselExampleCaptions");
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 2000,
  wrap: true,
  keyboard: true,
  pause: "hover",
  touch: true,
  ride: false,
  indicators: true
});

myCarousel.addEventListener("slide.bs.carousel", function () {
  //   console.log("slide event");
});
