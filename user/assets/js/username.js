$(document).ready(function () {

    $("#username").keyup(function () {

        var username = $(this).val().trim();

        if (username != '' && this.checkValidity() == true) {

            alert("hi");
            $.ajax({
                url: 'p-reg.php',
                type: 'post',
                data: {
                    username: username
                },
                success: function (response) {

                    $('#uname_response').html(response);

                }
            });
        } else {
            $("#uname_response").html("");
        }

    });

});