document.addEventListener('DOMContentLoaded', function () {
    var submitButton = document.getElementById('submit-button');

    submitButton.addEventListener('click', function (event) {
        // Prevent the form from submitting the traditional way
        event.preventDefault();

        var displayName = document.getElementById('display-name').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var telephone = document.getElementById('telephone').value;
        var address = document.getElementById('address').value;
        var webpage = document.getElementById('web-page').value;
        var description = document.getElementById('description').value;

        console.log('Display Name:', displayName);
        console.log('Email:', email);
        console.log('Password:', password);
        console.log('Telephone:', telephone);
        console.log('Address:', address);
        console.log('Web Page:', webpage);
        console.log('Description:', description);
    });
});
