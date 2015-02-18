<?php ob_start(); ?>

<?php 
include '../core/init.php'; 
    
             

   include '../include/overall/doforum_header.php' ; 
   
?>
 <div class="container">
 <div class="row">
   
   <div class="pagination">
  <ul>
				<li><a href="../doforum">Forum Home <i class="icon-arrow-right"></i> </a></li>
                  <?php	$send_cat= $_GET['cid']; 
			$segment = segment_from_catid($send_cat);
			if($segment =='pl'){
			?> <li><a href="../doforum/forumofpl.php">Programming languages</a></li> <?php
			}
			else if($segment == 'wd'){
			?> <li><a href="../doforum/forumofwd.php">Web Development</a></li> <?php
			}else if($segment == 'si'){
			?> <li><a href="../doforum/forumofsi.php">Science and Ideas</a></li> <?php
			}else if($segment == 'dr'){
			?> <li><a href="../doforum/forumofdr.php">Discussion Room</a></li> <?php
			}else if($segment == 'en'){
			?> <li><a href="../doforum/forumofen.php">Entertaintment Adda</a></li> <?php
			}else if($segment == 'lw'){
			?> <li><a href="../doforum/forumoflw.php">Literatures & Writings</a></li> <?php
			}else if($segment == 'ad'){
			?> <li><a href="../doforum/forumofad.php">Arts & Designs</a></li> <?php
			}else if($segment == 'to'){
			?> <li><a href="../doforum/tools.php">Tools</a></li> <?php
			}else if($segment == 'ts'){
			?> <li><a href="../doforum/technologyandsolution.php">Tech & Solution</a></li> <?php
			}
			else{
			echo 'something went wrong';
			}
			
			?>
                  <li class="divider-vertical"></li>
				   <li> <?php echo '<a href="category.php?id=' . $_GET['cid'] . '"> Recent Category</a> '?> </li>
				   <li class="divider-vertical"></li>
				   <li class="active"><a href="../doforum/category.php">Recent Topic</a></li>
				  <li class="divider-vertical"></li>
                  
  </ul>
</div>



<div class="span10">
<hr>


<?php


$sql = "SELECT
			topic_id,
			topic_subject
		FROM
			topics
		WHERE
			topics.topic_id = " . mysql_real_escape_string($_GET['id']);
			
$result = mysql_query($sql);

if(!$result)
{
	echo 'The topic could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This topic doesn&prime;t exist.';
	}
	else
	{
		while($row = mysql_fetch_assoc($result))
		{
			//display post data
			echo '<h1>' . $row['topic_subject'] . '</h1>';
		
			//fetch the posts from the database
			$posts_sql = "SELECT
						posts.post_id,
						posts.post_topic,
						posts.post_content,
						posts.post_date,
						posts.post_by,
						users.user_id,
						users.username
					FROM
						posts
					LEFT JOIN
						users
					ON
						posts.post_by = users.user_id
					WHERE
						posts.post_topic = " . mysql_real_escape_string($_GET['id']);
						
			$posts_result = mysql_query($posts_sql);
			
			if(!$posts_result)
			{
				echo '<tr> <td>The posts could not be displayed, please try again later.</td></tr>';
			}
			else
			{
			 ?> <hr> <?php 
				while($posts_row = mysql_fetch_assoc($posts_result))
				{
					?> <div class="row-fluid"> 
			<li class="span2">
         
		 
		 <?php 
		 
		 $uname=$posts_row['username'];
		 $user11= user_id_from_username($posts_row['username']);
		 
		 $fn=first_name_from_user_id($user11);
		 $ln=last_name_from_user_id($user11);
		 
		 
		   ?>
		   
		   
		   

		   
		   
		   
		   
		   
		 
		 <a href="#" class="thumbnail">
           <?php 
		  
		   
		   
		   echo '<img src="../', profilepic_from_user_id($user11), ' " alt="$uname">'; ?> 
          </a>
          </li>
					
					<li class="span10">
					<table class="table table-striped table-bordered table-condensed">
					       <thead>
          <tr>
            <th>
			 
				<a href="../profile/<?php echo $uname ;
				?>"> <?php echo $fn; echo " "; echo  $ln; ?> </a>  
			</th>
			  
			 
		</tr>
			
			 
			
			 </thead>
  <tr class="success">
    <td>username : <?php echo $posts_row['username']; ?></td>
    <td>position :Junior Member</td>
    <td>@ <?php $dd=($posts_row['post_date']);

	echo $dd; ?></td>
    <td><a class="badge badge-important" href="../do/contact.php">report spam</a></td>
  </tr>
        

        <tr>
		<td colspan="4">	 <br>	<?php
					$abc=stripslashes($posts_row['post_content']);
					?>
           <ol class="linenums"><?php echo $abc;  ?></ol>
    </td>      
</tr> 



<tr> <td colspan="4">
 <?php 
			  //administration control
			    if (logged_in() === true){
			  $adminif = $user_data['administration'];
			  if( $adminif  == 1){
			  ?>

						  <?php 
						  
						  
						  // The bar is for the moderator / admin etc
						  $edit_tid=($posts_row['post_topic']); // post ID
						 
						  $edit_id = $posts_row['post_id']; //post id
						  $edit_cid= $_GET['cid'];			// category id
						 
						  
?>						<form method="post"  action="../doforum/edit_post.php">
								<input type="hidden" name="suc" value=""><input type="hidden" name="tid" value="<?php echo $edit_tid; ?>"><input type="hidden" name="id" value="<?php echo $edit_id; ?>"> <input type="hidden" name="cid" value="<?php echo $edit_cid; ?>">
								<br /><input type="submit" value="Edit This Post" class="btn">  


								<?php echo $edit_tid ; ?> -
								<?php echo $edit_id  ; ?> -
								<?php echo $edit_cid  ; ?>

			
			
								</form>
								<?php 
								} }
								?>
							</td>
							</tr> 
							 </table>

	  </li>
	  
</div><!--/row--><br/> 
		<?php		}
			} 
	}//end of while
}		
	
	
	}
	
	
	
	
   
