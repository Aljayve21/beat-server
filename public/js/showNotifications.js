$(document).ready(function () {
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var roomId = button.data('room-id'); 

        
        $.ajax({
            url: '/tab1/fetch-patient-details/' + roomId, 
            method: 'GET',
            success: function (data) {
                
                $('#exampleModalLabel').text('Room ' + roomId);
                $('input[name="name"]').val(data.patientName);
                $('input[name="room"]').val('Room ' + roomId);
                $('input[name="respiratory_rate"]').val(data.respiratoryRate);
                $('input[name="temperature"]').val(data.temperature);
                $('input[name="Pulse Rate"]').val(data.pulseRate);
            },
            error: function (error) {
                console.error(error);
            }
        });

        // Handle "Discharged" button click
        $('#dischargeButton').on('click', function () {
            // Perform the action when the "Discharged" button is clicked
            // Example: Close the modal
            $('#exampleModal').modal('hide');
        });
    });
});
