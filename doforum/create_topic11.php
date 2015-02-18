<?php ob_start(); ?>

<?php 
include '../core/init.php'; 
protect_page();
    
             

   include '../include/overall/doforum_header.php' ; 
   
?>

<div class="container">
 <div class="row">
   
   <div class="pagination">
  <ul>
			<li><a href="../doforum">Forum Home</a></li>

                  <li class="divider-vertical"></li>
                  <li class="active"> <a class="item" href="/doforum/create_topic.php">Create a topic</a></li>
                  <li class="divider-vertical"></li>
                  
                  <li class="divider-vertical"></li>
  </ul>
</div><hr>




<div class="span8">
<div class="thumbnail">


<?php

echo '<h2>Create a topic</h2>';
if (logged_in() === false)
{
	//the user is not signed in
	echo 'Sorry, you have to be <a href="/forum/signin.php">signed in</a> to create a topic.';
}

else
{
	//the user is signed in
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{	
		//the form hasn't been posted yet, display it
		//retrieve the categories from the database for use in the dropdown
		$sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			//the query failed, uh-oh :-(
			echo 'Error while selecting from database. Please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				//there are no categories, so a topic can't be posted
				if($_SESSION['user_level'] == 1)
				{
					echo 'You have not created categories yet.';
				}
				else
				{
					echo 'Before you can post a topic, you must wait for an admin to create some categories.';
				}
				
			}
			else
			{

		
				?> <form method="post" action="">
				
					Topic Name:<br/> <input type="text" name="topic_subject" /> <br />
					<h2><span class="label label-important">Select a most apropriate Category for your topic </span><span class="label label-success"> : Category Must</span></h2>
				     Category:<br>
			<select name="topic_cat">';
							<option value="<?php echo $catid;?>" SELECTED>Click Here</option>
				<?php	while($row = mysql_fetch_assoc($result))
					{
						echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
					}
				echo '</select><br />';	
					
				echo '<br /> Details of your Topic: <br /><textarea rows="3" class="span8" name="post_content"></textarea><br /><br />
					<input type="submit" value="Create topic" />
				 </form>'; ?>
				 
				 				<script type="text/javascript">
	CKEDITOR.replace('post_content');
	</script>
				 
				 <?php
			}
		}
	}
	else
	{
		//start the transaction
		$query  = "BEGIN WORK;";
		$result = mysql_query($query);
		
		if(!$result)
		{
			//Damn! the query failed, quit
			echo 'An error occured while creating your topic. Please try again later.';
		}
	
		else
		{	 $topex= $_POST['topic_subject'];
		     if($topex === ""){        
             echo '<h2> You have not enter a topic name, Please go back and Enter a topic name first. </h2><hr>'  ;   
				
           }
			 
			 
		   else if(topicexist($topex) === true){        
             echo '<h2> Sorry the topic name \''. $_POST['topic_subject'] . '\' is already exist , You better search for this topic and get help from that otherwise create a new topic with different name </h2><hr>'  ;   
				
           } else{
			//the form has been posted, so save it
			//insert the topic into the topics table first, then we'll save the post into the posts table
			$sql = "INSERT INTO 
						topics(topic_subject,
							   topic_date,
							   topic_cat,
							   topic_by)
				   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
							   NOW(),
							   " . mysql_real_escape_string($_POST['topic_cat']) . ",
							   " . $_SESSION['user_id'] . "
							   )";
					 
			$result = mysql_query($sql);
			if(!$result)
			{
				//something went wrong, display the error
				echo 'An error occured while inserting your data. Please try again later.<br /><br />' . mysql_error();
				$sql = "ROLLBACK;";
				$result = mysql_query($sql);
			}
			else
			{
				//the first query worked, now start the second, posts query
				//retrieve the id of the freshly created topic for usage in the posts query
				$topicid = mysql_insert_id();
				
				$sql = "INSERT INTO
							posts(post_content,
								  post_date,
								  post_topic,
								  post_by)
						VALUES
							('" . mysql_real_escape_string($_POST['post_content']) . "',
								  NOW(),
								  " . $topicid . ",
								  " . $_SESSION['user_id'] . "
							)";
				$result = mysql_query($sql);
				
				
				if(!$result)
				{
					//something went wrong, display the error
					echo 'An error occured while inserting your post. Please try again later.<br /><br />' . mysql_error();
					$sql = "ROLLBACK;";
					$result = mysql_query($sql);
				}
				else
				{
					$sql = "COMMIT;";
					$result = mysql_query($sql);
					addtopicpoint($session_user_id);
					//after a lot of work, the query succeeded!
					echo 'You have succesfully created <a href="topic.php?id='. $topicid . '&cid=' . mysql_real_escape_string($_POST['topic_cat']) . '">your new topic</a>';
				}
			}
			}
		}

}
}

?>

                </div>

</div>
<div class="span4">

	<?php  include '../include/forum/forumstats.php' ;   ?> 
	
</div>
</div></div>

<?php  include '../include/overall/all_footer.php' ;   ?> 