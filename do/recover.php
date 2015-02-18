<?php ob_start(); ?>

<?php
include '../core/init.php';
loged_in_redirect();
include '../include/overall/all_header.php';
?>



   <div class="container">
		
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
	  <hr>
      <h1>Recovery System !!</h1>
       <hr> 
	
    




<?php
if(isset($_GET['success'])=== true && empty($_GET['success']) === true){
?>
	<p> Thanks , We have emailed you.</p>
<?php
}else{
$mode_allowed = array('username', 'password');
if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
	if(isset($_POST['email']) === true && empty($_POST['email']) === false){
		if(email_exists($_POST['email']) === true){
			recover($_GET['mode'], $_POST['email']);
			header('Location: ../do/recover.php?success');
			exit();
		}else{
			echo '<p> Oooops, we could not find that email address !!</p>';
		}
	}
?>

     <form action="" method="post">
		<ul>
			
			<p>Please Enter Your email address :</p><br>
			
			
			<input class="input-xxlarge" type="text" placeholder="write your email id here..." name = "email"> <br/>
			
			<button type="submit" value="Recover" class="btn btn-large btn-primary">Click to get a Recovery mail</button>
			
		<ul>
	 </form>
	 
</div>




  

<?php
} else {
	header('Location: ../index.php');
	exit();
}
}
?>

<?php include '../include/overall/all_footer.php' ; ?>

</div>