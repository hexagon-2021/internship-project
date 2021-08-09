<?php require_once("../../includes/dbh.inc.php") ?>
<div class="filters">
    <span class="spanFiltro">Filtro në bazë të &nbsp;</span>
    <select name="fetchval" id="fetchval">
      <option value="" disabled="" selected="">Select Filter</option>
      <option value="Prishtina">Prishtina</option>
      <option value="Mitrovica">Mitrovica</option>
      <option value="Peja">Peja</option>
      <option value="Prizren">Prizren</option>
      <option value="Ferizaj">Ferizaj</option>
      <option value="Gjilan">Gjilan</option>
      <option value="Gjakove">Gjakove</option>
    </select>
  </div>
  <table class="approved_businesses_table">
  <?php 
    $sql = "SELECT * FROM business WHERE status='Suspended' AND username != 'admin'; ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  ?>
  
  
    <tr>
      <th>Emri & Mbiemri</th>
      <th>E-mail</th>
      <th>Emri i Kompanise</th>
      <th>Qyteti</th>
      <th>Nr. Telefonit</th>
      <th>Statusi</th>
      <th>Fshij</th>
    </tr>


    <?php 
      $status_options = ["Active", "Inactive", "Suspended"];
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
          echo "<th>". $row['name'] ."</th>";
          echo "<th>". $row['email'] ."</th>";
          echo "<th>". $row['company_name'] ."</th>";
          echo "<th>". $row['company_city'] ."</th>";
          echo "<th>". $row['phone_number'] ."</th>";
          echo "<th>";
            echo "<select class='change_business_status' id='change_business_status_".$row['id']."'>";
              echo "<option>". $row['status'] ."</option>";
              foreach ($status_options as $option) {
                if ($option != $row['status']) {
                  echo "<option>$option</option>";
                }
              }
            echo "</select>";
          echo "</th>";
          echo "<th><button class='delete_business_action' value='".$row['id']."' id='delete_business'><i class='fas fa-times-circle'></i></button></th>";
        echo "</tr>";
      }
    ?>
  <?php } else {
    echo "<h1 style='color: var(--secondary-color);text-align: center;'>Nuk ka biznese ne pritje!</h1>";
  } ?>
</table>

<script>
  
    let value = null;
  $(".change_business_status").change(function() {
    value = this.value;
    let id = this.id.split("_").pop();
    $("div.inboxMessageForm").hide();
    $("div.inboxMessageForm").show();
    $("div.inboxMessageForm > form > input[name='Subject']").val("");
    $("div.inboxMessageForm > form > textarea[name='Message']").val("");
    $("div.inboxMessageForm > form").on('submit', function(e) {
      e.preventDefault();
      let subject = $("div.inboxMessageForm > form > input[name='Subject']").val();
      let message = $("div.inboxMessageForm > form > textarea[name='Message']").val();
      $.ajax({
        url: "suspended/action.php",
        type: "POST",
        data: {
          action_id: id,
          action: value,
          subject: subject,
          message: message,
        },
        success: function(data) {
          $("div.inboxMessageForm").hide();
          $(".display_approved_businesses").load("suspended/view.php");
        }
      })
    })
  });

  $(".delete_business_action").on('click', function(e) {
      
    if(confirm("A jeni i sigurt?")){
      let id = this.value;
    
      $.ajax({
        url: "suspended/action.php",
        type: "POST",
        data: {
          id: id,
        },
        success: function(data) {
    
          $(".display_approved_businesses").load("suspended/view.php");

        }
      }) 
    }
  })
  
  $(document).ready(function(){
    $("#fetchval").on('change' , function(){
      var value = $(this).val();
      // alert(value);

      $.ajax({
        url:'suspended/action.php',
        type:'POST',
        data: 'request=' + value,
        success:function(data){
          $(".approved_businesses_table").html(data);
        }
      });
    });
  });
</script>
