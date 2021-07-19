function resize_navbar_li(width) {
  $("nav#navbar ul.navbar_ul_items li").css("width", `${width}%`);
}

$(window).on("resize", function() {
  if ($(window).width() >= 1024) {
    $("#navbar > .container > ul").show(300);
    resize_navbar_li((100 / $("nav#navbar ul.navbar_ul_items li").length) - 5);
  } else {
    $("#navbar > .container > ul").hide(300);
    $("nav#navbar ul.navbar_ul_items li").css("width", 100);
    resize_navbar_li(95);
  }
});

$("#navbar > div > i").click(function() {
  $("#navbar > .container > ul").toggle(300);
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
  add_product_toggler_text +=1;
});

$(document).ready(function() {
  resize_navbar_li((100 / $("nav#navbar ul.navbar_ul_items li").length) - 5);
})
