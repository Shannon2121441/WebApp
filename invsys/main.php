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
    <div id="img_wrapper">
        <img src="images/km9icon.jpg" alt="KM9 Icon" width="100%" height="100%">
    </div>
    <br> Welcome, <?php echo $user->get_user_firstname($user_id).' '.$user->get_user_lastname($user_id).'!';?>
    <br> upcoming orders: ...
    
    
</body>
</html>