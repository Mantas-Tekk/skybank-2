<?php
//var_dump($_POST);

require DIR2 . '/views/main/header.php';
?>
<div class="register">

    <!-- <div style="'.(strlen($error) > 0? '' : 'display:none;') .'" class="reg-toast">
        <p>'.$error.'</p>
    </div> -->

    <div class="wrapper2">

        <div class="img__container">
            <img src="/images/4.png" alt="">
        </div>
    
        <form action="/account/save" method="post">
            <h2>Registracijos forma</h2>
    
            <label for="name">Vardas</label>
            <input type="text" name="name">
    
            <label for="lastname">Pavarde</label>
            <input type="text" name="lastname">
    
            <label for="personalcode">Asmens kodas</label>
            <input type="text" name="personalnumber">
    
            <div class="reg-button-wrapp">
                <button type="submit" name="register">Registruotis</button>
            </div>
        </form>

    </div>

</div>

<?php
require DIR2 . '/views/main/footer.php';
