<nav id="navbar">
  <div class="container">
    <div class="logo">
      <img src="/internship-project/includes/images/hamburger-icon.png" alt="hamburger" />
      <span>
        Ordering Website
      </span>
    </div>
    <i class="bar_icon fa fa-bars" aria-hidden="true"></i>
    <ul class="navbar_ul_items">
      <?php 
        $list = $links = $i_class = [];
        if (isset($_SESSION['userid'])) {
          if ($active != "Dashboard") {
            array_push($list,"Kontakto");
            array_push($links, "/internship-project/contact");
            array_push($i_class, "address-book");
          }
          array_push($list, "Rreth Nesh", "Dashboard", "Log Out");
          array_push($links, "/internship-project/about", "/internship-project/dashboard", "/internship-project/includes/logout.inc.php");
          array_push($i_class, "users", "chart-line", "sign-in-alt");
        } else {
          array_push($list, "Rreth Nesh", "Kontakto", "Log In");
          array_push($links, "/internship-project/about", "/internship-project/contact", "/internship-project/login.php");
          array_push($i_class, "users", "address-book", "sign-in-alt");
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
  </div>
</nav>