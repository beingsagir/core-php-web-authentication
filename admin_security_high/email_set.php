<?php ob_start(); ?>
<?php 
include '../core/init.php'; 
protect_page();
admin_protect();
admin_protect2d();
include '../include/overall/all_header.php' ; 

if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
	?>    
	
	<p> Email Hasbeen Sent Successfully </p>
	<?php
}


if (empty($_POST) === false){
	if(empty($_POST['subject']) === true) {
	$errors[] = "subject is required";
	}
	if(empty($_POST['body']) === true) {
	$errors[] = "body is required";
	}
	if(empty($errors) === false) {
	echo output_errors($errors);
	}else{
		mail_user_all($_POST['subject'], $_POST['body']);
		header('Location: email_set.php?success');
		exit();
	}
}
?>
 <div class="container">

    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
		.
        </ul>
      </div>
      <div class="span9">
	  
	  



<h1> Email all users </h1>

<form action="" method="post">

		
			Subject*:<br/>
			<input class="input-xxlarge" type="text" placeholder=".input-xxlarge" name="subject">
			<br>
	
		
			Body*:<br/>
			<textarea class="input-xxlarge" rows="10" name="body"></textarea>
			
	
		
		<br>
			<button class="btn btn-large btn-primary" type="submit" value="send" >Send </button>
			
		

	</form>
	
	</div>
	</div>
	</div>
                
<?php  include '../include/overall/all_footer.php' ;   ?>    
                
