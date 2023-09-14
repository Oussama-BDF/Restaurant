<?php
    /*******************************************PRODUCTS FUNCTIONS************************************** */
    
// Display Categories from the database
function showCategories($table, $element){
    include __DIR__ . "/../database/db_conn.php";
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    for ($i=0; $row = mysqli_fetch_assoc($result) ; $i++) :
        if($i % 3 == 0 && $i!=0){
            echo '</div>';
        }
        if($i % 3 == 0){
            echo '<div class="row flex">';
        }
?>
        <div class="category col" style="background-image: url('uploads/<?php echo $row["image"]; ?>')">
            <span class="categoryName"><?php echo $row["name"]; ?></span>

            <form class="form" action="" method="post">
                <input type="hidden" name="hdnId" value="<?php echo $row["id"]?>">
                <input type="hidden" name="hdnName" value="<?php echo $row["name"]?>">
                <input type="hidden" name="hdnImage" value="<?php echo $row["image"]?>">
                <button class="smallBtn black remove" type="submit" name="rmvCatg">Remove</button>
                <button class="smallBtn black update" type="submit" name="showUpdCatg">Update</button>
                <div class="smallBtn black prod" id="btn<?php echo $i?>" onclick="showProdButtons(<?php echo $i?>, <?php echo $i + 10?>, <?php echo $i + 20?>)"><?php echo $element?>s<span class="floatRight">▼</span>
                    <button id="select<?php echo $i + 10?>" class="select select1" type="submit" name="showProd">View<br><?php echo $element?>s</button>
                    <button id="select<?php echo $i + 20?>" class="select select2" type="submit" name="showAdd<?php echo $element?>">Add<br><?php echo $element?></button>
                </div>
            </form>
        </div>
<?php
    endfor;
    if($i != 0) echo '</div>';
    mysqli_close($conn);
}


// Display ingredients / foods
function showProducts($table, $foreignKey){
    if(isset($_POST["showProd"])){
?>
        <section class="showProducts blockOtherElements" style="display: block;">
            <div class="container">
                <div class="row flex buttons">
                    <a class="btn black" href="<?php echo basename($_SERVER["PHP_SELF"])?>" data-content="back">Back</a>
                </div>
<?php
        include __DIR__ . "/../database/db_conn.php";
        $sql = "SELECT * FROM $table WHERE $foreignKey=" . $_POST["hdnId"];
        $result = mysqli_query($conn, $sql);
        for ($i=0; $row = mysqli_fetch_assoc($result) ; $i++) :
            if($i % 3 == 0 && $i!=0){
                echo '</div>';
            }
            if($i % 3 == 0){
                echo '<div class="row flex">';
            }
?>
            <div class="prod <?php if($table == "foods") echo "foods"?>" style="background-color: var(--eerie-black-1)">
                <div class="prodImg <?php if($table == "foods") echo "foodImg"?>"  style="background-image: url('uploads/<?php echo $row["image"]; ?>')">
                    <form action="" method="post">
                        <button class="smallBtn black remove" type="submit" name="">Remove</button>
                        <button class="smallBtn black update" type="submit" name="">Update</button>
                        <input type="hidden" name="hdnId" value="<?php echo $row["id"]?>">
                        <input type="hidden" name="hdnName" value="<?php echo $row["name"]?>">
                        <input type="hidden" name="hdnImage" value="<?php echo $row["image"]?>">
                    </form>
                </div>
                <span class="prodName"><?php echo $row["name"]; ?></span>
                <?php if($table == "foods") :?>
                    <span class="prodPrice"><?php echo $row["price"]; ?> MAD</span>
                    <span class="description"><?php echo $row["description"];?></span>
                <?php endif;?>
            </div>
<?php
        endfor;
        if($i != 0) echo '</div>';
        mysqli_close($conn);
?>
            </div>
        </section>
<?php
    }
}


