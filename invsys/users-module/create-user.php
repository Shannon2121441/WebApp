<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" required name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" required name="lastname" placeholder="Your last name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="Staff">Staff</option>
              <option value="Manager">Manager</option>
              <option value="Owner">Owner</option>
            </select>

            <label for="contactno">Contact Number</label>
            <input type="text" id="contactno" class="input" required name="contactno" placeholder="Your contact number..">
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" required name="email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" required name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" required name="confirmpassword" placeholder="Confirm password..">
            
            <script>
                function validatePassword() {
                    var password = document.getElementById("password").value;
                    var confirmPassword = document.getElementById("confirmpassword").value;

                    if (password.length < 8) {
                        alert("Password must be at least 8 characters long.");
                        return false;
                    }
                    if (!/[A-Z]/.test(password)) {
                        alert("Password must contain at least one uppercase letter.");
                        return false;
                    }
                    if (!/[a-z]/.test(password)) {
                        alert("Password must contain at least one lowercase letter.");
                        return false;
                    }
                    if (!/[0-9]/.test(password)) {
                        alert("Password must contain at least one number.");
                        return false;
                    }
                    if (!/[^\w]/.test(password)) {
                        alert("Password must contain at least one special character.");
                        return false;
                    }
                    if (password !== confirmPassword) {
                        alert("Passwords do not match.");
                        return false;
                    }
                    return true;
                }
            </script>

        </div>
        <div id="button-block">
        <input type="submit" value="Save" onclick="return validatePassword()">
        </div>
  </form>
</div>