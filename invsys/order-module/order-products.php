<h3>Order Transaction</h3>
<div id="receive-details">
  <table>
    <tr>
      <td><label for="orderdate">Order Date</label></td>
      <td class="info-text"><?php echo $order->get_order_date($id);?></td>
      <td><label for="purfrom">Purchased From</label></td>
      <td class="info-text">
        <select id="supplier_id" name="supplier_id">
          <?php
            if($product->list_suppliers() != false){
              foreach($product->list_suppliers() as $value){
                extract($value);
          ?>
          <option disabled value="<?php echo $supplier_id;?>" <?php if($order->get_order_supplier($id) == $supplier_id){ echo "selected";};?>><?php echo $supplier_name;?></option>
          <?php
              }
            }
          ?>
        </select>
      </td>
    </tr>

    <tr>
      <td><label for="orderamount">Amount</label></td>
      <td class="info-text"><?php echo $order->get_order_amount($id);?></td>
      <td><label for="orderstatus">Status</label></td>
      <td class="info-text">
        <?php if($order->get_order_save($id) == 0){
            echo "Open Transaction";
          }else{
            echo "Saved Transaction";
          }
          ?>
      
      </td>
    </tr>
  </table>
</div>

<div class="btn-box">
  <?php
    if($order->get_order_save($id) == 0){
  ?>
<a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Add Product</a> | 
<a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Save</a>
      <?php
    }
    ?>
</div>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Quantity</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($order->list_order_items($id) != false){
foreach($order->list_order_items($id) as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $product->get_prod_name($prod_id);?></td>
        <td><?php echo $order_qty;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>
<div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
      <h2>Select Product</h2>
      <p>Provide required...</p>

      <form method="POST" id="itemForm" action="processes/process.order.php?action=additem">
      <input type="hidden" id="orderid" name="orderid" value="<?php echo $id;?>"/>
        <label for="prod_id">Product</label>
            <select name="prod_id" id="prod_id">
            <?php
            $count = 1;
            $count = 1;
            if($product->list_product() != false){
              foreach($product->list_product() as $value){
                extract($value);
            ?>
            <option value="<?php echo $prod_id;?>"><?php echo $prod_name;?></option>
            <?php
            }
          }
          ?>
            </select>
            <label for="qty">Ordered Quantity</label>
            <input type="number" id="qty" class="input" name="qty" placeholder="Quantity">
       </form> 
      <div class="clearfix">
      <button class="submitbtn" onclick="itemSubmit()">Add</button>
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
  </div>
</div>
<div id="id02" class="modal">
<form method="POST" id="itemSave" action="processes/process.order.php?action=saveitem">
      <input type="hidden" id="recid" name="recid" value="<?php echo $id;?>"/>
      </form>
      <div #id="form-update" class="modal-content">
    <div class="container">
      <h2>Save Transaction</h2>
      <p>Are you sure you want to save this transaction?</p>
      <div class="clearfix">
        <button class="confirmbtn" onclick="saveSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
       
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal_save = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    //;window.location.href = "processes/process.receive.php?action=save&id=<?php echo $id;?>";
    document.getElementById("itemSave").submit();
  }

function itemSubmit() {
  document.getElementById("itemForm").submit();
}
</script>