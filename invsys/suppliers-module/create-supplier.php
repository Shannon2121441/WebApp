<?php
 if($user_access_level == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=supplier");
 }
?>
<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.supplier.php?action=new">
        <div id="form-block-half">
            <label for="supplier_name">Supplier Name</label>
            <input type="text" id="supplier_name" class="input" required name="supplier_name" placeholder="Supplier name..">

            <label for="supplier_contactno">Supplier Contact Number</label>
            <input type="text" id="supplier_contactno" class="input" required name="supplier_contactno" placeholder="Supplier contact number..">
        </div>
        <div id="form-block-half">
            <label for="supplier_email">Supplier Email</label>
            <input type="email" id="supplier_email" class="input" required name="supplier_email" placeholder="Supplier email..">            
        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>