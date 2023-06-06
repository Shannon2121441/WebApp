<div id="third-submenu">
    <a href="index.php?page=release">Releasing List</a> | 
    <a href="index.php?page=release&action=create">New Transaction</a>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'release-module/create-transaction.php';
                break; 
                case 'release':
                    require_once 'release-module/release-products.php';
                break; 
                default:
                    require_once 'release-module/main.php';
                break; 
            }
    ?>
  </div>