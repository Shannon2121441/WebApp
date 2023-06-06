<span id="search-result">
  <h3>Suppliers</h3>
  <div id="subcontent">
      <table id="data-list">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact Number</th>
        </tr>
  <?php
  $count = 1;
  $count = 1;
  if($supplier->list_supplier() != false){
  foreach($supplier->list_supplier() as $value){
    extract($value);
    
  ?>
        <tr>
          <td><?php echo $count;?></td>
          <td><a href="index.php?page=settings&subpage=supplier&action=profile&id=<?php echo $supplier_id;?>"><?php echo $supplier_name?></a></td>
          <td><?php echo $supplier_email;?></td>
          <td><?php echo $supplier_contactno;?></td>
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
</span>