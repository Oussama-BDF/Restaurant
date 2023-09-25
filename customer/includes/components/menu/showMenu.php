<section class="showMenu">
    <div class="container">
        <div class="row flex buttons">
<?php
        include __DIR__ . "/../../../backend/database/db_conn.php";
        $sql = "SELECT * FROM food_categ LIMIT 4";
        $result = mysqli_query($conn, $sql);
        While($row = mysqli_fetch_assoc($result)){
?>
            <form action="" method="post">
                <button onclick="this.classList.add('clicked')" class="categoryBtn" class="text" type="submit">
                    <div class="categoryImg" style="background-image: url('../uploads/<?php echo $row['image']?>?v=1.1.0')"></div><?php echo $row['name']?>
                </button>
                <input type="hidden" name="hdnId" value="<?php echo $row['id']?>">
            </form>
<?php
        }
?>  
        </div>
        <?php showMenu();?>
    </div>
</section>
