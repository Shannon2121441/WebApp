<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=newproduct">
        <div id="form-block-center">
            <label for="prod_name">Product Name</label>
            <input type="text" id="prod_name" class="input" name="prod_name" placeholder="Product Name">

            <label for="type_id">Type</label>
            <select id="type_id" name="type_id">
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

            <label for="supplier_id">Supplier</label>
            <select id="supplier_id" name="supplier_id">
              <?php
              if($product->list_suppliers() != false){
                foreach($product->list_suppliers() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $supplier_id;?>"><?php echo $supplier_name;?></option>
              <?php
                }
              }
              ?>
            </select>

            <label for="beg_inv">Beginning Inventory</label>
            <input type="number" class="input" name="beg_inv" placeholder="Beginning Inventory">
            
            <label for="prod_price">Product Retail Price</label>
            <input type="text" id="prod_price" class="input" name="prod_price" placeholder="Product Price">

        </div>
        <div id="button-block">
          <input type="submit" value="Save">
        </div>
  </form>
</div>