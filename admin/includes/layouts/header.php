
<header class="header">
    <div class="container flex">
        <div class="logo">
            <img width=200px height=auto src="assets/img/logo0.svg" alt="">
        </div>
        <nav>
            <ul class="flex">
                <li><a id="home" class="navbar-link" href="home.php">Home</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="#Menus">Menus</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="foods.php">Foods</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="ingredients.php">Ingredients</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="#Orders">Orders</a></li>
                <div class="separator"></div>
                <li><a class="navbar-link" href="#Admins">Admins</a></li>
            </ul>
        </nav>
        <form action="<?php signOut();?>" method="post">
            <button class="btn gold" type="submit" name="signout" data-content="<?php echo $siteTexts["home"]["submit"];?>"><?php echo $siteTexts["home"]["submit"];?></button>
        </form>
    </div>
</header>