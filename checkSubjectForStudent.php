<?php 

  include('config.php'); 


    $sub_id = $_POST['subjectId']; 


    $sql = "SELECT ui.id_subject, s.subject_name , u.id_user as id_stu, u.username as us_name
            FROM  user_info_subject ui 
            JOIN users u
            JOIN  subjects s
             ON  ui.id_subject = s.id_subject AND  u.id_user != ui.id_user AND u.id_user !=1";
    
    $query_run = mysqli_query($conn,$sql);   
?>

   <option>Select subject</option>
<?php 

  while($row = mysqli_fetch_array($query_run)){

  
?>
   <option value="<?= $row['id_stu']?>"><?= $row['us_name']?></option>
<?php   

  }
?>