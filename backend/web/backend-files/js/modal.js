$('#form-modal-submit').on('click', function (e) {

    $('#modal-form').submit();

})

$('#form-modal-cancel').on('click',function (e){
    alert("nslnflksdnflksd")
    $('#cancel-form').submit();
})

$(document).ready(function (){

    $('.open-modal-class').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#history-queue_id').val(id)
    })


    $('.cancel-button').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#hidden-cancel-id').val(id)
    })




})
