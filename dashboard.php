<?php
     session_start();
   include('config.php');

    $id_user = $_SESSION['id_user'];
    $result = "SELECT id_user, username, email, status FROM users WHERE id_user!='$id_user'";
    $result_data = mysqli_query($conn,$result);
   

    $sql_users ="SELECT * FROM users WHERE id_user!='$id_user'";
    $result_sql_users = $conn->query($sql_users);    
   
   $sql_subject ="SELECT * FROM subjects";
   $result_sql_subject = $conn->query($sql_subject);



   $sql_users_second ="SELECT * FROM users WHERE id_user !='$id_user' ";
   $result_sql_users_second = $conn->query($sql_users_second);
   
//    $row_s = mysqli_fetch_all($result_sql_users_second);
   
//    print_r($row_s);
   
   

   $sql_subject_selected = "SELECT u.id_user, u.username s.id_subject, s.subject_name
                             FROM users u
                            INNER JOIN user_info_subject uis ON u.id_user = uis.id_user
                            INNER JOIN subjects s ON uis.id_subject = s.id_subject;
                            WHERE               users u ON s.id_user = u.id_user WHERE users.username='$id_user'";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!-- font google  -->
     <link href="" rel="stylesheet">
    <!-- link file bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- font awesome  -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- normalize file  -->
    <link rel="stylesheet" href="css/normalize.css">

