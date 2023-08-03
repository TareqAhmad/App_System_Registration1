<?php 

  include('config.php');


    $id_user = $_POST['user_id'];


    $sql = "SELECT ui.id_user, ui.id_subject,s.id_subject as id_sub, s.subject_name as sub_name FROM user_info_subject ui JOIN subjects s  ON  ui.id_user='$id_user' AND ui.id_subject = s.id_subject";
    $query_run = mysqli_query($conn,$sql); 
?>
<option>Select subject</option>
<?php 

  while($row = mysqli_fetch_array($query_run)){

  
  ?>
   <option value="<?= $row['id_sub']?>"><?= $row['sub_name']?></option>
<?php   

  }
?>

