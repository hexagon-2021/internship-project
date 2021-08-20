<nav id="navbar">
  <div class="container">
    <div class="logo">
      <img src="/internship-project/includes/images/hamburger-icon.png" alt="hamburger" />
      <span>
        <a href='/internship-project/' style='color: var(--secondary-color);'>
          EaglEats
        </a>
      </span>
    </div>
    <?php if (isset($_SESSION['realUserid'])) { ?>
      <?php if ($active == "Cart") { ?>
        <i class="shopping_cart active fas fa-shopping-cart">
      <?php } else { ?>
        <i class="shopping_cart fas fa-shopping-cart">
      <?php } ?>
        <label>
          <?php
            $real_user_id = $_SESSION['realUserid'];
            $cart_sql = "SELECT * FROM cart WHERE user_id='$real_user_id' AND status='Duke Porositur'; ";
            $cart_result = mysqli_query($conn, $cart_sql);
            if (mysqli_num_rows($cart_result) > 0) {
              while ($cart = mysqli_fetch_assoc($cart_result)) {
                echo count(explode(", ", $cart['products'])) - 1;
              }
            }
          ?>
        </label>
      </i>
    <?php } ?>
    <i class="bar_icon fa fa-bars" aria-hidden="true"></i>
    <ul class="navbar_ul_items">
      <?php 
        $list = $links = $i_class = [];
        if ($active != "Zgjedh Ushqimin" && $active != 'Cart') {
          array_push($list, "Ballina");
          array_push($links, '/internship-project/');
          array_push($i_class, "home");
        }
        if (isset($_SESSION['realUserid']) || $active == 'Cart') {
          if ($active != 'Ballina') {
            array_push($list, "Zgjedh Ushqimin");
            array_push($links, '/internship-project/view_products/index.php');
            array_push($i_class, "hand-pointer");
          }
        }
        if (isset($_SESSION['userid']) || (isset($_SESSION['realUserid']))) {
          array_push($list, "Rreth Nesh");
          array_push($links, "/internship-project/about.php");
          array_push($i_class, "users");
          
          array_push($list, "Kontakto");
          array_push($links, "/internship-project/contact.php");
          array_push($i_class, "address-book");
          
          if (isset($_SESSION['admin'])) {
            array_push($list,"Admin");
            array_push($links, "/internship-project/admin");
            array_push($i_class, "users-cog");
          } else if (isset($_SESSION['realUserid'])) {
            
          } else {
            array_push($list, "Dashboard");
            array_push($links, "/internship-project/dashboard");
            array_push($i_class, "chart-line");
          }
          array_push($list, "Log Out");
          array_push($links, "/internship-project/includes/logout.inc.php");
          array_push($i_class, "sign-in-alt");
        } else {
          array_push($list, "Rreth Nesh", "Kontakto", "Log In");
          array_push($links, "/internship-project/about.php", "/internship-project/contact.php", "/internship-project/users/login.php");
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
