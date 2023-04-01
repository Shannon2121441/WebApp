<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Supplier ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Address</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($supplier->list_suppliers() != false){
foreach($supplier->list_suppliers() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $supplier_id;?></td>
        <td><a href="index.php?page=settings&subpage=suppliers&action=profile&id=<?php echo $supplier_id;?>"><?php echo $supplier_name?></a></td>
        <td><?php echo $supplier_email;?></td>
        <td><?php echo $contact_no;?></td>
        <td><?php echo $supplier_address;?></td>        
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