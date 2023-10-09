<?php
    /*******************************************PRODUCTS FUNCTIONS************************************** */
function showMenu(){
    include __DIR__ . "/../database/db_conn.php";

    if(isset($_POST["hdnId"])) {
        $sql = "SELECT * FROM foods where food_categ_id=" . $_POST["hdnId"];
    }else {
        $sql = "SELECT * FROM foods where food_categ_id=(select id from food_categ where name='Burgers')";
    }

    $stmt = $conn->query($sql);
    // $result = mysqli_query($conn, $sql);
    for ($i=0; $row = $stmt->fetch(PDO::FETCH_ASSOC); $i++) :
        if($i % 4 == 0 && $i!=0){
            echo '</div>';
        }
        if($i % 4 == 0){
            echo '<div class="row flex">';
        }
?>
        <div class="food col" style="background-color: var(--eerie-black-1)">
            <div class="foodImg"  style="background-image: url('../uploads/<?php echo $row["image"]; ?>?v=1.1.0')">
                <form action="" method="post">
                    <input type="hidden" name="hdnId" value="<?php echo $row["id"]?>">
                    <input type="hidden" name="hdnName" value="<?php echo $row["name"]?>">
                    <input type="hidden" name="hdnImage" value="<?php echo $row["image"]?>">
                </form>
            </div>
            <span class="foodName"><?php echo $row["name"]; ?></span>
        </div>
<?php
    endfor;
    if($i != 0) echo '</div>';
    $conn = null;
}