<?php
    function email($to, $subject, $body){
		
		require 'Mail.php';
		$mail = new Mail();
		
		$headers = array(
			'From'    => 'noreply@dolovers.com',
			'Subject' => $subject
		);
		
		$auth = array(
			'auth'    	=> true,
			'host'		=> 'mail.dolovers.com',
			'username'	=> 'noreply+dolovers.com',
			'password'	=> 'password'
		);
	
	$smtp =$mail->factory('smtp', $auth);
	$smtp->send($to,$headers,$body);
	
        mail($to, $subject, $body, 'from : hello@dolovers.com') ;
    }
	
	
	 function single_email_1($to, $subject, $body){
		
		require 'Mail.php';
		$mail = new Mail();
		
		$headers = array(
			'From'    => 'DoLovers',
			'Subject' => $subject
		);
		
		$auth = array(
			'auth'    	=> true,
			'host'		=> 'mail.dolovers.com',
			'username'	=> 'noreply+dolovers.com',
			'password'	=> 'password'
		);
	
	$smtp =$mail->factory('smtp', $auth);
	$smtp->send($to,$headers,$body);
    }
	
	function single_email($to, $subject, $body){
        mail($to, $subject, $body, 'from : hello@dolovers.com') ;
    }

        function loged_in_redirect(){
        if(logged_in() === true){
                header('Location: ../do/home.php');
                exit();
    }
    }


 
    function protect_page(){
        if(logged_in() === false){
        	        	
                    header('Location: ../do/protectedpage.php?location=  '.  urlencode($_SERVER['REQUEST_URI']) );
                exit();
    }
    }

    function array_sanitize(&$item){
           $item = htmlentities(strip_tags(mysql_real_escape_string($item)))  ;
    }
    
    
    function sanitize($data){
        return htmlentities(strip_tags(mysql_real_escape_string($data)));
    }  
    
    
    function output_errors($errors){
        return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>' ;
    }
	
	
		function admin_protect() {
        global $user_data;
		if ($user_data['administration'] == 0){
			header('Location: ../do/security_protect.php');
			exit();
		}
	
	}
	
	function admin_protect2d() {
    global $user_data;
		if ($user_data['administration'] != 3){
			header('Location: ../do/security_protect.php');
			exit();
		}
	
	}
?>