
<?php 
include '../core/init.php'; 
     
    
    
    
       

    
    if (empty($_POST) === false)  {
         $username =$_POST['username'];
         $password = $_POST['password'];
         
         if (empty($username)== true){
            $errors[] = 'you need to enter a username'; 
         }
         if (empty($password)== true){
            $errors[] = 'you need to enter a password ';
            
         } else if (user_exists($username)=== false){
               $errors[] = 'username is not exists !! ';  
               
         } else if (user_active($username)=== false){
               $errors[] = 'username is not active !! ';  
         } else {
             $login = user_login($username,$password);
            if ($login == false){
          
                  $errors[] = 'username and password combination = [X] ';  
             }else{
                 
                 $_SESSION['user_id'] = $login;
                   header('Location: ../do/home.php');
                   exit();              
             }
         }                                                                           
         
         
        
    }  else{
        $errors[] = 'No data received';
    }
   include '../include/overall/all_header.php' ; 
     if (empty($errors) === false) {
?>                   ?>
    <div class="alert alert-error">   
        <h2> We tried to log you in, but.....</h2>
        <?php
        
            echo output_errors($errors);
     }

    ?>
    
           </div> 
    



    <div class="container">
    
    



      <!-- Main hero unit for a primary marketing message or call to action -->
      
  
        <div class="row">
        
        
        
         <div class="offset8">


             
             
             
              <?php
    include '../include/form/login_form.php'
?>

            
             
      
    
        
              
    
      
      
      
     
            
            
       </div>
       </div> 

       


  
      

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>
      
            <div class="row">
        <div class="span4">
          <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>
      
      

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->


 <?php include '../include/overall/all_footer.php' ;  ?>