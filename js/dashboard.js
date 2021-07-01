$("div.dashboard > div.main > h2 > select").change(function() {
  let selected = $("body > div > div.main > h2 > select option:selected");
  $(".main > .content").load(`${selected[0].value}/main.php`);
});