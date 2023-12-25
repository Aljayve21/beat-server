// $('.modal').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget);
//     var roomId = button.data('room-id');
//     var roomName = button.data('bs-room-name');

//     var modalId = '#exampleModal' + roomId;
//     var modal = $(modalId);

//     modal.find('.modal-title').text('BED ' + roomName);

    
//     // updateRoomColor(roomId, modal);

//     fetchPatientAndDischarge(roomId, modal);
// });

// // function updateRoomColor(roomId, modal) {
// //     $.ajax({
// //         url: '/update-room-color/' + roomId,
// //         type: 'POST',
// //         headers: {
// //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// //         }
// //     })
// //     .done(function (response) {
// //         if (response && response.button_class) {
// //             modal.find('.modal-body button').removeClass().addClass(response.button_class + ' mb-2');
// //         } else {
// //             console.error('Error updating room color: Invalid response format', response);
// //             alert('Error updating room color. Invalid response format. See console for details.');
// //         }
// //     })
// //     .fail(function (error) {
// //         console.error('Error updating room color:', error);
// //         alert('Error updating room color. See console for details.');
// //     });
// // }

// // function fetchPatientDetails(roomId, modal) {
// //     $.ajax({
// //         url: '/rooms/get-patient-details',
// //         type: 'GET',
// //         data: { room_id: roomId }
// //     })
// //     .done(function (response) {
// //         var patient = response.patient;
// //         var vitals = response.vitals;

// //         modal.find('[name="name"]').val(patient ? patient.name : '');
// //         modal.find('[name="room"]').val(patient ? patient.room : '');
// //         modal.find('[name="respiratory_rate"]').val(vitals ? vitals.respiratory_rate : '');
// //         modal.find('[name="temperature"]').val(vitals ? vitals.temperature : '');
// //         modal.find('[name="pulse_rate"]').val(vitals ? vitals.pulse_rate : '');
// //         modal.find('[name="spo2"]').val(vitals ? vitals.spo2 : '');
// //         modal.find('[name="blood_pressure"]').val(vitals ? vitals.blood_pressure : '');

// //         modal.find('.discharged-button').on('click', function () {
// //             dischargePatientAjaxt(roomId);
// //         });
// //     })
// //     .fail(function (error) {
// //         console.error('Error fetching patient details:', error);
// //     });
// // }

// // function dischargePatientAjax(roomId) {
// //     console.log('Sending AJAX request to discharge patient...');
    
// //     $.ajax({
// //         type: 'POST',
// //         url: '/rooms/discharge', 
// //         data: {
// //             room_id: roomId,
// //             _token: $('meta[name="csrf-token"]').attr('content'),
// //             _method: 'PUT',
// //         },
// //         success: function (data) {
            
// //             handleDischargeSuccess(data);
// //         },
// //         error: function (error) {
            
// //             handleDischargeError(error);
// //         }
// //     });
// // }

// // function handleDischargeSuccess(data) {
    
// //     storeHospitalRecord(data.patient);
// //     alert('Patient discharged successfully');
// //     location.reload();
// // }

// // function handleDischargeError(error) {
// //     console.error('Error discharging patient:', error);
// //     alert('Error discharging patient. See console for details.');
// // }


// function fetchPatientAndDischarge(roomId, modal) {
//     console.log('Fetching patient details and sending AJAX request to discharge patient...');

//     $.ajax({
//         url: '/rooms/get-patient-details',
//         type: 'GET',
//         data: { room_id: roomId }
//     })
//     .done(function (response) {
//         var patient = response.patient;
//         var vitals = response.vitals;

//         modal.find('[name="name"]').val(patient ? patient.name : '');
//         modal.find('[name="room"]').val(patient ? patient.room : '');
//         modal.find('[name="respiratory_rate"]').val(vitals ? vitals.respiratory_rate : '');
//         modal.find('[name="temperature"]').val(vitals ? vitals.temperature : '');
//         modal.find('[name="pulse_rate"]').val(vitals ? vitals.pulse_rate : '');
//         modal.find('[name="spo2"]').val(vitals ? vitals.spo2 : '');
//         modal.find('[name="blood_pressure"]').val(vitals ? vitals.blood_pressure : '');

//         //var dischargeButton = modal.find('.discharge-button');

//         modal.find('.discharged-button').on('click', function () {
//             dischargePatientPost(roomId);
//         });
//     })
//     .fail(function (error) {
//         console.error('Error fetching patient details:', error);
//     });
// }

// function dischargePatientAjax(roomId, patient, vitals) {
//     console.log('Sending AJAX request to discharge patient...');

