<?php ob_start(); ?>

<?php 
include '../core/init.php'; 

    
             

   include '../include/overall/doforum_header.php' ; 
   
?>

<div class="container">
 <div class="row">
   
   <div class="pagination">
  <ul>
			<li><a href="../doforum">Forum Home</a></li>
                       <?php 	$send_cat  = $_POST['cid']; 
								$send_cat11= $_POST['id']; 
								$send_cat111= $_POST['tid']; 


					   
					   
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
			}else if($segment == 'hk'){
			?> <li><a href="../doforum/Ethicalhacking.php">Ethical Hacking</a></li> <?php
			}else if($segment == 'ts'){
			?> <li><a href="../doforum/technologyandsolution.php">Tech & Solution</a></li> <?php
			}
			else{
			echo 'something went wrong';
			}
			
	?>
                  <li class="divider-vertical"></li>
                  <li class="active"> <a class="item" href="/doforum/create_topic.php">Edit Topic</a></li>
                  <li class="divider-vertical"></li>
                  
                  <li class="divider-vertical"></li>
  </ul>
</div><hr>
<div class="span8"><hr>

<?php

			$id_from_post = $_POST['id'];


$posts_sql = "SELECT
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
						posts.post_id = " . mysql_real_escape_string($id_from_post);
						
			$posts_result = mysql_query($posts_sql);
			
			if(!$posts_result)
			{
				echo '<tr> <td>The posts could not be displayed, please try again later.</td></tr>';
			}
			else
			{

			$posts_row = mysql_fetch_assoc($posts_result);
			$abcq=stripslashes($posts_row['post_content']);

?>
 


						<form method="post" action="">
						
						Why Editing Needed ? because, <br />
						<input type="text" name="y_needed" value=" the post was "/><br />
						
						<input type="hidden" name="suc" value="ok"><input type=hidden name=tid value=<?php echo $send_cat111; ?>><input type=hidden name=id value=<?php echo $send_cat11; ?>> <input type=hidden name=cid value=<?php echo $send_cat; ?>>
						
						Message: <br /><textarea rows="3" class="span8" name="post_content11" value="Create topic"><?php  echo $abcq; ?> </textarea> <br />
						
						<input type="submit" value="Edit & Post" class="btn " />
						</form>

	<?php	}		 ?>


<?php echo $abcq ; ?> -
								<?php echo $id_from_post  ; ?> -
							
							<script type="text/javascript">
							CKEDITOR.replace('post_content11');
							</script>



							
							
	<?php						
							
	
				
							
		
		if($_POST['suc']=="ok"){ 

			$tid_from_post = $_POST['id'];
			$post11 =  $_POST['post_content11'];      

			
				//the first query worked, now start the second, posts query
				//retrieve the id of the freshly created topic for usage in the posts query
				$topicid = mysql_insert_id();
				$sql = "UPDATE posts SET post_content = \" " . $post11 . " \" where  post_id= ". $tid_from_post ."
						";

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

					//after a lot of work, the query succeeded!
					if ($_POST['suc']=="ok"){
      header('Location: topic.php?id=' . $send_cat111 . '&cid='. $send_cat .' ');
  }
					
				}
					

			}				
	?>						
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							




</div>
<div class="span4">

	<?php  include '../include/forum/forumstats.php' ;   ?> 
	
</div>
</div></div>

<?php  include '../include/overall/all_footer.php' ;   ?> 