</head>
<body>

       <div class="container-all d-flex m-0">
              <aside class="d-flex flex-column align-items-center justify-content-center bg-success p-3">
                 <h2>Welcome</h2>
                 <p class="text-white">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi modi earum optio magni, error impedit excepturi voluptatem consequatur, dolore officia reprehenderit explicabo aliquam! Illo, doloribus!
                 </p>
              </aside>
              <main class="d-flex flex-column w-100">
                    <header class="d-flex align-items-center justify-content-between bg-success p-3">
                         <a href="#" class="text-decoration-none text-white fs-4 ">logo</a>
                         <nav></nav>
                    </header>
                    <section class="content">
                    

                        <div class="d-flex align-items-center justify-content-between mx-auto border p-4 mt-5 w-50">
                            <button id="btn_popup1"  class="btn btn-success">new user</button>
                            <button id="btn_popup2"  class="btn btn-success">new subject</button>
                            <button id="btn_popup3"  class="btn btn-success">assign subject</button>
                            <button id="btn_popup4"   class="btn btn-success">set mark</button>
                        </div>




                        <div id="popup1" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">add new user</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <form id="form1" method="POST">
                                            <div class="mb-3">
                                                <label for="">student name</label>
                                                <input type="text"  name="username" id="username" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">student email</label>
                                                <input type="email"  name="email" id="email" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">student Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Repeat Password</label>
                                                <input type="password" name="passwordR" id="passwordR" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                            <button type="submit" name="registration" class="btn btn-success">save student</button>
                                            </div>
                                        </form> 
                                    </div>  
                                    </div> 
                                    <div id="result" class="text-center text-weight-bold mt-3"></div>
                                </div>

                            </div>
                        </div>     
                        </div>
                    
                        <div id="popup2" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content"> 
                                   <div class="modal-header">
                                        <h5 class="modal-title">new subject</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body">
                                         <div class="card w-100">
                                            <div class="card-body">
                                                 <form id="form2" method="POST">
                                                        <div class="mb-3">
                                                            <label for="">subject name</label>
                                                             <input type="text" name="subject_name" id="subject_name" class="form-control">
                                                        </div>
                                                         <div class="mb-3">
                                                            <label for="">minimum mark for success</label>
                                                            <input type="text" name="mark" id="mark" class="form-control">
                                                        </div>
                                                         <div class="mb-3">
                                                            <button type="submit" name="submit_subject" class="btn btn-success">save subject</button>
                                                        </div>
                                                   </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">     
                                             <div id="resultSubject" class="text-center text-weight-bold mt-3"></div>
                                        </div>  
                                   </div>
                                </div>
                            </div>   
                        </div>    
                      
                        <div id="popup3" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" >
                                        <h5 class="modal-title"> Assign subject to student</h5>
                                        <button type="button" class="btn-close reload" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="card w-100">
                                            <div class="card-body">
                                                    <form name="form3" id="form3"  method="POST">
                                                        <div class="input-group mb-3">
                                                           <div class="input-group-prepend">
                                                                <label class="input-group-text p-2" for="inputGroupSelect01">subjects</label>
                                                           </div>
                                                           <select  id="inputGroupSelect01" class="custom-select w-75 border p-2">
                                                               <?php  
                                                                 while ($row = mysqli_fetch_assoc($result_sql_subject)) {
                                                                    echo '<option value="' . $row['id_subject'] . '">' . $row['subject_name'] . '</option>';
                                                                 }
                                                                 ?>
                                                            </select>       
                                                        </div> 
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text p-2" for="inputGroupSelect01">students</label>
                                                            </div>
                                                            <select  id="inputGroupSelect02" class="custom-select w-75 border mb-3 p-2">

                                                            </select> 
                                                            <div class="mb-3">
                                                                 <button type="submit" name="assign_subject" class="btn btn-success">assign subject</button>
                                                            </div>  
                                                        </div>    
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                         <div id="resultAssign" class="text-center text-weight-bold mt-3"></div>   
                                    </div>
                                </div>
                            </div>
                        </div>    

                         <div id="popup4" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                   <div class="modal-header" >
                                        <h5 class="modal-title"> Assign mark to subject and student</h5>
                                        <button type="button" class="btn-close reload" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="card w-100">
                                          <div class="card-body">
                                            <form id="form4" action="" method="POST">
                                               <div class="input-group mb-3">
                                                    <label class="input-group-text p-2" for="">studnets</label>
                                                    <select  id="inputGroupSelect03" class="custom-select w-75 border p-2 select_3">
                                                       <option selected disabled>select student</option>
                                                       <?php 
                                                        while ($row = mysqli_fetch_assoc($result_sql_users_second)) {
                                                            echo '<option id="' . $row['id_user'] . '" value="' . $row['id_user'] . '">' . $row['username'] . '</option>';
                                                        }
                                                       ?>
                                                    </select>     
                                               </div>
                                               <div id="group" class="input-group mb-3">
                                                  <label class="input-group-text p-2" for="inputGroupSelect04">subjects</label>
                                                  <select  id="inputGroupSelect04" class="custom-select w-75 border p-2 select_4">

                                                  </select>
                                               </div>
                                               <div class="mt-3 mb-3  w-100 input_mark">
                                                 <label for="">mark for student</label>
                                                 <input type="number" name="mark_student" id="mark_student" class="form-control w-75">
                                               </div>
                                               <div class="mb-3">
                                                    <button  id="setMarkStudent" type="submit" name="submit_mark" class="btn btn-success">set mark</button>
                                               </div>
                                            </form>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div id="resultAssignMark" class="text-center text-weight-bold mt-3"></div>   
                                    </div>
                                </div>
                            </div>
                         </div>  
     

                        <div id="popup5" class="modal"  tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" >
                                                <h5 class="modal-title">update User</h5>
                                                <button type="button" class="btn-close reload" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card w-100">
                                                <div class="card-body">
                                                    <form id="formEdit" action="" method="POST">
                                                        <div class="mb-3">
                                                                <label for="">student name</label>
                                                                <input type="text" id="edit_username" name="username" class="form-control" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">student email</label>
                                                            <input type="email" id="edit_email" name="email" class="form-control" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">student status</label>
                                                            <input type="text" id="edit_status" name="status" class="form-control">
                                                        </div>
                                                        <div class="mb-3">
                                                        <button type="submit" name="update_student" class="btn btn-success">update student</button>
                                                    </div>
                                                </form> 
                                                </div> 
                                            </div>     
                                            <div id="resultUpdate" class="text-center text-weight-bold mt-3"></div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    

                        <div id="popup6" class="modal" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                                <div class="modal-header" >
                                <h5 class="modal-title">delete student</h5>
                                <button type="button" class="btn-close reload" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the student or user from the database?
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary reload" data-bs-dismiss="modal">Close</button>
                                        <button id="confirm" type="button" class="btn btn-danger btn_delete_OK">confirm</button>
                                </div>
                                <div id="resultDelete" class="text-center text-weight-bold mt-3 mb-5"></div>
                           </div>
                        </div>
                         
                         </div>
                  

                      

                        <div class="table-database w-75 mt-5 mx-auto">

                                <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>id_user</th>
                                                    <th>useName</th>
                                                    <th>email</th>
                                                    <th>status</th>
                                                    <th colspan="2">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                    
                                                if($result_data->num_rows > 0){
                                                    foreach($result_data as $students)
                                                    {
                                                        

                                                        
                                                    ?>
                                                <tr>        
                                                            <td class="stud_id"><?= $students["id_user"] ?></td>
                                                            <td><?= $students["username"] ?></td>
                                                            <td><?= $students["email"] ?></td>                         
                                                            <td><?= $students["status"] ?></td>
                                                            <td><a  class="btn btn-success btn-sm btn-edit">edit</a></td>
                                                            <td><a  class="btn btn-danger btn-sm btn_delete" >delete</a></td>
                                                </tr>
                                                
                                                <?php
                                                    
                                                }
                                                } else {
                                                    echo "<tr><td colspan='3'>No data found.</td></tr>";
                                                }  
                                            ?>  
                                        </tbody>
                                </table>
                        </div>  
                 </section>
            </main>



    </div>

    



    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- script first  -->
