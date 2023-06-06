<?php
 if($user_access_level == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=products");
 }
?>
<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=newproduct">
        <div id="form-block-center">
            <label for="fname">Product Name</label>
            <input type="text" id="pname" class="input" required name="pname" placeholder="Product name..">

            <label for="lname">Description</label>
            <textarea id="desc" class="input" required name="desc" placeholder="Description.."></textarea>
            
            <label for="fname">Product Retail Price</label>
            <input type="text" id="price" class="input" required name="price" placeholder="Product price..">

            <label for="ptype">Type</label>
            <select id="ptype" name="ptype">
              <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>"><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
        </select>
              </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>