<?php ob_start(); ?>

<?php 
include '../core/init.php'; 
          
   include '../include/overall/doforum_header.php' ; 
   
?>
 <?php  include '../include/forum/nav_for.php' ;   ?>
 

 <br/> 
 
  <div class="container">    
  
 
 
 
 <hr>
 <div class="container">

                      <div class="row">

<div class="span3" >

<a href="../doforum/forumofwd.php"> <div class="thumbnail"  id="thumbutton_btn_11">
              <h4 > Web Development </h4>
</div></a>
<br/>
<a href="../doforum/forumofpl.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4> Prrogramming Language </h4>
</div></a>
<br/>
<a href="../doforum/forumofdr.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4> General </h4>
</div></a>
<br/>
<a href="../doforum/forumofsi.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4> Science & Ideas </h4>
</div></a>
<br/>
<a href="../doforum/tools.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4>      Tools </h4>
</div></a>
<br/>
<a href="../doforum/technologyandsolution.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4>   Tech & Solution </h4>
</div></a>
<br/>
<a href="../doforum/forumofad.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4> Arts & Designs </h4>
</div></a>
<br/>
<a href="../doforum/forumoflw.php"> <div class="thumbnail" id="thumbutton_btn_11">
              <h4> Literatures & Writings </h4>
</div></a>
</div>            


                      <div class="span6">
                      <?php  include '../include/forum/forumstats_recent.php' ;   ?> <br/>
                      </div>

                              <div class="span3">




                              <div class="thumbnail">
                              <a href="../doforum/new_topic.php"> <button class="btn btn-large btn-block btn-inverse" type="button" id="btn_text">Create a new Topic</button></a>
                              </div> <BR>

                              <div class="thumbnail">
                              <a href="../doforum/do_members_profile.php"> <button class="btn btn-large btn-block btn-inverse" type="button">Meet All Members</button></a>
                              </div> <BR>


                              <?php  include '../include/forum/forumstats.php' ;   ?> 
                              <br>
                              <?php  include '../include/forum/forumstats_top.php' ;   ?>

                              </div>

                      </div>



</div>
</div></div><hr> <hr>
      
      
      
                
<?php  include '../include/overall/all_footer.php' ;   ?>    
                
