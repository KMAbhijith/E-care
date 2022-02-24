$(function () {
    $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();

        var dynaForm = $('.dynamic-wrap form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(dynaForm);

        newEntry.find('input').val('');
        dynaForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<svg xmlns="http://www.w3.org/2000/svg"   width="24" height="24" fill="currentColor" class="bi bi-dash-lg"  viewBox="0 0 16 14"">< path fill - rule="evenodd" d = "M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" /></svg >');
    }).on('click', '.btn-remove', function (e) {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});