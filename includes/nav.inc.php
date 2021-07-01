<nav id="navbar">
  <div class="container">
    <div class="logo">
      <img src="/StarLabs/Praktika/internship-project/includes/images/hamburger-icon.png" alt="hamburger" />
      <span>Ordering Website</span>
    </div>
    <i class="bar_icon fa fa-bars" aria-hidden="true"></i>
    <ul class="navbar_ul_items">
      <?php 
        $list = ["Zgjedh Qytetin", "Rreth Nesh", "Kontako"];
        $links = ["choose", "about", "contact"];
        $i_class = ["hand-pointer", "users", "address-book"];
        if(session_id() != ''){
          array_push($list, "Log In");
          array_push($links, "/internship-project/login.php");
          array_push($i_class, "sign-in-alt");
        } else {

          array_push($list, "Dashboard");
          array_push($links, "/internship-project/dashboard");
          array_push($i_class, "chart-line");
          array_push($list, "Log Out");
          array_push($links, "/internship-project/includes/logout.inc.php");
          array_push($i_class, "sign-in-alt");
        }
        foreach ($list as $i=>$categorie) {
          if ($categorie == $active) {
            echo "<li class='active'>";
          } else {
            echo "<li>";
          }
            echo "<a href='".$links[$i]."'><i class='fas fa-".$i_class[$i]."'></i> $categorie</a>";
          echo "</li>";
        }
      ?>
    </ul>
  </div> <!-- container -->
</nav>