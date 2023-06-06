<div id="subcontent">
    <?php
      switch($action){
                case 'result':
                    require_once 'inventory-module/search-user.php';
                break;
                default:
                    require_once 'inventory-module/main.php';
                break; 
            }
    ?>
  </div>