<?php
include '../classes/class.supplier.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
	case 'new':
        create_new_supplier();
	break;
    case 'update':
        update_supplier();
	break;
}

function create_new_supplier(){
	$supplier = new Supplier();
    $supplier_email = $_POST['supplier_email'];
    $supplier_name = ucwords($_POST['supplier_name']);
    $contact_no = ucwords($_POST['contact_no']);
    $supplier_address = ucwords($_POST['supplier_address']);
    
    $result = $supplier->new_supplier($supplier_name,$supplier_email,$contact_no,$supplier_address);
    if($result){
        $id = $supplier->get_supplier_id($supplier_email);
        header('location: ../index.php?page=settings&subpage=suppliers&action=profile&id='.$id);
    }
}

function update_supplier(){
	$supplier = new Supplier();
    $supplier_id = $_POST['supplierid'];
    $supplier_name = ucwords($_POST['supplier_name']);
    $supplier_email = $_POST['supplier_email'];
    $contact_no = ucwords($_POST['contact_no']);
    $supplier_address = ucwords($_POST['supplier_address']);
    
    $result = $supplier->update_supplier($supplier_id, $supplier_name, $supplier_email, $contact_no, $supplier_address);
    if($result){
        header('location: ../index.php?page=settings&subpage=suppliers&action=profile&id='.$supplier_id);
    }
}

function change_supplier_status(){
	$supplier = new Supplier();
    $supplier_id= isset($_GET['id']) ? $_GET['id'] : '';
    $supplier_status= isset($_GET['supplier_status']) ? $_GET['supplier_status'] : '';
    $result = $supplier->change_supplier_status($id,$supplier_status);
    if($result){
        header('location: ../index.php?page=settings&subpage=suppliers&action=profile&id='.$id);
    }
}