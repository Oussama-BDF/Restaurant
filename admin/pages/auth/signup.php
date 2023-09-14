<?php 
    include __DIR__ ."/../../env.php";
    include __DIR__ . $exitAuth . $layout . "head.php";
    include __DIR__ . $exitAuth . $user . "authFunctions.php";
?>

    <!-- Import any file css here -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>authStyle.css?v=1.1.0">
</head>
<body>
	<div class="main">
        <div class="container">
            <form class="form" action="<?php $errorMsgs = signUp();?>" method="post">
                <h2 class="title"><?php echo $siteTexts["signup"]["title"];?></h2>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <label class="authLbl">
                    <?php echo $siteTexts["signup"]["form"]["name"]["libelle"];?>
                </label>
                <input class="authInpt name" type="text" name="name" 
                    placeholder="<?php echo $siteTexts["signup"]["form"]["name"]["placeholder"];?>" 
                    value="<?php echo isset($_POST['name'])? $_POST['name'] : "";?>">
                <?php echo displayErrMsg($errorMsgs, "name"); ?><br>

                <label class="authLbl">
                    <?php echo $siteTexts["signup"]["form"]["email"]["libelle"];?>
                </label>
                <input class="authInpt email" type="text" name="email" 
                    placeholder="<?php echo $siteTexts["signup"]["form"]["email"]["placeholder"];?>" 
                    value="<?php echo isset($_POST['email'])? $_POST['email'] : "";?>">
                <?php echo displayErrMsg($errorMsgs, "email"); ?><br>

                <label class="authLbl">
                    <?php echo $siteTexts["signup"]["form"]["password"]["libelle"];?>
                </label>
                <input class="authInpt password" type="password" name="password" 
                    placeholder="<?php echo $siteTexts["signup"]["form"]["password"]["placeholder"];?>">
                <?php echo displayErrMsg($errorMsgs, "password"); ?><br>

                <label class="authLbl">
                    <?php echo $siteTexts["signup"]["form"]["re_password"]["libelle"];?>
                </label>
                <input class="authInpt re_password" type="password" name="re_password" 
                    placeholder="<?php echo $siteTexts["signup"]["form"]["re_password"]["placeholder"];?>">
                <?php echo displayErrMsg($errorMsgs, "re_password"); ?><br>

                <button class="authBtn" type="submit">
                    <?php echo $siteTexts["signup"]["form"]["submit"];?>
                </button>
                <a href="signin.php" class="authAnchr">
                    <?php echo $siteTexts["signup"]["form"]["anchor"];?>
                </a>
            </form>
        </div>
    </div>
</body>

<!-- Import any file js here -->

</html>