<?php 
	include __DIR__ ."/../../env.php";
	include __DIR__ . $exitAuth . $layout . "header.php";
	include __DIR__ . $exitAuth . $fnc . "dbFunctions.php";
	include __DIR__ . $exitAuth . $fnc . "validateFunctions.php";
	include __DIR__ . $exitAuth . $fnc . "authFunctions.php";
?>

	<!-- Import any file css here -->
	<link rel="stylesheet" type="text/css" href="<?php echo $css;?>authStyle.css?v=1.2.5">
	<title><?php echo $siteTexts["changePass"]["title"];?></title>
</head>
<body>
	<div class="container">
		<form class="form" action="<?php $errorMsgs = changePass();?>" method="post">
			<h2><?php echo $siteTexts["changePass"]["title"]; ?></h2>
			
			<?php if (isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<label class="authLbl">
				<?php echo $siteTexts["changePass"]["form"]["op"]["libelle"];?>
			</label>
			<input class="authInpt op" type="password" name="op" 
				placeholder="<?php echo $siteTexts["changePass"]["form"]["op"]["placeholder"];?>">
			<?php echo displayErrMsg($errorMsgs, "op"); ?><br>

			<label class="authLbl">
				<?php echo $siteTexts["changePass"]["form"]["np"]["libelle"];?>
			</label>
			<input class="authInpt np" type="password" name="np" 
				placeholder="<?php echo $siteTexts["changePass"]["form"]["np"]["placeholder"];?>">
			<?php echo displayErrMsg($errorMsgs, "np"); ?><br>

			<label class="authLbl">
				<?php echo $siteTexts["changePass"]["form"]["c_np"]["libelle"];?>
			</label>
			<input class="authInpt c_np" type="password" name="c_np" 
				placeholder="<?php echo $siteTexts["changePass"]["form"]["c_np"]["placeholder"];?>">
			<?php echo displayErrMsg($errorMsgs, "c_np"); ?><br>

			<button class="authBtn" type="submit">
				<?php echo $siteTexts["changePass"]["form"]["submit"];?>
			</button>
			<a href="home.php" class="authAnchr">
				<?php echo $siteTexts["changePass"]["form"]["anchor"];?>
			</a>
		</form>
	</div>
</body>

	<!-- Import any file js here -->

<?php include __DIR__ . $exitAuth . $layout . "footer.php"; ?>

</html>