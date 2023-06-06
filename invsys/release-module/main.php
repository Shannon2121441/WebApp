<h3>Releasing List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Release Date / ID</th>
        <th>Customer</th>
        <th>Status</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($release->list_release() != false){
foreach($release->list_release() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=release&action=release&id=<?php echo $rel_id;?>"><?php echo $rel_date_added.' - '.$rel_id;?></a></td>
        <td><?php echo $rel_customer;?></td>
        <td><?php if($rel_saved == 0){
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