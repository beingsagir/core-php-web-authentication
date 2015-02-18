<?php


include '../core/init.php'; ?>
    
             

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>We Love 2 Do</title>
	<link rel="shortcut icon" href="../image1/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../sagirlovescss/css/sagirlovescss.css" rel="stylesheet">


    <style type="text/css">

	  
	  /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
	       padding-top:0px;
      padding-bottom:0px;
      color: #5a5a5a;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: relative;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: absolute;
      right: 0;
      bottom: 0;
      left: 0;
    }

    .carousel-control {
      background-color: transparent;
      border: 0;
      font-size: 120px;
      margin-top: 0;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-bottom: 100px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }


    /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }



    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-bottom: 40px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }

    }
    </style>


    <link href="../sagirlovescss/css/sagirlovescss-responsive.css" rel="stylesheet">
    <link href="../sagirlovescss/css/docs.css" rel="stylesheet">
    <link href="../sagirlovescss/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="sagirlovescss/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../sagirlovescss/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../sagirlovescss/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../sagirlovescss/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../sagirlovescss/ico/apple-touch-icon-57-precomposed.png">

	
	
	<!-- google tracking -->
	
					<script type="text/javascript">

					var _gaq = _gaq || [];
					_gaq.push(['_setAccount', 'UA-35244976-1']);
					_gaq.push(['_trackPageview']);

					(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
					})();

</script>
	
	
<meta name="google-site-verification" content="V0n2pWybhroPeZrp_M2_HQavjrYLPLYvU61dqxFpiuU" />	
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">

    <?php include '../include/page_head.php' ; ?>
   


        <?php 
                
              //  if (logged_in()=== true){
                    
                                  include '../include/nav.php' ; 
                                   
            //    }  else{
              //      include '../include/not_logged_nav.php';
              //  }
                
   ?> 
  


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=177572688941353";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<!-- Place this tag after the last badge tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
            <img src="../image1/index/ind11.jpg"  alt="Hello World" />
          <div class="container">
            <div class="carousel-caption">
              <h1>Hello The DoLovers</h1>
              <p class="lead">This is the site for the people , who really love to do...</p>
              <a class="btn btn-large btn-primary" href="../do/register.php">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="../image1/index/ind22.jpg"  alt="Hello World" />
          <div class="container">
            <div class="carousel-caption">
              <h1>DoForum</h1>
              <p class="lead">Where People can discuss, share and do things 2gether !.</p>
              <a class="btn btn-large btn-primary" href="../doforum/">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
           <img src="../image1/index/ind33.jpg"  alt="Hello World" />
          <div class="container">
            <div class="carousel-caption">
              <h1>We are creative.</h1>
              <p class="lead">We do projecct like shortfilm making, music , We love to do the new ..... Welcome !!</p>
              <a class="btn btn-large btn-primary" href="../studio/">Visit Studio</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->



		
	      <div class="container">
   <div class="span12">
     	 <div class="row">
	   <div class="span9">

  	 <div class="row">
	 	 <?php if (logged_in()){
	 
	 if($recover === 1){ ?>
	  <div class="row">
	  <div class="12">
	 <div class="alert alert alert-error"> 
	 <h1>Security Issue for  <?php echo $user_data['username'] ; ?> </h1><p>
	 Hello Sir ! Recently you have changed your password By Our Automatic System REcovery Process 
	 It is our humfull request to you, Please do change your password and create a more strong 
	 password which you can remember very easily ! To change your password you can go to your profile 
	 or click this button  <a class="btn btn-mini btn-danger" href="../profile/changepassword.php" type="button"> Change Password </a> </p> <h3> thank you Sir ! </h3> <p> --- Sagiruddin Mondal, Developer (dolovers.com)  </p>
	 </div> </div> </div> <?php
	 } } ?>
	
	    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->



        <div class="span3">
          <img class="img-circle" src="../image1/index/index22.jpg">
		           <h2>Forum</h2>
          <p>People Who do The best they beleive if they do it together then best of the best can be happen . so we are about to introduce a place where you will make mistake together, you can share together  , You can learn together , and the best thing is, you can do together !!.</p>
           <p><a class="btn" href="../doforum/">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span3">
          <img class="img-circle" src="../image1/index/index21.jpg">
          <h2>Studio</h2>
           <p>We are learners . We learn everyday. and importaintly we apply our lessons so that it can fulfill the reason of learnings . We have built a studio where we research on short film making and video project  !!</p>
         <p><a class="btn" href="../studio/">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span3">
          <img class="img-circle" src="../image1/index/index23.jpg">
          <h2>Forum</h2>
          <p>People Who do The best they beleive if they do it together then best of the best can be happen . so we are about to introduce a place where you will make mistake together, you can share together  , You can learn together , and the best thing is, you can do together !!.</p>
           <p><a class="btn" href="../doforum/">View details &raquo;</a></p>
        </div><!-- /.span4 -->

		
		</div>
		 <div class="row">

			
 
	         <div class="span3">
          <img class="img-circle" src="../image1/index/index24.jpg">
		   <h2>The Habit Box</h2>
          <p> A mind can think of anything , Some mind think beyond achievable. some mind undestimate their abilities . It is a shortfilm about the mind nature - negetive thinking habit - and fight back ! </p>
          <p><a class="btn" href="../studio/thehabitbox_trailer.php">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span3">
          <img class="img-circle" src="../image1/index/index25.jpg">
          <h2>Contacts</h2>
            <p>God create a perfect universe ! We can observe miracles and beatifull combinations of art and logic in the nature . We just find them into the paper or place... We are not the artist . </p>
          <p><a class="btn" href="/do/contact.php">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span3">
          <img class="img-circle" src="../image1/index/index26.jpg">
          <h2>Photography</h2>
            <p>a camera can do things you cant. you see some one or some place, you like this by first sight. it is possible that you can change your mind, a photograph never changes . I love Photography.</p>
          <p><a class="btn" href="/photography">View details &raquo;</a></p>
        </div><!-- /.span4 -->
		
		
		
		</div>
