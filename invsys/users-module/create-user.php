<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="fname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lname" placeholder="Your last name..">

            <label for="position">Position</label>
            <select id="position" name="position">
              <option value="Staff">Staff</option>
              <option value="Manager">Manager</option>
              <option value="Owner">Owner</option>
            </select>

            <label for="contact_no">Contact Number</label>
            <input type="contact_no" id="contact_no" class="input" name="contact_no" placeholder="Your contact number..">

        </div>
        <div id="form-block-half">
            <label for="DOB">Date of Birth</label>
            <input type="text" id="DOB" class="input" name="DOB" placeholder="YYYY-MM-DD">

            <label for="user_email">Email</label>
            <input type="email" id="user_email" class="input" name="user_email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>