function showAddFood(){
    if(isset($_POST["showAddFood"])) :
?>
        <section class="addProd blockOtherElements" style="display: block;">
            <div class="container flex">
                <form class="form" action=""  method="post" enctype="multipart/form-data">
                    <h2 class="title">Add Food</h2>
                    <div class="flex">
                        <div class="column">
                            <label class="Lbl">
                                Title:
                            </label>
                            <input class="Inpt" type="text" placeholder="title"  name="name">
                        </div>
                        <div class="column">
                            <label class="Lbl">
                                Description:
                            </label>
                            <input class="Inpt" type="text" placeholder="description"  name="description">
                        </div>
                        <div class="column">
                            <label class="Lbl">
                                Price:
                            </label>
                            <input class="Inpt" type="text" placeholder="price"  name="price">
                        </div>
                    </div><br>

                    <div class="flex">
                        <div class="column">
                            <label class="Lbl">
                                Element:
                            </label>
                            <input class="Inpt" type="text" placeholder="element"  name="element">
                        </div>
                        <div class="column">
                            <label class="Lbl">
                                Max:
                            </label>
                            <input class="Inpt" type="text" placeholder="max"  name="max">
                        </div>
                        <div class="column">
                            <label class="Lbl">
                                Min:
                            </label>
                            <input class="Inpt" type="text" placeholder="min"  name="min">
                        </div>
                    </div><br>

                    <div class="flex">
                        <div class="column">
                            <label class="Lbl">
                                Image:
                            </label>
                            <div class="Inpt imgInpt">
                                <div class="imgContainer imgContainer2" id="imgContainer_addProd" style="background-image: url('uploads/food.png?v=1.1.0')"></div><br>
                                <input class="fileInpt fileInpt2" onchange="displayImage('fileInput_addProd', 'imgContainer_addProd')" id="fileInput_addProd" type="file" name="fileToUpload" data-content="Select An Image">
                            </div>
                        </div>
                        <div class="column">
                            <label class="Lbl">
                                has ingredients?
                            </label>
                            <div class="Inpt imgInpt">
                                <input class="radio" onchange="showCatIngredients()" type="radio" id="yes" name="has_ing" value="1">
                                <label for="yes">Yes</label>

                                <input checked class="radio" onchange="hiddeCatIngredients()" type="radio" id="no" name="has_ing" value="0">
                                <label for="no">No</label>
                                <br>

<?php
    include __DIR__ . "/../database/db_conn.php";
    $sql = "SELECT name, id FROM ing_categ";
    $result = mysqli_query($conn, $sql);
    $i = 1;
    while($row = mysqli_fetch_assoc($result)) :
?>
                                <div class="categoryTest" onclick="showIngOption('containerTest<?php echo $i?>')" style="display: none" id="category<?php echo $i?>">
                                    <span><?php echo $row["name"]?></span><span class="floatRight">▼</span><br>
                                </div>
                                <div class="mard"><div id="containerTest<?php echo $i?>" class="containerTest">
<?php
        $sql2 = "SELECT s.name, s.id FROM ingredients s, ing_categ g WHERE s.ing_categ_id=g.id AND g.id=" . $row["id"];
        $result2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_assoc($result2)):
?>
                                        <div class="ingredient"><input type="checkbox" name="ingrd<?php echo $row2["id"]?>" value="<?php echo $row2["id"]?>"> <?php echo $row2["name"]?></div>
<?php                         
        endwhile;
        $i++;
                                echo "</div></div>";
    endwhile;
?>
                            </div>
                        </div>
                    </div><br>

                    <button class="smallBtn gold" type="submit" name="addFood">Add Food</button>
                    <a class="anchr" href="<?php echo basename($_SERVER["PHP_SELF"])?>">Back</a>
                    <input type="hidden" name="hdnId" value="<?php echo $_POST["hdnId"]?>">
                </form>
            </div>
        </section>
<?php
    endif;
}

