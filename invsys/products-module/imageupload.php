<?php
 if($user_access_level == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=products");
 }
?>
<h3>Provide the Required Information</h3>
<h4><?php echo $product->get_prod_name($id);?></h4>
<div id="form-block">
    <form action="products-module/upload.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
    <label for="fileToUpload">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" multiple>
    <input type="submit" value="Upload Image" name="submit">
    </form>
</div>