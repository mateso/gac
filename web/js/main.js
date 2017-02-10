
$(function () {
    $('#btnApproveRecords').click(function () {
        $('#modalApproveRecords').modal('show')
                .find('#modalApproveRecordsContent')
                .load($(this).attr('value'));
    });   
});