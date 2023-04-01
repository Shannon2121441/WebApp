<h3>Product Details</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Product ID</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Type</th> 
        <th>Supplier</th>
        <th>Beginning Inventory</th>
        <th>Price</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($product->list_product() != false){
foreach($product->list_product() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo "soon"?></td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id=<?php echo $prod_id;?>"><?php echo $prod_name;?></a></td>
        <td><?php echo $product->get_prod_type_name($product->get_prod_type($prod_id));?></td>
        <td><?php echo $product->get_supplier_name($product->get_supplier($prod_id));?></td>
        <td><?php echo $beg_inv;?></td>
        <td><?php echo 'Php '.$prod_price;?></td>
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