<?php 
    include __DIR__ ."/../../env.php";
    include __DIR__ . $exitProd . $layout . "head.php";
    include __DIR__ . $exitProd . $prod . "prodFunctions.php";
    include __DIR__ . $exitAuth . $user . "authFunctions.php";
?>

    <!-- Import any file css here -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>products.css?v=1.3.19">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>preload.css?v=1.2.1">

</head>
<body>
    <?php include __DIR__ . $exitProd . $cmp . "preload.php";?>
    <?php include __DIR__ . $exitProd . $layout . "header.php";?>
    <main>
        <?php include __DIR__ . $exitProd .  $cmp . 'ingredients/showIngCateg.php';  ?>

        <?php include __DIR__ . $exitProd .  $cmp . 'ingredients/addIngCateg.php';  ?>

        <?php include __DIR__ . $exitProd .  $cmp . 'ingredients/updIngCateg.php';  ?>

        <?php include __DIR__ . $exitProd .  $cmp . 'ingredients/showIngredients.php';  ?>

        <?php include __DIR__ . $exitProd .  $cmp . 'ingredients/addIngredient.php';  ?>
    </main>
</body>

<!-- Import any file js here -->
<script src="assets/js/script.js"></script>

<?php include __DIR__ . $exitProd . $layout . "footer.php"; ?>
</html>
