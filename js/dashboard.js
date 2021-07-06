$("div.dashboard > div.main > h2 > select").change(function() {
  let selected = $("body > div > div.main > h2 > select option:selected");
  $(".main > .content").load(`${selected[0].value}/main.php`);
  if (selected[0].value == "products") {
    viewData();
  }
});

$("div.dashboard button.menu_actions_btn").click(function() {
  let selected = $(this)[0].value;
  $(".main > .content").load(`${selected}/main.php`);
  if (selected == "products") {
    viewData();
  }
})