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
                 <li class="active"><a href="../doforum/forumofpl.php">Web Development</a></li>
                  <li class="divider-vertical"></li>
  </ul>
</div>


<?php

$sql = "SELECT
			categories.cat_id,
			categories.cat_name,
			categories.cat_description,
			COUNT(topics.topic_id) AS topics
		FROM
			categories
	
		LEFT JOIN
			topics
		ON
			topics.topic_id = categories.cat_id
			WHERE
			categories.segment='hk'
		GROUP BY
			categories.cat_name, categories.cat_description, categories.cat_id
	
			";

$result = mysql_query($sql);






if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		
		
		
		
	?>	
	
	

	
	
		<div class="row">
		<div class="span10">
		<hr>

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Last Posted Topic</th>
                  <th>Total Topic</th>
                </tr>
              </thead>
              <tbody>
			  
			  <?php $k=1; while($row = mysql_fetch_assoc($result))
			  {
			  
                ?> <tr>
				   <td> <?php echo $k;
$catname_1=(cat_name_from_catid($row['cat_id']));
				   ?> </td>
                  <td> <?php echo '<h3> <a href="category.php?id=' . $row['cat_id'] . '&category='. $catname_1 .'">' . $row['cat_name'] . '</a></h3>' . $row['cat_description']; 
				  $k=$k+1;?> </td>
                  
				  
				  		<?php		$topicsql = "SELECT
									topic_id,
									topic_subject,
									topic_date,
									topic_cat
								FROM
									topics
								WHERE
									topic_cat = " . $row['cat_id'] . "
								ORDER BY
									topic_date
								DESC
								LIMIT
									1";
								
					$topicsresult = mysql_query($topicsql);
				
					if(!$topicsresult)
					{
					?>	<td> <?php echo 'Last topic could not be displayed.';   ?>	<td> <?php
					}
					else
					{
						if(mysql_num_rows($topicsresult) == 0)
						{
						?>	<td> <?php	echo 'no topics';  ?>	<td> <?php
						}
						else
						{
							?>	<td> <?php while($topicrow = mysql_fetch_assoc($topicsresult)){
							$ar8=$row['cat_name'];
							$ar9=$topicrow['topic_subject'];
						echo '<h3> <a href="topic.php?id=' . $topicrow['topic_id'] . '&cid=' .$topicrow['topic_cat']. '&category='. $ar8 .'&topic=' . $ar9 . '">' . $topicrow['topic_subject'] . '</a> </h3> at ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						$ar= $row['cat_id'];
						
						
						
						
						
						}
					}
					}
				
				
			?> </td>  <td> <?php $cat_id = $ar;
						
                        $topiccount= topic_count($cat_id);
                        echo $topiccount; ?> </td> <?php	
			}?> 
                  
                </tr>
               
              </tbody>
            </table>

		
		
		</div>
		<div class="span2">
		.
		</div>
		</div>
		</div>
		
		
		
		<?php
		
	}
	}	

?>
<?php  include '../include/overall/all_footer.php' ;   ?> 