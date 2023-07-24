$('#form-modal-submit').on('click', function (e) {

    $('#modal-form').submit();

})

$(document).ready(function (){
    $('.open-modal-class').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#history-queue_id').val(id)
    })
})
