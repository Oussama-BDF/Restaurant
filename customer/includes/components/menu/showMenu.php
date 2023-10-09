<section class="showMenu">
    <div class="container">
        <div class="row flex buttons">
<?php
        include __DIR__ . "/../../../backend/database/db_conn.php";
        $sql = "SELECT * FROM food_categ LIMIT 4";
        $stmt = $conn->query($sql);
        While($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <form action="" method="post">
                <button onclick="this.classList.add('clicked')" class="categoryBtn" class="text" type="submit">
                    <div class="categoryImg" style="background-image: url('../uploads/<?php echo $row['image']?>?v=1.1.0')"></div><?php echo $row['name']?>
                </button>
                <input type="hidden" name="hdnId" value="<?php echo $row['id']?>">
            </form>
<?php
        }
        $conn = null;
?>  
        </div>
        <?php showMenu();?>
    </div>
</section>
