function notify(message) {
    // Customize this function to display notifications as needed
    alert(message);
}

$(document).ready(function () {
    // Room creation
    $('#roomCreationForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/rooms', // Update the URL if needed
            data: $(this).serialize(),
            success: function (response) {
                notify(response.message);
                // Update UI or perform any other action
            },
            error: function (error) {
                console.error('Error creating room:', error);
                // Handle error if needed
            }
        });
    });

    // Patient creation
    $('#patientCreationForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/patients', // Update the URL if needed
            data: $(this).serialize(),
            success: function (response) {
                notify(response.message);
                // Update UI or perform any other action
            },
            error: function (error) {
                console.error('Error adding patient:', error);
                // Handle error if needed
            }
        });
    });

    // Vital sign creation
    $('#vitalSignCreationForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/vital-signs', // Update the URL if needed
            data: $(this).serialize(),
            success: function (response) {
                notify(response.message);
                // Update UI or perform any other action
            },
            error: function (error) {
                console.error('Error adding vital sign:', error);
                // Handle error if needed
            }
        });
    });
});