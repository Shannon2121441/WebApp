<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.supplier.php';
include_once 'classes/class.product.php';
include_once 'classes/class.receive.php';
include_once 'classes/class.release.php';
include_once 'classes/class.inventory.php';
include 'config/config.php';

$user = new User();
$supplier = new Supplier();
$product = new Product();
$receive = new Receive();
$release = new Release();
$inventory = new Inventory();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
$user_id_login = $user->get_user_id($_SESSION['user_email']);
$user_access_level = $user->get_user_access($user_id_login);

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>KM9 MINIMART</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300&family=Geologica&family=Quicksand:wght@500&family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<div id="container">
    <div id="header">
      KM9 MINIMART
    </div>
    <div id="wrapper">
            <div id="menu">
                <a href="index.php">Home</a> | 
                <a href="index.php?page=receive">Receiving</a> | 
                <a href="index.php?page=release">Releasing</a> |
                <a href="index.php?page=inventory">Inventory</a> |<br>
                <a href="index.php?page=chart">Charts</a> |
                <?php
                    if($user_access_level != 'Staff'){
                ?> 
                    <a href="xlsx-user-report.php">Generate User Report (Excel)</a> |
                    <a href="generate_user_excel.php">Generate User Report (PDF)</a>
                <?php
                }
                ?>
                <a href="index.php?page=settings" class="move-right">Settings</a>
                <a href="logout.php" class="move-right">Log Out<b> |</b></a>
            </div>
            <div id="content">
                <?php
                switch($page){
                            case 'settings':
                                require_once 'settings-module/index.php';
                            break; 
                            case 'receive':
                                require_once 'receive-module/index.php';
                            break; 
                            case 'inventory':
                                require_once 'inventory-module/index.php';
                            break; 
                            case 'release':
                                require_once 'release-module/index.php';
                            break; 
                            case 'chart':
                                require_once 'charts/index.php';
                            break; 
                            default:
                                require_once 'inventory-module/index.php';
                                require_once 'charts/index.php';
                            break; 
                        }
                ?>
            </div>
    </div>
</div>
</body>
</html>
