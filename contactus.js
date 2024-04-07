$(document).ready(function () {
    let name = $("#name");
    let message = $("#message");
    let email = $("#email");
    let output = $("#output");
    let emailvalid = /^[\w\d._%+-]+@(?:[\w\d-]+\.)+(\w{2,})(,|$)/ ;
    $("#send").on('click', (event) => {
        event.preventDefault();
       $.ajax({
        type: 'POST',
        url: 'checklogged.php',
        success: function(response) {
            if (response.trim() === 'logged') {
                if (name.val().length === 0){
                    output.text("Name should not be empty.");
                    output.css("color", "red");
                }
                else if(!emailvalid.test(email.val())) {
                    output.text("Email should be a valid email address.");
                    output.css("color", "red");
                    email.val("");
                }
                else if (message.val().length === 0){
                    output.text("Message should not be empty.");
                    output.css("color", "red");
                }
                else {
                    output.text("Thank You, your message is received");
                    output.css("color", "green");
                }
            } else {
                $(".logsign").show();
                $(".modallogsign").show();
                $("body").addClass("modal-open").css("overflow", "hidden");
            }
        }
    })
});
const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
	toggle.addEventListener('click', () => {
		toggle.parentNode.classList.toggle('active');
	});
});

})