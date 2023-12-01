$(document).ready(function() {
    $('.modal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var roomId = button.data('room-id');
      var roomName = button.data('room-name');
  
      // Update modal title with room name
      $('#exampleModal').find('.modal-title').text('BED ' + roomName);
  
      // Make an AJAX request to fetch patient details for the specified room
      $.ajax({
        url: '/rooms/get-patient-details',
        type: 'GET', // Change this to GET
        data: { room_id: roomId },
        success: function(response) {
          var patient = response.patient;
          var vitals = response.vitals;
  
          // Update modal fields with patient details
          $('#exampleModal').find('[name="name"]').val(patient ? patient.name : '');
          $('#exampleModal').find('[name="room"]').val(patient ? patient.room : '');
          $('#exampleModal').find('[name="respiratory_rate"]').val(vitals ? vitals.respiratory_rate : '');
          $('#exampleModal').find('[name="temperature"]').val(vitals ? vitals.temperature : '');
          $('#exampleModal').find('[name="pulse_rate"]').val(vitals ? vitals.pulse_rate : '');
          // Add more fields as needed
  
          // You can add logic here to handle the Discharged button based on patient status
        },
        error: function(error) {
          console.error('Error fetching patient details:', error);
        }
      });
    });
  });  