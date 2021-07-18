<section class="dashboard_categorie" id="pending_businesses">
  <div class="container">
    <h1 class="dashboard_section_title" id="pending_businesses_section_title">Bizneset Në Pritje</h1>
    <div class="display_businesses">
      <?php include 'view.php'; ?>
    </div> <!-- .display_businesses -->
  </div> <!-- container -->
</section> <!-- #pending_businesses -->
<script>
  $("button.pending_business_action").on('click', function(e) {
    e.preventDefault();
    let id = this.value;
    let action = (this.id == "approve_business") ? 1 : 0;
    $.ajax({
      url: "pending/action.php",
      type: "POST",
      data: {
        id: id,
        action: action
      },
      success: function(data) {
        $(".display_businesses").load("pending/view.php");
      }
    })
  })
</script>