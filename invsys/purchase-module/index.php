<div id="second-nav">
    <a href="index.php?page=purchase">Purchase List</a> | 
    <a href="index.php?page=purchase&action=create">New Transaction</a> | 

    Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'purchase-module/create-transaction.php';
                break; 
                case 'purchase':
                    require_once 'purchase-module/purchase-products.php';
                break; 
                default:
                    require_once 'purchase-module/main.php';
                break; 
            }
    ?>
  </div>