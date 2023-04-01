<h3>Order List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Order ID</th>
        <th>Supplier</th>
        <th>Amount</th>
        <th>Order Date</th>
        <th>Transaction Status</th>
        <th>Delivery Status</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($order->list_order() != false){
foreach($order->list_order() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=order&action=order&id=<?php echo $order_id;?>"><?php echo $order_id;?></a></td>
        <td><?php echo $supplier_id;?></td>
        <td><?php echo $order_amount;?></td>
        <td><?php echo $date_added;?></td>
        <td><?php if($order_saved == 0){
            echo "Open Transaction";
          }else{
            echo "Saved Transaction";
          }
          ?>
        </td>
        <td><?php if($order_status == 0){
            echo "Not Delivered";
          }else{
            echo "Delivered";
          }
          ?>
        </td>
      </tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>