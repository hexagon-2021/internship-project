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


var add_product_toggler_text = 0;
$(document).on('click', "#add_product_toggler", function() {
  $("div.dashboard #products #add-form-div").toggle(400);
  $("div.dashboard #products .dashboard_section_title#add_products_section_title").toggle(400);
  if (add_product_toggler_text % 2 == 0) {
    $(this).html("Largo Formen");
  } else {
    $(this).html("Shto Produkt");
  }
  add_product_toggler_text +=1 ;
});