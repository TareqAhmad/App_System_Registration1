
$(document).ready(function () {
    
        $("#popUser").click(function() { 
            $("#modalDialogUser").show();
        });
        $("#closeUser").click(function() { 
            $("#modalDialogUser").hide();
        });
    
        //*********************************** */
        $("#popSubject").click(function() { 
            $("#modalDialogSubject").show();
        });
        $("#closeSubject").click(function () { 
            $("#modalDialogSubject").hide();
         });
        //*********************************** */
        $("#popAssign").click(function () { 
            $("#modalDialogAssign").show(); 
        });
        $("#closeAssign").click(function(){
            $('#modalDialogAssign').hide();
        });
        //*********************************** */
        $("#popSetMark").click(function () { 
            $("#modalDialogMark").show(); 
        });
        $("#closeMark").click(function(){
            $('#modalDialogMark').hide();
        });
        //*********************************** */
        $(".edit").click(function () { 
            $("#modalDialogEdit").show(); 
        });
        $("#closeEdit").click(function(){
            $('#modalDialogEdit').hide();
        });






        $('#userNew').submit(function(eUser) {
            eUser.preventDefault();
            
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
                $('#resultUser').text(data.message);
        });
    
    });
    $("#subjectNew").submit(function (e) {
        e.preventDefault();

        var fromData = {
            subject_name:$("#subject_name").val(),
            default_mark:$("#mark").val()
        };
        $.ajax({
            type:'post',// POST request
            url: 'newSubject.php', //this is the name of your PHP file
            data :fromData,
            dataType: 'json',
            encode: true
       })
      .done(function(data) {
    // Display the result message in the 'result' div
        $('#resultSubject').text(data.message);
       });
});



});





