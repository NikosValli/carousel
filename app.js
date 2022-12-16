var $ = jQuery;
$(".owl-carousel").owlCarousel({
  loop: true,
  margin: 30,
  stagePadding: 0,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 4,
    },
    1920: {
      items: 4,
    },
  },
});

var owl = $(".owl-carousel");
owl.owlCarousel();
$(".owl-next").click(function () {
  owl.trigger("next.owl.carousel");
});
$(".owl-prev").click(function () {
  owl.trigger("prev.owl.carousel");
});
