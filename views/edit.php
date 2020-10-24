<?php

require DIR2 . '/views/main/header.php';
?>

<div class="container1">
    <?php // $toast_html?>
   <div class="container2">
        <form action="" method="POST">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Vardas</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="<?= $user['name'] ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Pavarde</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="<?= $user['surname'] ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Balansas</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="<?= $user['balance'] ?> €" disabled>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-25">
                    <label for="money"><?php //$button_name ?> pinigu</label>
                </div>
                <div class="col-50">
                    <input type="text" name="money" id="money" placeholder="0.00 €">
                </div>
                <div class="col-25-b">
                    <button type="submit" name="<?php //$button_value ?>">EDIT<?php //$button_name ?></button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
require DIR2 . '/views/main/footer.php';