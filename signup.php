<?php

include_once('header.php');

?>


<section class="main-container">
	
	<div class="main-wrapper">
		<?php
			if(isset($_SESSION['u_id'])){
				
				echo "You are logged in!";
				echo "page changed";
			}
		
		?>
		
	</div>
	
</section>







<section class="main-container">
	
	<div class="main-wrapper">
		<h2>SignUp</h2>
		<form class="signup-form" action="include/signupInc.php" method="post">
			
			<input type="text" name="first" placeholder="FirstName">
			<input type="text" name="last" placeholder="LastName">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="UserName/Student ID">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">SignUp</button>
			
			
			
			
			
		</form>
		
		
	</div>
	
</section>

<?php

include_once('footer.php');

?>
