<?php

//var_dump($data);


require DIR2 . '/views/main/header.php';
?>

<div class="acc__container">
  <table>
    <tr>
      <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Personal Number</th>
      <th>IBAN</th>
      <th>Balance</th>
      <th style="text-align:center;">Action</th>
    </tr>
    <?php
    foreach($data as $value) {
      echo '
      <tr>
        <td>'.$value->id.'</td>
        <td>'.$value->name.'</td>
        <td>'.$value->surname.'</td>
        <td>'.$value->iban.'</td>
        <td>'.$value->balance.'</td>
        <td>'.$value->personalNumber.'</td>
        <td>
          <div class="action__buttons">
            <button>Delete</button>
            <button>Add</button>
            <button>Substract</button>
          </div>
        </td>
      </tr>';
      
    }
    ?>
  </table>

</div>

<?php
require DIR2 . '/views/main/footer.php';
