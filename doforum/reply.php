<?php ob_start(); ?>

<?php 
include '../core/init.php'; 
protect_page();
    
             

   include '../include/overall/doforum_header.php' ; 
   
?>
    <div id="menu">  
	
        <a class="item" href="/doforum/create_topic.php">Create a topic</a> -  
 
    </div> 
<?php

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//someone is calling the file directly, which we don't want
	echo 'This file cannot be called directly.';
}
else
{
	//check for sign in status
	if (logged_in() === false)
	{
		echo 'You must be signed in to post a reply.';
	}
	else
	{
		//a real user posted a real reply
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $_POST['reply-content'] . "',
						NOW(),
						" . mysql_real_escape_string($_GET['id']) . ",
						" . $_SESSION['user_id'] . ")";
						
		$result = mysql_query($sql);
						
		if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			addpostpoint($session_user_id);
			echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
		}
	}
}

?>

<?php  include '../include/overall/all_footer.php' ;   ?> 