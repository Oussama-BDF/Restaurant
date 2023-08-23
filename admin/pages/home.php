<?php 
    include __DIR__ ."/../env.php";
    include __DIR__ . $exitPage . $layout . "header.php";
    include __DIR__ . $exitPage . $fnc . "authFunctions.php";
    
?>

    <!-- Import any file css here -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>authStyle.css?v=1.2.5">
    <title><?php echo $siteTexts["home"]["title"];?></title>

</head>
<body>
    <div class="container">
        <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
        <form action="<?php signOut();?>" method="post">
            <button class="authBtn" type="submit" name="signout"><?php echo $siteTexts["home"]["submit"];?></button>
        </form>
        <?php include __DIR__ . '/../includes/components/home/about.php';  ?> <!--or '../includes/components/home/contact.php'-->
        <br>
        <a class="authBtn" href="changePass.php"><?php echo $siteTexts["home"]["anchor"];?></a>
        <?php include  __DIR__ . '/../includes/components/home/contact.php';  ?>
    </div>
</body>

<!-- Import any file js here -->

<?php include __DIR__ . $exitPage . $layout . "footer.php"; ?>
</html>
