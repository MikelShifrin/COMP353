<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<form method="post" action="register.php" name="registerform">


    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">User's email</label>
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />
    <br>

    <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
    <br>

    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <br>

    <label for="login_input_fname">First Name</label>
    <input id="login_input_fname" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_fname"  />
    <br>

    <label for="login_input_lname">Last Name</label>
    <input id="login_input_lname" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_lname"  />
    <br>

    <label for="login_input_phone">Phone Number</label>
    <input id="login_input_phone" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_phone"  />
    <br>

    <label for="login_input_credit_card">Credit Card</label>
    <input id="login_input_credit_card" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_credit_card"  />
    <br>

    <label for="login_input_membership">Membership</label>
    <select id="login_input_membership" class="login_input" name="user_membership">
    <option value="Normal Plan"> Normal Plan </option>
    <option value="Premium Plan"> Premium Plan </option>
    <option value="Silver Plan"> Silver Plan </option>
    </select>
    <br>

    <input type="submit"  name="register" value="Register" />


</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>