</div> 


	  		<div class="span3">

 <div class="thumbnail">
<div class="fb-like-box" data-href="https://www.facebook.com/doloversdotcom" data-width="260" data-show-faces="true" data-stream="false" data-header="true"></div>
</div>	

<br>

<blockquote class="twitter-tweet"><p>“A journey of a thousand miles must begin with a single step.”~Lao Tzu~ I am a new website --&gt; <a href="http://t.co/PMZnLjVi" title="http://www.dolovers.com">dolovers.com</a> (beta)</p>&mdash; dolovers (@doloversDOTcom) <a href="https://twitter.com/doloversDOTcom/status/246906342424600576" data-datetime="2012-09-15T09:40:33+00:00">September 15, 2012</a></blockquote>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<br>


 <div class="thumbnail">
<!-- Place this tag where you want the badge to render. -->
<div class="g-plus" data-href="//plus.google.com/114364642268798953269" data-width="260" data-rel="publisher"></div>
</div>




</div>
	
	    </div>
</div>
</div>
	
	
	

	
	    <div class="container marketing">
	
	



      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-right" src="../image1/index/ind55.png">
        <h2 class="featurette-heading">First featurette Doforum. <span class="muted">It'll blow your mind.</span></h2>
        <p class="lead">People Who do The best they beleive if they do it together then best of the best can be happen . so we are about to introduce a place where you will make mistake together, you can share together  , You can learn together , and the best thing is, you can do together !!..</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette">
        <img class="featurette-image pull-left" src="../image1/index/ind44.png">
        <h2 class="featurette-heading">Oh yeah, it's my passion. <span class="muted">See for yourself.</span></h2>
        <p class="lead">a camera can do things you cant. you see some one or some place, you like this by first sight. it is possible that you can change your mind, a photograph never changes . I love Photography.</p>
      </div>

      <hr class="featurette-divider">

      <div class="featurette pull-right">
        <img class="featurette-image pull-right" src="../image1/index/16png.png">
        <h2 class="featurette-heading">And lastly, this one. <span class="muted">Checkmate.</span></h2>
        <p class="lead">God create a perfect universe ! We can observe miracles and beatifull combinations of art and logic in the nature . We just find them into the paper or place... We are not the artist .</p>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


    </div><!-- /.container -->

	
      
                
<?php  include '../include/overall/all_footer.php' ;   ?>  
