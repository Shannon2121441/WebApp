<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Position</th>
        <th>DOB</th>
        <th>Contact Number</th>
        <th>Email</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $lname.', '.$fname;?></a></td>
        <td><?php echo $position;?></td>
        <td><?php echo $DOB;?></td>
        <td><?php echo $contact_no;?></td>
        <td><?php echo $user_email;?></td>
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