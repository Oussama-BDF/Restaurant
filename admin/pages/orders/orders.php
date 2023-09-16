<?php 
    include __DIR__ ."/../../env.php";
    include __DIR__ . $exitProd . $layout . "head.php";
    include __DIR__ . $exitProd . $prod . "prodFunctions.php";
    include __DIR__ . $exitAuth . $user . "authFunctions.php";
?>

    <!-- Import any file css here -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>products.css?v=1.3.58">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>preload.css?v=1.2.0">

</head>
<body>
    <?php include __DIR__ . $exitProd . $cmp . "preload.php";?>
    <?php include __DIR__ . $exitProd . $layout . "header.php";?>
    <main>
        <section class="showCategories">
            <div class="container">
                
            </div>
        </section>
    </main>
</body>

<!-- Import any file js here -->
<script src="assets/js/script.js?v=1.0.7"></script>

<script>


    </script>


<?php include __DIR__ . $exitProd . $layout . "footer.php"; ?>
</html>
