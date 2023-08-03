


$(document).ready(function () {

    $('#sign').submit(function(event) {
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


});  




