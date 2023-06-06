<?php
include_once '../classes/class.supplier.php';

$supplier = new Supplier();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact Number</th>
      </tr>';
$data = $supplier->list_supplier_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
       <tr>
        <td>'.$count.'</td>
        <td><a href="index.php?page=settings&subpage=supplier&action=profile&id='.$supplier_id.'">'.$supplier_name.'</a></td>
        <td>'.$supplier_email.'</td>
        <td>'.$supplier_contactno.'</td>
      </tr>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>