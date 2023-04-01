<?php
include '../classes/class.product.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'newtype':
        create_new_type();
	break;
    case 'newproduct':
        create_new();
	break;
    case 'updateproduct':
        update_product();
	break;
    case 'upload':
        upload();
	break;
}

function create_new_type(){
	$product = new Product();
    $type_name= ucwords($_POST['type_name']);    
    $type_id = $product->new_product_type($type_name);
    if(is_numeric($type_id)){
        header('location: ../index.php?page=settings&subpage=products&action=types&id='.$type_id);
    }
}
function create_new(){
	$product = new Product();
    $prod_name= ucwords($_POST['prod_name']);  
    $type_id= $_POST['type_id'];  
    $supplier_id= $_POST['supplier_id'];    
    $beg_inv= ucwords($_POST['beg_inv']);  
    $prod_price= ucwords($_POST['prod_price']);
    $pid = $product->new_product($prod_name,$type_id,$supplier_id,$beg_inv,$prod_price);
    if(is_numeric($pid)){
        header('location: ../index.php?page=settings&subpage=products&action=profile&id='.$pid);
    }
}
function update_product(){
	$product = new Product();
    $prod_name= ucwords($_POST['prod_name']);  
    $type_id= $_POST['type_id'];  
    $supplier_id= $_POST['supplier_id'];    
    $beg_inv= ucwords($_POST['beg_inv']);
    $prod_price= ucwords($_POST['prod_price']);
    $pid= $_POST['prodid']; 
    $result = $product->update_product($prod_name,$type_id,$supplier_id,$beg_inv,$prod_price,$pid);
    header('location: ../index.php?page=settings&subpage=products&action=profile&id='.$pid);
}
/*
function upload(){
    if(isset($_POST["submit"])){
    $target_dir = "/";
    $file = $_FILES['fileToUpload']['name'];
    $target_file = $target_dir . $file;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
        if($check !== false) {
            echo "File is an image - " . $check['mime'] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }else{
        echo "error";
    }
    
	$product = new Product();
    $pname= ucwords($_POST['pname']);  
    $desc= ucwords($_POST['desc']);   
    $type= $_POST['ptype'];  
    $pid= $_POST['prodid']; 
    $result = $product->upload($pname,$desc,$type,$pid);
    header('location: ../index.php?page=settings&subpage=products&action=profile&id='.$pid);
    
}
*/