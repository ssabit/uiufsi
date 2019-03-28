<?php

session_start();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>


<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				
				<li><a href="index.php">UIU Faculty And Student Info</a></li>
				
			</ul>
				
			<div class="nav-login">
				<?php
				if(isset($_SESSION['u_id'])){
					
					echo '<form action="include/logoutInc.php" method="post">
					<button type="submit" name="submit">Logout</button>
				</form>';
					
					
				}
				else{
					
					
					echo '<form action="include/loginInc.php" method="post">
					
					<input type="text" name="uid"  placeholder="username">
					<input type="password" name="pwd" placeholder="password">
					<button type="submit" name="submit">Login</button>
				</form>
				<a href="signup.php">SignUp</a>
				';
					
					
					
				}
				
				?>
				
				
				
			</div>
			
		</div>
		
	</nav>
	
	
</header>