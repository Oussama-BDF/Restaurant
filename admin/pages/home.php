<?php 
    include __DIR__ ."/../env.php";
    include __DIR__ . $exitPage . $layout . "head.php";
    include __DIR__ . $exitPage . $user . "authFunctions.php";
    
?>

    <!-- Import any file css here -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>home.css?v=1.1.3">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>preload.css?v=1.1.0">
</head>
<body>
    <?php include __DIR__ . $exitPage . $cmp . "preload.php";?>
    <?php include __DIR__ . $exitPage . $layout . "header.php";?>
    <main>
        <article>
            <?php include __DIR__ . $exitPage .  $cmp . 'home/section1.php';  ?> <!--or '../includes/components/home/contact.php'-->

            <?php //include  __DIR__ . $exitPage . $cmp . 'home/section2.php';  ?>
        </article>
    </main>
</body>

<!-- Import any file js here -->
<script src="assets/js/script.js?v=1.1.2"></script>

<?php //include __DIR__ . $exitPage . $layout . "footer.php"; ?>
</html>
