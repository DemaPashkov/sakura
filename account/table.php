<?php

include 'header.php';
require_once('../php/bd.php');

if (isset($_SESSION['login_user'])) {

    $user_check = $_SESSION['login_user'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user_check'");
    $rows = mysqli_fetch_array($query);
    $names = $rows['name'];
    $status = $rows['admin'];

} else {
    header('Location index.php');
}
?>
<link rel='stylesheet' href='../css/style.css'> 
<section class="account">
 <nav> 
    <ul> 
      <?php
      $conn = mysqli_connect("localhost", "root", "root", "tuning_center");
      $sql = "SHOW FULL TABLES FROM tuning_center WHERE TABLE_TYPE != 'VIEW';";
      $result = mysqli_query($conn, $sql);
    
      // output database names
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          if($row['Tables_in_tuning_center'] == 'accessories'){
            $tables = 'аксессуары';
            $href = 'accessories.php';
          }if($row['Tables_in_tuning_center'] == 'cars_accessories'){
            $tables = 'Реализованные проекты';
            $href = 'cars_accessories.php';
          }if(($row['Tables_in_tuning_center'] == 'clients')){
            $tables = 'Клиенты';
            $href = 'clients.php';
          }if($row['Tables_in_tuning_center'] == 'modifications'){
            $tables = 'Модификации';
            $href = 'modifications.php';
          }if($row['Tables_in_tuning_center'] == 'payments'){
            $tables = 'Платежи';
            $href = 'payments.php';
          }if($row['Tables_in_tuning_center'] == 'users'){
            $tables = 'Админка';
            $href = 'users.php';
          }if($row['Tables_in_tuning_center'] == 'work_schedule'){
            $tables = 'График работы';
            $href = 'work_schedule.php';
          }
          echo '<li><a href="../tables/'.$href.'" class="">'.$tables ."</a></li><br>";
        }
      }
      ?>
    </ul>
</nav>
</section>