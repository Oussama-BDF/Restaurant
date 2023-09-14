<section class="showCategories">
    <div class="container">
        <div class="row flex buttons">
            <a class="btn black " href="home.php" data-content="back">Back</a>
            <div class="btn black" onclick="document.getElementById('blockOtherElements').style.display='block';" data-content="Add Category">Add Category</div>
        </div>
        <?php showCategories("ing_categ", "Ingredient");?>
    </div>
</section>
<?php showMsg(rmvCategory("ing_categ"));?>