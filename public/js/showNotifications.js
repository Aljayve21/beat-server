$(document).ready(function () {
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var roomId = button.data('room-id'); 

        function getRoomId() {
            // Get the room ID from the hidden input field
            var roomId = $('#roomIdInput').val();
            return roomId;
        }
        

        
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
            var roomId = getRoomId;
        $.ajax({
        url: '/tab1/discharge-patient/' + roomId,
        method: 'POST',
        success: function (response) {
            
            console.log(response);
        },
        error: function (error) {
            
            console.error(error);
        }
        });
        });
    });
});