<script>
    $(document).ready(function(){

        $("#group").hide();
        $(".input_mark").hide();


               $("#btn_popup1").click(function(){
                    $("#popup1").modal("show");
               });
               
              $('#form1').submit(function(event) {
                    event.preventDefault();

                    var formData = {
                        username: $('#username').val(),
                            email: $('#email').val(),
                            password: $('#password').val(),
                            passwordR: $('#passwordR').val()
                        };

                    $.ajax({
                        type: 'POST',
                        url: 'valid_Registration.php', // Replace with your PHP script URL
                        data: formData,
                        dataType: 'json',
                        encode: true
                        })
                        .done(function(data) {
                            // Display the result message in the 'result' div
                                $('#result').text(data.message);
                            });
                 });

                 $("#btn_popup2").click(function(){
                    $("#popup2").modal("show");
                });
               $('#form2').submit(function(event) {
                        event.preventDefault();

                    var formData2 = {
                        subject_name:$('#subject_name').val(),
                        default_mark:$("#mark").val(),
                    }; 
                    
                    $.ajax({
                        type: 'POST',
                        url: 'checkSubject.php', 
                        data: formData2,
                        dataType: 'json',
                        encode: true
                    })
                .done(function(data) {
                    $('#resultSubject').text(data.message);
                });
                });

                $("#btn_popup2").click(function(){
                    $("#popup2").modal("show");
               });
               $("#btn_popup3").click(function(){
                    $("#popup3").modal("show");
                });
                $("#inputGroupSelect01").change(function(){
                      
                    var subject_id = $("#inputGroupSelect01").val();

                    $.ajax({
                          type:"POST",
                          url :"checkSubjectForStudent.php",
                          data:{subjectId:subject_id},
                          dataType: 'json',
                          encode: true,
                          cache:false,
                         success:function(data){
                            $("#inputGroupSelect02").empty();
                            $("#inputGroupSelect02").append(data)
                                        
                        }
                    });              


                });
                $("#form3").submit(function(event) {
                        event.preventDefault(); 
                
                     var formData3 = {
                          subject_value:$('#inputGroupSelect01').val(),
                        student_value:$('#inputGroupSelect02').val(),
                    };


                $.ajax({
                    type:'POST',
                    url:"assignSubject.php",
                    data:formData3,
                    dataType:'json',
                    encode: true
                })
                .done(function (data) {
                    $('#resultAssign').text(data.message);
                });
              });
              $("#inputGroupSelect03").change(function(){
                 $("#group").show();
                        var user_id = $("#inputGroupSelect03").val();
                         $.ajax({
                             type:"POST",
                              url:"getStudentSubjected.php",
                             data: {
                              user_id:user_id,
                                },
                                cache:false,
                                 success:function(data){
                                        $("#inputGroupSelect04").empty();
                                          $("#inputGroupSelect04").append(data)
                                        }
                             });
                          });
                         $("#inputGroupSelect04").change(function(){
                            $(".input_mark").show();

                           });

                });
               $("#btn_popup4").click(function(){
                     $("#popup4").modal("show");

                });
                $("#form4").submit(function(event){
                     event.preventDefault();

                        var fromData4 = {
                              student_id : $("#inputGroupSelect03").val(),
                               subject_id : $("#inputGroupSelect04").val(),
                                mark_value : $("#mark_student").val(),
                                     
                         };
                        $.ajax({
                             type:"POST",
                             url:"insertMark.php",
                             data:fromData4,
                             dataType: 'json',
                             encode: true

                            })
                            .done(function(data){
                                 $("#resultAssignMark").text(data.message);
                              });
                      });
                     $(".btn-edit").click(function(e) {
                        e.preventDefault();
                            
                        var stud_id = $(this).closest("tr").find(".stud_id").text(); 
                        
                    
                        $.ajax({
                            type:"POST",
                            url:'editUser.php',
                            data:{
                                'checking_edit_btn':true,
                                'studentID' : stud_id,
                            },
                             success:function(response){
                                $.each(response,function(key,value){
                         
                                    $("#edit_username").val(value["username"]);
                                    $("#edit_email").val(value["email"]);
                                    $("#edit_status").val(value["status"]);

                                });
                                $("#popup5").modal("show");
                        },
                    });
                            
                });
                
                 $("#formEdit").submit(function(e){
                     e.preventDefault();

                    fromDataEdit ={
                    email:$("#edit_email").val(),
                    status:$("#edit_status").val(),

                    };
                    $.ajax({
                        type:'POST',
                        url:"editStudent.php",
                        data:fromDataEdit,
                        dataType:'json',
                        encode: true
                     })
                    .done(function (data) {
                        $('#resultUpdate').text(data.message);
                    });


                });
                 $(".btn_delete").click(function(e) {
                    e.preventDefault();

                    var stud_id = $(this).closest("tr").find(".stud_id").text();
                    $("#popup6").modal("show");
            
                        $("#confirm").click(function(e) {
                              e.preventDefault()

                            $.ajax({ 
                                type:'POST',
                                url:'deleteUser.php',
                                data :{
                                    'btn_delete_OK':true,
                                    'student_Id': stud_id,
                                
                            }, 
                        })
                        .done(function (data) {
                            $('#resultDelete').text(data.message);
                        });
                  });
              
    }) 
           
          
      </script>

                       
  
        

  
</body>
</html>