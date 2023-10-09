<!-- we include this in all the pages -->
<?php
    include __DIR__ . $exitLayout . $user . "isUserConnected.php";
    include __DIR__ . $exitLayout . $str . "strings.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $siteTexts[ basename($_SERVER["PHP_SELF"], ".php")]["title"];?></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="shortcut icon" href="assets/img/favicon1.svg" type="image/svg+xml">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>global.css?v=1.1.9">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>header.css?v=1.1.7">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>footer.css?v=1.1.4">