if (empty($_POST) === false){

    $required_fields = array('reply-content') ;
 
    foreach($_POST as $key => $value){
         if(empty($value) && in_array($key,$required_fields) === true){
             $errors[] = 'Please Enter Some Text';
             break 1;
    
         }   
    
    } 
    
    
}
			if (logged_in() === false)
			{
				
echo '<div class="alert "><tr><td> You must be <a href="../do/login.php?location='. urlencode($_SERVER['REQUEST_URI']) .'">signed in</a> to reply. You can also <a href="../do/register.php">sign up</a> for an account.</tr></div>';

			}
			else {
			
			if (empty($_POST) === false && empty($errors)=== true) {        
										
											//a real user posted a real reply
											$sql = "INSERT INTO 
														posts(post_content,
															  post_date,
															  post_topic,
															  post_by) 
													VALUES ('" .  mysql_real_escape_string($_POST['reply-content']) . "',
															NOW(),
															" . mysql_real_escape_string($_GET['id']) . ",
															" . $_SESSION['user_id'] . ")";
															
											$result = mysql_query($sql);
											
											
											$root_topicer=user_id_from_topic_id(mysql_real_escape_string($_GET['id']));
											$root_topicer_name=username_from_user_id($root_topicer);
											$email_topicer=email_from_user_id($root_topicer);
											$topic_name=topic_namefromtopicid(mysql_real_escape_string($_GET['id']));
											$idm=$_GET['id'];
											$cidm=$_GET['cid'];
											
											
						
											single_email($email_topicer,'Forum Replied',"From :: DoForum \n Hello ".  $root_topicer_name  .",Your forum topic --> ".$topic_name." \nhas been replied \nYou Can Visit there by clicking this link-- >http://dolovers.com/doforum/topic.php?id=".$idm."&cid=".$cidm." \n\n -dolovers ");
																						
											
											addpostpoint($session_user_id);
										
                                            header('Location: topic.php?id=' . $_GET['id'] . '&cid='. $_GET['cid'] .' ');
											exit();
											
										 }
											      else if (empty($errors) === false){

                ?>
                <div class="alert alert-error">  <?php

                echo 'Please Enter Some Text !!';
               ?> </div>      <?php
            } 
    ?>	 
				
			<br /> 

			<?php echo'		<form class="well" method="post" action="topic.php?id=' . $_GET['id'] . '&cid='. $_GET['cid'] .'">
						<textarea name="reply-content" class="span8" id="textarea" rows="3" ></textarea><br />
						<input type="submit" class="btn btn-primary btn-large" value="Submit reply" />


					</form> ';
					
					
					
			
			?>
			
				<script type="text/javascript">
	CKEDITOR.replace('reply-content');
	</script>
	
			

			
			
		 
		
		<?php } ?>
		</div> 
		
		<div class="span2"> , </div>
			 <?php

?>



    </div></div>
             <hr>   
<?php  include '../include/overall/all_footer.php' ;   ?>  