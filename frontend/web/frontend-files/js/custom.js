$(document).ready(function () {
    $('.nice-select').removeClass('form-control');

    $('.close-time-modal').on('click', function (e) {
        $('.modal').removeClass('show')
        $('.modal').attr('style', 'display:none;')
        $('.modal-body').empty();
    })





});

$(document).ready(function () {
    // Get a reference to the DateTimePicker widget
    var dateTimePicker = $('#my-datetime-picker');

    // Attach a change event handler
    dateTimePicker.on('change', function () {
        // Get the selected date
        var user_id = $('#queue-user_id').val();
        if (!user_id) {
            alert('Siz hali shifokor tanlamadingiz, Iltimos shifokorlardan birini tanlang');
            dateTimePicker.val(null);
            return;
        }
        var selectedDate = dateTimePicker.val();
        console.log(selectedDate)


        // Send AJAX request
        $.ajax({
            url: '/ru/queue/check-time', // Replace with your actual AJAX endpoint
            method: 'POST', // or 'GET' depending on your needs
            data: {
                selectedDate: selectedDate,
                user_id: user_id
            },
            success: function (response) {
                // Handle the AJAX response
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                dateTimePicker.val(null);
                $('.modal').addClass('show')
                $('.modal').attr('style', 'display: block;')
                console.log(jqXHR.responseJSON);
                let response = jqXHR.responseJSON;
                let text = '';
                console.log(typeof response)
                for (let i in response) {

                    text = text + '<div className="d-flex flex-column" style="display: flex;flex-direction: column;"> <strong className="text-center" style="text-align: center">' + i + ' </strong> <div style="display: flex; flex-wrap: wrap; margin-bottom: 0.75rem" className="mb-1 d-flex flex-wrap">';

                    let hours = '';
                    response[i].forEach((item, index) => {
                        hours = hours + `<div style="margin-bottom: 0.75rem;" class="alert alert-danger mx-1 mb-1 px-2 py-1" role="alert">
                        ${item}
                    </div>`
                    });
                    text = text + hours + '</div></div>';

                }
                $('.modal-body').append(text);
                console.error(textStatus, errorThrown);
            }
        });
    });



});