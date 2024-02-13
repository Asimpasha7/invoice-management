$(document).ready(function () {
    console.log('login');
    $('#loginForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter your password"
            }
        },
        errorPlacement: function(error, element) {
            // Append error message to element's parent with red color
            error.appendTo(element.parent()).css("color", "red");
        },
        submitHandler: function (form) {
            form.submit(); 
        }
    });
});
