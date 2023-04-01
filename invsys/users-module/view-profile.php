<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/process.user.php?action=update">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="fname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your first name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">

            <label for="position">Position</label>
            <select id="position" name="position">
              <option value="Staff" <?php if($user->get_user_position($id) == "Staff"){ echo "selected";};?>>Staff</option>
              <option value="Manager" <?php if($user->get_user_position($id) == "Manager"){ echo "selected";};?>>Manager</option>
              <option value="Owner" <?php if($user->get_user_position($id) == "Owner"){ echo "selected";};?>>Owner</option>
            </select>
        
            <label for="status">Account Status</label>
            <select id="status" name="status" disabled>
              <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
        </div>
        <div id="form-block-half">
            
            <label for="contact_no">Contact Number</label>
            <input type="number" id="contact_no" class="input" name="contact_no" disabled value="<?php echo $user->get_user_contact_no($id);?>" placeholder="Your contact number..">

            <label for="DOB">Date of Birth</label>
            <input type="text" id="DOB" class="input" name="DOB" disabled value="<?php echo $user->get_user_DOB($id);?>" placeholder="Your date of birth..">

            <label for="user_email">Email</label>
            <input type="user_email" id="user_email" class="input" name="user_email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">
            
            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
            <a href="#">Change Email</a> | 
            <a href="#">Change Contact Number</a> | 
            <a href="#">Change Password</a> |
            <?php
            if($user->get_user_status($id) == "1"){
              ?>
                <a href="#">Disable Account</a>
              <?php
            }else{
            ?>
                <a href="#">Activate Account</a>
            <?php
            }
            ?>
            
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>