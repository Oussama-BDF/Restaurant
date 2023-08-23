<?php 
	include __DIR__ ."/env.php";
	include __DIR__ . "/" . $layout . "header.php";
?>

	<!-- Import any file css here -->
	<link rel="stylesheet" type="text/css" href="<?php echo $css;?>authStyle.css?v=1.2.5">
	<title><?php echo $siteTexts["index"]["title"];?></title>
</head>
<body>
	<h2>Welcome</h2>
	<a class="button" href="signin.php">Sign In??</a>

</body>

	<!-- Import any file js here -->

<?php include __DIR__ . "/" . $layout . "footer.php"; ?>

</html>