<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.supplier.php?action=new">
        <div id="form-block-center">
            <label for="supplier_name">Supplier Name</label>
            <input type="text" id="supplier_name" class="input" name="supplier_name" placeholder="Supplier Name">
            
            <label for="supplier_email">Email</label>
            <input type="email" id="supplier_email" class="input" name="supplier_email" placeholder="Supplier Email">

            <label for="contact_no">Contact Number</label>
            <input type="number" id="contact_no" class="input" name="contact_no" placeholder="Supplier Contact Number">

            <label for="supplier_address">Address</label>
            <input type="text" id="supplier_address" class="input" name="supplier_address" placeholder="Supplier Address">
            
            <div id="button-block">
              <input type="submit" value="Save">
            </div>
        </div>
    </form>
</div>