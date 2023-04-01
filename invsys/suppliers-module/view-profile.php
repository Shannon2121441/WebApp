<h3>Provide the Required Information</h3>
<div id="form-block">
<form method="POST" action="processes/process.supplier.php?action=update">
        <div id="form-block-half">
            <label for="supplier_name">Supplier Name</label>
            <input type="text" id="supplier_name" class="input" name="supplier_name" value="<?php echo $supplier->get_supplier_name($id);?>" placeholder="Supplier Name">

            <label for="supplier_email">Email</label>
            <input type="email" id="supplier_email" class="input" name="supplier_email" value="<?php echo $supplier->get_supplier_email($id);?>" placeholder="Supplier Email">

            <label for="contact_no">Contact Number</label>
            <input type="number" id="contact_no" class="input" name="contact_no" value="<?php echo $supplier->get_supplier_contact_no($id);?>" placeholder="Supplier Contact Number">

            <label for="supplier_address">Address</label>
            <input type="text" id="supplier_address" class="input" name="supplier_address" value="<?php echo $supplier->get_supplier_address($id);?>" placeholder="Supplier Address">
            
        </div>
        <div id="form-block-half">
            <label for="supplier_status">Supplier Status</label>
            <select id="supplier_status" name="supplier_status" disabled>
              <option <?php if($supplier->get_supplier_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
              <option <?php if($supplier->get_supplier_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>

            <?php
            if($supplier->get_supplier_status($id) == "1"){
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
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
</form>
</div>