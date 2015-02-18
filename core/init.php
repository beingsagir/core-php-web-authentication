<?php
ob_start();
?>

<?php

session_start(1);
ini_set('display_errors',1);
     error_reporting(E_ALL);
 
    require 'database/connect.php';
    require  'function/general.php';
    require 'function/users.php';
    
	$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
	$current_file = end($current_file);
	
	$errors =array(); 
	
	
	
	 
    if (logged_in() === true){
        $session_user_id  = $_SESSION['user_id'];
        $user_data = user_data($session_user_id,'user_id', 'username', 'password', 'first_name','last_name','email','dob','gender','password_recover','profilepic','administration'); 
        
        if(user_active($user_data['username'])=== false){
            session_destroy();
            header('Location: index.php');
            exit();
        }
		
		//	if($current_file != '../profile/changepassword.php' && $user_data['password_recover']== 1){
		//   header('Location:../profile/changepassword.php?force');
		//   exit();
		
		
		 
		
		if($user_data['password_recover']== 1){
		
			$recover=1;
		
		}else {
				$recover=0;
		}
		
		
        $college_data = college_data($session_user_id,'college', 'roll_no', 'reg_no', 'batch','stream','deeg'); 
        $faculty_data = faculty_data($session_user_id,'college', 'post'); 
	
		
    } 
	
		
	
	            
			?>