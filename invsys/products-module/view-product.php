<h3>Product Details</h3>
<div class="btn-box">
<a href="index.php?page=settings&subpage=products&action=upload" class="btn-jsactive">Upload Image</a> | 
</div>
<br/>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=updateproduct">
        <div id="form-block-center">
            <label for="fname">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" disabled value="<?php echo $product->get_prod_name($id);?>" placeholder="Product name..">
          
            <label for="ptype">Type</label>
            <select id="ptype" name="ptype">
              <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option disabled value="<?php echo $type_id;?>" <?php if($product->get_prod_type($id) == $type_id){ echo "selected";};?>><?php echo $type_name;?></option>
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
              <option disabled value="<?php echo $supplier_id;?>" <?php if($product->get_supplier($id) == $supplier_id){ echo "selected";};?>><?php echo $supplier_name;?></option>
              <?php
                }
              }
              ?>
            </select>

            <label for="beg_inv">Beginning Inventory</label>
            <input type="number" id="beg_inv" class="input" name="beg_inv" disabled value="<?php echo $product->get_beg_inv($id);?>" placeholder="Beginning Inventory">
            
            <label for="prod_price">Product Retail Price</label>
            <input type="text" id="prod_price" class="input" name="prod_price" disabled able value="<?php echo $product->get_prod_price($id);?>" placeholder="Product Price">

        </div>
    </form>   
</div>