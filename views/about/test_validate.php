<style>
    form { padding: 10px; }
    .error { border: 1px solid #b94a48!important; background-color: #fee!important; }
</style>
<form>
    <div class=”row”>
        <label for=”RequiredDateDemo”>A date is required (eg “15 June 2012″):</label>
        <input
            data-msg-date=”The field RequiredDateDemo must be a date.”
            data-msg-required=”The RequiredDateDemo field is required.”
            data-rule-date=”true”
            data-rule-required=”true”
            id=”RequiredDateDemo” name=”RequiredDateDemo” type=”text” value=”” />
    </div>
    <div class=”row”>
        <label for=”StringLengthAndRequiredDemo”>A string is required between 5 and 10 characters long:</label>
        <input
            data-msg-maxlength=”The field StringLengthAndRequiredDemo must be a string with a minimum length of 5 and a maximum length of 10.”
            data-msg-minlength=”The field StringLengthAndRequiredDemo must be a string with a minimum length of 5 and a maximum length of 10.”
            data-msg-required=”The StringLengthAndRequiredDemo field is required.”
            data-rule-maxlength=”10″
            data-rule-minlength=”5″
            data-rule-required=”true”
            id=”StringLengthAndRequiredDemo” name=”StringLengthAndRequiredDemo” type=”text” value=”” />
    </div>
    <div class=”row”>
        <label for=”RangeAndNumberDemo”>Must be a number between -20 and 40:</label>
        <input
            data-msg-number=”The field RangeAndNumberDemo must be a number.”
            data-msg-range=”The field RangeAndNumberDemo must be between -20 and 40.”
            data-rule-number=”true”
            data-rule-range=”[-20,40]”
            id=”RangeAndNumberDemo” name=”RangeAndNumberDemo” type=”text” value=”-21″ />
    </div>
    <div class=”row”>
        <label for=”RangeAndNumberDemo”>An option must be selected:</label>
        <select
            data-msg-required=”The DropDownRequiredDemo field is required.”
            data-rule-required=”true”
            id=”DropDownRequiredDemo” name=”DropDownRequiredDemo”>
            <option value=””>Please select</option>
            <option value=”An Option”>An Option</option>
        </select>
    </div>
    <div class=”row”>
        <button type=”submit”>Validate</button>
    </div>
</form>
<!--<div class="container-fluid">
    <div class="jumbotron" style="background: url('./public/images/NetworlManimg.png') no-repeat right #D5D5D5; background-size: 340px 300px;">
        <h2>Computer Repair Service</h2>
        <p>Sakaeo Hospital</p>
        พัฒนาโดยใช้
        <br> - Bootstrap 3.3.4
        <br> - Jquery-2.1.3
        <br> - PHP 5.5
        <br> - PHP PDO
        <br> - Mod Rewrite (.htaccess)
        <br><br>

        <b>เบราว์เซอร์ที่รองรับ&nbsp;:&nbsp;</b> 
            &nbsp;<a href="http://www.google.co.th/intl/th/chrome/browser/desktop/index.html" target="_blank">
                <img style=" width: 20px; height: 20px;" title="Chrome" alt="Chrome" src="<?= URL ?>public/images/chrome.png"> Chrome (แนะนำ) </a>

            &nbsp;<a href="https://www.mozilla.org/th/firefox/new/" target="_blank">
                <img style=" width: 20px; height: 20px;" title="Firefox" alt="Firefox" src="<?= URL ?>public/images/firefox.png"> Firefox </a>
            และ 
            &nbsp;<a href="http://windows.microsoft.com/th-th/internet-explorer/download-ie" target="_blank">
                <img style=" width: 20px; height: 20px;" title="IE10+" alt="IE10+" src="<?= URL ?>public/images/ie.png"> IE10 </a> ขึ้นไป
        
    </div>
</div>-->