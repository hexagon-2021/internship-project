function resize_navbar_li(width) {
  $("nav#navbar ul.navbar_ul_items li").css("width", `${width}%`);
}

$(window).on("resize", function() {
  if ($(window).width() >= 1024) {
    $("#navbar > .container > ul").show(300);
    resize_navbar_li((100 / $("nav#navbar ul.navbar_ul_items li").length) - 5);
  } else {
    $("#navbar > .container > ul").hide(300);
    resize_navbar_li(95);
  }
});

$("#navbar > div > i").click(function() {
  $("#navbar > .container > ul").toggle(300);
});

var add_product_toggler_text = 0;
$(document).on('click', "#add_product_toggler", function() {
  $("div.dashboard #products #add-form-div").toggle();
  $("div.dashboard #products .dashboard_section_title#add_products_section_title").toggle();
  if (add_product_toggler_text % 2 == 0) {
    $(this).html("Largo Formen");
  } else {
    $(this).html("Shto Produkt");
  }
  add_product_toggler_text +=1;
});

$(document).ready(function() {
  if ($(window).width() >= 1024) {
    $("#navbar > .container > ul").show(300);
    resize_navbar_li((100 / $("nav#navbar ul.navbar_ul_items li").length) - 5);
  } else {
    $("#navbar > .container > ul").hide(300);
    resize_navbar_li(95);
  }
})
var edit_profile_toggler_text = 0;
$(document).on('click', "#edit_profile_toggler", function() {
  $("div.dashboard #products #formChange-div").hide();
  $("div.dashboard #products .changePasswordTxt#edit_profile_section_title").hide();
  $("div.dashboard #products #editProfile-div").toggle();
  $("div.dashboard #products .changePasswordTxt#edit_profile_section_title").toggle();
  $("#edit_password_toggler").html("Ndrysho Passwordin");
  if (edit_profile_toggler_text % 2 == 0) {
    $(this).html("Ndrysho Profilin");
  } else {
    
    $(this).html("Largo Formen");
  }
  edit_profile_toggler_text +=1;
});

var edit_password_toggler_text = 0;
$(document).on('click', "#edit_password_toggler", function() {
  $("div.dashboard #products #editProfile-div").hide();
  $("div.dashboard #products .changePasswordTxt#edit_profile_section_title").hide();
  $("div.dashboard #products #formChange-div").toggle();
  $("div.dashboard #products .changePasswordTxt#edit_profile_section_title").toggle();
  $("#edit_profile_toggler").html("Edito Profilin");
  if (edit_password_toggler_text % 2 == 0) {
    $(this).html("Largo Formen");
  } else {
    $(this).html("Ndrysho Passwordin");
  }
  edit_password_toggler_text +=1;
});

$(".cities_to_select > button.city_selectable").click(function() {
  let el = $(this)[0];
  let city = this.innerHTML.substring(18);

  setCookie('city', city, .2);
  window.location.href = 'view_products/index.php';
});

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
var edit1 = 0;
$(document).on('click', "#userRegister", function() {
  var btn1 = $("#userRegister").val();
  if (btn1 == "Regjistrohu Si Biznes" ) {
  $("#registerUi").hide();
  $("#haveanAccUsrers").hide();
  $("#registerBu").toggle();
  $("#haveanAccBusiness").toggle();
    $(this).val("Regjistrohu Si Klient");
    $(this).html("Regjistrohu Si Klient");
    console.log(btn1);
  }
  else{
  $("#registerUi").toggle();
  $("#haveanAccUsrers").toggle();
  $("#haveanAccBusiness").hide();
  $("#registerBu").hide();
    $(this).val("Regjistrohu Si Biznes");
    $(this).html("Regjistrohu Si Biznes");
    console.log(btn1);
  }
  console.log(btn1);
});

$(document).on('click', "#userLogin", function() {
  var btn1 = $("#userLogin").val();
  if (btn1 == "Kyqu Si Klient" ) {
  $("#loginUi").hide();
  $("#dontHaveAnAccUi").hide();
  $("#loginBu").toggle();
  $("#dontHaveAnAccBu").toggle();
    $(this).val("Kyqu Si Biznes");
    $(this).html("Kyqu Si Biznes");
    console.log(btn1);
  }
  else{
  $("#loginUi").toggle();
  $("#dontHaveAnAccUi").toggle();
  $("#loginBu").hide();
  $("#dontHaveAnAccBu").hide();
    $(this).val("Kyqu Si Klient");
    $(this).html("Kyqu Si Klient");
    console.log(btn1);
  }
  console.log(btn1);
});
