<?php ob_start(); ?>


<?php 
include '../core/init.php'; 
protect_page();

if (empty($_POST) === false){
    $required_fields = array('current_password','password','password_again');
    foreach($_POST as $key=>$value) {
        if (empty($value) && in_array($key, $required_fields)=== true){
            $errors[] = 'All * marks fields are required to be field';
            break 1;
        }
    }
    
    if (md5($_POST['current_password']) === $user_data['password']){         
        if (trim($_POST['password']) !== trim($_POST['password_again'])) {
            $errors[] = 'Your New Password Do not match' ;
        }else if(strlen($_POST['password'])<6){
            $errors[] = 'your password must be at least 6 characters long'; 
        }
    }
    
    if (md5($_POST['current_password']) === $user_data['password']){
        echo 'fine';
    }       
    else{
        $errors[] = "You have given your current password wrong";
    }

}
  
 include '../include/overall/all_header.php' ;   ?>  
                                                              
 
 

 
 <?php
 if(isset($_GET['success']) && empty($_GET['success'])) {
     echo 'Your password Hasbeen Changed';
 }   else{
 
    if (empty($_POST) === false && empty ($errors) === true) {
         change_password($session_user_id, $_POST['password']);
         header('Location: ../do/changepassword.php?success');
    }   else if(empty($errors)=== false){
       
?>
                                                                 
                <div class="alert alert-error"> 
        <h2> We tried to log you in, but.....</h2>
        <?php
        echo output_errors($errors);
    }
?>
            </div>                     
                    
                       <?php
                       $profile_data  = user_data($session_user_id, 'first_name', 'last_name', 'email');    
                       ?>
                       
                       
 

 
                            <div class="container-fluid">
                            <div class="row-fluid">
                            <div class="span2">
                            <!--Sidebar content-->
                            
                            <a class="btn-large btn-primary" href="profile.php"> Basic Information </a>  <br/>  <br/> <br/>  
                            <a class="btn-large btn-inverse" href="changepassword.php"> Change Password </a>    

                            </div>
                            <div class="span5">
                            <!--Body content-->


                            <h1><?php echo $profile_data['first_name'];?> 's profile</h1>
                            <p><?php echo $profile_data['email'] ;   ?></p>
                            
                             </div>
                             <div class="span5">
                            
                             <?php     include '../include/form/change_password_form.php' ; ?> 
                             
                             
                            </div>      
                            </div>
                            </div>
 
 
 
       <div class="container">
        <div class="row">
         <div class="offset8">
         
      <!-- registration --->     
               
            
            
       </div>
       </div>  
 

 
                            
     
      
<?php      
      
                

 }
include '../include/overall/all_footer.php' ;   ?>    
                
