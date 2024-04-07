$(document).ready(function(){
    $('#userloginbtn').click(function(e) {
        e.preventDefault();
        
        let email = $('#loginForm input[name="email"]').val();
        let password = $('#loginForm input[name="pswd"]').val();
        
        if (email.trim() === '' || password.trim() === '') {
            $('#responseMessage').html("Please fill in all the fields.");
            return;
        }
        
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: { email: email, password: password },
            success: function(response) {
            if (response.trim() === 'Login successful') {
                location.reload();
            } else if((response.trim() === 'admin logged inLogin successful')) {
                window.location.href = 'admin/index.php';
            } else{
                $('#responseMessage').html(response);
            }
            }
        });
    });
});