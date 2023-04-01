<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.order.php?action=create">
        <div id="form-block-center">
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

            <label for="order_amount">Amount</label>
            <input type="text" id="order_amount" class="input" name="order_amount" placeholder="Amount"/>
        
              </div>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>