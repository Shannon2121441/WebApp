<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($user_email,$user_password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KM9 Minimart Inventory System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&family=Lexend:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesheet.css?<?php echo time();?>">
</head>
<body>
<div id="brand-block">
    KM9 Minimart
</div>
<div id="login-block">
	<h3>Please login</h3>
	<form method="POST" action="" name="login">
	<div>
		<input type="email" class="input" required name="user_email" placeholder="Valid E-mail"/>
	</div>
	<div>
		<input type="password" class="input" required name="user_password" placeholder="Password"/>
	</div>
	<div>
		<input class="move-right" type="submit" name="submit" value="Submit"/>
	</div>
	</form>
</div>
</body>
</html>