<?php
declare(strict_types=1);
\OCP\Util::addStyle('nextad', 'nextad_styles');
\OCP\Util::addScript('nextad', 'nextad_scripts');
?>
<?php
// Ensure the styles and scripts are linked properly
?>
<div id="ldap-user-settings">
    <h1>Customize LDAP User Settings</h1>
    <p>Note: Changed user settings will be reflected as part of the user's newest Active Directory attributes.</p>
    <form id="user-settings-form">
        <div class="form-row">
            <label for="display-name">Display Name:</label>
            <input type="text" id="display-name" name="display_name">
        </div>
        <div class="form-row">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-row">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="form-row">
            <label for="telephone">Telephone:</label>
            <input type="tel" id="telephone" name="telephone">
        </div>
        <div class="form-row">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </div>
        <div class="form-row">
            <label for="web-page">Web Page:</label>
            <input type="url" id="web-page" name="web_page">
        </div>
        <div class="form-row">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="form-row">
            <button id="submit-button" type="submit">Set As Default</button>
        </div>
    </form>
</div>
