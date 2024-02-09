// Function to show an alert
function showAlert(alertId) {
    var alertElement = document.getElementById(alertId);
    if (alertElement) {
        alertElement.style.display = 'block'; // Show the alert
    }
}

// Function to hide an alert
function hideAlert(alertId) {
    var alertElement = document.getElementById(alertId);
    if (alertElement) {
        alertElement.style.display = 'none'; // Hide the alert
    }
}

// Function to reset the form and hide all alerts
function resetForm() {
    // Reset the current form
    document.querySelector('form').reset();
    // Hide all alerts
    hideAlert('loginSuccess');
    hideAlert('loginError');
    hideAlert('registrationSuccess');
    hideAlert('registrationError');
}

function resetForm2() {
    // Reset the current form
    document.querySelector('form').reset();
    hideAlert('registrationSuccess');
    hideAlert('registrationError');
}

// Function to toggle between login and registration forms
function toggleForms() {
    var loginForm = document.getElementById('loginForm');
    var registrationForm = document.getElementById('registrationForm');
    var allAlerts = document.querySelectorAll('.alert');

    // Toggle visibility between login and registration forms
    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registrationForm.style.display = 'none';
    } else {
        loginForm.style.display = 'none';
        registrationForm.style.display = 'block';
    }

    // Hide all alerts when toggling forms
    allAlerts.forEach(function(alert) {
        alert.style.display = 'none';
    });
}


