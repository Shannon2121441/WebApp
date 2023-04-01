<?php
include '../classes/class.purchase.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_transaction();
	break;
    case 'additem':
        new_purchase_item();
	break;
    case 'saveitem':
        save_purchase_items();
	break;
}

function create_new_transaction(){
	$purchase = new Purchase();
    $name= ucwords($_POST['customer_id']);
    $amount= $_POST['amount']; 
    $rid = $purchase->new_purchase($name, $amount);
    if(is_numeric($rid)){
        header('location: ../index.php?page=purchase&action=purchase&id='.$rid);
    }
}

function new_purchase_item(){
	$purchase = new Purchase();
    $purchase_id= $_POST['purchase_id'];
    $prodid= $_POST['prodid']; 
    $qty= $_POST['qty']; 
    $rid = $purchase->new_purchase_item($purchase_id, $prodid, $qty);
    if($rid){
        header('location: ../index.php?page=purchase&action=purchase&id='.$purchase_id);
    }
}

function save_purchase_items(){
	$purchase = new Purchase();
    $id= $_POST['purchase_id'];
    $purchase->save_to_purchase($id);
    $rid = $purchase->save_purchase_items($id);
    if($rid){
        header('location: ../index.php?page=purchase&action=purchase&id='.$id);
    }
}

