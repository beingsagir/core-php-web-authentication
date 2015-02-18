<?php


	function contact_input($contact_data){
	array_walk($contact_data, 'array_sanitize');
	$fields = '`' . implode('`,`', array_keys($contact_data)) . '`';
	$data = '\'' . implode ('\',\'', $contact_data) . '\''; 

	mysql_query("INSERT INTO `contact` ($fields) VALUES ($data)");
	}
	
	
	function mail_user_all($subject, $body){
	$ac_e= 1;
		$query = mysql_query("SELECT email , first_name From users where active= '$ac_e'");
		while (($row = mysql_fetch_assoc($query)) !== false) {
		single_email($row['email'], $subject, "Hello "   .  $row['first_name'] . ", \n\n" . $body);
		}
	}


	function topic_cat_from_topic_id($post_topic){
    $post_topic = sanitize($post_topic);
    return mysql_result(mysql_query("SELECT (topic_cat) FROM topics WHERE topic_id = '$post_topic'"), 0, 'topic_cat');

}
    function topic_by_from_topic_id($post_topic){
    $post_topic = sanitize($post_topic);
    return mysql_result(mysql_query("SELECT (topic_by) FROM topics WHERE topic_id = '$post_topic'"), 0, 'topic_by');

}

	function topic_namefromtopicid($post_topic){
        $post_topic = sanitize($post_topic);
		$kww="SELECT (topic_subject) FROM topics WHERE topic_id = '$post_topic'  ";
        return mysql_result(mysql_query("$kww"), 0, 'topic_subject');

}

	function email_from_user_id($user_id){
        $user_id = sanitize($user_id);
        return mysql_result(mysql_query("SELECT (email) FROM users WHERE user_id = '$user_id'"), 0, 'email');

}
    function user_id_from_topic_id($topicid){
        $topicid = sanitize($topicid);
        return mysql_result(mysql_query("SELECT (topic_by) FROM topics WHERE topic_id = '$topicid'"), 0, 'topic_by');
    }
	
    
	function segment_from_catid($send_cat){
        $catcat = sanitize($send_cat);
        return mysql_result(mysql_query("SELECT (segment) FROM categories WHERE cat_id = '$send_cat'"), 0, 'segment');
    }

    function addpostpoint($post_user_id){
	$uid4 = sanitize($post_user_id);
	
	$poi4=mysql_query("Select forum_points from `users` where user_id= $uid4");
	$points4 = mysql_result($poi4,0);
	
	$post=mysql_query("Select forum_post_count from `users` where user_id= $uid4");
	$post_count = mysql_result($post,0);
	
	
			$first_number4 = $points4;
			$second_number4 = 1;
			$sum_total4 = $first_number4 + $second_number4;
		//	$direct_text4 = 'Your Total Points in forum = ';
        //    $direct_text14 = '<br>';
		//	print ($direct_text4 . $sum_total4 . $direct_text14);
			
			
			$prepost = $post_count;
			$afpost = 1;
			$sum_total24 = $prepost + $afpost;
		//	$direct_text24 = 'Your Total Post in forum = ';
       //     $direct_text214 = '<br>';
		//	print ($direct_text24 . $sum_total24 . $direct_text214);

	mysql_query("UPDATE users SET forum_points = $sum_total4 WHERE user_id =$uid4");
	mysql_query("UPDATE users SET forum_post_count = $sum_total24 WHERE user_id =$uid4");
	}
	

		function topicexist($topic){
		$topic1 = sanitize($topic);
		
       
		return (mysql_result(mysql_query("SELECT COUNT('topic_id') FROM topics WHERE topic_subject='$topic1'"),0)==0)?false:true;
	
    }
		
		 
	function addtopicpoint($session_user_id){
	$uid = sanitize($session_user_id);
	
	$poi=mysql_query("Select forum_points from `users` where user_id= $uid");
	$points = mysql_result($poi,0);
	
	$topic=mysql_query("Select forum_topic_count from `users` where user_id= $uid");
	$topic_count = mysql_result($topic,0);
	
	
			$first_number = $points;
			$second_number = 3;
			$sum_total = $first_number + $second_number;
			$direct_text = 'Your Total Points in forum = ';
            $direct_text1 = '<br/>';
			print ($direct_text . $sum_total . $direct_text1);
			
			
			$pretopic = $topic_count;
			$aftopic = 1;
			$sum_total2 = $pretopic + $aftopic;
			$direct_text2 = 'Your Total Post in forum = ';
            $direct_text21 = '<br/>';
			print ($direct_text2 . $sum_total2 . $direct_text21);

	mysql_query("UPDATE users SET forum_points = $sum_total WHERE user_id =$uid");
	mysql_query("UPDATE users SET forum_topic_count = $sum_total2 WHERE user_id =$uid");
	}
	
	
     function post_count($top_id){
		$post_count=mysql_query("Select count(`post_id`)from `posts` where post_topic=$top_id");
        return mysql_result($post_count,0);
       
    }
        function topic_count($cat_id){
		$top_count=mysql_query("Select count(`topic_id`)from `topics` where topic_cat=$cat_id");
        return mysql_result($top_count,0);
       
    }

	    function shout_review_user($shout_review_data){
        array_walk($shout_review_data, 'array_sanitize');
        $fields = '`' . implode('`,`', array_keys($shout_review_data)) . '`';
        $data = '\'' . implode ('\',\'', $shout_review_data) . '\''; 

        mysql_query("INSERT INTO `shout_review` ($fields) VALUES ($data)");
	}
	
	
	
		function aca_up_data_user($user_id, $aca_up_data){
 
        $update =array();
        array_walk($aca_up_data, 'array_sanitize');

        foreach($aca_up_data as $field=>$data){
            $update[] = '`' . $field .'`= \'' . $data .'\' ';
        }

        mysql_query("UPDATE `acadata` SET " . implode(', ', $update) . " where `user_id` = $user_id") ;
        }

		    function academic_data($user_id){
        $data = array();
        $user_id = (int)$user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();

        if ($func_num_args > 1){
        unset($func_get_args[0]);
   
         $fields = '`' . implode ('`, `',$func_get_args). '`';
        
         $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM acadata WHERE user_id = '$user_id'"));

         
         return $data;
        }

    }  
	
	
	    function update_academy($aca_data){
        array_walk($aca_data, 'array_sanitize');
        
        $fields = '`' . implode('`,`', array_keys($aca_data)) . '`';
        $data = '\'' . implode ('\',\'', $aca_data) . '\''; 
        
        
        mysql_query("INSERT INTO `acadata` ($fields) VALUES ($data)");
		}


	function shout_clg_faculty($shout_clg_faculty_data){
        array_walk($shout_clg_faculty_data, 'array_sanitize');
        $fields = '`' . implode('`,`', array_keys($shout_clg_faculty_data)) . '`';
        $data = '\'' . implode ('\',\'', $shout_clg_faculty_data) . '\''; 

        mysql_query("INSERT INTO `shout_college_faculty` ($fields) VALUES ($data)");
	}
	

	function shout_clg_user($shout_clg_data){
        array_walk($shout_clg_data, 'array_sanitize');
        $fields = '`' . implode('`,`', array_keys($shout_clg_data)) . '`';
        $data = '\'' . implode ('\',\'', $shout_clg_data) . '\''; 
		
        mysql_query("INSERT INTO `shout_college` ($fields) VALUES ($data)");
	}
	
	
	
	 function collegeconnect_faculties_user($facultyconnect_data){
	  
        array_walk($facultyconnect_data, 'array_sanitize');
        
        $fields = '`' . implode('`,`', array_keys($facultyconnect_data)) . '`';
        $data = '\'' . implode ('\',\'', $facultyconnect_data) . '\''; 
        mysql_query("INSERT INTO `faculty_entry` ($fields) VALUES ($data)");
    } 

    function collegeconnect_user($collegeconnect_data){
	  
        array_walk($collegeconnect_data, 'array_sanitize');
        
        $fields = '`' . implode('`,`', array_keys($collegeconnect_data)) . '`';
        $data = '\'' . implode ('\',\'', $collegeconnect_data) . '\''; 
        
        mysql_query("INSERT INTO `college_entry` ($fields) VALUES ($data)");
    } 
    function change_profile_image($user_id, $file_temp, $file_extn, $old_path){

        $picName= ($old_path);
        if($picName!='../image1/dpp/dpp.jpg')
        {
        if (file_exists($picName))
        {
        unlink($picName);
        }
        }
        $file_path = '../image1/profilepic/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
        move_uploaded_file($file_temp, $file_path);
        mysql_query("UPDATE users SET profilepic = '" . $file_path . "' WHERE user_id =" . (int)$user_id);
    }

	 function recover($mode, $email){
		$mode   =sanitize($mode);
		$email  =sanitize($email);
		
		$user_data = user_data(user_id_from_email($email), 'first_name', 'username','user_id');
			if($mode == 'username'){
				email($email, 'Your username', "Hello " . $user_data['first_name'] . ",\n\n Your username is: " . $user_data['username'] . " \n\n -DoLovers.com");
			}else if($mode == 'password'){
				$generated_password = substr(md5(rand(999, 999999)), 0, 8);
				change_password($user_data['user_id'], $generated_password);
				
				update_user($user_data['user_id'], array('password_recover' => '1'));
				
				email($email, 'Your password recovery', "Hello " . $user_data['first_name'] . ",\n\n Your new (System Generated) password is: " . $generated_password . " \n please login with this password and then Change your password using this password . \n this is for security : Please go to profile --> change password and change your password using this system generated password .thank you !! \n\n -DoLovers.com");

			}
			
	}

    function update_user($user_id, $update_data){
 
        $update =array();
        array_walk($update_data, 'array_sanitize');

        foreach($update_data as $field=>$data){
            $update[] = '`' . $field .'`= \'' . $data .'\' ';
        }

        mysql_query("UPDATE `users` SET " . implode(', ', $update) . " where `user_id` = $user_id") ;
        
        /*
        array_walk($register_data, 'array_sanitize');
        $register_data['password']  = md5($register_data['password']);
        
        $fields = '`' . implode('`,`', array_keys($register_data)) . '`';
        $data = '\'' . implode ('\',\'', $register_data) . '\''; 
        
        
        mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
       
        email($register_data['email'],'Activate Your account',"
        Hello ". $register_data['first_name'] .",
        You need to activate Your account, So use the link below:
        \n\n
        http://localhost/myplace/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "   
        \n\n
        -dolovers
        ");           */
      
         
    }

    function activate($email, $email_code){
        $email    =mysql_real_escape_string($email);
        $email_code    =mysql_real_escape_string($email_code); 
        if (mysql_result(mysql_query("select count(user_id)from users where email = '$email' and email_code = '$email_code' and active =0 "),0) == 1) {
            mysql_query("UPDATE users SET active = 1 where email = '$email'");
           return true; 
        } else{
            return false;
        }
    }

    function change_password($user_id, $password){
        $user_id = (int)$user_id;
        $password = md5($password);
        
        mysql_query("UPDATE users SET password = '$password' , `password_recover` = 0 WHERE user_id = $user_id");
    }

    function register_user($register_data){
        array_walk($register_data, 'array_sanitize');
        $register_data['password']  = md5($register_data['password']);
        
        $fields = '`' . implode('`,`', array_keys($register_data)) . '`';
        $data = '\'' . implode ('\',\'', $register_data) . '\''; 
        
        
        mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
       
        email($register_data['email'],'Activate Your account',"
        Hello ". $register_data['first_name'] .",
        You need to activate Your account, So pls go to the link below:
        \n\n
        http://www.dolovers.com/do/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "   
        \n\n
        -dolovers
        ");
		
		}
     function upostcount($uid_1){
        return mysql_result(mysql_query("Select `forum_points` from `users` where `user_id` = $uid_1"),0);
        
    } function usertopiccount($uid_2){
        return mysql_result(mysql_query("Select `forum_topic_count` from `users` where `user_id` = $uid_2"),0);
        
    }
	function userpostcount($uid_3){
        return mysql_result(mysql_query("Select `forum_post_count` from `users` where `user_id` = $uid_3"),0);
        
    }
	function postcount(){
        return mysql_result(mysql_query("Select count(`post_id`)from `posts` "),0);
        
    }	

	function topiccount(){
        return mysql_result(mysql_query("Select count(`topic_id`)from `topics` "),0);
        
    }

    function usercount(){
        return mysql_result(mysql_query("Select count(`user_id`)from `users` where `active` = 1"),0);
        
    }
	
		    function faculty_data($user_id){
        $data = array();
        $user_id = (int)$user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();

        if ($func_num_args > 1){
        unset($func_get_args[0]);
   
         $fields = '`' . implode ('`, `',$func_get_args). '`';
        
         $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM faculty_entry WHERE user_id = '$user_id'"));

         
         return $data;
        }

    } 
	
	    function college_data($user_id){
        $data = array();
        $user_id = (int)$user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();

        if ($func_num_args > 1){
        unset($func_get_args[0]);
   
         $fields = '`' . implode ('`, `',$func_get_args). '`';
        
         $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM college_entry WHERE user_id = '$user_id'"));

         
         return $data;
        }

    } 

    function user_data($user_id){
        $data = array();
        $user_id = (int)$user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();

        if ($func_num_args > 1){
        unset($func_get_args[0]);
   
         $fields = '`' . implode ('`, `',$func_get_args). '`';
        
         $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE user_id = '$user_id'"));

         
         return $data;
        }

    }               
    
    function logged_in(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }

	
	function fac_code_exists($code_fac, $college){
        $college = sanitize($college);
		$code_fac = sanitize($code_fac);
        $query = mysql_query("SELECT COUNT(fac_code_id) FROM code_fac WHERE code_fac = '$code_fac' AND college = '$college' ");
        return (mysql_result($query, 0) == 1) ? true :false ;
    }
	
	
	
	    function roll_no_exists($roll_no, $college){
        $roll_no = sanitize($roll_no);
		$college = sanitize($college);
        $query = mysql_query("SELECT COUNT(mem_id) FROM college_entry WHERE roll_no = '$roll_no', college = '$college' ");
        return (mysql_result($query, 0) == 1) ? true :false ;
    }
	
		function user_id_exists_aca($session_user_id){
		$user_id = sanitize($session_user_id);
        $query = mysql_query("SELECT COUNT(user_id) FROM acadata where user_id = '$user_id'" );
        return (mysql_result($query, 0) == 1) ? true :false ;
	}
	
	
		function user_id_exists_fac($session_user_id){
		$user_id = sanitize($session_user_id);
        $query = mysql_query("SELECT COUNT(user_id) FROM faculty_entry where user_id = '$user_id'" );
        return (mysql_result($query, 0) == 1) ? true :false ;
	}
	
/*	
	function user_id_exists_fac($session_user_id){
		$user_id = sanitize($session_user_id);
        $query = mysql_query("SELECT COUNT(user_id) FROM faculty_entry where user_id = '$user_id'" );
        return (mysql_result($query, 0) == 1) ? true :false ;
	}*/
	
	
	function user_id_exists_college($session_user_id){
		$user_id = sanitize($session_user_id);
        $query = mysql_query("SELECT COUNT(user_id) FROM college_entry where user_id = '$user_id'" );
        return (mysql_result($query, 0) == 1) ? true :false ;
	}
	
	
    function user_exists($username){
        $username = sanitize($username);
        $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE username = '$username' ");
        return (mysql_result($query, 0) == 1) ? true :false ;
    }
     function email_exists($email){
        $email = sanitize($email);
        $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE email = '$email' ");
        return (mysql_result($query, 0) == 1) ? true :false ;
    }
    
    
    
    function user_active($username){
        $username = sanitize($username);
        $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE username = '$username' AND active = 1 ");
        return (mysql_result($query, 0) == 1) ? true :false ;
    } 
	
    function profilepic_from_user_id($user_id){
        $user_id = sanitize($user_id);
        return mysql_result(mysql_query("SELECT (profilepic) FROM users WHERE user_id = '$user_id'"), 0, 'profilepic');
    }	
    function username_from_user_id($user_id){
        $user_id = sanitize($user_id);
        return mysql_result(mysql_query("SELECT (username) FROM users WHERE user_id = '$user_id'"), 0, 'username');
    }	
	   function first_name_from_user_id($user_id){
        $user_id = sanitize($user_id);
        return mysql_result(mysql_query("SELECT (first_name) FROM users WHERE user_id = '$user_id'"), 0, 'first_name');
    }
	
		function last_name_from_user_id($user_id){
        $user_id = sanitize($user_id);
        return mysql_result(mysql_query("SELECT (last_name) FROM users WHERE user_id = '$user_id'"), 0, 'last_name');
    }
	
	 function cat_name_from_catid($catid){
        $cat_id = sanitize($catid);
        return mysql_result(mysql_query("SELECT (cat_name) FROM categories WHERE cat_id = '$cat_id'"), 0, 'cat_name');
    }
    function user_id_from_username($username){
        $username = sanitize($username);
        return mysql_result(mysql_query("SELECT (user_id) FROM users WHERE username = '$username'"), 0, 'user_id');
    }
	
	function user_id_from_email($email){
        $email = sanitize($email);
        return mysql_result(mysql_query("SELECT (user_id) FROM users WHERE email = '$email'"), 0, 'user_id');
    }
    
    function user_login($username,$password){
        $user_id =user_id_from_username($username);
        $username = sanitize($username);
        $password = md5($password);
        return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE username = '$username' AND password = '$password'"), 0) == 1) ? $user_id : false ;    
      
    }
?>
