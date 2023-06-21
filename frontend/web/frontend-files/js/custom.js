$(document).ready(function () {
    $('.nice-select').removeClass('form-control');

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


        // Send AJAX request
        $.ajax({
            url: '/queue/check-time', // Replace with your actual AJAX endpoint
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
                console.log(jqXHR.responseJSON);
                var response = jqXHR.responseJSON;
                var result = [];
                for (let i = 0; i < response.length; i++) {
                    var dateTimeString = response[i];
                    var dateTime = new Date(dateTimeString);
                    var year = dateTime.getFullYear();
                    var month = dateTime.getMonth() + 1; // Adding 1 because month is zero-based
                    var day = dateTime.getDate();
                    var full_date = year + '-' + month + '-' + day;
                    result[full_date] = dateTime.getHours();

                }

                // console.log(result);


                // Close modal when close button or outside modal is clicked


                alert('Zaynit vaqtlar listi \n' + JSON.stringify(jqXHR.responseJSON));
                console.error(textStatus, errorThrown);
            }
        });
    });
});