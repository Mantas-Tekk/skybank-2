<?php

//var_dump($data);


require DIR2 . '/views/main/header.php';
?>

<div class="acc__container">

  <table id="customers">
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
        <td>'.$value->personalNumber.'</td>
        <td>'.$value->iban.'</td>
        <td>'.$value->balance.' €</td>
        <td>
          <div class="action__buttons">
            <button onclick="window.location=\'/account/delete/'.$value->id.'\'">Delete</button>
            <button onclick="window.location=\'/account/edit/'.$value->id.'/add\'">Add</button>
            <button onclick="window.location=\'/account/edit/'.$value->id.'/sub\'">Sub</button>
          </div>
        </td>
      </tr>';
    }
    ?>
  </table>

</div>

<?php
require DIR2 . '/views/main/footer.php';
