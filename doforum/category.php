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
                 <?php	$send_cat= $_GET['id']; 
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
                  <li class="active"><a href="../doforum/category.php">Recent Category</a></li>
                  <li class="divider-vertical"></li>
  </ul>
</div>
</div>
<div class="row">
<div class="span10">
<hr>
<?php


//first select the category based on $_GET['cat_id']

$cid = $_GET['id'];
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);
?>
<?php
if (logged_in()=== true)
{
	?>	<a href="../doforum/create_topic.php?cid=<?php echo $cid;?>"> <button class="btn btn-large btn-primary" type="button">Create a new Topic in</button></a>
<?php		
}
else{
		echo '<a href="../do/login.php?location='. urlencode($_SERVER['REQUEST_URI']) .'" class="btn btn-large btn-block btn btn-warning" type="button">please click here to LOGIN and after that you will be able to create a new topic here </a>';
} ?>

<?php
if(!$result)
{
	echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This category does not exist.';
	}
	else
	{
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
			echo '<h1>category : ' . $row['cat_name'] .'</h1></a>';
			$ar8=$row['cat_name'];
		}
		
?>	<hr> <?php
		//do a query for the topics
		$sql = "SELECT	
					topic_id,
					topic_subject,
					topic_date,
					topic_cat
				FROM
					topics
				WHERE
					topic_cat = " . mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'The topics could not be displayed, please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'There are no topics in this category yet.';
			}
			else
			{
				//prepare the table
				?>


				<table class="table table-bordered table-striped">
              <thead>
                
					  <tr>
						<th>Topic</th>
						<th>Created at</th>
						<th>Total Post</th>
					  </tr>
					  
			 </thead>
			 <tbody>
					<?php
				while($row = mysql_fetch_assoc($result))
				{				
					?>
					
					
					<tr>
						<td>
						<?php
							$ar9=$row['topic_subject'];
							echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '&cid='. $cid .'&category='. $ar8 .'&topic=' . $ar9 . '">' . $row['topic_subject'] . '</a><br /><h3>';
						$ar1=$row['topic_id'];
						?> </td>
						<td>
						<?php echo date('d-m-Y', strtotime($row['topic_date'])); ?>
					</td>
					<td> <?php $top_id = $ar1;
                        $postcount= post_count($top_id);
                        echo $postcount; ?> </td> <?php	
			            ?>
					
					</tr> <?php
				}  ?> </tbody> </table> <?php
			}
		}
	}
}

?>


    </div><div class="span2">..</div>
             <hr>  </div> </div> 
			 
			 
			 <?php  include '../include/overall/all_footer.php' ;   ?> 
 