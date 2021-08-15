<section class="dashboard_categorie" id="approved_businesses">
  <div class="container">
    <h1 class="dashboard_section_title" id="approved_businesses_section_title">Mesazhat tuaja</h1>
    <div id="display_approved_businessess" class="display_approved_businesses">
      <?php //include 'view.php'; ?>
    </div> <!-- .display_businesses -->
  </div> <!-- container -->
</section> <!-- #pending_businesses -->
<script>
$(document).ready(function(){
	function viewData(page){
      console.log(page);
				$.ajax({
					url: "contacts/view.php",
					type: "POST",
					data : {page_no:page},
					success: function(data){
						$('#display_approved_businessess').html(data);
					} 
				});
  	}
	viewData();

	// Pagination code
	$(document).on("click", ".nav-pages li", function(e){
		var pageId = $(this).attr("id");
		console.log(pageId);
		viewData(pageId);
	});
});
</script>
