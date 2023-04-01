<div id="second-nav">
    <a href="index.php?page=order">Order List</a> | 
    <a href="index.php?page=order&action=create">New Transaction</a> | 
    Search <input type="text"/>
    
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'order-module/create-transaction.php';
                break; 
                case 'order':
                    require_once 'order-module/order-products.php';
                break;
                default:
                    require_once 'order-module/main.php';
                break; 
            }
    ?>
  </div>