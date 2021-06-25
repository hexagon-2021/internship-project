$(window).on("resize", function() {
  if ($(window).width() >= 1024) {
    $("#navbar > div > ul").show(300);
  } else {
    $("#navbar > div > ul").hide(300);
  }
});

$("#navbar > div > i").click(function() {
  $("#navbar > div > ul").toggle(300);
});
