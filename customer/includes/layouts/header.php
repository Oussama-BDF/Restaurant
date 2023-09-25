
<header class="header">
    <div class="container flex">
        <div class="logo">
            <img width=200px height=auto src="assets/img/logo0.svg" alt="">
        </div>
        <nav>
            <ul class="flex">
                <li><a id="home" class="navbar-link" href="home.php">Home</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="menu.php">MENU</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="#ABOUTUS">ABOUT US</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="#CONTACT">CONTACT</a></li>
                <!-- <div class="separator"></div>
                <li><a class="navbar-link" href="#ORDERNOW">ORDER NOW</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="#ORDERNOW">ORDER HISTORY</a></li> -->
            </ul>
        </nav>
        <!-- <div style="padding: 17px; /*background: red;*/">
            <i style="font-size: 20px; vertical-align: middle; color: white;" class="fab fa-sistrix"></i>
            <input style="border-raduis: 10px" type="text">
        </div> -->
        <button class="btn black" type="submit" name="order" data-content="Order">Order</button>
        <form action="" method="post">
            <button class="btn gold" type="submit" name="signin" data-content="<?php echo $siteTexts["home"]["submit"];?>"><?php echo $siteTexts["home"]["submit"];?></button>
        </form>
    </div>
</header>