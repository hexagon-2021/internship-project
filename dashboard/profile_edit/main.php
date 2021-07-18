<?php require_once("../../includes/dbh.inc.php") ?>
<?php require_once("../../includes/functions.inc.php") ?>
<?php require_once("../../includes/session.php") ?>

<section class="dashboard_categorie" id="products">
  <h1 class="dashboard_section_title">Edito Profilin</h1>
  
<div class="formChange">

  <form action="" id="password_form">

  	<h1 class="changePasswordTxt">Change password</h1>

  	    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

  	<label class="labelTxtChangePassword">Old Password :</label><br>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password"
             id="op"
             class="inputChangePassword">
     	       <br>

  	<label class="labelTxtChangePassword">New Password :</label><br>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password"
             id="np"
             class="inputChangePassword">
     	       <br>

  	<label class="labelTxtChangePassword">Confirm New Password :</label><br>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password"
             id="c_np"
             class="inputChangePassword">
     	       <br>

  	<button type="submit" value="ChangeBtn" id="ChangeBtn" class="changeBtn pointer">CHANGE</button>
    
    <h3 id="result"></h3>

  </form>
</div>
</section> <!-- #products -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(e){
    $("#password_form").on('submit' , function(e){
      e.preventDefault();
      var current_password = $("#op").val();
      var new_password = $("#np").val();
      var confirm_password = $("#c_np").val();
      if (current_password == "" || new_password == "" || confirm_password == "") {
        alert('All Fields are Required !');
      }else{
        
        $.ajax({
          url: 'profile_edit/change_password.inc.php',
          type: 'post',
          data: {op:current_password, np:new_password, c_np:confirm_password},
          // data: new FormData(this),
          // dataType: 'json',
          success:function(response){
            $("#result").html(response);
            setTimeout(function(){
              $("#result").fadeOut("slow");
              $("#op").val("");
              $("#np").val("");
              $("#c_np").val("");
            }, 3000);
          },
          error:function(response){
            $("#result").html(response);
          },
        });
      }
    });
  });
</script>
