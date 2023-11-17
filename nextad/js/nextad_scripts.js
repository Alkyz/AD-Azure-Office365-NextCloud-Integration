document.addEventListener('DOMContentLoaded', function () {
    var previewButton = document.getElementById('preview-button');
    var submitButton = document.getElementById('submit-button');

    function toggleInputFields(disabled, data = null) {
        var formElements = document.querySelectorAll('#user-settings-form input, #user-settings-form textarea');
        formElements.forEach(function (element) {
            element.disabled = disabled;
            if (data) {
                var name = element.name;
                element.value = data['userData'][name];
            } else if (disabled === false) {
                element.value = '';
            }
        });
    }

    previewButton.addEventListener('click', function () {
        if (previewButton.textContent === 'Preview Attributes') {
            submitButton.disabled = true;
            fetch('/index.php/apps/nextad/getUserAttributes')
                .then(response => response.json())
                .then(data => {
                    console.log(data.debug);
                    toggleInputFields(true, data);
                    previewButton.textContent = 'Edit Attributes';
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitButton.disabled = false;
                });
        } else {
            submitButton.disabled = false;
            toggleInputFields(false);
            previewButton.textContent = 'Preview Attributes';
        }
    });


    submitButton.addEventListener('click', function (event) {
        event.preventDefault();

        var displayName = document.getElementById('display-name').value;
        var email = document.getElementById('email').value;
        var company = document.getElementById('company').value;
        var telephone = document.getElementById('telephone').value;
        var address = document.getElementById('address').value;
        var webpage = document.getElementById('web-page').value;
        var description = document.getElementById('description').value;

        console.log('Display Name:', displayName);
        console.log('Email:', email);
        console.log('Company:', company);
        console.log('Telephone:', telephone);
        console.log('Address:', address);
        console.log('Web Page:', webpage);
        console.log('Description:', description);
    });
});
