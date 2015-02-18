<?php ob_start(); ?>


<?php 
 include '../core/init.php'; 
    loged_in_redirect();    
 include '../include/overall/all_header.php' ;  

    if(isset($_GET['success'])=== true && empty($_GET['success'])===true){
     ?>
	 <div class="alert alert-info">

    <h1> THanks , We have activated Your account !! Now You are free to log in :-)  ... </h1>
</div>










    <div class="container">
	<hr>
      <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="row">
		<div class="span8">
		<br> <br>
		<h1>  <img src="../image1/gift1.png"  alt="Hello World"  /> </h1>
		</div>
		
		
		         <div class="span4">
          <br/><br/><br/><br/>  <hr> <hr>                
            <?php include'../include/form/login_form.php' ?>      
         <hr><hr>
            
       </div>

       </div>                                  
                           <br/><br/>  <hr>           
                                        
                                        
                                        <!-- Example row of columns -->
                                        <div class="row">
                                        <div class="span4">
										<h1><P><img src="../image1/logo_key.png"  alt="Hello World"  /> Secured</p></h1>
                                        </div>
                                        <div class="span4">
										<h1><P><img src="../image1/logo_orientation.png"  alt="Hello World"  /> Oriented </p></h1>
                                        </div>
                                        <div class="span4">
                                        
										<h1><P><img src="../image1/logo_forum.png"  alt="Hello World"  /> Forumized </p>
                                        </div>
                                        </div>








    <?php }else if(isset($_GET['email'], $_GET['email_code']) === true){
            
            $email      = trim($_GET['email']);
            $email_code = trim($_GET['email_code']);
            
            if(email_exists($email)=== false) {
                $errors[] = 'Ooops, Something went Wrong, and we couldn\'t find that email address';
            } else if(activate($email, $email_code)===false){
                   $errors[]= 'We had problems activating your account';
            }
            
            if(empty($errors) === false){
                ?>
                <h2> Oooops.....</h2>
                <?php
                echo output_errors($errors);
            } else {
                header('Location: ../do/activate.php?success') ;
                exit();
            }
            
        } else{
            
            header('Location: ../index.php');
            
        }
 
 include '../include/overall/all_footer.php' ;   ?>                    
