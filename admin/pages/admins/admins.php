<?php 
    include __DIR__ ."/../../env.php";
    include __DIR__ . $exitProd . $layout . "head.php";
    include __DIR__ . $exitProd . $prod . "prodFunctions.php";
    include __DIR__ . $exitAuth . $user . "authFunctions.php";
?>

    <!-- Import any file css here -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>products.css?v=1.3.59">
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>preload.css?v=1.2.0">

</head>
<body>
    <?php include __DIR__ . $exitProd . $cmp . "preload.php";?>
    <?php include __DIR__ . $exitProd . $layout . "header.php";?>
    <main>
        <section class="showAdmins showCategories">
            <div class="container">
                <div class="row flex buttons">
                    <a class="btn black" href="home.php" data-content="back">Back</a>
                    <a class="btn black"  href="signup.php" data-content="Create an account">Create an account</a>
                </div>
                <div class="row flex admins">
                    <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>role</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include __DIR__ . "/../../backend/database/db_conn.php";
                                $sql = "SELECT * FROM admins";
                                $stmt = $conn->query($sql);
                                While($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    if($row["role"]!="superAdmin"){
                            ?>
                            <tr>
                                <td><?php echo $row["name"]?></td>
                                <td><?php echo $row["email"]?></td>
                                <td><?php echo $row["role"]?></td>
                                <form action="" method="post">
                                    <input type="hidden" name="hdnId" value="<?php echo $row["id"]?>">
                                    <td><input class="smallBtn gold" name="remove" type="submit" value="Remove"><input class="smallBtn gold floatRight" type="submit" name="Update" value="Update"></td>
                                </form>
                            </tr>
                            <?php
                                    }
                                }
                                if(isset($_POST["remove"])){
                                    $sql = "DELETE FROM admins WHERE id=" . $_POST["hdnId"];
                                    $result = mysqli_query($conn, $sql);
                                    $msg["img"] = "validation1";
                                    $msg["msg"] = "The Admin Has Been Removed Successfully";
                                    showMsg($msg);
                                }
                                $conn = null;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>

<!-- Import any file js here -->
<script src="assets/js/script.js?v=1.0.7"></script>

<script>


    </script>


<?php //include __DIR__ . $exitProd . $layout . "footer.php"; ?>
</html>
