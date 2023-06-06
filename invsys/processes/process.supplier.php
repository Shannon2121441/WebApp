<?php
include '../classes/class.supplier.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';

switch($action){
	case 'new':
        create_new_supplier();
	break;
    case 'update':
        update_supplier();
	break;
    case 'updateemail':
        change_supplier_email();
	break;
    case 'updatecontact':
        change_supplier_contactno();
	break;
}

function create_new_supplier(){
	$supplier = new Supplier();
    $supplier_name = ucwords($_POST['supplier_name']);
    $supplier_email = $_POST['supplier_email'];
    $supplier_contactno = $_POST['supplier_contactno'];
    

    $result = $supplier->new_supplier($supplier_name,$supplier_email,$supplier_contactno);
    if($result){
        $id = $supplier->get_supplier_id($email);
        header('location: ../index.php?page=settings&subpage=supplier&action=profile&id='.$id);
    }
}

function update_supplier(){
	$supplier = new Supplier();
    $supplier_id = $_POST['supplierid'];
    $supplier_name = ucwords($_POST['supplier_name']);
    $supplier_contactno = ucwords($_POST['supplier_contactno']);
   
    
    $result = $supplier->update_supplier($supplier_name,$supplier_id,$supplier_contactno);
    if($result){
        header('location: ../index.php?page=settings&subpage=supplier&action=profile&id='.$supplier_id);
    }
}

function change_supplier_email(){
	$supplier = new Supplier();
    $id = $_POST['supplierid'];
    $current_email = $_POST['supplier_email'];
    $new_email = $_POST['newemail'];
    $current_password = $_POST['crpassword'];
    $result = $supplier->change_email($id,$new_email);
    if($result){
        header('location: ../index.php?page=settings&subpage=supplier&action=profile&id='.$id);
    }
}

function change_supplier_contactno(){
	$supplier = new Supplier();
    $id = $_POST['supplierid'];
    $current_contactno = $_POST['supplier_contactno'];
    $new_contactno = $_POST['newcontactno'];
    $current_password = $_POST['crpassword'];
    $result = $supplier->change_supplier_contactno($id,$new_contactno);
    if($result){
        header('location: ../index.php?page=settings&subpage=supplier&action=profile&id='.$id);
    }
}