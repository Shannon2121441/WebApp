<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.receive.php?action=create">
        <div id="form-block-center">
        <label for="supplier_id">Supplier</label>
            <select id="supplier_id" name="supplier_id">
              <?php
              if($receive->list_supplier() != false){
                foreach($receive->list_supplier() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $supplier_id;?>"><?php echo $supplier_name;?></option>
              <?php
                }
              }
              ?>
        </select>
              </div>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>