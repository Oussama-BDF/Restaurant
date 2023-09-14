<section class="showCategories">
    <div class="container">
        <div class="row flex buttons">
            <a class="btn black" href="home.php" data-content="back">Back</a>
            <div class="btn black" onclick="document.getElementById('blockOtherElements').style.display='block'; document.body.style.overflow = 'hidden';" data-content="Add Category">Add Category</div>
        </div>
        <?php showCategories("food_categ", "Food");?>
    </div>
</section>
<?php showMsg(rmvCategory("food_categ"));?>