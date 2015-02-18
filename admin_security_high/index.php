<?php ob_start(); ?>
<?php 
include '../core/init.php'; 
protect_page();

admin_protect();

admin_protect2d();


include '../include/overall/all_header.php' ; 




?>



<div class="container">
<div class="row">
	

<?php


$sql = "SELECT

			first_name,
			last_name,
			username,
			email,
			email_code
		FROM
			users
		WHERE
			active=0 ";

			
			
			
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
	
	<?php
		email($row['email'],'Activate Your account',"
        DoLovers ". $row['first_name'] .",
		Sir, Till now you have not activate your account. This is a reminder to help you find how easily you can activate your dolovers membership with just one click.
        Just Click the link below and you will be activated to your account.
		\n
		Click -->
        \n\n
        http://www.dolovers.com/do/activate.php?email=" . $row['email'] . "&email_code=" . $row['email_code'] . "   
        \n\n
        -dolovers
        ");
}



?> 








                
<?php  include '../include/overall/all_footer.php' ;   ?>    
                
