$(document).ready(function () {

    function showNotification(message, type) {
        const notification = $(` 
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile_1.svg" alt="...">
                <div class="status-indicator bg-${type}"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">${message}</div>
                <div class="small text-gray-500">Just now</div>
            </div>
        </a>`)
        $('#notifications').append(notification);

        const badge = $("#notificationBadge");
        const currentCount = parseInt(badge.text(), 10);
        badge.text(currentCount + 1);

        setTimeout(function () {
            notification.alert("close");
        }, 5000);

        $("#simulateFullRoom").click(function () {
            showNotification("Room is now full!", "danger");
        });

        $("#simulateAvailableRoom").click(function () {
            showNotification("Room is now Available. ", "success");
        });
    }
})

$(document).ready(function () {
    function showNotification(message, type, patientId) {
        const notification = $(` 
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile_1.svg" alt="...">
                <div class="status-indicator bg-${type}"></div>
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">${message}</div>
                <div class="small text-gray-500">Just now</div>
            </div>
        </a>`)
        $('#notifications').append(notification);

        const badge = $("#notificationBadge");
        const currentCount = parseInt(badge.text(), 10);
        badge.text(currentCount + 1);

        notification.click(function () {
            // Assuming you have a route like '/discharge-patient/{patientId}'
            const dischargeUrl = `/discharge-patient/${patientId}`;

            // Perform an AJAX request to discharge the patient
            $.ajax({
                url: dischargeUrl,
                method: 'POST',
                success: function (data) {
                    // Handle success (e.g., show a success message)
                    console.log(data);
                },
                error: function (error) {
                    // Handle error (e.g., show an error message)
                    console.error(error);
                }
            });

            // Close the notification after clicking
            notification.alert("close");
        });
    }

    $("#simulateFullRoom").click(function () {
        showNotification("Room is now full!", "danger", 1); // Replace 1 with the actual patient ID
    });

    $("#simulateAvailableRoom").click(function () {
        showNotification("Room is now Available. ", "success", 2); // Replace 2 with the actual patient ID
    });
});