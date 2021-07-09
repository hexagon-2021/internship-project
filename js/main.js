function resize_navbar_li() {
  let width = (100 / $("nav#navbar ul.navbar_ul_items li").length) - 5;
  // $("i.bar_icon").hide()
  if (!$("i.bar_icon").is(":visible")) {
    $("nav#navbar ul.navbar_ul_items li").css("width", `${width}%`)
  }
}

$(window).on("resize", function() {
  if ($(window).width() >= 1024) {
    $("#navbar > .container > ul").show(300);
    resize_navbar_li();
  } else {
    $("#navbar > .container > ul").hide(300);
    $("nav#navbar ul.navbar_ul_items li").css("width", 100);
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
  let width = (100 / $("nav#navbar ul.navbar_ul_items li").length) - 5;
  // $("i.bar_icon").hide()
  if (!$("i.bar_icon").is(":visible")) {
    $("nav#navbar ul.navbar_ul_items li").css("width", `${width}%`)
  }
})
