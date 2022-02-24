$(document).ready(function () {

    $("#department").keyup(function () {

        var username = $(this).val().trim();

        if (username != '' && this.checkValidity() == true) {


            $.ajax({
                url: 'add_department.php',
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

//doctor//

$(document).ready(function () {

    $("#uname").keyup(function () {

        var username = $(this).val().trim();

        if (username != '' && this.checkValidity() == true) {


            $.ajax({
                url: 'add_doctor.php',
                type: 'post',
                data: {
                    username: username
                },
                success: function (response) {

                    $('#uname_res').html(response);

                }
            });
        } else {
            $("#uname_res").html("");

        }

    });

});