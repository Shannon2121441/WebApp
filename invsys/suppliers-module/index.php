<div id="second-nav">
    <a href="index.php?page=settings&subpage=suppliers">List Suppliers</a> | <a href="index.php?page=settings&subpage=suppliers&action=create">New Supplier</a> | Search <input type="text"/>
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'suppliers-module/create-supplier.php';
                break; 
                case 'modify':
                    require_once 'suppliers-module/modify-supplier.php';
                break; 
                case 'profile':
                    require_once 'suppliers-module/view-profile.php';
                break;
                case 'result':
                    require_once 'suppliers-module/search-supplier.php';
                break;
                default:
                    require_once 'suppliers-module/main.php';
                break; 
            }
    ?>
  </div>