
$('#pic').on('change', function () {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'jpg':
        case 'png':

            break;
        default:
            $(this).val('');
            // error message here
            $("#output").html('not an image');
            $("#pic").val(null);
            break;
    }

    const size =
        (this.files[0].size / 1024 / 1024).toFixed(2);

    if (size > 1) {
        $("#output").html('file size is larger than 1 mb');
        $("#pic").val(null);
    } else {
        $("#output").html('<b style="color:green">' +
            'This file size is: ' + size + " MB" + '</b>');
    }
});


$('#license').on('change', function () {

    var val = $(this).val();

    switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
        case 'pdf':
            break;
        default:
            $(this).val('');
            // error message here
            $("#fileoutput").html('not an image');
            $("#license").val(null);
            break;
    }

    const size =
        (this.files[0].size / 1024 / 1024).toFixed(2);

    if (size > 1) {
        $("#fileoutput").html('file size is larger than 1 mb');
        $("#license").val(null);
    } else {
        $("#fileoutput").html('<b style="color:green">' +
            'This file size is: ' + size + " MB" + '</b>');
    }
});

