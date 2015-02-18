<?php ob_start(); ?>

<?php 
include '../core/init.php'; 

    
             

   include '../include/overall/doforum_header.php' ; 
   
?>

<div class="container">
<div class="row">
	

<?php


$sql = "SELECT
			profilepic,
			first_name,
			last_name,
			username
		FROM
			users
		WHERE
			active=1 ";

			
			
			
$result = mysql_query($sql);

?><?php
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
	?>
	<div class="span2"> 
	<div class="thumbnail"> 
		
	
                  <div class="caption">
                    <h6><?php echo $row['first_name'];?>&nbsp;<?php echo $row['last_name'];?></h6>
                    <p><a href="../profile/<?php echo $row['username'];?>" class="btn btn-primary">View Profile</a> </p>
                  </div>
                </div>
	</div>

	<?php }


?> 










</div>
</div>
<?php  include '../include/overall/all_footer.php' ;   ?> 