//     var dischargeData = {
//         room_id: roomId,
//         _token: $('meta[name="csrf-token"]').attr('content'),
//     };

//     if (patient && !patient.is_discharged) {
//         dischargeData._method = 'PUT';
//     }

//     $.ajax({
//         type: 'PUT', // Change to 'PUT'
//         url: '/rooms/discharge', // Update the URL to match your route
//         data: dischargeData,
//         success: function (data) {
//             handleDischargeSuccess(data);
//         },
//         error: function (error) {
//             handleDischargeError(error);
//         }
//     });
// }

// function handleDischargeSuccess(data) {
    
//     console.log('Patient discharged successfully:', data);
// }

// function handleDischargeError(error) {
//     // Handle error, e.g., show an error message
//     console.error('Error discharging patient:', error);
//     alert('Error discharging patient. Please try again.');
// }





// function store(patientData) {
//     $.ajax({
//         type: 'POST',
//         url: '/hospital-records',
//         data: patientData,
//         dataType: 'json', 
//         success: function (response) {
//             console.log(response.message);
//             showSuccessMessage(response.message);
//         },
//         error: function (error) {
//             console.error('Error storing hospital record:', error.responseText);
//         }
//     });
// }



// function showSuccessMessage(message) {
//     var alertDiv = $('<div class="alert alert-success alert-dismissible fade show" role="alert">')
//         .text(message)
//         .append('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');

//     $('body').append(alertDiv);

//     setTimeout(function () {
//         alertDiv.alert('close');
//     }, 5000);
// }

function dischargePatientPost(roomId) {
    fetchPatientAndDischarge(roomId);
}

$(document).ready(function() {
    $('.modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var roomId = button.data('room-id');
        var modalId = '#exampleModal' + roomId;
        var modal = $(modalId);
        modal.find('.modal-title').text('BED ' + button.data('bs-room-name'));
        fetchPatientAndDischarge(roomId, modal);
    });
});

function fetchPatientAndDischarge(roomId, modal) {
    $.ajax({
        url: '/rooms/get-patient-details',
        type: 'GET',
        data: { room_id: roomId },
        success: function (response) {
            if (response.patient) {
                updateModalWithPatientData(response, modal, roomId);
            }
        },
        error: function (error) {
            console.error('Error fetching patient details:', error);
        }
    });
}

function updateModalWithPatientData(response, modal, roomId) {
    var patient = response.patient;
    var vitals = response.vitals;

    modal.find('[name="name"]').val(patient ? patient.name : '');
    modal.find('[name="room"]').val(patient ? patient.room : '');
    modal.find('[name="respiratory_rate"]').val(vitals ? vitals.respiratory_rate : '');
    modal.find('[name="temperature"]').val(vitals ? vitals.temperature : '');
    modal.find('[name="pulse_rate"]').val(vitals ? vitals.pulse_rate : '');
    modal.find('[name="spo2"]').val(vitals ? vitals.spo2 : '');
    modal.find('[name="blood_pressure"]').val(vitals ? vitals.blood_pressure : '');

    modal.find('.discharge-button').off().click(function() {
        dischargePatientAjax(roomId, patient, vitals);
    });
}

function dischargePatientAjax(roomId, patient, vitals) {
    console.log('Sending AJAX request to discharge patient...');

    var dischargeData = { room_id: roomId, _token: $('meta[name="csrf-token"]').attr('content') };

    if (patient && !patient.is_discharged) {
        dischargeData._method = 'GET';
    }

    $.ajax({
        type: 'POST',
        url: '/rooms/discharge',
        data: dischargeData,
        success: function (data) {
            handleDischargeSuccess(data);
            store(patient);
        },
        error: function (error) {
            handleDischargeError(error);
        }
    });
}

function handleDischargeSuccess(data) {
    console.log('Patient discharged successfully:', data);
    alert('Patient discharged successfully');
    location.reload();
}

function handleDischargeError(error) {
    console.error('Error discharging patient:', error);
    alert('Error discharging patient. Please try again.');
}

function store(patientData) {
    $.ajax({
        type: 'POST',
        url: '/hospital-records',
        data: patientData,
        dataType: 'json',
        success: function (response) {
            console.log(response.message);
            showSuccessMessage(response.message);
        },
        error: function (error) {
            console.error('Error storing hospital record:', error.responseText);
        }
    });
}

function showSuccessMessage(message) {
    var alertDiv = $('<div class="alert alert-success alert-dismissible fade show" role="alert">')
        .text(message)
        .append('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');

    $('body').append(alertDiv);

    setTimeout(function () {
        alertDiv.alert('close');
    }, 5000);
}