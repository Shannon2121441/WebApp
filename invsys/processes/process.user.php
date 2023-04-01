<?php
include '../classes/class.user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id= isset($_GET['id']) ? $_GET['id'] : '';
$status= isset($_GET['status']) ? $_GET['status'] : '';

switch($action){
	case 'new':
        create_new_user();
	break;
    case 'update':
        update_user();
	break;
    case 'status':
        change_user_status();
	break;
    case 'updatepassword':
        change_user_password();
	break;
    case 'updateemail':
        change_user_email();
	break;
    case 'updatecontactno':
        change_user_contactno();
	break;
}

function create_new_user(){
	$user = new User();
    $email = $_POST['user_email'];
    $lname = ucwords($_POST['lname']);
    $fname = ucwords($_POST['fname']);
    $position = ucwords($_POST['position']);
    $contact_no = ucwords($_POST['contact_no']);
    $DOB = ucwords($_POST['DOB']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    $result = $user->new_user($email,$password,$lname,$fname,$position,$contact_no,$DOB);
    if($result){
        $id = $user->get_user_id($email);
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}

function update_user(){
	$user = new User();
    $user_id = $_POST['userid'];
    $lname = ucwords($_POST['lname']);
    $fname = ucwords($_POST['fname']);
    $position = ucwords($_POST['position']);
   
    
    $result = $user->update_user($lname,$fname,$position,$user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
    }
}

function change_user_status(){
	$user = new User();
    $id= isset($_GET['id']) ? $_GET['id'] : '';
    $status= isset($_GET['status']) ? $_GET['status'] : '';
    $result = $user->change_user_status($id,$status);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}

function change_user_password(){
	$user = new User();
    $id = $_POST['userid'];
    $current_password = $_POST['crpassword'];
    $new_password = $_POST['npassword'];
    $confirm_password = $_POST['copassword'];
    $result = $user->change_password($id,$new_password);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}

function change_user_email(){
	$user = new User();
    $id = $_POST['userid'];
    $current_email = $_POST['useremail'];
    $new_email = $_POST['newemail'];
    $current_password = $_POST['crpassword'];
    $result = $user->change_email($id,$new_email);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}
function change_user_contactno(){
    $user = new User();
    $id = $_POST['userid'];
    $current_contactno = $_POST['contactno'];
    $new_contactno = $_POST['newcontactno'];
    $current_contactno = $_POST['crcontactno'];
    $result = $user->change_contactno($id,$new_contactno);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
}
