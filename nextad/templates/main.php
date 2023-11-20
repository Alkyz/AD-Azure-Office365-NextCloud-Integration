<?php
declare(strict_types=1);
\OCP\Util::addStyle('nextad', 'nextad_styles');
\OCP\Util::addScript('nextad', 'nextad_scripts');
?>
<?php
?>
<div id="ldap-user-settings">
    <h1>Customize Active Directory User Settings. That's <i><u><strong>NextAD</strong></u></i>.</h1>
    <p>Changed user settings will be reflected as part of the user's newest Active Directory attributes.</p>
    <form id="user-settings-form">
        <div class="form-row">
            <label for="display-name">Display Name:</label>
            <input type="text" id="display-name" name="displayName">
        </div>
        <div class="form-row">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-row">
            <label for="company">Company:</label>
            <input type="text" id="company" name="company">
        </div>
        <div class="form-row">
            <label for="telephone">Telephone:</label>
            <input type="tel" id="telephone" name="telephone">
        </div>
        <div class="form-row">
            <label for="address">Street Address:</label>
            <input type="text" id="address" name="streetAddress">
        </div>
        <div class="form-row">
            <label for="web-page">Web Page:</label>
            <input type="url" id="web-page" name="webPage">
        </div>
        <div class="form-row">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="form-row button-row">
            <button id="preview-button" type="button">Preview Attributes</button>
            <button id="wipe-button" type="button">Wipe Entries</button>
            <button id="submit-button" type="submit">Set As Default</button>
        </div>
    </form>
</div>