function addFood($table){
    if (isset($_POST['addFood'])){
        include __DIR__ . "/../database/db_conn.php";
        if($_POST['name']==""){
            $msg["img"] = "warning1";
            $msg["msg"] = "Please Choose A Title.";
        }else if($_POST["price"]==""){
            $msg["img"] = "warning1";
            $msg["msg"] = "Please Choose A price.<br>";
        } else if($_POST["element"]==""){
            $msg["img"] = "warning1";
            $msg["msg"] = "Please Choose An element.<br>";
        } else if($isOk = (uploadImg())){
            if (gettype($isOk) === "string"){ //its returns an error message
                $msg["img"] = "warning1";
                $msg["msg"] = $isOk;
            }else{ //its returns true (the image uploaded successfully)
                $fileName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
            }
        } else{ //its returns false (there is no image, so we'll use the default image)
            $fileName = "food.png";
            $isOk = true;
        }
        // if everything is ok, try to insert the food into the db
        if (isset($isOk) && $isOk === true) {
            $query = "INSERT INTO $table (name, description, price, hasIng, element, max, min, image, food_categ_id) VALUES 
            ('" . $_POST["name"] . "','" . $_POST["description"] . "','" . $_POST["price"] . "','" . $_POST["has_ing"] . "','" . $_POST["element"] . "','" . $_POST["max"] . "','" . $_POST["min"] . "', '$fileName'" . "," . $_POST["hdnId"] . ")";
            if(mysqli_query($conn, $query)){
                $last_id = $conn->insert_id;
                if($_POST["has_ing"] == "1"){
                    $sql2 = "INSERT INTO food_has_ing (foods_id, ingredients_id) VALUES ";
                    $counter = false;
                    foreach ($_POST as $key => $value) {
                        if (str_contains($key, "ingrd")) {
                            if($counter==true) $sql2 .= ",";
                            else $counter = true;
                            $sql2 .= "( $last_id , " . $_POST["$key"] . ")";
                        }
                    }
                    $sql2 .= ";";
                    if($counter){
                        if (mysqli_query($conn, $sql2)) {
                            $msg["img"] = "validation1";
                            $msg["msg"] = "The Food Uploaded And Inserted Into The Database with ingredients.<br>";                    
                        } else {
                            $msg["img"] = "warning1";
                            $msg["msg"] = "Error: " . mysqli_error($conn);
                        }
                    }else {
                        $msg["img"] = "validation1";
                        $msg["msg"] = "The Food Uploaded And Inserted Into The Database without ingredients.<br>"; 
                    }
                } else{
                    $msg["img"] = "validation1";
                    $msg["msg"] = "The Food Uploaded And Inserted Into The Database without ingredients.<br>";                    
                }
            } else {
                $msg["img"] = "warning1";
                $msg["msg"] = "Error: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        return $msg;
    }
}


function showAddIngredient(){
    if(isset($_POST["showAddIngredient"])) :
?>
        <section class="addProd blockOtherElements" style="display: block;">
            <div class="container flex">
                <form class="form" action=""  method="post" enctype="multipart/form-data">
                    <h2 class="title">Add Ingredient</h2>

                    <label class="Lbl">
                        Title:
                    </label>
                    <input class="Inpt" type="text" placeholder="title"  name="name"><br>

                    <label class="Lbl">
                        Image:
                    </label>
                    <div class="Inpt imgInpt">
                        <div class="imgContainer" id="imgContainer_addProd" style="background-image: url('uploads/ingredient.png?v=1.1.0')"></div><br>
                        <input class="fileInpt" onchange="displayImage('fileInput_addProd', 'imgContainer_addProd')" id="fileInput_addProd" type="file" name="fileToUpload" data-content="Select An Image">
                    </div><br>

                    <button class="smallBtn gold" type="submit" name="addIngredient">Add Ingredient</button>
                    <a class="anchr" href="<?php echo basename($_SERVER["PHP_SELF"])?>">Back</a>
                    <input type="hidden" name="hdnId" value="<?php echo $_POST["hdnId"]?>">
                </form>
            </div>
        </section>
<?php
    endif;
}

function addIngredient($table){
    if (isset($_POST['addIngredient'])){
        include __DIR__ . "/../database/db_conn.php";
        if($_POST['name']==""){
            $msg["img"] = "warning1";
            $msg["msg"] = "Please Choose A Title.";
        } else if($isOk = (uploadImg())){
            if (gettype($isOk) === "string"){ //its returns an error message
                $msg["img"] = "warning1";
                $msg["msg"] = $isOk;
            }else{ //its returns true (the image uploaded successfully)
                $fileName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
            }
        } else{ //its returns false (there is no image, so we'll use the default image)
            $fileName = "ingredient.png";
            $isOk = true;
        }
        // if everything is ok, try to insert the category into the db
        if (isset($isOk) && $isOk === true) {
            $query = "INSERT INTO $table (name, image, ing_categ_id) VALUES ('" . $_POST["name"] . "', '$fileName'," . $_POST["hdnId"] .")";
            if (mysqli_query($conn, $query)) {
                $msg["img"] = "validation1";
                $msg["msg"] = "The Ingredient Uploaded And Inserted Into The Database.<br>";
            } else {
                $msg["img"] = "warning1";
                $msg["msg"] = "Error: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        return $msg;
    }
}

/* *************************************The Categories******************************** */
function rmvCategory($table){
    if(isset($_POST["rmvCatg"])){
        include __DIR__ . "/../database/db_conn.php";
        // displayMsg(["msg" => "Are you sure that you wanna remove this??", "img" => "warning1"]);
        $filePath = '../../uploads/' . $_POST["hdnImage"];
        if($_POST["hdnImage"] != "category.png"){
            if (file_exists($filePath) && !unlink($filePath)) {
                $msg["img"] = "warning1";
                $msg["msg"] = "Unable To Delete The Image";
            }
        }

        if(!isset($msg)){
            $sql = "DELETE FROM $table WHERE id=" . $_POST["hdnId"];
            $result = mysqli_query($conn, $sql);
            $msg["img"] = "validation1";
            $msg["msg"] = "Your Category Has Been Removed Successfully";
        }
        return $msg;
        mysqli_close($conn);
    }
}

// Display the section of updating an item
function showUpdateCategory(){
    if(isset($_POST["showUpdCatg"])) :
?>
        <section class="updCategory blockOtherElements" style="display: block;">
            <div class="container flex">
                <form class="form" action=""  method="post" enctype="multipart/form-data">
                    <h2 class="title">Update Category</h2>
                    <label class="Lbl">
                        Title:
                    </label>
                    <input class="Inpt" type="text" placeholder="title"  name="name" value="<?php echo $_POST["hdnName"];?>"><br>
                    <label class="Lbl">
                        Image:
                    </label>
                    <div class="Inpt imgInpt">
                        <div class="imgContainer" id="imgContainer_upd" style="background-image: url('uploads/<?php echo $_POST["hdnImage"]; ?>')"></div><br><br>
                        <input class="fileInpt" onchange="displayImage('fileInput_upd', 'imgContainer_upd')" id="fileInput_upd" type="file" name="fileToUpload" data-content="New Image?">
                    </div><br>
                    <button class="smallBtn gold" type="submit" name="updCatg">Update Category</button>
                    <a class="anchr" href="<?php echo basename($_SERVER["PHP_SELF"])?>">Back</a>

                    <input type="hidden" name="hdnId" value="<?php echo $_POST["hdnId"]?>">
                    <input type="hidden" name="hdnName" value="<?php echo $_POST["hdnName"]?>">
                </form>
            </div>
        </section>
<?php
    endif;
}


// Update an item from the database
function updateCategory($table){
    if (isset($_POST['updCatg'])){
        include __DIR__ . "/../database/db_conn.php";

        $sql = "UPDATE $table SET ";
        if($isOk = (uploadImg())){
            if(gettype($isOk) === "string"){ //its return an error message
                $msg["img"] = "warning1";
                $msg["msg"] = $isOk;
            }else{ //its return true (the image uploaded successfully)
                $fileName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                $sql .= "image='" . $fileName . "'";
            }
        }

        if($_POST['name'] != $_POST['hdnName']){
            if($isOk == true)   $sql .= ", ";
            $isOk = true;
            $sql .= "name='" . $_POST['name'] . "'";
        }

        if($isOk === true && !isset($msg["img"])){
            $sql .= " WHERE id =" . $_POST['hdnId'];
            if (mysqli_query($conn, $sql)) {
                $msg["img"] = "validation1";
                $msg["msg"] = "The Category Updated Successfully.<br>";
            } else {
                $msg["img"] = "warning1";
                $msg["msg"] = "Error: " . mysqli_error($conn);
            }
        } else if(!$isOk){
            $msg["img"] = "warning1";
            $msg["msg"] .= "There Is Nothing To Update!!";
        }
        mysqli_close($conn);
        return $msg;
    }
}


// Display the section of adding an item
function showAddCategory(){
?>
    <div class="container flex">
        <form class="form" action=""  method="post" enctype="multipart/form-data">
            <h2 class="title">Add Category</h2>
            <label class="Lbl">
                Title:
            </label>
            <input class="Inpt" type="text" placeholder="title"  name="name"><br>

            <label class="Lbl">
                Image:
            </label>
            <div class="Inpt imgInpt">
                <div class="imgContainer" id="imgContainer_add" style="background-image: url('uploads/category.png?v=1.1.0')"></div><br><br>
                <input class="fileInpt" onchange="displayImage('fileInput_add', 'imgContainer_add')" id="fileInput_add" type="file" name="fileToUpload" data-content="Select An Image">
            </div><br>

            <button class="smallBtn gold" type="submit" name="addCatg">Add Category</button>
            <a class="anchr" href="<?php echo basename($_SERVER["PHP_SELF"])?>">Back</a>
        </form>
    </div>
<?php
}


// Add an item into the database
function addCategory($table){
    if (isset($_POST['addCatg'])){
        include __DIR__ . "/../database/db_conn.php";
        if($_POST['name']==""){
            $msg["img"] = "warning1";
            $msg["msg"] = "Please Choose A Title.";
        } else if($isOk = (uploadImg())){
            if (gettype($isOk) === "string"){ //its returns an error message
                $msg["img"] = "warning1";
                $msg["msg"] = $isOk;
            }else{ //its returns true (the image uploaded successfully)
                $fileName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
            }
        } else{ //its returns false (there is no image, so we'll use the default image)
            $fileName = "category.png";
            $isOk = true;
        }
        // if everything is ok, try to insert the category into the db
        if (isset($isOk) && $isOk === true) {
            $query = "INSERT INTO $table (name, image) VALUES ('" . $_POST["name"] . "', '$fileName')";
            if (mysqli_query($conn, $query)) {
                $msg["img"] = "validation1";
                $msg["msg"] = "The Category Uploaded And Inserted Into The Database.<br>";
            } else {
                $msg["img"] = "warning1";
                $msg["msg"] = "Error: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        return $msg;
    }
}


// This return true or false or an error message
function uploadImg(){
    if($_FILES['fileToUpload']["name"] !== ""){
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //uploads/myfile.jpg
        // Check if image file is actual an image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check == false) {
            return "Sorry, the file is not an image.<br>";
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            return "Sorry, file already exists.<br>";
        }
        return (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))? true : "Unknown Error While Loading The Image!!";
    }
    return false;
}


// Display a message after try to add, update an item
function showMsg($msg){
    if(!empty($msg)) :
?>
    <section class="message blockOtherElements" style="display: block;">
        <div class="container flex msg">
            <img src="assets/img/<?php echo $msg["img"]?>.png"><br>
            <b><div class="title">
                <?php echo $msg["msg"];?>
            </div></b>
            <a class="smallBtn gold" href="<?php echo basename($_SERVER["PHP_SELF"])?>">OK</a>
        </div>
    </section>
<?php
    endif;
}
    
