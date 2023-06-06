<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "suppliers-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="third-submenu">
    <a href="index.php?page=settings&subpage=supplier">List Suppliers</a> |
    <?php
 if($user_access_level != 'Staff'){
?> 
    <a href="index.php?page=settings&subpage=supplier&action=create">New Supplier</a> | 
    <?php
 }
    ?>
    Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
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