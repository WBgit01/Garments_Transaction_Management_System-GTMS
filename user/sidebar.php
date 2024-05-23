  <!-- SIDEBAR PANEL -->
  <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="dash">
                <a href="index.php">
                    <i class="fa-solid fa-house-user"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class='items'>
                <a href="order.php">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class='items'>
                <?php
                    if ($_SESSION['profile_status'] == "Updated") {
                        echo "<a href='view_profile.php'>";
                        echo "<i class='fa-solid fa-user'></i>";
                        echo "<span>Profile</span>";
                        echo "</a>";
                    } else {
                        echo "<a href='profile.php'>";
                        echo "<i class='fa-solid fa-user'></i>";
                        echo "<span>Profile</span>";
                        echo "</a>";
                    }
                ?>
            </li>
            <li class="logout">
                <a href="../logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>