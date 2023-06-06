<div id="third-submenu">
    <a href="index.php?page=receive">Receiving List</a> | 
    <a href="index.php?page=receive&action=create">New Transaction</a>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'receive-module/create-transaction.php';
                break; 
                case 'receive':
                    require_once 'receive-module/receive-products.php';
                break; 
                default:
                    require_once 'receive-module/main.php';
                break; 
            }
    ?>
  </div>