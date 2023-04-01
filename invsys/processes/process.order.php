<?php
include '../classes/class.order.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'create':
        create_new_transaction();
	break;
    case 'additem':
        new_order_item();
	break;
    case 'saveitem':
        save_order_items();
	break;
}

function create_new_transaction(){
	$order = new Order();
    $supplier_id= ucwords($_POST['supplier_id']);
    $order_amount= ucwords($_POST['order_amount']); 
    $rid = $order->new_order($supplier_id,$order_amount);
    if(is_numeric($rid)){
        header('location: ../index.php?page=order&action=order&id='.$rid);
    }
}

function new_order_item(){
	$order = new Order();
    $orderid= $_POST['orderid'];
    $prod_id= $_POST['prod_id']; 
    $qty= $_POST['qty']; 
    $rid = $order->new_order_item($orderid, $prod_id, $qty);
    if($rid){
        header('location: ../index.php?page=order&action=order&id='.$orderid);
    }
}

function save_order_items(){
	$order = new Order();
    $id = $_POST['recid'];
    $order->save_to_inventory($id);
    $rid = $order->save_order_items($id);
    if($rid){
        header('location: ../index.php?page=order&action=order&id='.$id);
    }
}