<?php require_once("../../includes/dbh.inc.php") ?>
<?php require_once("../../includes/functions.inc.php") ?>
<?php require_once("../../includes/session.php") ?>

<section class="dashboard_categorie" id="products">
  <h1 class="dashboard_section_title">Edito Profilin</h1>
  <button id="edit_password_toggler">Ndrysho Passwordin</button>
  <button id="edit_profile_toggler">Ndrysho Profilin</button>
  <h3 id="result"></h3>
<div class="formChange" id="formChange-div">

  <form action="" id="password_form">

  	<h1  id="products" class="changePasswordTxt">Change password</h1>

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

  </form>
</div>
<div id="editProfile-div">
  <?php 
    
    $userId = $_SESSION['userid'];
    $sql = "SELECT * FROM business WHERE id = '$userId'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $username = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $companyName = $row['company_name'];
        $companyCity = $row['company_city'];
        $phoneNumber = $row['phone_number'];
      }
    }
  ?>
        <form id="otherProfileInformation">
          <h1 class="changePasswordTxt" id="edit_profile_section_title">Ndrysho të dhënat e profilit</h1>
          <?php if (isset($_GET['error'])) { ?>
     	    	<p class="error"><?php echo $_GET['error']; ?></p>
     	      <?php } ?>

     	      <?php if (isset($_GET['success'])) { ?>
              <p class="success"><?php echo $_GET['success']; ?></p>
           <?php } ?>

          <label class="labelTxtEditProfile">Username :</label><br>
          <input type="text" name="username" value="<?php echo $username ?>" id="username" class="inputEditProfile"><br>
          <label class="labelTxtEditProfile">Name :</label><br>
          <input type="text" name="name" value="<?php echo $name ?>" id="name" class="inputEditProfile"><br>
          <label class="labelTxtEditProfile">Email :</label><br>
          <input type="text" name="email" value="<?php echo $email ?>" id="email" class="inputEditProfile"><br>
          <label class="labelTxtEditProfile">Company Name:</label><br>
          <input type="text" name="companyName" value="<?php echo $companyName ?>" id="companyName" class="inputEditProfile"><br>
          <label class="labelTxtEditProfile">Company City:</label><br>
          <input type="text" name="companyCity" value="<?php echo $companyCity ?>" id="companyCity" class="inputEditProfile"><br>
          <label class="labelTxtEditProfile">Phone Number:</label><br>
          <input type="text" name="phoneNumber" value="<?php echo $phoneNumber ?>" id="phoneNumber" class="inputEditProfile"><br>
          <label class="labelTxtEditProfile">Upload Logo:</label><br>
          <input type="file" name="image"  id="image" class="inputEditProfile"><br>

          <button type="submit" value="ChangeBtnn" id="ChangeBtnn" class="changeBtn pointer">CHANGE</button>
          
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
<script>
  /*$("#otherProfileInformation").on('submit' , function(e){
      e.preventDefault();
      var username = $("#username").val();
      var name = $("#name").val();
      var email = $("#email").val();
      var companyName = $("#companyName").val();
      var companyCity = $("#companyCity").val();
      var phoneNumber = $("#phoneNumber").val();
        $.ajax({
          url: 'profile_edit/editOtherProfileInformation.inc.php',
          type: 'POST',
          data: {username:username, name:name,email:email, companyName:companyName, companyCity:companyCity, phoneNumber:phoneNumber},
          success:function(response){
            $("#result").html(response);
            $("#otherProfileInformation")[0].reset();
            //$("#editProfile-div").html('');
            //$("#editProfile-div").fadeOut("slow");
            setTimeout(function(){
              $("#result").fadeOut("slow");
              
            }, 3000);
            
          },
          error:function(response){
            $("#result").html(response);
          },
        });
    });*/
    $("#otherProfileInformation").on('submit' , function(e){
      e.preventDefault();
      var formData = new FormData(this);
        $.ajax({
          url: 'profile_edit/editOtherProfileInformation.inc.php',
          type: 'POST',
          cache: false,
          contentType : false, // you can also use multipart/form-data replace of false
          processData : false,
          data: formData,
          success:function(response){
            $("#result").html(response);
            $("#otherProfileInformation")[0].reset();
            //$("#editProfile-div").html('');
            //$("#editProfile-div").fadeOut("slow");
            setTimeout(function(){
              $("#result").fadeOut("slow");
              
            }, 3000);
            
          },
          error:function(response){
            $("#result").html(response);
          },
        });
    });
</script>
