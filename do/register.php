<?php ob_start(); ?>

<?php 
include '../core/init.php';  
loged_in_redirect();


include '../include/overall/all_header.php' ; 

   
if (empty($_POST) === false){

    $required_fields = array('username', 'password','password_again','first_name','email','dob','gender') ;
 
    foreach($_POST as $key => $value){
         if(empty($value) && in_array($key,$required_fields) === true){
             $errors[] = '* marks fields are all required to filled';
             break 1;
    
         }   
    
    } 
    
    if (empty($errors) === true){

        if (user_exists($_POST['username']) === true){        
         $errors[] = 'Sorry the username \''. $_POST['email'] . '\' is already taken'  ;   
        } 
        
                if (strlen($_POST['username']) <5){   
            $errors[] = 'username should be more than 4 char';  
        
                }     
                if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)=== false){
            $errors[]= 'a valid email id is required' ;
            
        }
                if (preg_match("/\\s/", $_POST['username']) === true){   
            $errors[] = 'your username mustnot contain any error';              
        }
        if (strlen($_POST['password']) <6){   
            $errors[] = 'password should be more than 6 char';              
        }
                if ($_POST['password'] !== $_POST['password_again']){   
            $errors[] = 'Your password do not match';              
        }

         if (email_exists($_POST['email']) === true){        
         $errors[] = 'Sorry the email \''. $_POST['email'] . '\' is already in use'  ;   
        }
        
          
                
$day = (int)$_POST['day'];
$month = (int)$_POST['month'];
$year = (int)$_POST['year'];
$validate = checkdate($month, $day, $year);
$full_birthday = "$year-$month-$day";
if($validate !== true){
$errors[] = 'Sorry the date of birth you have inserted is not valid'  ;
$errors[] = $full_birthday ;  
}



    if(empty($_SESSION['captcha_code'] ) ||
      strcasecmp($_SESSION['captcha_code'], $_POST['6_letters_code']) != 0)
    {
    //Note: the captcha code is compared case insensitively.
    //if you want case sensitive match, update the check above to
    // strcmp()
        $errors[] = "\n The captcha code does not match!";
    }


        
                    
        
    }
}

  ?> 
   
  <?php
  /*if (isset($_GET['success']) && empty($_GET['success'])) {
        echo 'You have been registered successfully' ;
  } else{*/
              if (empty($_POST) === false && empty($errors)=== true) {   

			  
                $datetime_create =date("Y-m-d h:i:s");
				
                $register_data =  array(
                  'username'        => $_POST['username'],
                  'password'        => $_POST['password'],
                  'first_name'      => $_POST['first_name'],
                  'last_name'       => $_POST['last_name'],
                  'email'           => $_POST['email']  ,
                  'email_code'      => md5($_POST['username'] + microtime())  ,
                  'dob'             => $full_birthday ,
                  'gender'          => $_POST['gender'],
                  'create_date'     => $datetime_create ,
                );
                register_user  ($register_data);
                header('Location: ../do/register_success.php');
                 exit();
                
            }
            else if (empty($errors) === false){
                ?>
                <div class="alert alert-error">  <?php

                echo output_errors($errors);
               ?> </div>      <?php
            } 
            
            
            
     ?>       
            
    <div class="container">
        <div class="row">
		
		<div class="span4">
					
					
					

										<h2><P><img src="../image1/logo3.png"  alt="Hello World"  /> Worldwide</p></h2>

										<h2><P><img src="../image1/logo8.png"  alt="Hello World"  /> Simple </p></h2>

										<h2><P><img src="../image1/logo9.png"  alt="Hello World"  /> Secured </p></h2>
										
										<h2><P><img src="../image1/logo5.png"  alt="Hello World"  /> Faster</p></h2>

					
					
					
		</div>
							
		<div class="span4">
           
										<h2><P><img src="../image1/logo7.png"  alt="Hello World"  /> Oriented</p></h2>
                               
										<h2><P><img src="../image1/logo2.png"  alt="Hello World"  /> Moving</p></h2>
                                 
										<h2><P><img src="../image1/logo6.png"  alt="Hello World"  /> Managed </p></h2>
										
										<h2><P><img src="../image1/logo4.png"  alt="Hello World"  /> Scheduled</p></h2>
                        
		</div>
         <div class="span4">
         
      <!-- registration --->     
            <?php include'../include/form/registrationform.php' ?> 
    
            
            
       </div>
       </div>  
</div>	   
 <?php                                            
    /*  }        */
 include '../include/overall/all_footer.php' ;   ?>    
                
