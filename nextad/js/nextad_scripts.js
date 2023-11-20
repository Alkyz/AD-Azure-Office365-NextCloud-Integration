// Fetch uid logic here (i.e let userId = ...)

document.addEventListener('DOMContentLoaded', function () {
    var previewButton = document.getElementById('preview-button');
    var submitButton = document.getElementById('submit-button');
    var wipeButton = document.getElementById('wipe-button');
    var form = document.getElementById('user-settings-form');

    function toggleInputFields(disabled, data = null) {
        var formElements = document.querySelectorAll('#user-settings-form input, #user-settings-form textarea');
        formElements.forEach(function (element) {
            element.disabled = disabled;
            if (data) {
                var name = element.name;
                element.value = data['userData'][name];
            } 
        });
    }

    function showMessage(message, color) {
        var messageDiv = document.createElement('div');
        messageDiv.classList.add('alert-message');
        messageDiv.textContent = message;
        messageDiv.style.color = color;
        messageDiv.style.borderColor = color;
        messageDiv.style.backgroundColor = color === '#8B0000' ? '#ffcccc' : '#ccffcc';

        var container = document.getElementById('ldap-user-settings');
        container.appendChild(messageDiv);

        setTimeout(() => {
            container.removeChild(messageDiv);
        }, 5000);
    }

    wipeButton.addEventListener('click', function () {
        var formElements = document.querySelectorAll('#user-settings-form input, #user-settings-form textarea');
        formElements.forEach(function (element) {
            element.value = '';
        });
    })

    previewButton.addEventListener('click', function () {

        if (previewButton.textContent === 'Preview Attributes') {
            wipeButton.disabled = true;
            submitButton.disabled = true;
            fetch('/index.php/apps/nextad/getUserAttributes/' + userId)
                .then(response => response.json())
                .then(data => {
                    console.log(data.debug);
                    toggleInputFields(true, data);
                    previewButton.textContent = 'Edit Attributes';
                })
                .catch(error => {
                    console.error('Error:', error);
                    wipeButton.disabled = false;
                    submitButton.disabled = false;
                });
        } else {
            wipeButton.disabled = false;
            submitButton.disabled = false;
            toggleInputFields(false);
            previewButton.textContent = 'Preview Attributes';
        }
    });


    submitButton.addEventListener('click', function (event) {
        event.preventDefault();

        var formData = new FormData(form);
        formData.append('uid', userId);

        var object = {};
        var isFieldFilled = false;

        formData.forEach((value, key) => {
            object[key] = value;
            if (value.trim() !== '' && key !== 'uid') {
                isFieldFilled = true;
            }
        });

        if (!isFieldFilled) {
            showMessage("Please Update a Setting", '#8B0000');
            return;
        }

        var json = JSON.stringify(object);
        console.log(json);

        fetch('/index.php/apps/nextad/putUserAttributes/' + userId, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: json
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log("Debug:", data.debug);
            showMessage("Successfully Updated AD Settings", 'green');
        });
    });
});
