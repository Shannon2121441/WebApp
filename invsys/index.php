<?php
    include_once 'classes/class.user.php';
    include_once 'classes/class.product.php';
    include_once 'classes/class.supplier.php';
    include_once 'classes/class.order.php';
    include_once 'classes/class.purchase.php';
    include_once 'classes/class.inventory.php';    
    include 'config/config.php';

    $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    $subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
    $action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
    $id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

    $user = new User();
    $product = new Product();
    $supplier = new Supplier();
    $order = new Order();
    $purchase = new Purchase();
    $inventory = new Inventory();
    
    $user = new User();
    if(!$user->get_session()){
	    header("location: login.php");
    }

    $user_id = $user->get_user_id($_SESSION['user_email']);
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>KM9 Inventory System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="js/script.js"></script>
</head>

<body>
    <div id="header">
      KM9 Inventory System
    </div>
    <div id="wrapper">
        <div id="nav">
            <a href="index.php">Home</a><b> |</b>
            <a href="index.php?page=order">Orders</a><b> |</b>
            <a href="index.php?page=purchase">Purchases</a><b> |</b>
            <a href="index.php?page=inventory">Inventory</a>
            <a href="index.php?page=settings" class="move-right">Settings</a>
            <a href="logout.php" class="move-right">Log Out<b> |</b></a>
        </div>
    <div id="content">
        <?php
            switch($page){
                case 'order':
                    require_once 'order-module/index.php';
                break; 
                case 'purchase':
                    require_once 'purchase-module/index.php';
                break; 
                case 'inventory':
                    require_once 'inventory-module/index.php';
                break; 
                case 'settings':
                    require_once 'settings-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
        ?>
  </div>
</div>

</body>
</html>