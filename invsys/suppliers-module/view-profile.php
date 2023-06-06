<?php
 if($user_access_level == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=supplier");
 }
?>
<h3>Supplier Profile</h3>
<div class="btn-box">
<a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Change Email</a> | 
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Change Contact Number</a> | 
</div>
<br/>
<div id="form-block">
<form method="POST" action="processes/process.supplier.php?action=update">
        <div id="form-block-half">
            <label for="supplier_name">Supplier Name</label>
            <input type="text" id="supplier_name" class="input" name="supplier_name" value="<?php echo $supplier->get_supplier_name($id);?>" placeholder="Supplier name..">

            <label for="supplier_contactno">Contact Number</label>
            <input type="text" id="supplier_contactno" class="input" name="supplier_contactno" disabled value="<?php echo $supplier->get_supplier_contactno($id);?>" placeholder="Supplier contact number..">
            <input type="hidden" id="supplierid" name="supplierid" value="<?php echo $id;?>"/>
        </div>
     
        <div id="form-block-half">
            <label for="supplier_email">Email</label>
            <input type="email" id="supplier_email" class="input" name="supplier_email" disabled value="<?php echo $supplier->get_supplier_email($id);?>" placeholder="Supplier email..">
            <input type="hidden" id="supplierid" name="supplierid" value="<?php echo $id;?>"/>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
        <input type="submit" value="Update">
        </div>
        </form>
</div>

<div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
      <h2>Update Supplier Email</h2>
      <p>Provide required...</p>

      <form method="POST" id="emailForm" action="processes/process.supplier.php?action=updateemail">
      <input type="hidden" id="supplierid" name="supplierid" value="<?php echo $id;?>"/>
        <label for="supplier_email">Current Email</label>
            <input type="email" id="supplier_email" class="input" name="supplier_email" placeholder="Current Email"> 
            <label for="crpassword">Enter Password</label>
            <input type="password" id="crpassword" class="input" name="crpassword" placeholder="Current Password"> 
            <label for="copassword">New Email</label>
            <input type="email" id="newemail" class="input" name="newemail" placeholder="New Email">           
       </form> 
      <div class="clearfix">
      <button class="submitbtn" onclick="emailSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
  </div>
</div>
<div id="id02" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
      <h2>Update Supplier Contact Number</h2>
      <p>Provide required...</p>

      <form method="POST" id="contactForm" action="processes/process.supplier.php?action=updatecontact">
      <input type="hidden" id="supplierid" name="supplierid" value="<?php echo $id;?>"/>
        <label for="contactno">Current Contact Number</label>
            <input type="text" id="supplier_contactno" class="input" name="supplier_contactno" placeholder="Current Contact Number"> 
            <label for="crpassword">Enter Password</label>
            <input type="password" id="crpassword" class="input" name="crpassword" placeholder="Current Password"> 
            <label for="copassword">New Contact Number</label>
            <input type="text" id="newcontactno" class="input" name="newcontactno" placeholder="New Contact Number">           
       </form> 
      <div class="clearfix">
      <button class="submitbtn" onclick="contactnoSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
  </div>
</div>
<script>
// Get the modal
var modal_email = document.getElementById('id01');
var modal_contactno = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal_email){
    modal_email.style.display = "none";
  }else if(event.target == modal_contactno){
    modal_contactno.style.display = "none";
  }
}

function emailSubmit() {
  document.getElementById("emailForm").submit();
}
function contactnoSubmit() {
  document.getElementById("contactForm").submit();
}
</script>