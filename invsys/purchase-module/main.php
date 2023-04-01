<h3>Purchase List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Purchase ID</th>
        <th>Customer</th>
        <th>Amount</th>
        <th>Purchase Date</th>
        <th>Transaction Status</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($purchase->list_purchase() != false){
foreach($purchase->list_purchase() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=purchase&action=purchase&id=<?php echo $purchase_id;?>"><?php echo $purchase_id;?></a></td>
        <td><?php echo $customer_id;?></td>
        <td><?php echo $purch_amount;?></td>
        <td><?php echo $date_added;?></td>
        <td><?php if($purch_saved == 0){
            echo "Open Transaction";
          }else{
            echo "Saved Transaction";
          }
          ?>
          </td>
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